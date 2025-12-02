<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey628829TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey628829Timings
 *
 * @method static CachedBuilder|LimeSurvey628829Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey628829Timings avg($column)
 * @method static CachedBuilder|LimeSurvey628829Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey628829Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey628829Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey628829Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey628829Timings exists()
 * @method static LimeSurvey628829TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey628829Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey628829Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey628829Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey628829Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey628829Timings isCachable()
 * @method static CachedBuilder|LimeSurvey628829Timings max($column)
 * @method static CachedBuilder|LimeSurvey628829Timings min($column)
 * @method static CachedBuilder|LimeSurvey628829Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey628829Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey628829Timings query()
 * @method static CachedBuilder|LimeSurvey628829Timings sum($column)
 * @method static CachedBuilder|LimeSurvey628829Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $628829X1070time
 * @property float|null $628829X1070X33470time
 * @property float|null $628829X1070X33471time
 * @property float|null $628829X1065time
 * @property float|null $628829X1065X33488time
 * @property float|null $628829X1065X33489time
 * @property float|null $628829X1065X33398time
 * @property float|null $628829X1065X33399time
 * @property float|null $628829X1065X33400time
 * @property float|null $628829X1065X33401time
 * @property float|null $628829X1065X33474time
 * @property float|null $628829X1065X33473time
 * @property float|null $628829X1066time
 * @property float|null $628829X1066X33490time
 * @property float|null $628829X1066X33465time
 * @property float|null $628829X1066X33426time
 * @property float|null $628829X1066X33448time
 * @property float|null $628829X1066X33449time
 * @property float|null $628829X1066X33456time
 * @property float|null $628829X1066X33457time
 * @property float|null $628829X1067time
 * @property float|null $628829X1067X33466time
 * @property float|null $628829X1068time
 * @property float|null $628829X1068X33404time
 * @property float|null $628829X1068X33405time
 * @property float|null $628829X1068X33406time
 * @property float|null $628829X1069time
 * @property float|null $628829X1069X33467time
 * @property float|null $628829X1069X33468time
 * @property float|null $628829X1069X33469time
 * @property float|null $628829X1069X33472time
 *
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1065X33398time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1065X33399time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1065X33400time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1065X33401time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1065X33473time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1065X33474time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1065X33488time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1065X33489time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1065time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1066X33426time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1066X33448time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1066X33449time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1066X33456time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1066X33457time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1066X33465time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1066X33490time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1066time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1067X33466time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1067time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1068X33404time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1068X33405time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1068X33406time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1068time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1069X33467time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1069X33468time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1069X33469time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1069X33472time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1069time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1070X33470time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1070X33471time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings where628829X1070time($value)
 * @method static CachedBuilder|LimeSurvey628829Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey628829Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey628829Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_628829_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '628829X1070time', '628829X1070X33470time', '628829X1070X33471time', '628829X1065time', '628829X1065X33488time', '628829X1065X33489time', '628829X1065X33398time', '628829X1065X33399time', '628829X1065X33400time', '628829X1065X33401time', '628829X1065X33474time', '628829X1065X33473time', '628829X1066time', '628829X1066X33490time', '628829X1066X33465time', '628829X1066X33426time', '628829X1066X33448time', '628829X1066X33449time', '628829X1066X33456time', '628829X1066X33457time', '628829X1067time', '628829X1067X33466time', '628829X1068time', '628829X1068X33404time', '628829X1068X33405time', '628829X1068X33406time', '628829X1069time', '628829X1069X33467time', '628829X1069X33468time', '628829X1069X33469time', '628829X1069X33472time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '628829X1070time' => 'float', '628829X1070X33470time' => 'float', '628829X1070X33471time' => 'float', '628829X1065time' => 'float', '628829X1065X33488time' => 'float', '628829X1065X33489time' => 'float', '628829X1065X33398time' => 'float', '628829X1065X33399time' => 'float', '628829X1065X33400time' => 'float', '628829X1065X33401time' => 'float', '628829X1065X33474time' => 'float', '628829X1065X33473time' => 'float', '628829X1066time' => 'float', '628829X1066X33490time' => 'float', '628829X1066X33465time' => 'float', '628829X1066X33426time' => 'float', '628829X1066X33448time' => 'float', '628829X1066X33449time' => 'float', '628829X1066X33456time' => 'float', '628829X1066X33457time' => 'float', '628829X1067time' => 'float', '628829X1067X33466time' => 'float', '628829X1068time' => 'float', '628829X1068X33404time' => 'float', '628829X1068X33405time' => 'float', '628829X1068X33406time' => 'float', '628829X1069time' => 'float', '628829X1069X33467time' => 'float', '628829X1069X33468time' => 'float', '628829X1069X33469time' => 'float', '628829X1069X33472time' => 'float',
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
