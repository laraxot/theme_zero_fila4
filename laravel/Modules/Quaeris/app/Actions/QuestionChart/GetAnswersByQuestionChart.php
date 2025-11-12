<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Exception;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Modules\Chart\Datas\AnswerData;
use Illuminate\Database\Eloquent\Builder;
use Modules\Chart\Datas\AnswersChartData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;
use Illuminate\Database\Eloquent\Collection;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Actions\SurveyPdf\GetQuestionFilterNameFieldAction;

class GetAnswersByQuestionChart
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $q, ?string $group_by = null, ?string $sort_by = null, ?AnswersFilterData $filter = null, ?Builder $responses = null): AnswersChartData
    {
        $field_name = $q->field_name;
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

        if (Str::startsWith((string) $q->question, 'custom:')) {
            $action = '\Modules\Quaeris\Actions\QuestionChart\Custom\\'.$q->question_type;
            return app($action)->execute($q, $group_by, $sort_by, $filter);
        }

        $group_by = app(GetPieceQueryBySurveyIdAction::class)
            ->execute((string) $q->survey_id, (string) $group_by, 'name');
        $sort_by = app(GetPieceQueryBySurveyIdAction::class)
            ->execute((string) $q->survey_id, (string) $sort_by, 'number');
        if (\in_array($group_by, ['', 'null'], false) && \in_array($q->question_type, ['L', 'ExclamationPoint'], false)) {
            $group_by = $field_name;
        }

        if ($sort_by === '"_value"') {
            $sort_by = 'value desc';
        }

        $action = '\Modules\Quaeris\Actions\QuestionChart\GetSelectType'.$q->question_type;
        $select = app($action)->execute($q, $group_by, $sort_by, $filter);
        // $answers = $q->answers()
        //     ->when($dateFrom, static function ($q1) use ($dateFrom): void {
        //         $q1->where('submitdate', '>=', $dateFrom);
        //     })->when($dateTo, static function ($q1) use ($dateTo): void {
        //         $q1->where('submitdate', '<=', $dateTo);
        //     });

        // 🔑 Se non arriva un builder esterno uso quello del modello
        $base = $responses ? clone $responses : $q->answers();

        // 🔑 Lavoro SEMPRE su una copia locale
        $answers = clone $base;

        $answers = $answers
            ->when($dateFrom, fn ($q1) => $q1->where('submitdate', '>=', $dateFrom))
            ->when($dateTo, fn ($q1) => $q1->where('submitdate', '<=', $dateTo));

        if ($q->question_type !== 'M') {
            $answers = $answers->where($field_name, '!=', null)
                ->orderByRaw($sort_by);
        }

        if (\in_array($q->question_type, ['L', 'ExclamationPoint'], false)) {
            Assert::notNull($q->question, '['.__FILE__.']['.__LINE__.']');
            $answers = $this->withAnswersLabel($answers->getQuery(), $q->question, $q->field_name);
        }

        if (\in_array($q->question_type, ['FT', 'FF'], false)) {
            Assert::methodExists($answers, 'getQuery');
            if (! method_exists($answers, 'getQuery')) {
                throw new Exception('wip');
            }

            $answers = $this->withAnswersLabel($answers->getQuery(), $q->parent_qid, $q->field_name);
        }

        $subs = [];
        // count(): Argument #1 ($value) must be of type Countable|array, null given
        // if ('' !== $q->subquestion && 0 === \count($data)) {
        if ($q->subquestion !== '' && $q->subquestion !== null) {
            Assert::notNull($q->limeQuestion, '['.__FILE__.']['.__LINE__.']');
            // $sub_field_name = $q->survey_id.'X'.$q->limeQuestion->gid.'X'.$q->subquestion;
            $sub_field_name = $q->field_name;
            // per risparmiare query
            $select[] = $sub_field_name.' as _sub';

            // $subs = $q->answers()
            //     // ->whereBetween('submitdate', [$dateFrom ?? 0, $dateTo ?? now()])
            //     ->when($dateFrom, static function ($q1) use ($dateFrom): void {
            //         $q1->where('submitdate', '>=', $dateFrom);
            //     })->when($dateTo, static function ($q1) use ($dateTo): void {
            //         $q1->where('submitdate', '<=', $dateTo);
            //     })
            //     ->selectRaw($sub_field_name.' as sub')
            //     ->distinct()
            //     ->whereRaw($sub_field_name.' != ""')
            //     ->get()
            //     ->pluck('sub')
            //     ->all();


            $subsQuery = clone $base;

            $subs = $subsQuery
                ->selectRaw($sub_field_name.' as sub')
                ->distinct()
                ->whereRaw($sub_field_name.' != ""')
                ->get()
                ->pluck('sub')
                ->all();


            // dddx(['group_by' => $group_by, 'sub_field_name' => $sub_field_name]);
            $group_by .= ' ,'.$sub_field_name;
        }

        if ($filter?->question_filter !== null) {
            $filter_field = app(GetQuestionFilterNameFieldAction::class)->execute($q);
            //Assert::notNull($filter_field, '['.__FILE__.']['.__LINE__.']');
            if ($filter_field !== null) {
                $answers = $answers->where($filter_field, $filter->question_filter);
            }
        }

        $tot = 0;
        // if ($key == 0) {
        $tot = $answers->count();
        // }

        $a2 = $answers
            ->selectRaw(implode(',', $select));
        // ->groupByRaw($group_by)
        // ->orderByRaw($sort_by)

        if (! ($q->data_type === 'zeroTen' && $group_by === $field_name)) {
            $a2 = $a2->groupByRaw($group_by);
        }

        $a2 = $a2->get();
        // $a2=AnswerData::collect($a2->toArray(),DataCollection::class);
        // dddx($a2);
        // mettere un laraveldata

        if ($q->take !== 0 && $q->take !== null) {
            $a2 = $a2->take($q->take);
        }
        // dddx($a2);
        // count(): Argument #1 ($value) must be of type Countable|array, null given
        // if ('' !== $q->subquestion && 0 === \count($data)) {
        if ($q->subquestion !== '' && $q->subquestion !== null) {
            $data_s = [];
            foreach ($a2 as $aa) {
                // dddx($a);
                // Access to an undefined property Illuminate\Database\Eloquent\Model::$label
                /**
                 * @var AnswerData
                 */
                $a = $aa;
                $k = $a->label;
                $k1 = $a->_sub;
                if (! isset($data_s[$k])) {
                    $data_s[$k] = [];
                    $data_s[$k]['value'] = [];
                    $data_s[$k]['avg'] = [];
                    foreach ($subs as $sk) {
                        $data_s[$k]['value'][$sk] = '-';
                        $data_s[$k]['avg'][$sk] = '-';
                    }

                    $data_s[$k]['label'] = $a->label;
                }

                $data_s[$k]['value'][$k1] = $a->value;
                $data_s[$k]['avg'][$k1] = (float) $a->avg;
                // $data_s[$k]['avg'] = 0; // WIP;
            }

            $a2 = $data_s;
            $a2 = AnswerData::collection($a2);
        }

        if ($q->question_type === 'M') {
            $a2_first = $a2->first();
            $n = (is_countable($select) ? \count($select) : 0) / 3;
            $data_m = [];
            for ($i = 0; $i < $n; ++$i) {
                $data_m[$i] = [
                    'value' => $a2_first->{'value_'.$i},
                    'label' => $a2_first->{'label_'.$i},
                    'avg' => $a2_first->{'avg_'.$i},
                ];
            }

            $a2 = collect($data_m)->sortByDesc('value');
            $a2 = AnswerData::collection($a2->toArray());
        }

        $a2 = $a2->filter(function ($i): bool {
            /** @var AnswerData */
            $item = $i;

            return $item->avg !== null;
        });
        // if ($q->take != 0 && $data !== [] && $q->take !== null) {
        // if ($q->take !== 0 && $q->take !== null) {
        //     $a2 = $a2->take($q->take);
        // }

        $answerDataColl = $a2;
        // $title = $key == 0 ? 'Totale Rispondenti '.$tot : 'no_set';
        $title = 'Totale Rispondenti '.$tot;

        return AnswersChartData::from([
            'answers' => $answerDataColl,
            // 'chart' => ChartData::from($chart),
            'title' => $title,
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Builder|Builder $query
     *
     * @return Builder|Builder
     */
    public function withAnswersLabel($query, string $qid, string $field_name)
    {
        $ask_table = 'lime_answers';
        $ask_table_lang = 'lime_answer_l10ns';

        return $query/* ->selectRaw('*,ask_lang.answer as label') */
            ->join($ask_table.' as ask', static function ($join) use ($qid, $field_name): void {
                $join->on('ask.code', '=', $field_name)
                    ->whereRaw('ask.qid = "'.$qid.'"');
            })->join($ask_table_lang.' as ask_lang', static function ($join): void {
                $join->on('ask.aid', '=', 'ask_lang.aid')
                    ->whereRaw('ask_lang.language="it"');
            });
    }
}
