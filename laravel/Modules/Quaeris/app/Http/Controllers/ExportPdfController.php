<?php

declare(strict_types=1);

namespace Modules\Quaeris\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Modules\Quaeris\Actions\SurveyPdf\MakePdfAction;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportPdfController extends BaseController
{
    /**
     * ---
     */
    public function __invoke(SurveyPdf $surveyPdf): BinaryFileResponse|View
    {
        $answersFilterData = null;
        if (Session::has('tableFilters')) {
            $answersFilterData = AnswersFilterData::from(session('tableFilters'));
        }

        return app(MakePdfAction::class)->execute($surveyPdf, $answersFilterData);

        // $questionCharts = $surveyPdf->questionCharts->where('show_on_pdf', 1);
        // foreach ($questionCharts as $questionChart) {
        //     app(\Modules\Quaeris\Actions\QuestionChart\MakeImgByQuestionChartModel2Action::class)
        //         ->execute($questionChart);
        // }

        // $html = app(MakeHtmlBySurveyPdfModelAction::class)->execute($surveyPdf);
        // if (request('debug', false)) {
        //     return $html;
        // }
        // // Assert::methodExists($html, 'render', $message = 'function render not exists');
        // $out = $html->render();
        // $content = HtmlService::toPdf(['html' => $out, 'out' => 'content_PDF']);

        // $survey_date_to = $surveyPdf->date_to;

        // if ($survey_date_to == null || '0000-00-00' == $survey_date_to) {
        //     $survey_date_to = date('W / o');
        // } else {
        //     $survey_date_to = date('W / o', strtotime($survey_date_to));
        // }

        // $filename = storage_path('limesurvey/' . Str::slug($surveyPdf->name . '_sett_' . $survey_date_to) . '.pdf');

        // if (! is_string($content)) {
        //     throw new Exception('[' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
        // }
        // File::put($filename, $content);

        // return response()->download($filename);
    }
}
