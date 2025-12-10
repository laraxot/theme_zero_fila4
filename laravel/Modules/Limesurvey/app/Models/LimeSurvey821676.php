<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey821676Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey821676
 *
 * @method static CachedBuilder|LimeSurvey821676 all($columns = [])
 * @method static CachedBuilder|LimeSurvey821676 avg($column)
 * @method static CachedBuilder|LimeSurvey821676 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey821676 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey821676 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey821676 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey821676 exists()
 * @method static LimeSurvey821676Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey821676 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey821676 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey821676 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey821676 insert(array $values)
 * @method static CachedBuilder|LimeSurvey821676 isCachable()
 * @method static CachedBuilder|LimeSurvey821676 max($column)
 * @method static CachedBuilder|LimeSurvey821676 min($column)
 * @method static CachedBuilder|LimeSurvey821676 newModelQuery()
 * @method static CachedBuilder|LimeSurvey821676 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey821676 query()
 * @method static CachedBuilder|LimeSurvey821676 sum($column)
 * @method static CachedBuilder|LimeSurvey821676 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $821676X650X28755
 * @property string|null $821676X650X287811
 * @property string|null $821676X650X287812
 * @property string|null $821676X650X287813
 * @property string|null $821676X650X28781other
 * @property string|null $821676X650X28785
 * @property string|null $821676X650X28786
 * @property string|null $821676X651X28787
 * @property string|null $821676X651X28787other
 * @property string|null $821676X651X29202
 * @property string|null $821676X651X28788
 * @property string|null $821676X651X287891
 * @property string|null $821676X651X287892
 * @property string|null $821676X651X287893
 * @property string|null $821676X651X287894
 * @property string|null $821676X651X28789other
 * @property string|null $821676X651X28794
 * @property string|null $821676X652X28795
 * @property string|null $821676X652X28795other
 * @property string|null $821676X652X29201
 * @property string|null $821676X652X28796
 * @property string|null $821676X652X287971
 * @property string|null $821676X652X287972
 * @property string|null $821676X652X287973
 * @property string|null $821676X652X287974
 * @property string|null $821676X652X28797other
 * @property string|null $821676X652X28802
 * @property string|null $821676X653X28803
 * @property string|null $821676X653X28804
 * @property string|null $821676X653X288051
 * @property string|null $821676X653X288052
 * @property string|null $821676X653X28805other
 * @property string|null $821676X653X28808
 * @property string|null $821676X654X28809
 * @property string|null $821676X654X288101
 * @property string|null $821676X654X288102
 * @property string|null $821676X654X288103
 * @property string|null $821676X654X28810other
 * @property string|null $821676X654X28814
 * @property string|null $821676X654X288151
 * @property string|null $821676X654X288152
 * @property string|null $821676X654X288153
 * @property string|null $821676X654X288154
 * @property string|null $821676X654X28815other
 * @property string|null $821676X654X28820
 * @property string|null $821676X654X28821
 * @property string|null $821676X655X28822
 * @property string|null $821676X655X28823
 * @property string|null $821676X655X28824
 * @property string|null $821676X655X288251
 * @property string|null $821676X655X288252
 * @property string|null $821676X655X288253
 * @property string|null $821676X655X28825other
 * @property string|null $821676X655X28829
 * @property string|null $821676X655X288301
 * @property string|null $821676X655X288302
 * @property string|null $821676X655X288303
 * @property string|null $821676X655X28830other
 * @property string|null $821676X656X288341
 * @property string|null $821676X656X288342
 * @property string|null $821676X656X288343
 * @property string|null $821676X656X288344
 * @property string|null $821676X656X288345
 * @property string|null $821676X656X288346
 * @property string|null $821676X656X28834other
 * @property string|null $821676X656X28841
 *
 * @method static CachedBuilder|LimeSurvey821676 where821676X650X28755($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X650X287811($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X650X287812($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X650X287813($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X650X28781other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X650X28785($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X650X28786($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X28787($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X28787other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X28788($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X287891($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X287892($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X287893($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X287894($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X28789other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X28794($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X651X29202($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X28795($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X28795other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X28796($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X287971($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X287972($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X287973($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X287974($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X28797other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X28802($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X652X29201($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X653X28803($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X653X28804($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X653X288051($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X653X288052($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X653X28805other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X653X28808($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X28809($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X288101($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X288102($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X288103($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X28810other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X28814($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X288151($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X288152($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X288153($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X288154($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X28815other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X28820($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X654X28821($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X28822($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X28823($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X28824($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X288251($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X288252($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X288253($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X28825other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X28829($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X288301($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X288302($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X288303($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X655X28830other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X656X288341($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X656X288342($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X656X288343($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X656X288344($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X656X288345($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X656X288346($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X656X28834other($value)
 * @method static CachedBuilder|LimeSurvey821676 where821676X656X28841($value)
 * @method static CachedBuilder|LimeSurvey821676 whereId($value)
 * @method static CachedBuilder|LimeSurvey821676 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey821676 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey821676 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey821676 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey821676 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey821676 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_821676';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', '821676X650X28755', '821676X650X287811', '821676X650X287812', '821676X650X287813', '821676X650X28781other', '821676X650X28785', '821676X650X28786', '821676X651X28787', '821676X651X28787other', '821676X651X29202', '821676X651X28788', '821676X651X287891', '821676X651X287892', '821676X651X287893', '821676X651X287894', '821676X651X28789other', '821676X651X28794', '821676X652X28795', '821676X652X28795other', '821676X652X29201', '821676X652X28796', '821676X652X287971', '821676X652X287972', '821676X652X287973', '821676X652X287974', '821676X652X28797other', '821676X652X28802', '821676X653X28803', '821676X653X28804', '821676X653X288051', '821676X653X288052', '821676X653X28805other', '821676X653X28808', '821676X654X28809', '821676X654X288101', '821676X654X288102', '821676X654X288103', '821676X654X28810other', '821676X654X28814', '821676X654X288151', '821676X654X288152', '821676X654X288153', '821676X654X288154', '821676X654X28815other', '821676X654X28820', '821676X654X28821', '821676X655X28822', '821676X655X28823', '821676X655X28824', '821676X655X288251', '821676X655X288252', '821676X655X288253', '821676X655X28825other', '821676X655X28829', '821676X655X288301', '821676X655X288302', '821676X655X288303', '821676X655X28830other', '821676X656X288341', '821676X656X288342', '821676X656X288343', '821676X656X288344', '821676X656X288345', '821676X656X288346', '821676X656X28834other', '821676X656X28841',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', '821676X650X28755' => 'string', '821676X650X287811' => 'string', '821676X650X287812' => 'string', '821676X650X287813' => 'string', '821676X650X28781other' => 'string', '821676X650X28785' => 'string', '821676X650X28786' => 'string', '821676X651X28787' => 'string', '821676X651X28787other' => 'string', '821676X651X29202' => 'string', '821676X651X28788' => 'string', '821676X651X287891' => 'string', '821676X651X287892' => 'string', '821676X651X287893' => 'string', '821676X651X287894' => 'string', '821676X651X28789other' => 'string', '821676X651X28794' => 'string', '821676X652X28795' => 'string', '821676X652X28795other' => 'string', '821676X652X29201' => 'string', '821676X652X28796' => 'string', '821676X652X287971' => 'string', '821676X652X287972' => 'string', '821676X652X287973' => 'string', '821676X652X287974' => 'string', '821676X652X28797other' => 'string', '821676X652X28802' => 'string', '821676X653X28803' => 'string', '821676X653X28804' => 'string', '821676X653X288051' => 'string', '821676X653X288052' => 'string', '821676X653X28805other' => 'string', '821676X653X28808' => 'string', '821676X654X28809' => 'string', '821676X654X288101' => 'string', '821676X654X288102' => 'string', '821676X654X288103' => 'string', '821676X654X28810other' => 'string', '821676X654X28814' => 'string', '821676X654X288151' => 'string', '821676X654X288152' => 'string', '821676X654X288153' => 'string', '821676X654X288154' => 'string', '821676X654X28815other' => 'string', '821676X654X28820' => 'string', '821676X654X28821' => 'string', '821676X655X28822' => 'string', '821676X655X28823' => 'string', '821676X655X28824' => 'string', '821676X655X288251' => 'string', '821676X655X288252' => 'string', '821676X655X288253' => 'string', '821676X655X28825other' => 'string', '821676X655X28829' => 'string', '821676X655X288301' => 'string', '821676X655X288302' => 'string', '821676X655X288303' => 'string', '821676X655X28830other' => 'string', '821676X656X288341' => 'string', '821676X656X288342' => 'string', '821676X656X288343' => 'string', '821676X656X288344' => 'string', '821676X656X288345' => 'string', '821676X656X288346' => 'string', '821676X656X28834other' => 'string', '821676X656X28841' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
