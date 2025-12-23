<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey541561Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey541561
 *
 * @method static CachedBuilder|LimeSurvey541561 all($columns = [])
 * @method static CachedBuilder|LimeSurvey541561 avg($column)
 * @method static CachedBuilder|LimeSurvey541561 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey541561 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey541561 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey541561 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey541561 exists()
 * @method static LimeSurvey541561Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey541561 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey541561 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey541561 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey541561 insert(array $values)
 * @method static CachedBuilder|LimeSurvey541561 isCachable()
 * @method static CachedBuilder|LimeSurvey541561 max($column)
 * @method static CachedBuilder|LimeSurvey541561 min($column)
 * @method static CachedBuilder|LimeSurvey541561 newModelQuery()
 * @method static CachedBuilder|LimeSurvey541561 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey541561 query()
 * @method static CachedBuilder|LimeSurvey541561 sum($column)
 * @method static CachedBuilder|LimeSurvey541561 truncate()
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
 * @property string|null $541561X1003X33065
 * @property string|null $541561X1003X32948
 * @property string|null $541561X1003X32949
 * @property string|null $541561X1003X32950
 * @property string|null $541561X1003X32951
 * @property string|null $541561X1003X329551
 * @property string|null $541561X1003X329552
 * @property string|null $541561X1003X32957
 * @property string|null $541561X1003X32957other
 * @property string|null $541561X1003X33000
 * @property string|null $541561X1003X329581
 * @property string|null $541561X1003X329582
 * @property string|null $541561X1003X329583
 * @property string|null $541561X1003X33004
 * @property string|null $541561X1003X33005
 * @property string|null $541561X1003X32973
 * @property string|null $541561X1003X32946
 * @property string|null $541561X1003X32947
 * @property string|null $541561X1003X32947other
 *
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32946($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32947($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32947other($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32948($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32949($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32950($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32951($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X329551($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X329552($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32957($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32957other($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X329581($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X329582($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X329583($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X32973($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X33000($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X33004($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X33005($value)
 * @method static CachedBuilder|LimeSurvey541561 where541561X1003X33065($value)
 * @method static CachedBuilder|LimeSurvey541561 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey541561 whereId($value)
 * @method static CachedBuilder|LimeSurvey541561 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey541561 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey541561 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey541561 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey541561 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey541561 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey541561 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey541561 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_541561';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '541561X1003X33065', '541561X1003X32948', '541561X1003X32949', '541561X1003X32950', '541561X1003X32951', '541561X1003X329551', '541561X1003X329552', '541561X1003X32957', '541561X1003X32957other', '541561X1003X33000', '541561X1003X329581', '541561X1003X329582', '541561X1003X329583', '541561X1003X33004', '541561X1003X33005', '541561X1003X32973', '541561X1003X32946', '541561X1003X32947', '541561X1003X32947other',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '541561X1003X32948' => 'string', '541561X1003X32949' => 'string', '541561X1003X32950' => 'string', '541561X1003X32951' => 'string', '541561X1003X329551' => 'string', '541561X1003X329552' => 'string', '541561X1003X32957' => 'string', '541561X1003X32957other' => 'string', '541561X1003X33000' => 'string', '541561X1003X329581' => 'string', '541561X1003X329582' => 'string', '541561X1003X329583' => 'string', '541561X1003X33004' => 'string', '541561X1003X33005' => 'string', '541561X1003X32973' => 'string', '541561X1003X32946' => 'string', '541561X1003X32947' => 'string', '541561X1003X32947other' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
