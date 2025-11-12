<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Limesurvey\Models\LimeQuestionL10n;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetSelectTypeM
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by): array
    {
        $field_name = $questionChart->field_name;
        $question_sons = LimeQuestion::where('parent_qid', $questionChart->question)->get();
        Assert::notNull($lime_question = $questionChart->limeQuestion, '['.__FILE__.']['.__LINE__.']');
        $tot = app(GetTot::class)->execute($questionChart);
        $select = [];
        foreach ($question_sons as $k => $son) {
            $field_name = $questionChart->survey_id.'X'.$lime_question->gid.'X'.$lime_question->qid.$son->title;
            // dddx(['lang' => $son->l10n, 'field_name' => $field_name]);
            Assert::isInstanceOf($son->l10n, LimeQuestionL10n::class);
            $select[] = '"'.$son->l10n->question.'" AS label_'.$k;
            $select[] = 'count(nullif('.$field_name.',"")) AS value_'.$k;
            $select[] = 'count(nullif('.$field_name.',""))*100/'.$tot.' AS avg_'.$k;
        }

        // dddx(['survey_id' => $q->survey_id, 'field_name' => $field_name, 'q' => $q, 'parent_qid' => $q->parent_qid]);
        return $select;
    }
}
