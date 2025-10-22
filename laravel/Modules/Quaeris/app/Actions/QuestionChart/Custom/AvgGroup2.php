<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart\Custom;

use Modules\Chart\Datas\AnswerData;
use Modules\Chart\Datas\AnswersChartData;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;

class AvgGroup2
{
    use QueueableAction;

    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by, ?AnswersFilterData $answersFilterData = null): AnswersChartData
    {
        if ($answersFilterData === null) {
            $dateFrom = $questionChart->date_from;
            $dateTo = $questionChart->date_to;
        } else {
            $dateFrom = $answersFilterData->date_from;
            $dateTo = $answersFilterData->date_to;
        }

        $questions = LimeQuestion::where('sid', $questionChart->survey_id)
            ->where('parent_qid', '!=', 0)
            ->get();
        // dddx($questions->groupBy('gid'));
        $all_questions_grouped = $questions->groupBy('gid');
        $data = [];
        foreach ($all_questions_grouped as $gid => $group_questions) {
            $value_per_weight = 0;
            $weight_sum = 0;
            $under_5 = 0;
            $over_6 = 0;
            $label = trans('quaeris::group_abbreviations.'.$questionChart->survey_id.'.'.$gid);
            // echo '<h3>'.$gid.']'.$label.'</h3>';
            foreach ($group_questions as $group_question) {
                $field_name = $group_question->sid.'X'.$group_question->gid.'X'.$group_question->parent_qid.$group_question->title;
                $select = [];
                $select[] = 'count('.$field_name.') as q';
                $res_less_rows = $questionChart->answers()->selectRaw(implode(',', $select))
                    ->where($field_name, '<', 6)
                    ->where($field_name, '!=', '')
                    ->whereBetween('submitdate', [$dateFrom ?? 0, $dateTo ?? now()]);
                // dddx(rowsToSql($res_less_rows));
                $res_less = $res_less_rows->first();
                $res_gt = $questionChart->answers()->selectRaw(implode(',', $select))
                    ->where($field_name, '>=', 6)
                    ->where($field_name, '!=', '')
                    ->whereBetween('submitdate', [$dateFrom ?? 0, $dateTo ?? now()])
                    ->first();
                // echo '<br>'.$field_name.' : '.$res_less->q.'  : '.$res_gt->q;
                $under_5 += $res_less->q ?? 0;
                $over_6 += $res_gt->q ?? 0;
            }

            // echo '<h4>'.$under_5.' - '.$over_6.'</h4>';
            $data[] = [
                // 'gid' => $gid,
                'label' => $label,
                'value' => ['Valutazione da 5 a 1' => $under_5, 'Valutazione da 6 a 0' => $over_6],
                'avg' => 0,
                // 'value1' => [$media, $percent],
            ];
        }

        /**
         * @var DataCollection<AnswerData>
         */
        $answers = AnswerData::collect($data, DataCollection::class);
        return AnswersChartData::from(['answers' => $answers, 'chart' => $questionChart->charts[0]]);
    }
}
