<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetSelectTypeY
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by): array
    {
        // "answer_value" => "Y"
        // "answer_value_txt" => "Si"
        // "answer_value_no_txt" => "No"
        $_key = $questionChart->answer_value_txt;
        $label = '"'.$_key.'"';
        if (! in_array($group_by, ['', 'null', null], false)) {
            $label = $group_by;
        }

        $field_name = $questionChart->field_name;
        // /$not_resp = app(\Modules\Quaeris\Actions\QuestionChart\GetTot::class)->execute($q);

        $y = 'count(NULLIF('.$field_name.'="Y",""))';
        $n = 'count(NULLIF('.$field_name.'="N",""))';
        // $tot = '('.$y.' + '.$n.')';
        $tot = '(count(*))';
        // $tot = $this->getAnswersCount($q);

        if ($questionChart->answer_value === 'Y') {
            $avg = $y.'*100/'.$tot;
            $value = $y;
        } else {
            $avg = $n.'*100/'.$tot;
            $value = $n;
        }

        $select = [];
        // $select[] = $_key.' as _key';
        $select[] = $label.' as label';
        $select[] = $avg.' as avg';
        $select[] = $value.' as value';
        $select[] = $group_by.' as _group_by';
        $select[] = $sort_by.' as _sort_by';
        // $select[] = $y.' AS Y';
        // $select[] = $n.' AS N';
        // $select[] = 'count(*) as tot';
        // $select[] = "DATE_FORMAT(submitdate,'%Y-%m') as label ";

        return $select;
    }
}
