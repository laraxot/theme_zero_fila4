<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\SurveyPdf;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Events\QueryExecuted;
use Modules\Quaeris\Datas\DashboardFilterData;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Contracts\View\View;
use Modules\Quaeris\Models\SurveyPdf;
use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Limesurvey\Models\SurveyResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Modules\Quaeris\Actions\QuestionChart\MakeImgByQuestionChartModel2Action;

use function Safe\date;
use function Safe\strtotime;

class MakePdf2Action
{
    use QueueableAction;

    /**
     * @return View|BinaryFileResponse
     */
    public function execute(SurveyPdf $surveyPdf, ?AnswersFilterData $answersFilterData = null)
    {


        // ⏱ start timer + listener query
        $startedAt = microtime(true);
        $queryCount = 0;
        $totalSqlMs  = 0.0;

        DB::listen(function (QueryExecuted $q) use (&$queryCount, &$totalSqlMs) {
            $queryCount++;
            $totalSqlMs += $q->time; // ms
        });













        // non serve fare autoload separato
        //include_once realpath(__DIR__.'/../../../Xot/Services/vendor/autoload.php');
        $html2pdf = new Html2Pdf('L', 'A4', 'it');
        // 🛡️ Disabilita il controllo delle immagini
        $html2pdf->setTestIsImage(false);
        $questionCharts = $surveyPdf->questionCharts->where('show_on_pdf', 1);

        $dashboardFilterData = DashboardFilterData::fromArray([
            'survey_pdf_id' => $answersFilterData->survey_pdf_id,
            'question_filter' => $answersFilterData->question_filter,
            'startDate' => $answersFilterData->date_from,
            'endDate' => $answersFilterData->date_to,
        ]);

        $survey_response_query = SurveyResponse::getResponsesForSurvey((string) $surveyPdf->survey_id)
            ->withParticipants()
            ->where('submitdate', '!=', null)
            ->ofDashboardFilterData($dashboardFilterData)
            ->withAllAnswers('subquery');

        $responses = $survey_response_query;

        foreach ($questionCharts as $questionChart) {
            app(MakeImgByQuestionChartModel2Action::class)
                ->execute($questionChart, $responses, $answersFilterData);
        }

        $html = app(MakeHtmlBySurveyPdfModelAction::class)->execute($surveyPdf, $answersFilterData);
        if (request('debug', false)) {
            return $html;
        }

        $survey_date_to = $answersFilterData !== null ? $answersFilterData->date_to : $surveyPdf->date_to;
        if ($survey_date_to === null || $survey_date_to === '0000-00-00') {
            $survey_date_to = date('W / o');
        } else {
            $survey_date_to = date('W / o', strtotime((string) $survey_date_to));
        }

        $filename = Str::slug($surveyPdf->name.'_sett_'.$survey_date_to).'.pdf';
        // $html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
        if ($html instanceof View) {
            $html = $html->render();
        }

        $html2pdf->writeHTML($html);
        // $filename = 'my_doc.pdf';
        $path = Storage::disk('cache')->path($filename);
        $html2pdf->output($path, 'F');
        $res = $html2pdf->output($path, 'F');
        $headers = [
            'Content-Type' => 'application/pdf',
        ];








        $totalMs = (int) round((microtime(true) - $startedAt) * 1000);
        $sqlMs   = (int) round($totalSqlMs);
        Log::info('PDF generation query stats', [
            'file'           => $filename,
            'queries'        => $queryCount,
            'sql_time_ms'    => $sqlMs,
            'total_time_ms'  => $totalMs,
        ]);



















        return response()->download($path, $filename, $headers);
    }
}
