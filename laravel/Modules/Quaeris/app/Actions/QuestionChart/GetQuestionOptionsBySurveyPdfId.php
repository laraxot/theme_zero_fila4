<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Exception;
use Modules\Quaeris\Models\SurveyPdf;
use Spatie\QueueableAction\QueueableAction;

class GetQuestionOptionsBySurveyPdfId
{
    use QueueableAction;

    public function execute(string $survey_pdf_id): array
    {
        $row = SurveyPdf::find($survey_pdf_id);
        if ($row === null) {
            throw new Exception('survey_pdf_id['.$survey_pdf_id.'] not found');
        }

        return app(GetQuestionOptionsBySurveyId::class)->execute((string) $row->survey_id);
    }
}
