<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions;

use function array_slice;
use Illuminate\Support\Str;
use Modules\Chart\Datas\ChartData;
use Modules\Quaeris\Datas\QuestionChartData;
use Modules\Quaeris\Datas\QuestionData;
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;

class GetQuestionsChartsAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
     * @return DataCollection<QuestionChartData>
     */
    public function execute(QuestionData $questionData, ChartData $chartData): DataCollection
    {
        $graphs = [];
        if (Str::startsWith($chartData->type, 'mixed')) {
            $parz = array_slice(explode(':', $chartData->type), 1);
            $parz = implode('|', $parz);
            // $res = $this->mixed(...$parz);
            $class = 'Modules\Quaeris\Actions\Question\MixedAction';

            return app($class)->execute($parz, $chartData, $questionData);
        }

        // $answers = app(GetAnswersByQuestionTitleAction::class)->execute($question);
        // $class = __NAMESPACE__.'\JpGraph\\'.Str::studly($chart->type).'Action';
        // $graphs[] = app($class)->execute($answers, $chart);
        $graphs[] = [
            'question' => $questionData,
            'chart' => $chartData,
        ];
        /**
         * @var  DataCollection<QuestionChartData>
         */
        return QuestionChartData::collect($graphs, DataCollection::class);
    }
}
