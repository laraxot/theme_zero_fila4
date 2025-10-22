<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey886589Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey886589
 *
 * @method static CachedBuilder|LimeSurvey886589 all($columns = [])
 * @method static CachedBuilder|LimeSurvey886589 avg($column)
 * @method static CachedBuilder|LimeSurvey886589 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey886589 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey886589 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey886589 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey886589 exists()
 * @method static LimeSurvey886589Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey886589 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey886589 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey886589 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey886589 insert(array $values)
 * @method static CachedBuilder|LimeSurvey886589 isCachable()
 * @method static CachedBuilder|LimeSurvey886589 max($column)
 * @method static CachedBuilder|LimeSurvey886589 min($column)
 * @method static CachedBuilder|LimeSurvey886589 newModelQuery()
 * @method static CachedBuilder|LimeSurvey886589 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey886589 query()
 * @method static CachedBuilder|LimeSurvey886589 sum($column)
 * @method static CachedBuilder|LimeSurvey886589 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $886589X223X24551Q1
 * @property string|null $886589X223X24551Q2
 * @property string|null $886589X223X24551Q3
 * @property string|null $886589X223X24551Q4
 * @property string|null $886589X224X24556
 * @property string|null $886589X224X24556other
 * @property string|null $886589X224X24557
 * @property string|null $886589X224X24558SQ001
 * @property string|null $886589X225X24560
 * @property string|null $886589X225X24561
 * @property string|null $886589X226X24562
 * @property string|null $886589X226X24562other
 * @property string|null $886589X226X24563
 *
 * @method static CachedBuilder|LimeSurvey886589 where886589X223X24551Q1($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X223X24551Q2($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X223X24551Q3($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X223X24551Q4($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X224X24556($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X224X24556other($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X224X24557($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X224X24558SQ001($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X225X24560($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X225X24561($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X226X24562($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X226X24562other($value)
 * @method static CachedBuilder|LimeSurvey886589 where886589X226X24563($value)
 * @method static CachedBuilder|LimeSurvey886589 whereId($value)
 * @method static CachedBuilder|LimeSurvey886589 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey886589 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey886589 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey886589 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey886589 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey886589 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_886589';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', '886589X223X24551Q1', '886589X223X24551Q2', '886589X223X24551Q3', '886589X223X24551Q4', '886589X224X24556', '886589X224X24556other', '886589X224X24557', '886589X224X24558SQ001', '886589X225X24560', '886589X225X24561', '886589X226X24562', '886589X226X24562other', '886589X226X24563',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', '886589X223X24551Q1' => 'string', '886589X223X24551Q2' => 'string', '886589X223X24551Q3' => 'string', '886589X223X24551Q4' => 'string', '886589X224X24556' => 'string', '886589X224X24556other' => 'string', '886589X224X24557' => 'string', '886589X224X24558SQ001' => 'string', '886589X225X24560' => 'string', '886589X225X24561' => 'string', '886589X226X24562' => 'string', '886589X226X24562other' => 'string', '886589X226X24563' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
