<?php
/**
 * ---.
 */
declare(strict_types=1);

namespace Modules\Quaeris\Actions\SurveyPdf;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use Modules\Xot\Services\HtmlService;
use function Safe\date;
use function Safe\ini_set;
use function Safe\strtotime;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

// use Modules\Quaeris\Models\Panels\Traits\ContainerQuestionTrait;

class MakePdfAction
{
    use QueueableAction;

    // use ContainerQuestionTrait;
    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    public function execute(SurveyPdf $surveyPdf, ?AnswersFilterData $answersFilterData = null): BinaryFileResponse|View
    {
        ini_set('memory_limit', '8095M');
        ini_set('max_execution_time', '300');

        // $questionCharts = $surveyPdf->questionCharts->where('show_on_pdf', 1);
        // foreach ($questionCharts as $questionChart) {
        //     app(MakeImgByQuestionChartModel2Action::class)
        //         ->execute($questionChart, $answersFilterData);
        // }

        $html = app(MakeHtmlBySurveyPdfModelAction::class)->execute($surveyPdf);
        if (request('debug', false)) {
            return $html;
        }
        // Assert::methodExists($html, 'render', $message = 'function render not exists');
        $out = $html->render();
        $content = HtmlService::toPdf(html: $out, out: 'content_PDF');

        $survey_date_to = $surveyPdf->date_to;

        if ($survey_date_to === null || $survey_date_to === '0000-00-00') {
            $survey_date_to = date('W / o');
        } else {
            $survey_date_to = date('W / o', strtotime($survey_date_to));
        }

        $filename = storage_path('limesurvey/' . Str::slug($surveyPdf->name . '_sett_' . $survey_date_to) . '.pdf');

        File::put($filename, $content);

        return response()->download($filename);
    }
}
