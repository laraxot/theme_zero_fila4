<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey176817TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey176817Timings
 *
 * @method static CachedBuilder|LimeSurvey176817Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey176817Timings avg($column)
 * @method static CachedBuilder|LimeSurvey176817Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey176817Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey176817Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey176817Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey176817Timings exists()
 * @method static LimeSurvey176817TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey176817Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey176817Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey176817Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey176817Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey176817Timings isCachable()
 * @method static CachedBuilder|LimeSurvey176817Timings max($column)
 * @method static CachedBuilder|LimeSurvey176817Timings min($column)
 * @method static CachedBuilder|LimeSurvey176817Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey176817Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey176817Timings query()
 * @method static CachedBuilder|LimeSurvey176817Timings sum($column)
 * @method static CachedBuilder|LimeSurvey176817Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $176817X795time
 * @property float|null $176817X795X30223time
 * @property float|null $176817X794time
 * @property float|null $176817X794X30215time
 * @property float|null $176817X794X30216time
 * @property float|null $176817X794X30217time
 * @property float|null $176817X794X30218time
 * @property float|null $176817X794X30219time
 * @property float|null $176817X794X30220time
 * @property float|null $176817X794X30221time
 * @property float|null $176817X794X30222time
 * @property float|null $176817X794X30224time
 *
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794X30215time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794X30216time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794X30217time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794X30218time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794X30219time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794X30220time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794X30221time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794X30222time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794X30224time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X794time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X795X30223time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings where176817X795time($value)
 * @method static CachedBuilder|LimeSurvey176817Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey176817Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey176817Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_176817_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '176817X795time', '176817X795X30223time', '176817X794time', '176817X794X30215time', '176817X794X30216time', '176817X794X30217time', '176817X794X30218time', '176817X794X30219time', '176817X794X30220time', '176817X794X30221time', '176817X794X30222time', '176817X794X30224time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '176817X795time' => 'float', '176817X795X30223time' => 'float', '176817X794time' => 'float', '176817X794X30215time' => 'float', '176817X794X30216time' => 'float', '176817X794X30217time' => 'float', '176817X794X30218time' => 'float', '176817X794X30219time' => 'float', '176817X794X30220time' => 'float', '176817X794X30221time' => 'float', '176817X794X30222time' => 'float', '176817X794X30224time' => 'float',
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
