<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey955466Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey955466
 *
 * @method static CachedBuilder|LimeSurvey955466 all($columns = [])
 * @method static CachedBuilder|LimeSurvey955466 avg($column)
 * @method static CachedBuilder|LimeSurvey955466 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey955466 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey955466 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey955466 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey955466 exists()
 * @method static LimeSurvey955466Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey955466 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey955466 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey955466 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey955466 insert(array $values)
 * @method static CachedBuilder|LimeSurvey955466 isCachable()
 * @method static CachedBuilder|LimeSurvey955466 max($column)
 * @method static CachedBuilder|LimeSurvey955466 min($column)
 * @method static CachedBuilder|LimeSurvey955466 newModelQuery()
 * @method static CachedBuilder|LimeSurvey955466 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey955466 query()
 * @method static CachedBuilder|LimeSurvey955466 sum($column)
 * @method static CachedBuilder|LimeSurvey955466 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property string|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string $startdate
 * @property string $datestamp
 * @property string|null $ipaddr
 * @property string|null $refurl
 * @property string|null $955466X1141X34094
 * @property string|null $955466X1141X34096
 * @property string|null $955466X1141X34098
 * @property string|null $955466X1141X34095
 * @property string|null $955466X1141X34097
 * @property string|null $955466X1141X34099
 * @property string|null $955466X1142X34100001
 * @property string|null $955466X1142X34100002
 * @property string|null $955466X1142X34100003
 * @property string|null $955466X1142X34100004
 * @property string|null $955466X1142X34100005
 * @property string|null $955466X1143X34107
 * @property string|null $955466X1143X34108
 * @property string|null $955466X1143X34109
 * @property string|null $955466X1143X34110
 * @property string|null $955466X1143X34111
 * @property string|null $955466X1143X34196
 *
 * @method static CachedBuilder|LimeSurvey955466 where955466X1141X34094($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1141X34095($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1141X34096($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1141X34097($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1141X34098($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1141X34099($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1142X34100001($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1142X34100002($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1142X34100003($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1142X34100004($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1142X34100005($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1143X34107($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1143X34108($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1143X34109($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1143X34110($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1143X34111($value)
 * @method static CachedBuilder|LimeSurvey955466 where955466X1143X34196($value)
 * @method static CachedBuilder|LimeSurvey955466 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey955466 whereId($value)
 * @method static CachedBuilder|LimeSurvey955466 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey955466 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey955466 whereRefurl($value)
 * @method static CachedBuilder|LimeSurvey955466 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey955466 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey955466 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey955466 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey955466 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey955466 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_survey_955466';

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
        6 => '955466X1141X34094',
        7 => '955466X1141X34096',
        8 => '955466X1141X34098',
        9 => '955466X1141X34095',
        10 => '955466X1141X34097',
        11 => '955466X1141X34099',
        12 => '955466X1142X34100001',
        13 => '955466X1142X34100002',
        14 => '955466X1142X34100003',
        15 => '955466X1142X34100004',
        16 => '955466X1142X34100005',
        17 => '955466X1143X34107',
        18 => '955466X1143X34108',
        19 => '955466X1143X34109',
        20 => '955466X1143X34110',
        21 => '955466X1143X34111',
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
