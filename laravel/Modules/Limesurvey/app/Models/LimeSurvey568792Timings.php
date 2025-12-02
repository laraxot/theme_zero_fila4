<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey568792TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey568792Timings
 *
 * @method static CachedBuilder|LimeSurvey568792Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey568792Timings avg($column)
 * @method static CachedBuilder|LimeSurvey568792Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey568792Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey568792Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey568792Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey568792Timings exists()
 * @method static LimeSurvey568792TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey568792Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey568792Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey568792Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey568792Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey568792Timings isCachable()
 * @method static CachedBuilder|LimeSurvey568792Timings max($column)
 * @method static CachedBuilder|LimeSurvey568792Timings min($column)
 * @method static CachedBuilder|LimeSurvey568792Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey568792Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey568792Timings query()
 * @method static CachedBuilder|LimeSurvey568792Timings sum($column)
 * @method static CachedBuilder|LimeSurvey568792Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $568792X987time
 * @property float|null $568792X987X32761time
 * @property float|null $568792X988time
 * @property float|null $568792X988X32785time
 * @property float|null $568792X989time
 * @property float|null $568792X989X32745time
 * @property float|null $568792X989X32746time
 * @property float|null $568792X993time
 * @property float|null $568792X993X32799time
 * @property float|null $568792X993X32800time
 * @property float|null $568792X993X32801time
 * @property float|null $568792X994time
 * @property float|null $568792X994X32802time
 * @property float|null $568792X994X32803time
 * @property float|null $568792X994X32804time
 * @property float|null $568792X994X32808time
 * @property float|null $568792X990time
 * @property float|null $568792X990X32747time
 * @property float|null $568792X990X32809time
 * @property float|null $568792X990X32810time
 * @property float|null $568792X990X32811time
 * @property float|null $568792X990X32812time
 * @property float|null $568792X991time
 * @property float|null $568792X991X32759time
 * @property float|null $568792X991X32760time
 * @property float|null $568792X991X32762time
 * @property float|null $568792X991X32763time
 *
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X987X32761time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X987time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X988X32785time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X988time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X989X32745time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X989X32746time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X989time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X990X32747time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X990X32809time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X990X32810time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X990X32811time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X990X32812time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X990time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X991X32759time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X991X32760time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X991X32762time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X991X32763time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X991time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X993X32799time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X993X32800time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X993X32801time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X993time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X994X32802time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X994X32803time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X994X32804time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X994X32808time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings where568792X994time($value)
 * @method static CachedBuilder|LimeSurvey568792Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey568792Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey568792Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_568792_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '568792X987time', '568792X987X32761time', '568792X988time', '568792X988X32785time', '568792X989time', '568792X989X32745time', '568792X989X32746time', '568792X993time', '568792X993X32799time', '568792X993X32800time', '568792X993X32801time', '568792X994time', '568792X994X32802time', '568792X994X32803time', '568792X994X32804time', '568792X994X32808time', '568792X990time', '568792X990X32747time', '568792X990X32809time', '568792X990X32810time', '568792X990X32811time', '568792X990X32812time', '568792X991time', '568792X991X32759time', '568792X991X32760time', '568792X991X32762time', '568792X991X32763time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '568792X987time' => 'float', '568792X987X32761time' => 'float', '568792X988time' => 'float', '568792X988X32785time' => 'float', '568792X989time' => 'float', '568792X989X32745time' => 'float', '568792X989X32746time' => 'float', '568792X993time' => 'float', '568792X993X32799time' => 'float', '568792X993X32800time' => 'float', '568792X993X32801time' => 'float', '568792X994time' => 'float', '568792X994X32802time' => 'float', '568792X994X32803time' => 'float', '568792X994X32804time' => 'float', '568792X994X32808time' => 'float', '568792X990time' => 'float', '568792X990X32747time' => 'float', '568792X990X32809time' => 'float', '568792X990X32810time' => 'float', '568792X990X32811time' => 'float', '568792X990X32812time' => 'float', '568792X991time' => 'float', '568792X991X32759time' => 'float', '568792X991X32760time' => 'float', '568792X991X32762time' => 'float', '568792X991X32763time' => 'float',
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
