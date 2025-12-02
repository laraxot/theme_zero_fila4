<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey139982TimingFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey139982Timing
 *
 * @method static CachedBuilder|LimeSurvey139982Timing all($columns = [])
 * @method static CachedBuilder|LimeSurvey139982Timing avg($column)
 * @method static CachedBuilder|LimeSurvey139982Timing cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey139982Timing cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey139982Timing count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey139982Timing disableModelCaching()
 * @method static CachedBuilder|LimeSurvey139982Timing exists()
 * @method static LimeSurvey139982TimingFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey139982Timing flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey139982Timing getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey139982Timing inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey139982Timing insert(array $values)
 * @method static CachedBuilder|LimeSurvey139982Timing isCachable()
 * @method static CachedBuilder|LimeSurvey139982Timing max($column)
 * @method static CachedBuilder|LimeSurvey139982Timing min($column)
 * @method static CachedBuilder|LimeSurvey139982Timing newModelQuery()
 * @method static CachedBuilder|LimeSurvey139982Timing newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey139982Timing query()
 * @method static CachedBuilder|LimeSurvey139982Timing sum($column)
 * @method static CachedBuilder|LimeSurvey139982Timing truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $139982X812time
 * @property float|null $139982X812X30336time
 * @property float|null $139982X812X30337time
 * @property float|null $139982X812X30338time
 * @property float|null $139982X812X30339time
 * @property float|null $139982X812X30340time
 * @property float|null $139982X812X30341time
 *
 * @method static CachedBuilder|LimeSurvey139982Timing where139982X812X30336time($value)
 * @method static CachedBuilder|LimeSurvey139982Timing where139982X812X30337time($value)
 * @method static CachedBuilder|LimeSurvey139982Timing where139982X812X30338time($value)
 * @method static CachedBuilder|LimeSurvey139982Timing where139982X812X30339time($value)
 * @method static CachedBuilder|LimeSurvey139982Timing where139982X812X30340time($value)
 * @method static CachedBuilder|LimeSurvey139982Timing where139982X812X30341time($value)
 * @method static CachedBuilder|LimeSurvey139982Timing where139982X812time($value)
 * @method static CachedBuilder|LimeSurvey139982Timing whereId($value)
 * @method static CachedBuilder|LimeSurvey139982Timing whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey139982Timing extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_139982_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime',
        '139982X812time',
        '139982X812X30336time',
        '139982X812X30337time',
        '139982X812X30338time',
        '139982X812X30339time',
        '139982X812X30340time',
        '139982X812X30341time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int',
        'interviewtime' => 'float',
        '139982X812time' => 'float',
        '139982X812X30336time' => 'float',
        '139982X812X30337time' => 'float',
        '139982X812X30338time' => 'float',
        '139982X812X30339time' => 'float',
        '139982X812X30340time' => 'float',
        '139982X812X30341time' => 'float',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
