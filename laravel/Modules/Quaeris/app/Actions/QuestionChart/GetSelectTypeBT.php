<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetSelectTypeBT
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by): array
    {
        $field_name = $questionChart->field_name;
        $label = '"Media"';
        if (! in_array($group_by, ['', 'null', null], false)) {
            $label = $group_by;
        }

        $select = [];
        $select[] = $label.' as label';
        // $select[] = 'count(' . $field_name . ') AS value';
        // $select[] = 'AVG(' . $field_name . ') AS avg';

        $select[] = 'count(if('.$field_name.' REGEXP "^[0-9]$|^0[0-9]$|10",'.$field_name.',NULL )) AS value';
        $select[] = 'AVG(if('.$field_name.' REGEXP "^[0-9]$|^0[0-9]$|10",'.$field_name.',NULL )) AS avg';

        // dddx($select);
        return $select;
    }
}
