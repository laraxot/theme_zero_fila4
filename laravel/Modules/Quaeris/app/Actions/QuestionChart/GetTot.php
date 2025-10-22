<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetTot
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart): int
    {
        return $questionChart->answers()
            ->whereBetween('submitdate', [$questionChart->date_from ?? 0, $questionChart->date_to ?? now()])
            ->count();
    }
}
