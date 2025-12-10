<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey824761Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey824761
 *
 * @method static CachedBuilder|LimeSurvey824761 all($columns = [])
 * @method static CachedBuilder|LimeSurvey824761 avg($column)
 * @method static CachedBuilder|LimeSurvey824761 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey824761 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey824761 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey824761 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey824761 exists()
 * @method static LimeSurvey824761Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey824761 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey824761 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey824761 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey824761 insert(array $values)
 * @method static CachedBuilder|LimeSurvey824761 isCachable()
 * @method static CachedBuilder|LimeSurvey824761 max($column)
 * @method static CachedBuilder|LimeSurvey824761 min($column)
 * @method static CachedBuilder|LimeSurvey824761 newModelQuery()
 * @method static CachedBuilder|LimeSurvey824761 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey824761 query()
 * @method static CachedBuilder|LimeSurvey824761 sum($column)
 * @method static CachedBuilder|LimeSurvey824761 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $824761X981X3267901
 * @property string|null $824761X981X3267902
 * @property string|null $824761X981X3268201
 * @property string|null $824761X981X3268202
 * @property string|null $824761X981X3268501
 * @property string|null $824761X981X3268502
 * @property string|null $824761X981X3268801
 * @property string|null $824761X981X3268802
 * @property string|null $824761X982X3269101
 * @property string|null $824761X982X3269102
 * @property string|null $824761X982X3269401
 * @property string|null $824761X982X3269402
 * @property string|null $824761X982X3269701
 * @property string|null $824761X982X3269702
 * @property string|null $824761X983X3270001
 * @property string|null $824761X983X3270002
 * @property string|null $824761X983X3270301
 * @property string|null $824761X983X3270302
 * @property string|null $824761X983X3270601
 * @property string|null $824761X983X3270602
 * @property string|null $824761X984X3270901
 * @property string|null $824761X984X3270902
 * @property string|null $824761X984X3271201
 * @property string|null $824761X984X3271202
 * @property string|null $824761X984X3271501
 * @property string|null $824761X984X3271502
 * @property string|null $824761X984X3271801
 * @property string|null $824761X984X3271802
 * @property string|null $824761X984X3272101
 * @property string|null $824761X984X3272102
 * @property string|null $824761X985X3272401
 * @property string|null $824761X985X3272402
 * @property string|null $824761X985X3272701
 * @property string|null $824761X985X3272702
 * @property string|null $824761X985X3273001
 * @property string|null $824761X985X3273002
 * @property string|null $824761X985X3273301
 * @property string|null $824761X985X3273302
 * @property string|null $824761X985X3273601
 * @property string|null $824761X985X3273602
 * @property string|null $824761X986X32739
 * @property string|null $824761X986X32740
 * @property string|null $824761X986X32741
 *
 * @method static CachedBuilder|LimeSurvey824761 where824761X981X3267901($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X981X3267902($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X981X3268201($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X981X3268202($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X981X3268501($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X981X3268502($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X981X3268801($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X981X3268802($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X982X3269101($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X982X3269102($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X982X3269401($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X982X3269402($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X982X3269701($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X982X3269702($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X983X3270001($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X983X3270002($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X983X3270301($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X983X3270302($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X983X3270601($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X983X3270602($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3270901($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3270902($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3271201($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3271202($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3271501($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3271502($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3271801($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3271802($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3272101($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X984X3272102($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3272401($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3272402($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3272701($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3272702($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3273001($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3273002($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3273301($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3273302($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3273601($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X985X3273602($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X986X32739($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X986X32740($value)
 * @method static CachedBuilder|LimeSurvey824761 where824761X986X32741($value)
 * @method static CachedBuilder|LimeSurvey824761 whereId($value)
 * @method static CachedBuilder|LimeSurvey824761 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey824761 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey824761 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey824761 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey824761 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey824761 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_824761';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', '824761X981X3267901', '824761X981X3267902', '824761X981X3268201', '824761X981X3268202', '824761X981X3268501', '824761X981X3268502', '824761X981X3268801', '824761X981X3268802', '824761X982X3269101', '824761X982X3269102', '824761X982X3269401', '824761X982X3269402', '824761X982X3269701', '824761X982X3269702', '824761X983X3270001', '824761X983X3270002', '824761X983X3270301', '824761X983X3270302', '824761X983X3270601', '824761X983X3270602', '824761X984X3270901', '824761X984X3270902', '824761X984X3271201', '824761X984X3271202', '824761X984X3271501', '824761X984X3271502', '824761X984X3271801', '824761X984X3271802', '824761X984X3272101', '824761X984X3272102', '824761X985X3272401', '824761X985X3272402', '824761X985X3272701', '824761X985X3272702', '824761X985X3273001', '824761X985X3273002', '824761X985X3273301', '824761X985X3273302', '824761X985X3273601', '824761X985X3273602', '824761X986X32739', '824761X986X32740', '824761X986X32741',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', '824761X981X3267901' => 'string', '824761X981X3267902' => 'string', '824761X981X3268201' => 'string', '824761X981X3268202' => 'string', '824761X981X3268501' => 'string', '824761X981X3268502' => 'string', '824761X981X3268801' => 'string', '824761X981X3268802' => 'string', '824761X982X3269101' => 'string', '824761X982X3269102' => 'string', '824761X982X3269401' => 'string', '824761X982X3269402' => 'string', '824761X982X3269701' => 'string', '824761X982X3269702' => 'string', '824761X983X3270001' => 'string', '824761X983X3270002' => 'string', '824761X983X3270301' => 'string', '824761X983X3270302' => 'string', '824761X983X3270601' => 'string', '824761X983X3270602' => 'string', '824761X984X3270901' => 'string', '824761X984X3270902' => 'string', '824761X984X3271201' => 'string', '824761X984X3271202' => 'string', '824761X984X3271501' => 'string', '824761X984X3271502' => 'string', '824761X984X3271801' => 'string', '824761X984X3271802' => 'string', '824761X984X3272101' => 'string', '824761X984X3272102' => 'string', '824761X985X3272401' => 'string', '824761X985X3272402' => 'string', '824761X985X3272701' => 'string', '824761X985X3272702' => 'string', '824761X985X3273001' => 'string', '824761X985X3273002' => 'string', '824761X985X3273301' => 'string', '824761X985X3273302' => 'string', '824761X985X3273601' => 'string', '824761X985X3273602' => 'string', '824761X986X32739' => 'string', '824761X986X32740' => 'string', '824761X986X32741' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
