<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey821423Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey821423
 *
 * @method static CachedBuilder|LimeSurvey821423 all($columns = [])
 * @method static CachedBuilder|LimeSurvey821423 avg($column)
 * @method static CachedBuilder|LimeSurvey821423 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey821423 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey821423 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey821423 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey821423 exists()
 * @method static LimeSurvey821423Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey821423 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey821423 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey821423 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey821423 insert(array $values)
 * @method static CachedBuilder|LimeSurvey821423 isCachable()
 * @method static CachedBuilder|LimeSurvey821423 max($column)
 * @method static CachedBuilder|LimeSurvey821423 min($column)
 * @method static CachedBuilder|LimeSurvey821423 newModelQuery()
 * @method static CachedBuilder|LimeSurvey821423 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey821423 query()
 * @method static CachedBuilder|LimeSurvey821423 sum($column)
 * @method static CachedBuilder|LimeSurvey821423 truncate()
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
 * @property string|null $821423X959X33848SQ001
 * @property string|null $821423X959X32256
 * @property string|null $821423X959X32256other
 * @property string|null $821423X971X32334
 * @property string|null $821423X972X32257SQ001
 * @property string|null $821423X972X32257SQ002
 * @property string|null $821423X972X32257SQ003
 * @property string|null $821423X972X32257SQ004
 * @property string|null $821423X972X32257SQ005
 * @property string|null $821423X972X32257SQ006
 * @property string|null $821423X972X32257SQ007
 * @property string|null $821423X972X32257SQ008
 * @property string|null $821423X972X32257SQ009
 * @property string|null $821423X972X32257SQ010
 * @property string|null $821423X972X32257SQ011
 * @property string|null $821423X972X32347SQ001
 * @property string|null $821423X972X32347SQ002
 * @property string|null $821423X972X32347SQ003
 * @property string|null $821423X972X32347SQ004
 * @property string|null $821423X972X32347SQ005
 * @property string|null $821423X972X32347SQ006
 * @property string|null $821423X972X32347SQ007
 * @property string|null $821423X972X32347SQ008
 * @property string|null $821423X972X32347SQ009
 * @property string|null $821423X972X32347SQ010
 * @property string|null $821423X972X32347SQ011
 * @property string|null $821423X972X32359SQ001
 * @property string|null $821423X972X32372
 * @property string|null $821423X966X32375
 * @property string|null $821423X966X32376
 * @property string|null $821423X966X32376other
 * @property string|null $821423X966X323771
 * @property string|null $821423X966X323772
 * @property string|null $821423X966X323773
 * @property string|null $821423X966X323774
 * @property string|null $821423X966X323775
 * @property string|null $821423X966X323776
 * @property string|null $821423X966X323777
 * @property string|null $821423X966X323778
 * @property string|null $821423X966X323779
 * @property string|null $821423X966X3237710
 * @property string|null $821423X966X3237711
 * @property string|null $821423X966X32612
 * @property string|null $821423X967X32378SQ001
 * @property string|null $821423X967X32380
 * @property string|null $821423X967X32386
 * @property string|null $821423X967X32395SQ001
 * @property string|null $821423X967X32395SQ002
 * @property string|null $821423X967X32395SQ003
 * @property string|null $821423X967X32395SQ004
 * @property string|null $821423X968X32401
 * @property string|null $821423X969X32402SQ001
 * @property string|null $821423X969X32402SQ002
 * @property string|null $821423X969X32402SQ003
 * @property string|null $821423X969X32402SQ004
 * @property string|null $821423X969X32402SQ005
 * @property string|null $821423X969X32402SQ006
 * @property string|null $821423X969X32409
 * @property string|null $821423X969X32415SQ001
 * @property string|null $821423X969X32415SQ002
 * @property string|null $821423X969X32415SQ003
 * @property string|null $821423X969X32415SQ004
 * @property string|null $821423X969X32427SQ001
 * @property string|null $821423X969X32427SQ002
 * @property string|null $821423X969X32427SQ003
 * @property string|null $821423X969X32427SQ004
 * @property string|null $821423X970X32439
 * @property string|null $821423X970X32440
 * @property string|null $821423X970X32446
 * @property string|null $821423X970X32447
 * @property string|null $821423X970X32448
 * @property string|null $821423X970X32449
 *
 * @method static CachedBuilder|LimeSurvey821423 where821423X959X32256($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X959X32256other($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X959X33848SQ001($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X32375($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X32376($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X32376other($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X323771($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X3237710($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X3237711($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X323772($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X323773($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X323774($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X323775($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X323776($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X323777($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X323778($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X323779($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X966X32612($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X967X32378SQ001($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X967X32380($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X967X32386($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X967X32395SQ001($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X967X32395SQ002($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X967X32395SQ003($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X967X32395SQ004($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X968X32401($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32402SQ001($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32402SQ002($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32402SQ003($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32402SQ004($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32402SQ005($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32402SQ006($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32409($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32415SQ001($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32415SQ002($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32415SQ003($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32415SQ004($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32427SQ001($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32427SQ002($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32427SQ003($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X969X32427SQ004($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X970X32439($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X970X32440($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X970X32446($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X970X32447($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X970X32448($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X970X32449($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X971X32334($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ001($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ002($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ003($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ004($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ005($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ006($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ007($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ008($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ009($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ010($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32257SQ011($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ001($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ002($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ003($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ004($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ005($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ006($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ007($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ008($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ009($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ010($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32347SQ011($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32359SQ001($value)
 * @method static CachedBuilder|LimeSurvey821423 where821423X972X32372($value)
 * @method static CachedBuilder|LimeSurvey821423 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey821423 whereId($value)
 * @method static CachedBuilder|LimeSurvey821423 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey821423 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey821423 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey821423 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey821423 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey821423 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey821423 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_821423';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', '821423X959X32256', '821423X959X32256other', '821423X971X32334', '821423X972X32257SQ001', '821423X972X32257SQ002', '821423X972X32257SQ003', '821423X972X32257SQ004', '821423X972X32257SQ005', '821423X972X32257SQ006', '821423X972X32257SQ007', '821423X972X32257SQ008', '821423X972X32257SQ009', '821423X972X32257SQ010', '821423X972X32257SQ011', '821423X972X32347SQ001', '821423X972X32347SQ002', '821423X972X32347SQ003', '821423X972X32347SQ004', '821423X972X32347SQ005', '821423X972X32347SQ006', '821423X972X32347SQ007', '821423X972X32347SQ008', '821423X972X32347SQ009', '821423X972X32347SQ010', '821423X972X32347SQ011', '821423X972X32359SQ001', '821423X972X32372', '821423X966X32375', '821423X966X32376', '821423X966X32376other', '821423X966X323771', '821423X966X323772', '821423X966X323773', '821423X966X323774', '821423X966X323775', '821423X966X323776', '821423X966X323777', '821423X966X323778', '821423X966X323779', '821423X966X3237710', '821423X966X3237711', '821423X966X32612', '821423X967X32378SQ001', '821423X967X32380', '821423X967X32386', '821423X967X32395SQ001', '821423X967X32395SQ002', '821423X967X32395SQ003', '821423X967X32395SQ004', '821423X968X32401', '821423X969X32402SQ001', '821423X969X32402SQ002', '821423X969X32402SQ003', '821423X969X32402SQ004', '821423X969X32402SQ005', '821423X969X32402SQ006', '821423X969X32409', '821423X969X32415SQ001', '821423X969X32415SQ002', '821423X969X32415SQ003', '821423X969X32415SQ004', '821423X969X32427SQ001', '821423X969X32427SQ002', '821423X969X32427SQ003', '821423X969X32427SQ004', '821423X970X32439', '821423X970X32440', '821423X970X32446', '821423X970X32447', '821423X970X32448', '821423X970X32449',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', '821423X959X32256' => 'string', '821423X959X32256other' => 'string', '821423X971X32334' => 'string', '821423X972X32257SQ001' => 'string', '821423X972X32257SQ002' => 'string', '821423X972X32257SQ003' => 'string', '821423X972X32257SQ004' => 'string', '821423X972X32257SQ005' => 'string', '821423X972X32257SQ006' => 'string', '821423X972X32257SQ007' => 'string', '821423X972X32257SQ008' => 'string', '821423X972X32257SQ009' => 'string', '821423X972X32257SQ010' => 'string', '821423X972X32257SQ011' => 'string', '821423X972X32347SQ001' => 'string', '821423X972X32347SQ002' => 'string', '821423X972X32347SQ003' => 'string', '821423X972X32347SQ004' => 'string', '821423X972X32347SQ005' => 'string', '821423X972X32347SQ006' => 'string', '821423X972X32347SQ007' => 'string', '821423X972X32347SQ008' => 'string', '821423X972X32347SQ009' => 'string', '821423X972X32347SQ010' => 'string', '821423X972X32347SQ011' => 'string', '821423X972X32359SQ001' => 'string', '821423X972X32372' => 'string', '821423X966X32375' => 'string', '821423X966X32376' => 'string', '821423X966X32376other' => 'string', '821423X966X323771' => 'string', '821423X966X323772' => 'string', '821423X966X323773' => 'string', '821423X966X323774' => 'string', '821423X966X323775' => 'string', '821423X966X323776' => 'string', '821423X966X323777' => 'string', '821423X966X323778' => 'string', '821423X966X323779' => 'string', '821423X966X3237710' => 'string', '821423X966X3237711' => 'string', '821423X966X32612' => 'string', '821423X967X32378SQ001' => 'string', '821423X967X32380' => 'string', '821423X967X32386' => 'string', '821423X967X32395SQ001' => 'string', '821423X967X32395SQ002' => 'string', '821423X967X32395SQ003' => 'string', '821423X967X32395SQ004' => 'string', '821423X968X32401' => 'string', '821423X969X32402SQ001' => 'string', '821423X969X32402SQ002' => 'string', '821423X969X32402SQ003' => 'string', '821423X969X32402SQ004' => 'string', '821423X969X32402SQ005' => 'string', '821423X969X32402SQ006' => 'string', '821423X969X32409' => 'string', '821423X969X32415SQ001' => 'string', '821423X969X32415SQ002' => 'string', '821423X969X32415SQ003' => 'string', '821423X969X32415SQ004' => 'string', '821423X969X32427SQ001' => 'string', '821423X969X32427SQ002' => 'string', '821423X969X32427SQ003' => 'string', '821423X969X32427SQ004' => 'string', '821423X970X32439' => 'string', '821423X970X32440' => 'string', '821423X970X32446' => 'string', '821423X970X32447' => 'string', '821423X970X32448' => 'string', '821423X970X32449' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
