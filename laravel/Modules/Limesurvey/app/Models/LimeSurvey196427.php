<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey196427Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey196427
 *
 * @method static CachedBuilder|LimeSurvey196427 all($columns = [])
 * @method static CachedBuilder|LimeSurvey196427 avg($column)
 * @method static CachedBuilder|LimeSurvey196427 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey196427 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey196427 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey196427 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey196427 exists()
 * @method static LimeSurvey196427Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey196427 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey196427 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey196427 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey196427 insert(array $values)
 * @method static CachedBuilder|LimeSurvey196427 isCachable()
 * @method static CachedBuilder|LimeSurvey196427 max($column)
 * @method static CachedBuilder|LimeSurvey196427 min($column)
 * @method static CachedBuilder|LimeSurvey196427 newModelQuery()
 * @method static CachedBuilder|LimeSurvey196427 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey196427 query()
 * @method static CachedBuilder|LimeSurvey196427 sum($column)
 * @method static CachedBuilder|LimeSurvey196427 truncate()
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
 * @property string|null $refurl
 * @property string|null $196427X1028X33144
 * @property string|null $196427X1028X33152
 * @property string|null $196427X1028X33145
 * @property string|null $196427X1028X33146
 * @property string|null $196427X1028X33147
 * @property string|null $196427X1028X33148
 * @property string|null $196427X1028X33149
 * @property string|null $196427X1028X33150
 * @property string|null $196427X1028X33151
 *
 * @method static CachedBuilder|LimeSurvey196427 where196427X1028X33144($value)
 * @method static CachedBuilder|LimeSurvey196427 where196427X1028X33145($value)
 * @method static CachedBuilder|LimeSurvey196427 where196427X1028X33146($value)
 * @method static CachedBuilder|LimeSurvey196427 where196427X1028X33147($value)
 * @method static CachedBuilder|LimeSurvey196427 where196427X1028X33148($value)
 * @method static CachedBuilder|LimeSurvey196427 where196427X1028X33149($value)
 * @method static CachedBuilder|LimeSurvey196427 where196427X1028X33150($value)
 * @method static CachedBuilder|LimeSurvey196427 where196427X1028X33151($value)
 * @method static CachedBuilder|LimeSurvey196427 where196427X1028X33152($value)
 * @method static CachedBuilder|LimeSurvey196427 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey196427 whereId($value)
 * @method static CachedBuilder|LimeSurvey196427 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey196427 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey196427 whereRefurl($value)
 * @method static CachedBuilder|LimeSurvey196427 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey196427 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey196427 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey196427 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey196427 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey196427 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_196427';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', 'refurl', '196427X1028X33144', '196427X1028X33152', '196427X1028X33145', '196427X1028X33146', '196427X1028X33147', '196427X1028X33148', '196427X1028X33149', '196427X1028X33150', '196427X1028X33151',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', 'refurl' => 'string', '196427X1028X33144' => 'string', '196427X1028X33152' => 'string', '196427X1028X33145' => 'string', '196427X1028X33146' => 'string', '196427X1028X33147' => 'string', '196427X1028X33148' => 'string', '196427X1028X33149' => 'string', '196427X1028X33150' => 'string', '196427X1028X33151' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
