<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Illuminate\Support\Str;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Quaeris\Datas\QuestionData;
use Spatie\QueueableAction\QueueableAction;

class GetAnswerFieldNameByQuestionIdAction
{
    use QueueableAction;

    public function execute(string $qid): string
    {
        if (Str::contains($qid, 'custom:')) {
            return $qid;
        }

        $question = LimeQuestion::findOrFail($qid);
        // dddx($question->getAttributes());
        // $question_arr = $question->toArray();
        $question_arr = $question->getAttributes();
        $question_arr['question'] = $question_arr['qid'];
        $question_arr['survey_id'] = $question_arr['sid'];
        $question_data = QuestionData::from($question_arr);
        return app(GetAnswerFieldNameByQuestionDataAction::class)->execute($question_data);
    }
}
