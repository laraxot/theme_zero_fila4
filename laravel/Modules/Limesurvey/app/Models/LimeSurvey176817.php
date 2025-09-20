<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey176817Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey176817
 *
 * @method static CachedBuilder|LimeSurvey176817 all($columns = [])
 * @method static CachedBuilder|LimeSurvey176817 avg($column)
 * @method static CachedBuilder|LimeSurvey176817 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey176817 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey176817 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey176817 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey176817 exists()
 * @method static LimeSurvey176817Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey176817 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey176817 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey176817 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey176817 insert(array $values)
 * @method static CachedBuilder|LimeSurvey176817 isCachable()
 * @method static CachedBuilder|LimeSurvey176817 max($column)
 * @method static CachedBuilder|LimeSurvey176817 min($column)
 * @method static CachedBuilder|LimeSurvey176817 newModelQuery()
 * @method static CachedBuilder|LimeSurvey176817 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey176817 query()
 * @method static CachedBuilder|LimeSurvey176817 sum($column)
 * @method static CachedBuilder|LimeSurvey176817 truncate()
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
 * @property string|null $176817X795X30223
 * @property string|null $176817X794X30215
 * @property string|null $176817X794X30216
 * @property string|null $176817X794X30217
 * @property string|null $176817X794X30218
 * @property string|null $176817X794X30219
 * @property string|null $176817X794X30220
 * @property string|null $176817X794X30221
 * @property string|null $176817X794X30222SQ001
 * @property string|null $176817X794X30222SQ002
 * @property string|null $176817X794X30222SQ003
 * @property string|null $176817X794X30222SQ004
 * @property string|null $176817X794X30224
 *
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30215($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30216($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30217($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30218($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30219($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30220($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30221($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30222SQ001($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30222SQ002($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30222SQ003($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30222SQ004($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X794X30224($value)
 * @method static CachedBuilder|LimeSurvey176817 where176817X795X30223($value)
 * @method static CachedBuilder|LimeSurvey176817 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey176817 whereId($value)
 * @method static CachedBuilder|LimeSurvey176817 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey176817 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey176817 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey176817 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey176817 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey176817 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey176817 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey176817 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_176817';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '176817X795X30223', '176817X794X30215', '176817X794X30216', '176817X794X30217', '176817X794X30218', '176817X794X30219', '176817X794X30220', '176817X794X30221', '176817X794X30222SQ001', '176817X794X30222SQ002', '176817X794X30222SQ003', '176817X794X30222SQ004', '176817X794X30224',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '176817X795X30223' => 'string', '176817X794X30215' => 'string', '176817X794X30216' => 'string', '176817X794X30217' => 'string', '176817X794X30218' => 'string', '176817X794X30219' => 'string', '176817X794X30220' => 'string', '176817X794X30221' => 'string', '176817X794X30222SQ001' => 'string', '176817X794X30222SQ002' => 'string', '176817X794X30222SQ003' => 'string', '176817X794X30222SQ004' => 'string', '176817X794X30224' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
