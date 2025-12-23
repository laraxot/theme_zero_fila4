<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey422747TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey422747Timings
 *
 * @method static CachedBuilder|LimeSurvey422747Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey422747Timings avg($column)
 * @method static CachedBuilder|LimeSurvey422747Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey422747Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey422747Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey422747Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey422747Timings exists()
 * @method static LimeSurvey422747TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey422747Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey422747Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey422747Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey422747Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey422747Timings isCachable()
 * @method static CachedBuilder|LimeSurvey422747Timings max($column)
 * @method static CachedBuilder|LimeSurvey422747Timings min($column)
 * @method static CachedBuilder|LimeSurvey422747Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey422747Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey422747Timings query()
 * @method static CachedBuilder|LimeSurvey422747Timings sum($column)
 * @method static CachedBuilder|LimeSurvey422747Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $422747X941time
 * @property float|null $422747X941X32056time
 * @property float|null $422747X941X32033time
 * @property float|null $422747X941X32034time
 * @property float|null $422747X941X32035time
 * @property float|null $422747X942time
 * @property float|null $422747X942X32036time
 * @property float|null $422747X942X32042time
 * @property float|null $422747X942X32043time
 * @property float|null $422747X942X32044time
 * @property float|null $422747X942X32045time
 * @property float|null $422747X942X32046time
 * @property float|null $422747X943time
 * @property float|null $422747X943X32037time
 * @property float|null $422747X943X32047time
 * @property float|null $422747X943X32048time
 * @property float|null $422747X943X32049time
 * @property float|null $422747X944time
 * @property float|null $422747X944X32038time
 * @property float|null $422747X944X32039time
 * @property float|null $422747X944X32040time
 * @property float|null $422747X944X32041time
 * @property float|null $422747X944X32052time
 * @property float|null $422747X944X32050time
 * @property float|null $422747X945time
 * @property float|null $422747X945X32051time
 * @property float|null $422747X945X32053time
 * @property float|null $422747X945X32054time
 * @property float|null $422747X945X32055time
 * @property float|null $422747X945X32057time
 * @property float|null $422747X945X32058time
 *
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X941X32033time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X941X32034time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X941X32035time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X941X32056time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X941time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X942X32036time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X942X32042time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X942X32043time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X942X32044time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X942X32045time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X942X32046time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X942time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X943X32037time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X943X32047time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X943X32048time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X943X32049time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X943time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X944X32038time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X944X32039time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X944X32040time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X944X32041time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X944X32050time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X944X32052time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X944time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X945X32051time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X945X32053time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X945X32054time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X945X32055time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X945X32057time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X945X32058time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings where422747X945time($value)
 * @method static CachedBuilder|LimeSurvey422747Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey422747Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey422747Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_422747_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '422747X941time', '422747X941X32056time', '422747X941X32033time', '422747X941X32034time', '422747X941X32035time', '422747X942time', '422747X942X32036time', '422747X942X32042time', '422747X942X32043time', '422747X942X32044time', '422747X942X32045time', '422747X942X32046time', '422747X943time', '422747X943X32037time', '422747X943X32047time', '422747X943X32048time', '422747X943X32049time', '422747X944time', '422747X944X32038time', '422747X944X32039time', '422747X944X32040time', '422747X944X32041time', '422747X944X32052time', '422747X944X32050time', '422747X945time', '422747X945X32051time', '422747X945X32053time', '422747X945X32054time', '422747X945X32055time', '422747X945X32057time', '422747X945X32058time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '422747X941time' => 'float', '422747X941X32056time' => 'float', '422747X941X32033time' => 'float', '422747X941X32034time' => 'float', '422747X941X32035time' => 'float', '422747X942time' => 'float', '422747X942X32036time' => 'float', '422747X942X32042time' => 'float', '422747X942X32043time' => 'float', '422747X942X32044time' => 'float', '422747X942X32045time' => 'float', '422747X942X32046time' => 'float', '422747X943time' => 'float', '422747X943X32037time' => 'float', '422747X943X32047time' => 'float', '422747X943X32048time' => 'float', '422747X943X32049time' => 'float', '422747X944time' => 'float', '422747X944X32038time' => 'float', '422747X944X32039time' => 'float', '422747X944X32040time' => 'float', '422747X944X32041time' => 'float', '422747X944X32052time' => 'float', '422747X944X32050time' => 'float', '422747X945time' => 'float', '422747X945X32051time' => 'float', '422747X945X32053time' => 'float', '422747X945X32054time' => 'float', '422747X945X32055time' => 'float', '422747X945X32057time' => 'float', '422747X945X32058time' => 'float',
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
