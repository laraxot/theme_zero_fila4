<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey285519TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey285519Timings
 *
 * @method static CachedBuilder|LimeSurvey285519Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey285519Timings avg($column)
 * @method static CachedBuilder|LimeSurvey285519Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey285519Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey285519Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey285519Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey285519Timings exists()
 * @method static LimeSurvey285519TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey285519Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey285519Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey285519Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey285519Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey285519Timings isCachable()
 * @method static CachedBuilder|LimeSurvey285519Timings max($column)
 * @method static CachedBuilder|LimeSurvey285519Timings min($column)
 * @method static CachedBuilder|LimeSurvey285519Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey285519Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey285519Timings query()
 * @method static CachedBuilder|LimeSurvey285519Timings sum($column)
 * @method static CachedBuilder|LimeSurvey285519Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $285519X1033time
 * @property float|null $285519X1033X33181time
 * @property float|null $285519X1033X33182time
 * @property float|null $285519X1033X33183time
 * @property float|null $285519X1034time
 * @property float|null $285519X1034X33184time
 * @property float|null $285519X1035time
 * @property float|null $285519X1035X33185time
 * @property float|null $285519X1035X33186time
 * @property float|null $285519X1036time
 * @property float|null $285519X1036X33187time
 * @property float|null $285519X1036X33188time
 * @property float|null $285519X1036X33189time
 * @property float|null $285519X1036X33190time
 * @property float|null $285519X1036X33191time
 * @property float|null $285519X1036X33192time
 *
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1033X33181time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1033X33182time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1033X33183time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1033time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1034X33184time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1034time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1035X33185time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1035X33186time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1035time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1036X33187time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1036X33188time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1036X33189time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1036X33190time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1036X33191time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1036X33192time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings where285519X1036time($value)
 * @method static CachedBuilder|LimeSurvey285519Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey285519Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey285519Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_285519_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '285519X1033time', '285519X1033X33181time', '285519X1033X33182time', '285519X1033X33183time', '285519X1034time', '285519X1034X33184time', '285519X1035time', '285519X1035X33185time', '285519X1035X33186time', '285519X1036time', '285519X1036X33187time', '285519X1036X33188time', '285519X1036X33189time', '285519X1036X33190time', '285519X1036X33191time', '285519X1036X33192time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '285519X1033time' => 'float', '285519X1033X33181time' => 'float', '285519X1033X33182time' => 'float', '285519X1033X33183time' => 'float', '285519X1034time' => 'float', '285519X1034X33184time' => 'float', '285519X1035time' => 'float', '285519X1035X33185time' => 'float', '285519X1035X33186time' => 'float', '285519X1036time' => 'float', '285519X1036X33187time' => 'float', '285519X1036X33188time' => 'float', '285519X1036X33189time' => 'float', '285519X1036X33190time' => 'float', '285519X1036X33191time' => 'float', '285519X1036X33192time' => 'float',
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
