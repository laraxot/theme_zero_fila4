<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey422747Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey422747
 *
 * @method static CachedBuilder|LimeSurvey422747 all($columns = [])
 * @method static CachedBuilder|LimeSurvey422747 avg($column)
 * @method static CachedBuilder|LimeSurvey422747 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey422747 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey422747 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey422747 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey422747 exists()
 * @method static LimeSurvey422747Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey422747 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey422747 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey422747 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey422747 insert(array $values)
 * @method static CachedBuilder|LimeSurvey422747 isCachable()
 * @method static CachedBuilder|LimeSurvey422747 max($column)
 * @method static CachedBuilder|LimeSurvey422747 min($column)
 * @method static CachedBuilder|LimeSurvey422747 newModelQuery()
 * @method static CachedBuilder|LimeSurvey422747 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey422747 query()
 * @method static CachedBuilder|LimeSurvey422747 sum($column)
 * @method static CachedBuilder|LimeSurvey422747 truncate()
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
 * @property string|null $422747X941X32056
 * @property string|null $422747X941X32033
 * @property string|null $422747X941X32034
 * @property string|null $422747X941X32034other
 * @property string|null $422747X941X32035
 * @property string|null $422747X942X32036004_01
 * @property string|null $422747X942X32036004_02
 * @property string|null $422747X942X32036005_01
 * @property string|null $422747X942X32036005_02
 * @property string|null $422747X942X32036006_01
 * @property string|null $422747X942X32036006_02
 * @property string|null $422747X942X32036007_01
 * @property string|null $422747X942X32036007_02
 * @property string|null $422747X942X32036008_01
 * @property string|null $422747X942X32036008_02
 * @property string|null $422747X942X32036009_01
 * @property string|null $422747X942X32036009_02
 * @property string|null $422747X942X32036010_01
 * @property string|null $422747X942X32036010_02
 * @property string|null $422747X942X32036011_01
 * @property string|null $422747X942X32036011_02
 * @property string|null $422747X942X32036012_01
 * @property string|null $422747X942X32036012_02
 * @property string|null $422747X942X32036013_01
 * @property string|null $422747X942X32036013_02
 * @property string|null $422747X942X32036014_01
 * @property string|null $422747X942X32036014_02
 * @property string|null $422747X942X32036015_01
 * @property string|null $422747X942X32036015_02
 * @property string|null $422747X942X32036016_01
 * @property string|null $422747X942X32036016_02
 * @property string|null $422747X942X32036017_01
 * @property string|null $422747X942X32036017_02
 * @property string|null $422747X942X32036018_01
 * @property string|null $422747X942X32036018_02
 * @property string|null $422747X942X32036019_01
 * @property string|null $422747X942X32036019_02
 * @property string|null $422747X942X32036020_01
 * @property string|null $422747X942X32036020_02
 * @property string|null $422747X942X32042
 * @property string|null $422747X942X32043
 * @property string|null $422747X942X32044023_001
 * @property string|null $422747X942X32044023_002
 * @property string|null $422747X942X32045
 * @property string|null $422747X942X32046025_001
 * @property string|null $422747X942X32046025_002
 * @property string|null $422747X943X32037
 * @property string|null $422747X943X32047
 * @property string|null $422747X943X32048
 * @property string|null $422747X943X320491
 * @property string|null $422747X943X320492
 * @property string|null $422747X943X320493
 * @property string|null $422747X943X320494
 * @property string|null $422747X943X320495
 * @property string|null $422747X943X320496
 * @property string|null $422747X943X320497
 * @property string|null $422747X943X320498
 * @property string|null $422747X943X320499
 * @property string|null $422747X944X32038
 * @property string|null $422747X944X32039
 * @property string|null $422747X944X32040
 * @property string|null $422747X944X32040other
 * @property string|null $422747X944X32041
 * @property string|null $422747X944X32052
 * @property string|null $422747X944X32050
 * @property string|null $422747X945X32051
 * @property string|null $422747X945X32053
 * @property Carbon|null $422747X945X32054
 * @property Carbon|null $422747X945X32055
 * @property string|null $422747X945X32057
 * @property string|null $422747X945X32058
 * @property string|null $422747X945X32058other
 *
 * @method static CachedBuilder|LimeSurvey422747 where422747X941X32033($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X941X32034($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X941X32034other($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X941X32035($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X941X32056($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600401($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600402($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600501($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600502($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600601($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600602($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600701($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600702($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600801($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600802($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600901($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203600902($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601001($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601002($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601101($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601102($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601201($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601202($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601301($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601302($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601401($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601402($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601501($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601502($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601601($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601602($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601701($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601702($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601801($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601802($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601901($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203601902($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203602001($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X3203602002($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X32042($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X32043($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X32044023001($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X32044023002($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X32045($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X32046025001($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X942X32046025002($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X32037($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X32047($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X32048($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X320491($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X320492($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X320493($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X320494($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X320495($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X320496($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X320497($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X320498($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X943X320499($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X944X32038($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X944X32039($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X944X32040($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X944X32040other($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X944X32041($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X944X32050($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X944X32052($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X945X32051($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X945X32053($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X945X32054($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X945X32055($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X945X32057($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X945X32058($value)
 * @method static CachedBuilder|LimeSurvey422747 where422747X945X32058other($value)
 * @method static CachedBuilder|LimeSurvey422747 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey422747 whereId($value)
 * @method static CachedBuilder|LimeSurvey422747 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey422747 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey422747 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey422747 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey422747 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey422747 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey422747 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey422747 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_422747';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '422747X941X32056', '422747X941X32033', '422747X941X32034', '422747X941X32034other', '422747X941X32035', '422747X942X32036004_01', '422747X942X32036004_02', '422747X942X32036005_01', '422747X942X32036005_02', '422747X942X32036006_01', '422747X942X32036006_02', '422747X942X32036007_01', '422747X942X32036007_02', '422747X942X32036008_01', '422747X942X32036008_02', '422747X942X32036009_01', '422747X942X32036009_02', '422747X942X32036010_01', '422747X942X32036010_02', '422747X942X32036011_01', '422747X942X32036011_02', '422747X942X32036012_01', '422747X942X32036012_02', '422747X942X32036013_01', '422747X942X32036013_02', '422747X942X32036014_01', '422747X942X32036014_02', '422747X942X32036015_01', '422747X942X32036015_02', '422747X942X32036016_01', '422747X942X32036016_02', '422747X942X32036017_01', '422747X942X32036017_02', '422747X942X32036018_01', '422747X942X32036018_02', '422747X942X32036019_01', '422747X942X32036019_02', '422747X942X32036020_01', '422747X942X32036020_02', '422747X942X32042', '422747X942X32043', '422747X942X32044023_001', '422747X942X32044023_002', '422747X942X32045', '422747X942X32046025_001', '422747X942X32046025_002', '422747X943X32037', '422747X943X32047', '422747X943X32048', '422747X943X320491', '422747X943X320492', '422747X943X320493', '422747X943X320494', '422747X943X320495', '422747X943X320496', '422747X943X320497', '422747X943X320498', '422747X943X320499', '422747X944X32038', '422747X944X32039', '422747X944X32040', '422747X944X32040other', '422747X944X32041', '422747X944X32052', '422747X944X32050', '422747X945X32051', '422747X945X32053', '422747X945X32054', '422747X945X32055', '422747X945X32057', '422747X945X32058', '422747X945X32058other',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '422747X941X32056' => 'string', '422747X941X32033' => 'string', '422747X941X32034' => 'string', '422747X941X32034other' => 'string', '422747X941X32035' => 'string', '422747X942X32036004_01' => 'string', '422747X942X32036004_02' => 'string', '422747X942X32036005_01' => 'string', '422747X942X32036005_02' => 'string', '422747X942X32036006_01' => 'string', '422747X942X32036006_02' => 'string', '422747X942X32036007_01' => 'string', '422747X942X32036007_02' => 'string', '422747X942X32036008_01' => 'string', '422747X942X32036008_02' => 'string', '422747X942X32036009_01' => 'string', '422747X942X32036009_02' => 'string', '422747X942X32036010_01' => 'string', '422747X942X32036010_02' => 'string', '422747X942X32036011_01' => 'string', '422747X942X32036011_02' => 'string', '422747X942X32036012_01' => 'string', '422747X942X32036012_02' => 'string', '422747X942X32036013_01' => 'string', '422747X942X32036013_02' => 'string', '422747X942X32036014_01' => 'string', '422747X942X32036014_02' => 'string', '422747X942X32036015_01' => 'string', '422747X942X32036015_02' => 'string', '422747X942X32036016_01' => 'string', '422747X942X32036016_02' => 'string', '422747X942X32036017_01' => 'string', '422747X942X32036017_02' => 'string', '422747X942X32036018_01' => 'string', '422747X942X32036018_02' => 'string', '422747X942X32036019_01' => 'string', '422747X942X32036019_02' => 'string', '422747X942X32036020_01' => 'string', '422747X942X32036020_02' => 'string', '422747X942X32042' => 'string', '422747X942X32043' => 'string', '422747X942X32044023_001' => 'string', '422747X942X32044023_002' => 'string', '422747X942X32045' => 'string', '422747X942X32046025_001' => 'string', '422747X942X32046025_002' => 'string', '422747X943X32037' => 'string', '422747X943X32047' => 'string', '422747X943X32048' => 'string', '422747X943X320491' => 'string', '422747X943X320492' => 'string', '422747X943X320493' => 'string', '422747X943X320494' => 'string', '422747X943X320495' => 'string', '422747X943X320496' => 'string', '422747X943X320497' => 'string', '422747X943X320498' => 'string', '422747X943X320499' => 'string', '422747X944X32038' => 'string', '422747X944X32039' => 'string', '422747X944X32040' => 'string', '422747X944X32040other' => 'string', '422747X944X32041' => 'string', '422747X944X32052' => 'string', '422747X944X32050' => 'string', '422747X945X32051' => 'string', '422747X945X32053' => 'string', '422747X945X32054' => 'datetime', '422747X945X32055' => 'datetime', '422747X945X32057' => 'string', '422747X945X32058' => 'string', '422747X945X32058other' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
