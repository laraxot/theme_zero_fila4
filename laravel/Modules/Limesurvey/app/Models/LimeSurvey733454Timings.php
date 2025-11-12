<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey733454TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey733454Timings
 *
 * @method static CachedBuilder|LimeSurvey733454Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey733454Timings avg($column)
 * @method static CachedBuilder|LimeSurvey733454Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey733454Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey733454Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey733454Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey733454Timings exists()
 * @method static LimeSurvey733454TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey733454Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey733454Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey733454Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey733454Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey733454Timings isCachable()
 * @method static CachedBuilder|LimeSurvey733454Timings max($column)
 * @method static CachedBuilder|LimeSurvey733454Timings min($column)
 * @method static CachedBuilder|LimeSurvey733454Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey733454Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey733454Timings query()
 * @method static CachedBuilder|LimeSurvey733454Timings sum($column)
 * @method static CachedBuilder|LimeSurvey733454Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $733454X953time
 * @property float|null $733454X953X32199time
 * @property float|null $733454X954time
 * @property float|null $733454X954X32179time
 * @property float|null $733454X954X32180time
 * @property float|null $733454X954X32185time
 * @property float|null $733454X955time
 * @property float|null $733454X955X32186time
 * @property float|null $733454X955X32187time
 * @property float|null $733454X958time
 * @property float|null $733454X958X32188time
 * @property float|null $733454X958X32190time
 * @property float|null $733454X958X32255time
 * @property float|null $733454X956time
 * @property float|null $733454X956X32177time
 * @property float|null $733454X956X32176time
 * @property float|null $733454X956X32178time
 * @property float|null $733454X956X32183time
 * @property float|null $733454X956X32182time
 * @property float|null $733454X956X32181time
 * @property float|null $733454X956X32184time
 * @property float|null $733454X956X32193time
 * @property float|null $733454X957time
 * @property float|null $733454X957X32194time
 * @property float|null $733454X957X32196time
 * @property float|null $733454X957X32197time
 * @property float|null $733454X957X32198time
 * @property float|null $733454X957X32200time
 * @property float|null $733454X957X32201time
 *
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X953X32199time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X953time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X954X32179time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X954X32180time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X954X32185time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X954time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X955X32186time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X955X32187time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X955time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X956X32176time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X956X32177time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X956X32178time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X956X32181time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X956X32182time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X956X32183time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X956X32184time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X956X32193time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X956time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X957X32194time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X957X32196time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X957X32197time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X957X32198time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X957X32200time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X957X32201time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X957time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X958X32188time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X958X32190time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X958X32255time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings where733454X958time($value)
 * @method static CachedBuilder|LimeSurvey733454Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey733454Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey733454Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_733454_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '733454X953time', '733454X953X32199time', '733454X954time', '733454X954X32179time', '733454X954X32180time', '733454X954X32185time', '733454X955time', '733454X955X32186time', '733454X955X32187time', '733454X958time', '733454X958X32188time', '733454X958X32190time', '733454X958X32255time', '733454X956time', '733454X956X32177time', '733454X956X32176time', '733454X956X32178time', '733454X956X32183time', '733454X956X32182time', '733454X956X32181time', '733454X956X32184time', '733454X956X32193time', '733454X957time', '733454X957X32194time', '733454X957X32196time', '733454X957X32197time', '733454X957X32198time', '733454X957X32200time', '733454X957X32201time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '733454X953time' => 'float', '733454X953X32199time' => 'float', '733454X954time' => 'float', '733454X954X32179time' => 'float', '733454X954X32180time' => 'float', '733454X954X32185time' => 'float', '733454X955time' => 'float', '733454X955X32186time' => 'float', '733454X955X32187time' => 'float', '733454X958time' => 'float', '733454X958X32188time' => 'float', '733454X958X32190time' => 'float', '733454X958X32255time' => 'float', '733454X956time' => 'float', '733454X956X32177time' => 'float', '733454X956X32176time' => 'float', '733454X956X32178time' => 'float', '733454X956X32183time' => 'float', '733454X956X32182time' => 'float', '733454X956X32181time' => 'float', '733454X956X32184time' => 'float', '733454X956X32193time' => 'float', '733454X957time' => 'float', '733454X957X32194time' => 'float', '733454X957X32196time' => 'float', '733454X957X32197time' => 'float', '733454X957X32198time' => 'float', '733454X957X32200time' => 'float', '733454X957X32201time' => 'float',
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
