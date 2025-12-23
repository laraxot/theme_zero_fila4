<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey155327Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use Illuminate\Database\Eloquent\Builder;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey155327
 *
 * @method static CachedBuilder|LimeSurvey155327 all($columns = [])
 * @method static CachedBuilder|LimeSurvey155327 avg($column)
 * @method static CachedBuilder|LimeSurvey155327 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey155327 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey155327 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey155327 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey155327 exists()
 * @method static LimeSurvey155327Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey155327 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey155327 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey155327 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey155327 insert(array $values)
 * @method static CachedBuilder|LimeSurvey155327 isCachable()
 * @method static CachedBuilder|LimeSurvey155327 max($column)
 * @method static CachedBuilder|LimeSurvey155327 min($column)
 * @method static CachedBuilder|LimeSurvey155327 newModelQuery()
 * @method static CachedBuilder|LimeSurvey155327 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey155327 query()
 * @method static CachedBuilder|LimeSurvey155327 sum($column)
 * @method static CachedBuilder|LimeSurvey155327 truncate()
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
 * @property string|null $155327X1500X37858SQ001
 * @property string|null $155327X1500X37862
 * @property string|null $155327X1500X37860SQ001
 * @property string|null $155327X1500X37861SQ001
 * @property string|null $155327X1500X37865SQ001
 * @property string|null $155327X1500X37866
 * @property string|null $155327X1500X37946SQ001
 * @property string|null $155327X1500X37859
 * @property string|null $155327X1500X38037
 *
 * @method static CachedBuilder|LimeSurvey155327 where155327X1500X37858SQ001($value)
 * @method static CachedBuilder|LimeSurvey155327 where155327X1500X37859($value)
 * @method static CachedBuilder|LimeSurvey155327 where155327X1500X37860SQ001($value)
 * @method static CachedBuilder|LimeSurvey155327 where155327X1500X37861SQ001($value)
 * @method static CachedBuilder|LimeSurvey155327 where155327X1500X37862($value)
 * @method static CachedBuilder|LimeSurvey155327 where155327X1500X37865SQ001($value)
 * @method static CachedBuilder|LimeSurvey155327 where155327X1500X37866($value)
 * @method static CachedBuilder|LimeSurvey155327 where155327X1500X37946SQ001($value)
 * @method static CachedBuilder|LimeSurvey155327 where155327X1500X38037($value)
 * @method static CachedBuilder|LimeSurvey155327 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey155327 whereId($value)
 * @method static CachedBuilder|LimeSurvey155327 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey155327 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey155327 whereRefurl($value)
 * @method static CachedBuilder|LimeSurvey155327 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey155327 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey155327 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey155327 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey155327 whereToken($value)
 *
 * @property string|null $155327X1500X41107
 * @property string|null $155327X1500X41108
 *
 * @method static Builder|LimeSurvey155327 where155327X1500X41107($value)
 * @method static Builder|LimeSurvey155327 where155327X1500X41108($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey155327 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_survey_155327';

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
        6 => 'startdate',
        7 => 'datestamp',
        8 => 'ipaddr',
        9 => 'refurl',
        10 => '155327X1507X37863',
        11 => '155327X1500X37858SQ001',
        12 => '155327X1500X37862',
        13 => '155327X1500X37860SQ001',
        14 => '155327X1500X37861SQ001',
        15 => '155327X1500X37866',
        16 => '155327X1500X37946SQ001',
        17 => '155327X1500X37865SQ001',
        18 => '155327X1500X37859',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array<int, string>
     */
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
     *
     *  da fare
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
