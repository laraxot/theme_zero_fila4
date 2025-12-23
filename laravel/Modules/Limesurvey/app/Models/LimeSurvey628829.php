<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey628829Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey628829
 *
 * @method static CachedBuilder|LimeSurvey628829 all($columns = [])
 * @method static CachedBuilder|LimeSurvey628829 avg($column)
 * @method static CachedBuilder|LimeSurvey628829 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey628829 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey628829 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey628829 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey628829 exists()
 * @method static LimeSurvey628829Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey628829 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey628829 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey628829 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey628829 insert(array $values)
 * @method static CachedBuilder|LimeSurvey628829 isCachable()
 * @method static CachedBuilder|LimeSurvey628829 max($column)
 * @method static CachedBuilder|LimeSurvey628829 min($column)
 * @method static CachedBuilder|LimeSurvey628829 newModelQuery()
 * @method static CachedBuilder|LimeSurvey628829 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey628829 query()
 * @method static CachedBuilder|LimeSurvey628829 sum($column)
 * @method static CachedBuilder|LimeSurvey628829 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property Carbon $startdate
 * @property Carbon $datestamp
 * @property string|null $ipaddr
 * @property string|null $628829X1070X33470
 * @property string|null $628829X1070X33471
 * @property string|null $628829X1065X33488
 * @property string|null $628829X1065X33489
 * @property string|null $628829X1065X33489other
 * @property string|null $628829X1065X33398
 * @property string|null $628829X1065X33399
 * @property string|null $628829X1065X33400
 * @property string|null $628829X1065X33401
 * @property string|null $628829X1065X33474
 * @property string|null $628829X1065X33473
 * @property string|null $628829X1066X33490
 * @property string|null $628829X1066X33465
 * @property string|null $628829X1066X33426
 * @property string|null $628829X1066X33448
 * @property string|null $628829X1066X33449
 * @property string|null $628829X1066X33456
 * @property string|null $628829X1066X33457
 * @property string|null $628829X1067X33466
 * @property string|null $628829X1068X33404
 * @property string|null $628829X1068X33405
 * @property string|null $628829X1068X33406
 * @property string|null $628829X1068X33406other
 * @property string|null $628829X1069X33467
 * @property string|null $628829X1069X33467other
 * @property Carbon|null $628829X1069X33468
 * @property string|null $628829X1069X33469
 * @property string|null $628829X1069X33469other
 * @property string|null $628829X1069X33472
 * @property string|null $628829X1069X33472other
 *
 * @method static CachedBuilder|LimeSurvey628829 where628829X1065X33398($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1065X33399($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1065X33400($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1065X33401($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1065X33473($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1065X33474($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1065X33488($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1065X33489($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1065X33489other($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1066X33426($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1066X33448($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1066X33449($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1066X33456($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1066X33457($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1066X33465($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1066X33490($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1067X33466($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1068X33404($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1068X33405($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1068X33406($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1068X33406other($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1069X33467($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1069X33467other($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1069X33468($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1069X33469($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1069X33469other($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1069X33472($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1069X33472other($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1070X33470($value)
 * @method static CachedBuilder|LimeSurvey628829 where628829X1070X33471($value)
 * @method static CachedBuilder|LimeSurvey628829 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey628829 whereId($value)
 * @method static CachedBuilder|LimeSurvey628829 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey628829 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey628829 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey628829 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey628829 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey628829 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey628829 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey628829 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_628829';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '628829X1070X33470', '628829X1070X33471', '628829X1065X33488', '628829X1065X33489', '628829X1065X33489other', '628829X1065X33398', '628829X1065X33399', '628829X1065X33400', '628829X1065X33401', '628829X1065X33474', '628829X1065X33473', '628829X1066X33490', '628829X1066X33465', '628829X1066X33426', '628829X1066X33448', '628829X1066X33449', '628829X1066X33456', '628829X1066X33457', '628829X1067X33466', '628829X1068X33404', '628829X1068X33405', '628829X1068X33406', '628829X1068X33406other', '628829X1069X33467', '628829X1069X33467other', '628829X1069X33468', '628829X1069X33469', '628829X1069X33469other', '628829X1069X33472', '628829X1069X33472other',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '628829X1070X33470' => 'string', '628829X1070X33471' => 'string', '628829X1065X33488' => 'string', '628829X1065X33489' => 'string', '628829X1065X33489other' => 'string', '628829X1065X33398' => 'string', '628829X1065X33399' => 'string', '628829X1065X33400' => 'string', '628829X1065X33401' => 'string', '628829X1065X33474' => 'string', '628829X1065X33473' => 'string', '628829X1066X33490' => 'string', '628829X1066X33465' => 'string', '628829X1066X33426' => 'string', '628829X1066X33448' => 'string', '628829X1066X33449' => 'string', '628829X1066X33456' => 'string', '628829X1066X33457' => 'string', '628829X1067X33466' => 'string', '628829X1068X33404' => 'string', '628829X1068X33405' => 'string', '628829X1068X33406' => 'string', '628829X1068X33406other' => 'string', '628829X1069X33467' => 'string', '628829X1069X33467other' => 'string', '628829X1069X33468' => 'datetime', '628829X1069X33469' => 'string', '628829X1069X33469other' => 'string', '628829X1069X33472' => 'string', '628829X1069X33472other' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
