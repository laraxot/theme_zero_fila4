<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey196427TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey196427Timings
 *
 * @method static CachedBuilder|LimeSurvey196427Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey196427Timings avg($column)
 * @method static CachedBuilder|LimeSurvey196427Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey196427Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey196427Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey196427Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey196427Timings exists()
 * @method static LimeSurvey196427TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey196427Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey196427Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey196427Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey196427Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey196427Timings isCachable()
 * @method static CachedBuilder|LimeSurvey196427Timings max($column)
 * @method static CachedBuilder|LimeSurvey196427Timings min($column)
 * @method static CachedBuilder|LimeSurvey196427Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey196427Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey196427Timings query()
 * @method static CachedBuilder|LimeSurvey196427Timings sum($column)
 * @method static CachedBuilder|LimeSurvey196427Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $196427X1028time
 * @property float|null $196427X1028X33144time
 * @property float|null $196427X1028X33152time
 * @property float|null $196427X1028X33145time
 * @property float|null $196427X1028X33146time
 * @property float|null $196427X1028X33147time
 * @property float|null $196427X1028X33148time
 * @property float|null $196427X1028X33149time
 * @property float|null $196427X1028X33150time
 * @property float|null $196427X1028X33151time
 *
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028X33144time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028X33145time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028X33146time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028X33147time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028X33148time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028X33149time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028X33150time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028X33151time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028X33152time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings where196427X1028time($value)
 * @method static CachedBuilder|LimeSurvey196427Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey196427Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey196427Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_196427_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '196427X1028time', '196427X1028X33144time', '196427X1028X33152time', '196427X1028X33145time', '196427X1028X33146time', '196427X1028X33147time', '196427X1028X33148time', '196427X1028X33149time', '196427X1028X33150time', '196427X1028X33151time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '196427X1028time' => 'float', '196427X1028X33144time' => 'float', '196427X1028X33152time' => 'float', '196427X1028X33145time' => 'float', '196427X1028X33146time' => 'float', '196427X1028X33147time' => 'float', '196427X1028X33148time' => 'float', '196427X1028X33149time' => 'float', '196427X1028X33150time' => 'float', '196427X1028X33151time' => 'float',
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
