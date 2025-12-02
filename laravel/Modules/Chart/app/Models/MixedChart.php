<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Chart\Models;

use Modules\Chart\Database\Factories\MixedChartFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Modules\Chart\Models\MixedChart.
 *
 * @property Collection<int, Chart> $charts
 * @property int|null $charts_count
 * @method static MixedChartFactory factory($count = null, $state = [])
 * @method static Builder|MixedChart newModelQuery()
 * @method static Builder|MixedChart newQuery()
 * @method static Builder|MixedChart query()
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @mixin \Eloquent
 */
class MixedChart extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'name',
    ];

    // ---- relations

    public function charts(): MorphMany
    {
        /**
         * @phpstan-ignore argument.type
         */
        Relation::morphMap([
            'question_chart' => 'Modules\Quaeris\Models\QuestionChart',
            'mixed_chart' => self::class,
        ]);

        return $this->morphMany(Chart::class, 'post');
    }
}
