<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Chart\Models\MixedChart;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class SetMixedChartId
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $question_chart): void
    {
        if ($question_chart->mixed_chart_id === null) {
            Assert::notNull($type = $question_chart->chart->type);

            if (str_contains($type, 'mixed')) {
                $mixed_id = filter_var($type, FILTER_SANITIZE_NUMBER_INT);

                // dddx($mixed_id);

                $question_chart->update([
                    'mixed_chart_id' => $mixed_id,
                ]);
            } else {
                // dddx([
                //     $question_chart->mixed_chart_id,
                //     $question_chart->chart->type
                // ]);

                $mixed = MixedChart::firstWhere(['name' => $type]);

                if ($mixed === null) {
                    $mixed = MixedChart::create(['name' => $type]);
                    $chart = $question_chart->chart->replicate();
                    $chart->save();
                    $mixed->charts()->saveMany([$chart]);
                }

                $question_chart->update([
                    'mixed_chart_id' => $mixed->id,
                ]);

                if ($mixed->charts->count() === 0) {
                    $chart = $question_chart->chart->replicate();
                    $chart->save();
                    $mixed->charts()->saveMany([$chart]);
                }
            }
        }
    }
}
