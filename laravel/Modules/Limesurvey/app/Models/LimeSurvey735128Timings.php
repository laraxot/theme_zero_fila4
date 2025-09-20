<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey735128TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey735128Timings
 *
 * @method static CachedBuilder|LimeSurvey735128Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey735128Timings avg($column)
 * @method static CachedBuilder|LimeSurvey735128Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey735128Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey735128Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey735128Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey735128Timings exists()
 * @method static LimeSurvey735128TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey735128Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey735128Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey735128Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey735128Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey735128Timings isCachable()
 * @method static CachedBuilder|LimeSurvey735128Timings max($column)
 * @method static CachedBuilder|LimeSurvey735128Timings min($column)
 * @method static CachedBuilder|LimeSurvey735128Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey735128Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey735128Timings query()
 * @method static CachedBuilder|LimeSurvey735128Timings sum($column)
 * @method static CachedBuilder|LimeSurvey735128Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $735128X931time
 * @property float|null $735128X931X31971time
 * @property float|null $735128X931X31823time
 * @property float|null $735128X931X31824time
 * @property float|null $735128X931X31825time
 * @property float|null $735128X932time
 * @property float|null $735128X932X31826time
 * @property float|null $735128X932X31887time
 * @property float|null $735128X932X31888time
 * @property float|null $735128X932X31889time
 * @property float|null $735128X932X31947time
 * @property float|null $735128X932X31948time
 * @property float|null $735128X933time
 * @property float|null $735128X933X31827time
 * @property float|null $735128X933X31952time
 * @property float|null $735128X933X31953time
 * @property float|null $735128X933X31954time
 * @property float|null $735128X934time
 * @property float|null $735128X934X31829time
 * @property float|null $735128X934X31830time
 * @property float|null $735128X934X31831time
 * @property float|null $735128X934X31832time
 * @property float|null $735128X934X31967time
 * @property float|null $735128X934X31965time
 * @property float|null $735128X935time
 * @property float|null $735128X935X31966time
 * @property float|null $735128X935X31968time
 * @property float|null $735128X935X31969time
 * @property float|null $735128X935X31970time
 * @property float|null $735128X935X31972time
 * @property float|null $735128X935X32032time
 *
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X931X31823time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X931X31824time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X931X31825time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X931X31971time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X931time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X932X31826time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X932X31887time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X932X31888time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X932X31889time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X932X31947time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X932X31948time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X932time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X933X31827time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X933X31952time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X933X31953time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X933X31954time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X933time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X934X31829time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X934X31830time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X934X31831time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X934X31832time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X934X31965time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X934X31967time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X934time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X935X31966time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X935X31968time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X935X31969time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X935X31970time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X935X31972time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X935X32032time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings where735128X935time($value)
 * @method static CachedBuilder|LimeSurvey735128Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey735128Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey735128Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_735128_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '735128X931time', '735128X931X31971time', '735128X931X31823time', '735128X931X31824time', '735128X931X31825time', '735128X932time', '735128X932X31826time', '735128X932X31887time', '735128X932X31888time', '735128X932X31889time', '735128X932X31947time', '735128X932X31948time', '735128X933time', '735128X933X31827time', '735128X933X31952time', '735128X933X31953time', '735128X933X31954time', '735128X934time', '735128X934X31829time', '735128X934X31830time', '735128X934X31831time', '735128X934X31832time', '735128X934X31967time', '735128X934X31965time', '735128X935time', '735128X935X31966time', '735128X935X31968time', '735128X935X31969time', '735128X935X31970time', '735128X935X31972time', '735128X935X32032time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '735128X931time' => 'float', '735128X931X31971time' => 'float', '735128X931X31823time' => 'float', '735128X931X31824time' => 'float', '735128X931X31825time' => 'float', '735128X932time' => 'float', '735128X932X31826time' => 'float', '735128X932X31887time' => 'float', '735128X932X31888time' => 'float', '735128X932X31889time' => 'float', '735128X932X31947time' => 'float', '735128X932X31948time' => 'float', '735128X933time' => 'float', '735128X933X31827time' => 'float', '735128X933X31952time' => 'float', '735128X933X31953time' => 'float', '735128X933X31954time' => 'float', '735128X934time' => 'float', '735128X934X31829time' => 'float', '735128X934X31830time' => 'float', '735128X934X31831time' => 'float', '735128X934X31832time' => 'float', '735128X934X31967time' => 'float', '735128X934X31965time' => 'float', '735128X935time' => 'float', '735128X935X31966time' => 'float', '735128X935X31968time' => 'float', '735128X935X31969time' => 'float', '735128X935X31970time' => 'float', '735128X935X31972time' => 'float', '735128X935X32032time' => 'float',
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
