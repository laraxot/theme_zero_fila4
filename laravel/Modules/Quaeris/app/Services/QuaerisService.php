<?php

declare(strict_types=1);

// https://github.com/neilherbertuk/laravellimesurveyapi/blob/master/src/LimesurveyApi.php

namespace Modules\Quaeris\Services;

use Illuminate\Support\Collection;
use Modules\Quaeris\Models\QuestionChart;
use Webmozart\Assert\Assert;

/**
 * QuaerisService.
 */
class QuaerisService
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (! self::$instance instanceof \Modules\Quaeris\Services\QuaerisService) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @psalm-api
     */
    public static function make(): self
    {
        return static::getInstance();
    }

    /**
     * @param Collection $collection
     *
     * @return array<QuestionChart>|Collection<QuestionChart>
     *
     * @psalm-api
     */
    public function getGroupsByRows($collection)
    {
        $collection = $collection->sortBy('pos');

        /**
         * @var array<QuestionChart>|Collection<QuestionChart>
         */
        return $collection->groupBy(
            function ($item): string {
                Assert::isInstanceOf($item, QuestionChart::class);
                return $item->question . '-' . $item->subquestion;
            }
        )->each(
            function ($items): void {
                Assert::numeric($colSize = $items->sum('col_size'));
                $miss = 12 - $colSize;
                $c = $items->count();
                $delta = $miss / $c;
                $items->each(
                    static function ($item) use ($delta): void {
                        Assert::isInstanceOf($item, QuestionChart::class);
                        $item->col_size = (int) ($item->col_size + $delta);
                        $item->save();
                    }
                );
            }
        );
    }
}
