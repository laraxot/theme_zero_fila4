<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey139982Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey139982
 *
 * @method static CachedBuilder|LimeSurvey139982 all($columns = [])
 * @method static CachedBuilder|LimeSurvey139982 avg($column)
 * @method static CachedBuilder|LimeSurvey139982 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey139982 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey139982 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey139982 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey139982 exists()
 * @method static LimeSurvey139982Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey139982 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey139982 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey139982 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey139982 insert(array $values)
 * @method static CachedBuilder|LimeSurvey139982 isCachable()
 * @method static CachedBuilder|LimeSurvey139982 max($column)
 * @method static CachedBuilder|LimeSurvey139982 min($column)
 * @method static CachedBuilder|LimeSurvey139982 newModelQuery()
 * @method static CachedBuilder|LimeSurvey139982 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey139982 query()
 * @method static CachedBuilder|LimeSurvey139982 sum($column)
 * @method static CachedBuilder|LimeSurvey139982 truncate()
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
 * @property string|null $139982X812X30336SQ001
 * @property string|null $139982X812X30337
 * @property string|null $139982X812X30338
 * @property string|null $139982X812X30339
 * @property string|null $139982X812X30340
 * @property string|null $139982X812X30341
 *
 * @method static CachedBuilder|LimeSurvey139982 where139982X812X30336SQ001($value)
 * @method static CachedBuilder|LimeSurvey139982 where139982X812X30337($value)
 * @method static CachedBuilder|LimeSurvey139982 where139982X812X30338($value)
 * @method static CachedBuilder|LimeSurvey139982 where139982X812X30339($value)
 * @method static CachedBuilder|LimeSurvey139982 where139982X812X30340($value)
 * @method static CachedBuilder|LimeSurvey139982 where139982X812X30341($value)
 * @method static CachedBuilder|LimeSurvey139982 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey139982 whereId($value)
 * @method static CachedBuilder|LimeSurvey139982 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey139982 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey139982 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey139982 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey139982 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey139982 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey139982 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey139982 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_139982';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '139982X812X30336SQ001', '139982X812X30337', '139982X812X30338', '139982X812X30339', '139982X812X30340', '139982X812X30341',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '139982X812X30336SQ001' => 'string', '139982X812X30337' => 'string', '139982X812X30338' => 'string', '139982X812X30339' => 'string', '139982X812X30340' => 'string', '139982X812X30341' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
