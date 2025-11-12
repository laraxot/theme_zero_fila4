<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Illuminate\Support\Collection;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Quaeris\Datas\QuestionData;
use Spatie\QueueableAction\QueueableAction;

class GetQuestionBreadsByQuestionDataAction
{
    use QueueableAction;

    // public array $vars = [];
    // public QuestionData $question_data;
    /**
     * @return  Collection<int, LimeQuestion>|null
     */

    public function execute(QuestionData $questionData): ?Collection
    {
        return app(GetQuestionBreadsByQuestionIdSurveyIdAction::class)
            ->execute($questionData->question, $questionData->survey_id);
    }
}
