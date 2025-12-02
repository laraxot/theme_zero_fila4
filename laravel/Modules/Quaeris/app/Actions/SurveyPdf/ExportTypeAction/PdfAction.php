<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\SurveyPdf\ExportTypeAction;

use Illuminate\Contracts\View\View;
use Modules\Quaeris\Actions\SurveyPdf\MakePdf2Action;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PdfAction
{
    use QueueableAction;

    /**
     * @return View|BinaryFileResponse
     */
    public function execute(SurveyPdf $surveyPdf, ?AnswersFilterData $answersFilterData = null)
    {
        return app(MakePdf2Action::class)->execute($surveyPdf, $answersFilterData);
    }
}
