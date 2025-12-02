<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Illuminate\Support\Str;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetNotAnswersCount
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $q, ?AnswersFilterData $filter = null): int
    {
        if ($filter === null) {
            $dateFrom = $q->date_from;
            $dateTo = $q->date_to;
        } else {
            $dateFrom = $filter->date_from;
            $dateTo = $filter->date_to;
            if ($dateTo !== null) {
                $dateTo = str_replace('00:00:00', '23:59:59', $dateTo);
            }
        }

        if ($q->question_type === 'M') {
            return 0;
        }

        $field_name = $q->field_name;
        $answers = $q->answers()
        // ->where($field_name, '=', '')
            // ->whereBetween('submitdate', [$q->date_from ?? 0, $q->date_to ?? now()]);
        // ->count()
            ->when($dateFrom, static function ($q1) use ($dateFrom): void {
                $q1->where('submitdate', '>=', $dateFrom);
            })->when($dateTo, static function ($q1) use ($dateTo): void {
                $q1->where('submitdate', '<=', $dateTo);
            });
        if (! Str::startsWith($field_name, 'custom')) {
            $answers->where($field_name, '=', '');
        }

        return $answers->count();
    }
}
