<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey657328Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey657328
 *
 * @method static CachedBuilder|LimeSurvey657328 all($columns = [])
 * @method static CachedBuilder|LimeSurvey657328 avg($column)
 * @method static CachedBuilder|LimeSurvey657328 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey657328 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey657328 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey657328 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey657328 exists()
 * @method static LimeSurvey657328Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey657328 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey657328 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey657328 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey657328 insert(array $values)
 * @method static CachedBuilder|LimeSurvey657328 isCachable()
 * @method static CachedBuilder|LimeSurvey657328 max($column)
 * @method static CachedBuilder|LimeSurvey657328 min($column)
 * @method static CachedBuilder|LimeSurvey657328 newModelQuery()
 * @method static CachedBuilder|LimeSurvey657328 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey657328 query()
 * @method static CachedBuilder|LimeSurvey657328 sum($column)
 * @method static CachedBuilder|LimeSurvey657328 truncate()
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
 * @property string|null $657328X657X29081
 * @property string|null $657328X657X29080
 * @property string|null $657328X657X28842
 * @property string|null $657328X657X28843SQ001
 * @property string|null $657328X657X28843SQ002
 * @property string|null $657328X657X28843SQ003
 * @property string|null $657328X657X28843SQ004
 * @property string|null $657328X657X28843SQ005
 * @property string|null $657328X657X28843SQ006
 * @property string|null $657328X657X28843SQ007
 * @property string|null $657328X658X28844
 * @property string|null $657328X658X28845
 * @property string|null $657328X658X28921SQ001
 * @property string|null $657328X658X28921SQ002
 * @property string|null $657328X658X28921SQ003
 * @property string|null $657328X658X28921SQ004
 * @property string|null $657328X658X28921SQ005
 * @property string|null $657328X658X28929
 * @property string|null $657328X658X28930
 * @property string|null $657328X658X28852SQ001
 * @property string|null $657328X658X28853
 * @property string|null $657328X659X28854
 * @property string|null $657328X659X28855
 * @property string|null $657328X659X28931SQ001
 * @property string|null $657328X659X28931SQ002
 * @property string|null $657328X659X28931SQ003
 * @property string|null $657328X659X28858
 * @property string|null $657328X659X28940SQ001
 * @property string|null $657328X659X28940SQ002
 * @property string|null $657328X659X28940SQ003
 * @property string|null $657328X659X28947
 * @property string|null $657328X659X28948
 * @property string|null $657328X659X28862SQ001
 * @property string|null $657328X659X28863
 * @property string|null $657328X660X28864
 * @property string|null $657328X660X28892SQ001
 * @property string|null $657328X660X28893
 * @property string|null $657328X660X28949SQ001
 * @property string|null $657328X660X28949SQ002
 * @property string|null $657328X660X28949SQ003
 * @property string|null $657328X660X28949SQ004
 * @property string|null $657328X660X28949SQ005
 * @property string|null $657328X660X28949SQ006
 * @property string|null $657328X660X28959
 * @property string|null $657328X660X28960
 * @property string|null $657328X660X28868SQ001
 * @property string|null $657328X660X28961
 * @property string|null $657328X664X28962SQ001
 * @property string|null $657328X664X28962SQ002
 * @property string|null $657328X664X28962SQ003
 * @property string|null $657328X664X28962SQ004
 * @property string|null $657328X664X28962SQ005
 * @property string|null $657328X664X28980
 * @property string|null $657328X664X28981
 * @property string|null $657328X664X28965SQ001
 * @property string|null $657328X664X28966
 * @property string|null $657328X661X28982SQ001
 * @property string|null $657328X661X28982SQ002
 * @property string|null $657328X661X28982SQ003
 * @property string|null $657328X661X28982SQ004
 * @property string|null $657328X661X28982SQ005
 * @property string|null $657328X661X28993
 * @property string|null $657328X661X28994
 * @property string|null $657328X661X28878SQ001
 * @property string|null $657328X661X29041
 * @property string|null $657328X665X28968
 * @property string|null $657328X665X28969
 * @property string|null $657328X665X28969other
 * @property string|null $657328X665X28995
 * @property string|null $657328X665X28996SQ001
 * @property string|null $657328X665X28996SQ002
 * @property string|null $657328X665X29004
 * @property string|null $657328X665X29005
 * @property string|null $657328X665X28971SQ001
 * @property string|null $657328X665X28972
 * @property string|null $657328X662X28880
 * @property string|null $657328X662X28881SQ001
 * @property string|null $657328X662X28881SQ002
 * @property string|null $657328X662X28881SQ003
 * @property string|null $657328X662X28881SQ004
 * @property string|null $657328X662X28881SQ005
 * @property string|null $657328X662X28881SQ006
 * @property string|null $657328X662X28881other
 * @property string|null $657328X662X29012
 * @property string|null $657328X662X29012other
 * @property string|null $657328X662X29018SQ001
 * @property string|null $657328X662X29018SQ002
 * @property string|null $657328X662X29018SQ003
 * @property string|null $657328X662X29018SQ004
 * @property string|null $657328X662X29018SQ005
 * @property string|null $657328X662X29029
 * @property string|null $657328X662X28882SQ001
 * @property string|null $657328X662X28883
 * @property string|null $657328X663X28890
 * @property string|null $657328X663X28891
 * @property string|null $657328X663X29030
 *
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X28842($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X28843SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X28843SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X28843SQ003($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X28843SQ004($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X28843SQ005($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X28843SQ006($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X28843SQ007($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X29080($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X657X29081($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28844($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28845($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28852SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28853($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28921SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28921SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28921SQ003($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28921SQ004($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28921SQ005($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28929($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X658X28930($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28854($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28855($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28858($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28862SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28863($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28931SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28931SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28931SQ003($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28940SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28940SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28940SQ003($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28947($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X659X28948($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28864($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28868SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28892SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28893($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28949SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28949SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28949SQ003($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28949SQ004($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28949SQ005($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28949SQ006($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28959($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28960($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X660X28961($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X661X28878SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X661X28982SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X661X28982SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X661X28982SQ003($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X661X28982SQ004($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X661X28982SQ005($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X661X28993($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X661X28994($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X661X29041($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28880($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28881SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28881SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28881SQ003($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28881SQ004($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28881SQ005($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28881SQ006($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28881other($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28882SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X28883($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X29012($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X29012other($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X29018SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X29018SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X29018SQ003($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X29018SQ004($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X29018SQ005($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X662X29029($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X663X28890($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X663X28891($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X663X29030($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X664X28962SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X664X28962SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X664X28962SQ003($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X664X28962SQ004($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X664X28962SQ005($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X664X28965SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X664X28966($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X664X28980($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X664X28981($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X28968($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X28969($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X28969other($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X28971SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X28972($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X28995($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X28996SQ001($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X28996SQ002($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X29004($value)
 * @method static CachedBuilder|LimeSurvey657328 where657328X665X29005($value)
 * @method static CachedBuilder|LimeSurvey657328 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey657328 whereId($value)
 * @method static CachedBuilder|LimeSurvey657328 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey657328 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey657328 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey657328 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey657328 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey657328 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey657328 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_657328';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', '657328X657X29081', '657328X657X29080', '657328X657X28842', '657328X657X28843SQ001', '657328X657X28843SQ002', '657328X657X28843SQ003', '657328X657X28843SQ004', '657328X657X28843SQ005', '657328X657X28843SQ006', '657328X657X28843SQ007', '657328X658X28844', '657328X658X28845', '657328X658X28921SQ001', '657328X658X28921SQ002', '657328X658X28921SQ003', '657328X658X28921SQ004', '657328X658X28921SQ005', '657328X658X28929', '657328X658X28930', '657328X658X28852SQ001', '657328X658X28853', '657328X659X28854', '657328X659X28855', '657328X659X28931SQ001', '657328X659X28931SQ002', '657328X659X28931SQ003', '657328X659X28858', '657328X659X28940SQ001', '657328X659X28940SQ002', '657328X659X28940SQ003', '657328X659X28947', '657328X659X28948', '657328X659X28862SQ001', '657328X659X28863', '657328X660X28864', '657328X660X28892SQ001', '657328X660X28893', '657328X660X28949SQ001', '657328X660X28949SQ002', '657328X660X28949SQ003', '657328X660X28949SQ004', '657328X660X28949SQ005', '657328X660X28949SQ006', '657328X660X28959', '657328X660X28960', '657328X660X28868SQ001', '657328X660X28961', '657328X664X28962SQ001', '657328X664X28962SQ002', '657328X664X28962SQ003', '657328X664X28962SQ004', '657328X664X28962SQ005', '657328X664X28980', '657328X664X28981', '657328X664X28965SQ001', '657328X664X28966', '657328X661X28982SQ001', '657328X661X28982SQ002', '657328X661X28982SQ003', '657328X661X28982SQ004', '657328X661X28982SQ005', '657328X661X28993', '657328X661X28994', '657328X661X28878SQ001', '657328X661X29041', '657328X665X28968', '657328X665X28969', '657328X665X28969other', '657328X665X28995', '657328X665X28996SQ001', '657328X665X28996SQ002', '657328X665X29004', '657328X665X29005', '657328X665X28971SQ001', '657328X665X28972', '657328X662X28880', '657328X662X28881SQ001', '657328X662X28881SQ002', '657328X662X28881SQ003', '657328X662X28881SQ004', '657328X662X28881SQ005', '657328X662X28881SQ006', '657328X662X28881other', '657328X662X29012', '657328X662X29012other', '657328X662X29018SQ001', '657328X662X29018SQ002', '657328X662X29018SQ003', '657328X662X29018SQ004', '657328X662X29018SQ005', '657328X662X29029', '657328X662X28882SQ001', '657328X662X28883', '657328X663X28890', '657328X663X28891', '657328X663X29030',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', '657328X657X29081' => 'string', '657328X657X29080' => 'string', '657328X657X28842' => 'string', '657328X657X28843SQ001' => 'string', '657328X657X28843SQ002' => 'string', '657328X657X28843SQ003' => 'string', '657328X657X28843SQ004' => 'string', '657328X657X28843SQ005' => 'string', '657328X657X28843SQ006' => 'string', '657328X657X28843SQ007' => 'string', '657328X658X28844' => 'string', '657328X658X28845' => 'string', '657328X658X28921SQ001' => 'string', '657328X658X28921SQ002' => 'string', '657328X658X28921SQ003' => 'string', '657328X658X28921SQ004' => 'string', '657328X658X28921SQ005' => 'string', '657328X658X28929' => 'string', '657328X658X28930' => 'string', '657328X658X28852SQ001' => 'string', '657328X658X28853' => 'string', '657328X659X28854' => 'string', '657328X659X28855' => 'string', '657328X659X28931SQ001' => 'string', '657328X659X28931SQ002' => 'string', '657328X659X28931SQ003' => 'string', '657328X659X28858' => 'string', '657328X659X28940SQ001' => 'string', '657328X659X28940SQ002' => 'string', '657328X659X28940SQ003' => 'string', '657328X659X28947' => 'string', '657328X659X28948' => 'string', '657328X659X28862SQ001' => 'string', '657328X659X28863' => 'string', '657328X660X28864' => 'string', '657328X660X28892SQ001' => 'string', '657328X660X28893' => 'string', '657328X660X28949SQ001' => 'string', '657328X660X28949SQ002' => 'string', '657328X660X28949SQ003' => 'string', '657328X660X28949SQ004' => 'string', '657328X660X28949SQ005' => 'string', '657328X660X28949SQ006' => 'string', '657328X660X28959' => 'string', '657328X660X28960' => 'string', '657328X660X28868SQ001' => 'string', '657328X660X28961' => 'string', '657328X664X28962SQ001' => 'string', '657328X664X28962SQ002' => 'string', '657328X664X28962SQ003' => 'string', '657328X664X28962SQ004' => 'string', '657328X664X28962SQ005' => 'string', '657328X664X28980' => 'string', '657328X664X28981' => 'string', '657328X664X28965SQ001' => 'string', '657328X664X28966' => 'string', '657328X661X28982SQ001' => 'string', '657328X661X28982SQ002' => 'string', '657328X661X28982SQ003' => 'string', '657328X661X28982SQ004' => 'string', '657328X661X28982SQ005' => 'string', '657328X661X28993' => 'string', '657328X661X28994' => 'string', '657328X661X28878SQ001' => 'string', '657328X661X29041' => 'string', '657328X665X28968' => 'string', '657328X665X28969' => 'string', '657328X665X28969other' => 'string', '657328X665X28995' => 'string', '657328X665X28996SQ001' => 'string', '657328X665X28996SQ002' => 'string', '657328X665X29004' => 'string', '657328X665X29005' => 'string', '657328X665X28971SQ001' => 'string', '657328X665X28972' => 'string', '657328X662X28880' => 'string', '657328X662X28881SQ001' => 'string', '657328X662X28881SQ002' => 'string', '657328X662X28881SQ003' => 'string', '657328X662X28881SQ004' => 'string', '657328X662X28881SQ005' => 'string', '657328X662X28881SQ006' => 'string', '657328X662X28881other' => 'string', '657328X662X29012' => 'string', '657328X662X29012other' => 'string', '657328X662X29018SQ001' => 'string', '657328X662X29018SQ002' => 'string', '657328X662X29018SQ003' => 'string', '657328X662X29018SQ004' => 'string', '657328X662X29018SQ005' => 'string', '657328X662X29029' => 'string', '657328X662X28882SQ001' => 'string', '657328X662X28883' => 'string', '657328X663X28890' => 'string', '657328X663X28891' => 'string', '657328X663X29030' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
