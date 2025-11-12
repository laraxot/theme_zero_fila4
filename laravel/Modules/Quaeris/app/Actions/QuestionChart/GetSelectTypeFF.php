<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetSelectTypeFF
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by): array
    {
        return app(GetSelectTypeFT::class)->execute($questionChart, $group_by, $sort_by);
    }
}
