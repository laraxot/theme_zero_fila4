<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey299355TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey299355Timings
 *
 * @method static CachedBuilder|LimeSurvey299355Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey299355Timings avg($column)
 * @method static CachedBuilder|LimeSurvey299355Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey299355Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey299355Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey299355Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey299355Timings exists()
 * @method static LimeSurvey299355TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey299355Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey299355Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey299355Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey299355Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey299355Timings isCachable()
 * @method static CachedBuilder|LimeSurvey299355Timings max($column)
 * @method static CachedBuilder|LimeSurvey299355Timings min($column)
 * @method static CachedBuilder|LimeSurvey299355Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey299355Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey299355Timings query()
 * @method static CachedBuilder|LimeSurvey299355Timings sum($column)
 * @method static CachedBuilder|LimeSurvey299355Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $299355X1029time
 * @property float|null $299355X1029X33153time
 * @property float|null $299355X1029X33154time
 * @property float|null $299355X1029X33155time
 * @property float|null $299355X1030time
 * @property float|null $299355X1030X33156time
 * @property float|null $299355X1031time
 * @property float|null $299355X1031X33157time
 * @property float|null $299355X1031X33158time
 * @property float|null $299355X1032time
 * @property float|null $299355X1032X33159time
 * @property float|null $299355X1032X33160time
 * @property float|null $299355X1032X33161time
 * @property float|null $299355X1032X33162time
 * @property float|null $299355X1032X33163time
 * @property float|null $299355X1032X33164time
 *
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1029X33153time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1029X33154time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1029X33155time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1029time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1030X33156time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1030time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1031X33157time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1031X33158time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1031time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1032X33159time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1032X33160time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1032X33161time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1032X33162time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1032X33163time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1032X33164time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings where299355X1032time($value)
 * @method static CachedBuilder|LimeSurvey299355Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey299355Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey299355Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_299355_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '299355X1029time', '299355X1029X33153time', '299355X1029X33154time', '299355X1029X33155time', '299355X1030time', '299355X1030X33156time', '299355X1031time', '299355X1031X33157time', '299355X1031X33158time', '299355X1032time', '299355X1032X33159time', '299355X1032X33160time', '299355X1032X33161time', '299355X1032X33162time', '299355X1032X33163time', '299355X1032X33164time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '299355X1029time' => 'float', '299355X1029X33153time' => 'float', '299355X1029X33154time' => 'float', '299355X1029X33155time' => 'float', '299355X1030time' => 'float', '299355X1030X33156time' => 'float', '299355X1031time' => 'float', '299355X1031X33157time' => 'float', '299355X1031X33158time' => 'float', '299355X1032time' => 'float', '299355X1032X33159time' => 'float', '299355X1032X33160time' => 'float', '299355X1032X33161time' => 'float', '299355X1032X33162time' => 'float', '299355X1032X33163time' => 'float', '299355X1032X33164time' => 'float',
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
