<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Modules\Quaeris\Datas\QuestionData;
use Spatie\QueueableAction\QueueableAction;

class GetAnswerFieldNameByQuestionDataAction
{
    use QueueableAction;

    public function execute(QuestionData $questionData): string
    {
        $q = app(GetQuestionBreadsByQuestionDataAction::class)->execute($questionData);

        return app(GetAnswerFieldNameByQuestionCollAction::class)->execute($q);
    }
}
