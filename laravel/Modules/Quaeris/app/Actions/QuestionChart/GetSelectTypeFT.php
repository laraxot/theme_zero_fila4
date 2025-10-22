<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetSelectTypeFT
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by): array
    {
        $label = '"Media"';
        if (! in_array($group_by, ['', 'null', null], false)) {
            $label = $group_by;
        }

        // dddx(['q' => $q, 'group_by' => $group_by]);

        $select = [];
        $select[] = $label.' as label';
        $select[] = 'count(if(ask_lang.answer REGEXP "^[0-9]+$",ask_lang.answer,NULL )) AS value';
        $select[] = 'AVG(if(ask_lang.answer REGEXP "^[0-9]+$",ask_lang.answer,NULL )) AS avg';
        // $select[] = 'count('.$field_name.') AS value';
        // $select[] = 'AVG('.$field_name.') AS avg';

        return $select;
    }
}
