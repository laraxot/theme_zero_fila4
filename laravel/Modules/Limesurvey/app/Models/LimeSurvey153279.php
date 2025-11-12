<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey153279Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey153279
 *
 * @method static CachedBuilder|LimeSurvey153279 all($columns = [])
 * @method static CachedBuilder|LimeSurvey153279 avg($column)
 * @method static CachedBuilder|LimeSurvey153279 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey153279 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey153279 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey153279 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey153279 exists()
 * @method static LimeSurvey153279Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey153279 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey153279 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey153279 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey153279 insert(array $values)
 * @method static CachedBuilder|LimeSurvey153279 isCachable()
 * @method static CachedBuilder|LimeSurvey153279 max($column)
 * @method static CachedBuilder|LimeSurvey153279 min($column)
 * @method static CachedBuilder|LimeSurvey153279 newModelQuery()
 * @method static CachedBuilder|LimeSurvey153279 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey153279 query()
 * @method static CachedBuilder|LimeSurvey153279 sum($column)
 * @method static CachedBuilder|LimeSurvey153279 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $153279X923X317651
 * @property string|null $153279X923X317652
 * @property string|null $153279X923X317653
 * @property string|null $153279X923X317654
 * @property string|null $153279X923X317655
 * @property string|null $153279X923X317656
 * @property string|null $153279X923X317657
 * @property string|null $153279X924X31774Q08
 * @property string|null $153279X925X317759
 * @property string|null $153279X925X3177510
 * @property string|null $153279X925X3177511
 * @property string|null $153279X926X3178112
 * @property string|null $153279X926X3178113
 * @property string|null $153279X927X31788
 * @property string|null $153279X927X31789
 * @property string|null $153279X927X31790
 * @property string|null $153279X928X31791
 * @property string|null $153279X928X31792
 * @property string|null $153279X928X31793
 * @property string|null $153279X929X31794
 * @property string|null $153279X929X31795
 * @property string|null $153279X929X31796
 * @property string|null $153279X929X317971
 * @property string|null $153279X929X317972
 * @property string|null $153279X929X317973
 * @property string|null $153279X929X317974
 * @property string|null $153279X929X317975
 * @property string|null $153279X929X317976
 * @property string|null $153279X929X317977
 * @property string|null $153279X929X317978
 * @property string|null $153279X929X317979
 * @property string|null $153279X929X31797other
 * @property string|null $153279X929X31808Q23
 * @property string|null $153279X930X31821
 *
 * @method static CachedBuilder|LimeSurvey153279 where153279X923X317651($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X923X317652($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X923X317653($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X923X317654($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X923X317655($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X923X317656($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X923X317657($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X924X31774Q08($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X925X3177510($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X925X3177511($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X925X317759($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X926X3178112($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X926X3178113($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X927X31788($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X927X31789($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X927X31790($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X928X31791($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X928X31792($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X928X31793($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X31794($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X31795($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X31796($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X317971($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X317972($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X317973($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X317974($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X317975($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X317976($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X317977($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X317978($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X317979($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X31797other($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X929X31808Q23($value)
 * @method static CachedBuilder|LimeSurvey153279 where153279X930X31821($value)
 * @method static CachedBuilder|LimeSurvey153279 whereId($value)
 * @method static CachedBuilder|LimeSurvey153279 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey153279 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey153279 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey153279 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey153279 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey153279 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_153279';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', '153279X923X317651', '153279X923X317652', '153279X923X317653', '153279X923X317654', '153279X923X317655', '153279X923X317656', '153279X923X317657', '153279X924X31774Q08', '153279X925X317759', '153279X925X3177510', '153279X925X3177511', '153279X926X3178112', '153279X926X3178113', '153279X927X31788', '153279X927X31789', '153279X927X31790', '153279X928X31791', '153279X928X31792', '153279X928X31793', '153279X929X31794', '153279X929X31795', '153279X929X31796', '153279X929X317971', '153279X929X317972', '153279X929X317973', '153279X929X317974', '153279X929X317975', '153279X929X317976', '153279X929X317977', '153279X929X317978', '153279X929X317979', '153279X929X31797other', '153279X929X31808Q23', '153279X930X31821',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', '153279X923X317651' => 'string', '153279X923X317652' => 'string', '153279X923X317653' => 'string', '153279X923X317654' => 'string', '153279X923X317655' => 'string', '153279X923X317656' => 'string', '153279X923X317657' => 'string', '153279X924X31774Q08' => 'string', '153279X925X317759' => 'string', '153279X925X3177510' => 'string', '153279X925X3177511' => 'string', '153279X926X3178112' => 'string', '153279X926X3178113' => 'string', '153279X927X31788' => 'string', '153279X927X31789' => 'string', '153279X927X31790' => 'string', '153279X928X31791' => 'string', '153279X928X31792' => 'string', '153279X928X31793' => 'string', '153279X929X31794' => 'string', '153279X929X31795' => 'string', '153279X929X31796' => 'string', '153279X929X317971' => 'string', '153279X929X317972' => 'string', '153279X929X317973' => 'string', '153279X929X317974' => 'string', '153279X929X317975' => 'string', '153279X929X317976' => 'string', '153279X929X317977' => 'string', '153279X929X317978' => 'string', '153279X929X317979' => 'string', '153279X929X31797other' => 'string', '153279X929X31808Q23' => 'string', '153279X930X31821' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
