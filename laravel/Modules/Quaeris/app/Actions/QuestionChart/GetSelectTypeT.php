<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetSelectTypeT
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by): array
    {
        // creato per veritas, forse da mettere un controllo ulteriore?

        return app(GetSelectTypeBT::class)->execute($questionChart, $group_by, $sort_by);
    }
}
