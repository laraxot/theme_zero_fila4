<?php

declare(strict_types=1);

// https://github.com/neilherbertuk/laravellimesurveyapi/blob/master/src/LimesurveyApi.php

namespace Modules\Quaeris\Services;

use Flowframe\Trend\Trend;
use Illuminate\Support\Collection;

/**
 * QuaerisService.
 */
class TrendX extends Trend
{
    public string $groupBy = 'date';

    public string $orderBy = 'date';

    public function dateColumn(string $column): self
    {
        $this->dateColumn = $column;
        $this->groupBy = $column;
        $this->orderBy = $column;

        return $this;
    }

    public function groupBy(string $column): self
    {
        $this->groupBy = $column;
        return $this;
    }

    public function orderBy(string $column): self
    {
        $this->orderBy = $column;
        return $this;
    }

    public function aggregate(string $column, string $aggregate): Collection
    {
        $values = $this->builder
            ->toBase()
            ->selectRaw("
                {$this->getSqlDate()} as {$this->dateAlias},
                {$aggregate}({$column}) as aggregate
            ")
            ->whereBetween($this->dateColumn, [$this->start, $this->end])
            ->groupBy($this->groupBy)
            ->orderBy($this->orderBy)
            ->get();

        if ($this->groupBy !== $this->dateAlias) {
            return $values;
        }

        return $this->mapValuesToDates($values);
    }
}
