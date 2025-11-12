<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetSelectTypeL
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by, ?AnswersFilterData $answersFilterData = null): array
    {
        $field_name = $questionChart->field_name;
        $key = $field_name;
        $label = 'ask_lang.answer';
        if (! in_array($group_by, ['', 'null', null, $field_name], false)) {
            $label = $group_by;
        }

        // dddx($q);
        // "answer_value" => "02"

        $tot = app(GetNotAnswersCount::class)->execute($questionChart, $answersFilterData);
        $tot += app(GetAnswersCount::class)->execute($questionChart, $answersFilterData);
        $select = [];
        $select[] = $key.' as _key';
        $select[] = $label.' as label';
        if ($group_by === $field_name) {
            $select[] = 'count('.$field_name.') as value';
            $select[] = 'count('.$field_name.')*100/'.$tot.' as avg';
        } else {
            $select[] = 'count(NULLIF('.$field_name.'="'.$questionChart->answer_value.'","")) as value';
            $select[] = 'count(NULLIF('.$field_name.'="'.$questionChart->answer_value.'",""))*100/count(NULLIF('.$field_name.',"")) as avg';
        }

        //
        // $select[] = 'count('.$field_name.')*100/count(*) as avg';

        return $select;
    }
}
