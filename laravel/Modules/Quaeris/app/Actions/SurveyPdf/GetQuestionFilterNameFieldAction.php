<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\SurveyPdf;

use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetQuestionFilterNameFieldAction
{
    use QueueableAction;

    public function execute(QuestionChart $questionChart): ?string
    {
        $surveyPdf = $questionChart->surveyPdf;
        if ($surveyPdf === null) {
            return null;
        }
        $limeSurvey = $surveyPdf->info;
        if ($limeSurvey === null) {
            return null;
        }
        $limeQuestion = $limeSurvey->questions->where('qid', $surveyPdf->question_filter)->first();
        if ($limeQuestion === null) {
            return null;
        }

        $gid = $limeQuestion->gid;

        return $surveyPdf->survey_id.'X'.$gid.'X'.$surveyPdf->question_filter;
    }
}
