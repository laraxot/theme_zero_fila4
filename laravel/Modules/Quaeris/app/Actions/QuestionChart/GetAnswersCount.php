<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Illuminate\Support\Str;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetAnswersCount
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
        $field_name = $q->field_name;
        $select = [];
        if ($q->question_type === 'M') {
            Assert::notNull($lime_question = $q->limeQuestion, '['.__FILE__.']['.__LINE__.']');
            $question_sons = LimeQuestion::where('parent_qid', $q->question)->get();
            foreach ($question_sons as $son) {
                $field_name = $q->survey_id . 'X' . $lime_question->gid . 'X' . $lime_question->qid . $son->title;
                $select[] = 'count(nullif(' . $field_name . ',""))';
            }

            $res = $q->answers()->selectRaw(implode('+', $select) . 'as q')
                // ->whereBetween('submitdate', [$q->date_from ?? 0, $q->date_to ?? now()])
                ->when($dateFrom, static function ($q1) use ($dateFrom): void {
                    $q1->where('submitdate', '>=', $dateFrom);
                })->when($dateTo, static function ($q1) use ($dateTo): void {
                    $q1->where('submitdate', '<=', $dateTo);
                })
                ->first();
            return (int) $res->q ?? 0;
        }

        $answers = $q->answers()
            // ->whereBetween('submitdate', [$q->date_from ?? 0, $q->date_to ?? now()]);
            ->when($dateFrom, static function ($q1) use ($dateFrom): void {
                $q1->where('submitdate', '>=', $dateFrom);
            })->when($dateTo, static function ($q1) use ($dateTo): void {
                $q1->where('submitdate', '<=', $dateTo);
            });
        // ->where($field_name, '!=', '')
        if (! Str::startsWith($field_name, 'custom')) {
            $answers->where($field_name, '!=', '');
        }

        return $answers->count();
    }
}
