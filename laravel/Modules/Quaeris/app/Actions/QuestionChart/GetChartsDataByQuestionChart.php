<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Chart\Models\Chart;
use Webmozart\Assert\Assert;
use Modules\Chart\Datas\ChartData;
use Illuminate\Database\Eloquent\Builder;
use Modules\Chart\Datas\AnswersChartData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;
use Illuminate\Database\Eloquent\Collection;
use Modules\Quaeris\Datas\AnswersFilterData;

class GetChartsDataByQuestionChart
{
    use QueueableAction;

    /**
     * Execute the action.
     *
     * @return array<AnswersChartData>
     */
    public function execute(QuestionChart $q, Builder $responses, ?AnswersFilterData $filter = null): array
    {
        return $this->doExecute($q, $responses, $filter);
        /*
            $cacheKey=Str::slug($q->id.$dateFrom.$dateTo.$question_filter);
            $seconds=3600;
            $value = Cache::remember($cacheKey,$seconds, function () use($q, $useInput, $dateFrom,$dateTo, $question_filter){
                return $this->doExecute($q, $useInput, $dateFrom,$dateTo, $question_filter);
            });
            return $value;
            */
    }

    /**
     * Execute the action.
     *
     * @return array<AnswersChartData>
     */
    // public function doExecute(QuestionChart $q, bool $useInput = false, Carbon $dateFrom = null, Carbon $dateTo = null, string $question_filter = null): array
    public function doExecute(QuestionChart $q, Builder $responses, ?AnswersFilterData $filter = null): array
    {
        $data = [];
        // dddx($q->charts);
        app(SetMixedChartId::class)->execute($q);

        foreach ($q->charts as $key => $chart) {

            // 🔑 CLONA il builder di base: ogni chart lavora sul suo
            $base = clone $responses;

            // dddx($chart);
            Assert::isInstanceOf($chart, Chart::class);
            $group_by = is_string($chart['group_by']) ? $chart['group_by'] : null;
            $sort_by = is_string($chart['sort_by']) ? $chart['sort_by'] : null;
            $answersData = app(GetAnswersByQuestionChart::class)->execute($q, $group_by, $sort_by, $filter, $responses);
            // $answersData = app(GetAnswersByQuestionChart::class)->execute($q, $chart['group_by'], $chart['sort_by'], $filter);
            $answersData->chart = ChartData::from($chart);
            if ($key !== 0) {
                $answersData->title = 'no_set';
            }

            $data[] = $answersData;
        }

        return $data;
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
