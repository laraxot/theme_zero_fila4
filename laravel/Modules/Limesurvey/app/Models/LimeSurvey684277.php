<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey684277Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey684277
 *
 * @method static CachedBuilder|LimeSurvey684277 all($columns = [])
 * @method static CachedBuilder|LimeSurvey684277 avg($column)
 * @method static CachedBuilder|LimeSurvey684277 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey684277 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey684277 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey684277 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey684277 exists()
 * @method static LimeSurvey684277Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey684277 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey684277 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey684277 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey684277 insert(array $values)
 * @method static CachedBuilder|LimeSurvey684277 isCachable()
 * @method static CachedBuilder|LimeSurvey684277 max($column)
 * @method static CachedBuilder|LimeSurvey684277 min($column)
 * @method static CachedBuilder|LimeSurvey684277 newModelQuery()
 * @method static CachedBuilder|LimeSurvey684277 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey684277 query()
 * @method static CachedBuilder|LimeSurvey684277 sum($column)
 * @method static CachedBuilder|LimeSurvey684277 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property string|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $684277X1118X33850001
 * @property string|null $684277X1118X33850002
 * @property string|null $684277X1118X33850003
 * @property string|null $684277X1118X33850004
 * @property string|null $684277X1118X33850005
 * @property string|null $684277X1118X33850006
 * @property string|null $684277X1118X33850007
 * @property string|null $684277X1118X33850other
 * @property string|null $684277X1118X33859
 * @property string|null $684277X1118X33859other
 * @property string|null $684277X1118X33868
 * @property string|null $684277X1118X33868other
 * @property string|null $684277X1119X33869
 * @property string|null $684277X1119X33870
 * @property string|null $684277X1119X33871
 * @property string|null $684277X1120X33872
 * @property string|null $684277X1120X33873
 * @property string|null $684277X1120X33874
 * @property string|null $684277X1120X33875
 * @property string|null $684277X1120X33876
 * @property string|null $684277X1121X33877
 * @property string|null $684277X1121X33878
 * @property string|null $684277X1121X33879
 * @property string|null $684277X1121X33880
 * @property string|null $684277X1121X33881
 * @property string|null $684277X1121X33882
 * @property string|null $684277X1121X33883
 * @property string|null $684277X1121X33884
 * @property string|null $684277X1122X33885
 * @property string|null $684277X1122X33886
 * @property string|null $684277X1122X33887
 * @property string|null $684277X1122X33888
 * @property string|null $684277X1122X33889
 * @property string|null $684277X1122X33890
 * @property string|null $684277X1122X33891
 * @property string|null $684277X1122X33892
 * @property string|null $684277X1122X33893
 * @property string|null $684277X1122X33894
 * @property string|null $684277X1122X33898SQ001
 * @property string|null $684277X1122X33897
 * @property string|null $684277X1123X33895
 * @property string|null $684277X1123X33896
 *
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33850001($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33850002($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33850003($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33850004($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33850005($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33850006($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33850007($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33850other($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33859($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33859other($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33868($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1118X33868other($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1119X33869($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1119X33870($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1119X33871($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1120X33872($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1120X33873($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1120X33874($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1120X33875($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1120X33876($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1121X33877($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1121X33878($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1121X33879($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1121X33880($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1121X33881($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1121X33882($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1121X33883($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1121X33884($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33885($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33886($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33887($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33888($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33889($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33890($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33891($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33892($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33893($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33894($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33897($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1122X33898SQ001($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1123X33895($value)
 * @method static CachedBuilder|LimeSurvey684277 where684277X1123X33896($value)
 * @method static CachedBuilder|LimeSurvey684277 whereId($value)
 * @method static CachedBuilder|LimeSurvey684277 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey684277 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey684277 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey684277 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey684277 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey684277 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_684277';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        0 => 'id',
        1 => 'token',
        2 => 'submitdate',
        3 => 'lastpage',
        4 => 'startlanguage',
        5 => 'seed',
        6 => '684277X1118X33850001',
        7 => '684277X1118X33850002',
        8 => '684277X1118X33850003',
        9 => '684277X1118X33850004',
        10 => '684277X1118X33850005',
        11 => '684277X1118X33850006',
        12 => '684277X1118X33850007',
        13 => '684277X1118X33850other',
        14 => '684277X1118X33859',
        15 => '684277X1118X33859other',
        16 => '684277X1118X33868',
        17 => '684277X1118X33868other',
        18 => '684277X1119X33869',
        19 => '684277X1119X33870',
        20 => '684277X1119X33871',
        21 => '684277X1120X33872',
        22 => '684277X1120X33873',
        23 => '684277X1120X33874',
        24 => '684277X1120X33875',
        25 => '684277X1120X33876',
        26 => '684277X1121X33877',
        27 => '684277X1121X33878',
        28 => '684277X1121X33879',
        29 => '684277X1121X33880',
        30 => '684277X1121X33881',
        31 => '684277X1121X33882',
        32 => '684277X1121X33883',
        33 => '684277X1121X33884',
        34 => '684277X1122X33885',
        35 => '684277X1122X33886',
        36 => '684277X1122X33887',
        37 => '684277X1122X33888',
        38 => '684277X1122X33889',
        39 => '684277X1122X33890',
        40 => '684277X1122X33891',
        41 => '684277X1122X33892',
        42 => '684277X1122X33893',
        43 => '684277X1122X33894',
        44 => '684277X1122X33898SQ001',
        45 => '684277X1122X33897',
        46 => '684277X1123X33895',
        47 => '684277X1123X33896',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /**
     * The attributes that should be casted to native types.
     * da fare.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *  da fare.
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
