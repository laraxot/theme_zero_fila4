<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey726613Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey726613
 *
 * @method static CachedBuilder|LimeSurvey726613 all($columns = [])
 * @method static CachedBuilder|LimeSurvey726613 avg($column)
 * @method static CachedBuilder|LimeSurvey726613 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey726613 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey726613 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey726613 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey726613 exists()
 * @method static LimeSurvey726613Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey726613 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey726613 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey726613 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey726613 insert(array $values)
 * @method static CachedBuilder|LimeSurvey726613 isCachable()
 * @method static CachedBuilder|LimeSurvey726613 max($column)
 * @method static CachedBuilder|LimeSurvey726613 min($column)
 * @method static CachedBuilder|LimeSurvey726613 newModelQuery()
 * @method static CachedBuilder|LimeSurvey726613 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey726613 query()
 * @method static CachedBuilder|LimeSurvey726613 sum($column)
 * @method static CachedBuilder|LimeSurvey726613 truncate()
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
 * @property string|null $726613X995X33066
 * @property string|null $726613X995X32856
 * @property string|null $726613X995X32857
 * @property string|null $726613X995X32858
 * @property string|null $726613X995X32859
 * @property string|null $726613X995X32860
 * @property string|null $726613X995X32861
 * @property string|null $726613X995X32862
 * @property string|null $726613X995X328631
 * @property string|null $726613X995X328632
 * @property string|null $726613X995X328633
 * @property string|null $726613X995X328634
 * @property string|null $726613X995X328635
 * @property string|null $726613X995X328711
 * @property string|null $726613X995X328712
 * @property string|null $726613X995X328713
 * @property string|null $726613X995X32880
 * @property string|null $726613X995X3288110
 * @property string|null $726613X995X3288111
 * @property string|null $726613X995X32890
 * @property string|null $726613X995X32891
 * @property string|null $726613X995X32892
 * @property string|null $726613X995X32893
 * @property string|null $726613X995X32894
 * @property string|null $726613X995X3290512
 * @property string|null $726613X995X3290513
 * @property string|null $726613X995X3290514
 * @property string|null $726613X995X3290515
 * @property string|null $726613X995X3290516
 * @property string|null $726613X995X3290517
 * @property string|null $726613X995X3290518
 * @property string|null $726613X995X3291519
 * @property string|null $726613X995X3291520
 * @property string|null $726613X995X3291521
 * @property string|null $726613X995X3292722
 * @property string|null $726613X995X32937
 * @property string|null $726613X995X3293824
 * @property string|null $726613X995X32940
 * @property string|null $726613X995X32941
 * @property string|null $726613X995X32942
 * @property string|null $726613X995X32943
 * @property string|null $726613X995X32944
 * @property string|null $726613X995X32945
 * @property string|null $726613X995X32833
 * @property string|null $726613X995X32834
 * @property string|null $726613X995X32834other
 *
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32833($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32834($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32834other($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32856($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32857($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32858($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32859($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32860($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32861($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32862($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X328631($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X328632($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X328633($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X328634($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X328635($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X328711($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X328712($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X328713($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32880($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3288110($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3288111($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32890($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32891($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32892($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32893($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32894($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3290512($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3290513($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3290514($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3290515($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3290516($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3290517($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3290518($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3291519($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3291520($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3291521($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3292722($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32937($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X3293824($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32940($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32941($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32942($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32943($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32944($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X32945($value)
 * @method static CachedBuilder|LimeSurvey726613 where726613X995X33066($value)
 * @method static CachedBuilder|LimeSurvey726613 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey726613 whereId($value)
 * @method static CachedBuilder|LimeSurvey726613 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey726613 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey726613 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey726613 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey726613 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey726613 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey726613 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey726613 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_726613';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '726613X995X33066', '726613X995X32856', '726613X995X32857', '726613X995X32858', '726613X995X32859', '726613X995X32860', '726613X995X32861', '726613X995X32862', '726613X995X328631', '726613X995X328632', '726613X995X328633', '726613X995X328634', '726613X995X328635', '726613X995X328711', '726613X995X328712', '726613X995X328713', '726613X995X32880', '726613X995X3288110', '726613X995X3288111', '726613X995X32890', '726613X995X32891', '726613X995X32892', '726613X995X32893', '726613X995X32894', '726613X995X3290512', '726613X995X3290513', '726613X995X3290514', '726613X995X3290515', '726613X995X3290516', '726613X995X3290517', '726613X995X3290518', '726613X995X3291519', '726613X995X3291520', '726613X995X3291521', '726613X995X3292722', '726613X995X32937', '726613X995X3293824', '726613X995X32940', '726613X995X32941', '726613X995X32942', '726613X995X32943', '726613X995X32944', '726613X995X32945', '726613X995X32833', '726613X995X32834', '726613X995X32834other',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '726613X995X32856' => 'string', '726613X995X32857' => 'string', '726613X995X32858' => 'string', '726613X995X32859' => 'string', '726613X995X32860' => 'string', '726613X995X32861' => 'string', '726613X995X328631' => 'string', '726613X995X328632' => 'string', '726613X995X328633' => 'string', '726613X995X328634' => 'string', '726613X995X328635' => 'string', '726613X995X328711' => 'string', '726613X995X328712' => 'string', '726613X995X328713' => 'string', '726613X995X32880' => 'string', '726613X995X3288110' => 'string', '726613X995X3288111' => 'string', '726613X995X32890' => 'string', '726613X995X32891' => 'string', '726613X995X32892' => 'string', '726613X995X32893' => 'string', '726613X995X3290512' => 'string', '726613X995X3290513' => 'string', '726613X995X3290514' => 'string', '726613X995X3290515' => 'string', '726613X995X3290516' => 'string', '726613X995X3290517' => 'string', '726613X995X3290518' => 'string', '726613X995X3291519' => 'string', '726613X995X3291520' => 'string', '726613X995X3291521' => 'string', '726613X995X3292722' => 'string', '726613X995X32937' => 'string', '726613X995X3293824' => 'string', '726613X995X32940' => 'string', '726613X995X32941' => 'string', '726613X995X32942' => 'string', '726613X995X32943' => 'string', '726613X995X32944' => 'string', '726613X995X32945' => 'string', '726613X995X32833' => 'string', '726613X995X32834' => 'string', '726613X995X32834other' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
