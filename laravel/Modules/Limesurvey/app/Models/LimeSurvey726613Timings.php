<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey726613TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey726613Timings
 *
 * @method static CachedBuilder|LimeSurvey726613Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey726613Timings avg($column)
 * @method static CachedBuilder|LimeSurvey726613Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey726613Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey726613Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey726613Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey726613Timings exists()
 * @method static LimeSurvey726613TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey726613Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey726613Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey726613Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey726613Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey726613Timings isCachable()
 * @method static CachedBuilder|LimeSurvey726613Timings max($column)
 * @method static CachedBuilder|LimeSurvey726613Timings min($column)
 * @method static CachedBuilder|LimeSurvey726613Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey726613Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey726613Timings query()
 * @method static CachedBuilder|LimeSurvey726613Timings sum($column)
 * @method static CachedBuilder|LimeSurvey726613Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $726613X995time
 * @property float|null $726613X995X33066time
 * @property float|null $726613X995X32856time
 * @property float|null $726613X995X32857time
 * @property float|null $726613X995X32858time
 * @property float|null $726613X995X32859time
 * @property float|null $726613X995X32860time
 * @property float|null $726613X995X32861time
 * @property float|null $726613X995X32862time
 * @property float|null $726613X995X32863time
 * @property float|null $726613X995X32871time
 * @property float|null $726613X995X32880time
 * @property float|null $726613X995X32881time
 * @property float|null $726613X995X32890time
 * @property float|null $726613X995X32891time
 * @property float|null $726613X995X32892time
 * @property float|null $726613X995X32893time
 * @property float|null $726613X995X32894time
 * @property float|null $726613X995X32905time
 * @property float|null $726613X995X32915time
 * @property float|null $726613X995X32927time
 * @property float|null $726613X995X32937time
 * @property float|null $726613X995X32938time
 * @property float|null $726613X995X32940time
 * @property float|null $726613X995X32941time
 * @property float|null $726613X995X32942time
 * @property float|null $726613X995X32943time
 * @property float|null $726613X995X32944time
 * @property float|null $726613X995X32945time
 * @property float|null $726613X995X32833time
 * @property float|null $726613X995X32834time
 *
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32833time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32834time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32856time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32857time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32858time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32859time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32860time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32861time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32862time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32863time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32871time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32880time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32881time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32890time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32891time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32892time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32893time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32894time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32905time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32915time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32927time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32937time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32938time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32940time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32941time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32942time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32943time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32944time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X32945time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995X33066time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings where726613X995time($value)
 * @method static CachedBuilder|LimeSurvey726613Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey726613Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey726613Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_726613_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '726613X995time', '726613X995X33066time', '726613X995X32856time', '726613X995X32857time', '726613X995X32858time', '726613X995X32859time', '726613X995X32860time', '726613X995X32861time', '726613X995X32862time', '726613X995X32863time', '726613X995X32871time', '726613X995X32880time', '726613X995X32881time', '726613X995X32890time', '726613X995X32891time', '726613X995X32892time', '726613X995X32893time', '726613X995X32894time', '726613X995X32905time', '726613X995X32915time', '726613X995X32927time', '726613X995X32937time', '726613X995X32938time', '726613X995X32940time', '726613X995X32941time', '726613X995X32942time', '726613X995X32943time', '726613X995X32944time', '726613X995X32945time', '726613X995X32833time', '726613X995X32834time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '726613X995time' => 'float', '726613X995X33066time' => 'float', '726613X995X32856time' => 'float', '726613X995X32857time' => 'float', '726613X995X32858time' => 'float', '726613X995X32859time' => 'float', '726613X995X32860time' => 'float', '726613X995X32861time' => 'float', '726613X995X32862time' => 'float', '726613X995X32863time' => 'float', '726613X995X32871time' => 'float', '726613X995X32880time' => 'float', '726613X995X32881time' => 'float', '726613X995X32890time' => 'float', '726613X995X32891time' => 'float', '726613X995X32892time' => 'float', '726613X995X32893time' => 'float', '726613X995X32894time' => 'float', '726613X995X32905time' => 'float', '726613X995X32915time' => 'float', '726613X995X32927time' => 'float', '726613X995X32937time' => 'float', '726613X995X32938time' => 'float', '726613X995X32940time' => 'float', '726613X995X32941time' => 'float', '726613X995X32942time' => 'float', '726613X995X32943time' => 'float', '726613X995X32944time' => 'float', '726613X995X32945time' => 'float', '726613X995X32833time' => 'float', '726613X995X32834time' => 'float',
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
