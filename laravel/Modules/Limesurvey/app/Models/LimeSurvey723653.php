<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey723653Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey723653
 *
 * @method static CachedBuilder|LimeSurvey723653 all($columns = [])
 * @method static CachedBuilder|LimeSurvey723653 avg($column)
 * @method static CachedBuilder|LimeSurvey723653 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey723653 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey723653 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey723653 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey723653 exists()
 * @method static LimeSurvey723653Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey723653 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey723653 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey723653 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey723653 insert(array $values)
 * @method static CachedBuilder|LimeSurvey723653 isCachable()
 * @method static CachedBuilder|LimeSurvey723653 max($column)
 * @method static CachedBuilder|LimeSurvey723653 min($column)
 * @method static CachedBuilder|LimeSurvey723653 newModelQuery()
 * @method static CachedBuilder|LimeSurvey723653 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey723653 query()
 * @method static CachedBuilder|LimeSurvey723653 sum($column)
 * @method static CachedBuilder|LimeSurvey723653 truncate()
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
 * @property string|null $723653X434X26682
 * @property string|null $723653X434X26683
 * @property string|null $723653X435X26727
 * @property string|null $723653X435X26684
 * @property string|null $723653X435X26685
 * @property string|null $723653X435X26686
 * @property string|null $723653X435X26687
 * @property string|null $723653X435X26688
 * @property string|null $723653X435X26689
 * @property string|null $723653X435X26690
 * @property string|null $723653X435X26691
 * @property string|null $723653X435X26692SQ001
 * @property string|null $723653X435X26693
 * @property string|null $723653X436X26728
 * @property string|null $723653X436X26694
 * @property string|null $723653X436X26695
 * @property string|null $723653X436X26696
 * @property string|null $723653X436X26697
 * @property string|null $723653X436X26698
 * @property string|null $723653X436X26699
 * @property string|null $723653X436X26700SQ001
 * @property string|null $723653X436X26701
 * @property string|null $723653X436X26702SQ001
 * @property string|null $723653X436X26703
 * @property string|null $723653X437X26729
 * @property string|null $723653X437X26704
 * @property string|null $723653X437X26732SQ001
 * @property string|null $723653X437X26733
 * @property string|null $723653X437X26705
 * @property string|null $723653X437X26710
 * @property string|null $723653X437X26706
 * @property string|null $723653X437X26707
 * @property string|null $723653X437X26711
 * @property string|null $723653X437X26712
 * @property string|null $723653X437X26713
 * @property string|null $723653X437X26714
 * @property string|null $723653X437X26708SQ001
 * @property string|null $723653X437X26709
 * @property string|null $723653X438X26715
 * @property string|null $723653X438X26716
 * @property string|null $723653X438X26716other
 * @property string|null $723653X438X26717
 * @property string|null $723653X438X26718SQ001
 * @property string|null $723653X438X26719
 * @property string|null $723653X439X26724
 * @property string|null $723653X439X26720SQ001
 * @property string|null $723653X439X26721
 * @property string|null $723653X439X26725SQ001
 * @property string|null $723653X439X26726
 * @property string|null $723653X439X26722SQ001
 * @property string|null $723653X439X26723
 * @property string|null $723653X440X26731
 * @property string|null $723653X440X26730
 *
 * @method static CachedBuilder|LimeSurvey723653 where723653X434X26682($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X434X26683($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26684($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26685($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26686($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26687($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26688($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26689($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26690($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26691($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26692SQ001($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26693($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X435X26727($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26694($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26695($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26696($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26697($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26698($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26699($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26700SQ001($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26701($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26702SQ001($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26703($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X436X26728($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26704($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26705($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26706($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26707($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26708SQ001($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26709($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26710($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26711($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26712($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26713($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26714($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26729($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26732SQ001($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X437X26733($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X438X26715($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X438X26716($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X438X26716other($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X438X26717($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X438X26718SQ001($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X438X26719($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X439X26720SQ001($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X439X26721($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X439X26722SQ001($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X439X26723($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X439X26724($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X439X26725SQ001($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X439X26726($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X440X26730($value)
 * @method static CachedBuilder|LimeSurvey723653 where723653X440X26731($value)
 * @method static CachedBuilder|LimeSurvey723653 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey723653 whereId($value)
 * @method static CachedBuilder|LimeSurvey723653 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey723653 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey723653 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey723653 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey723653 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey723653 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey723653 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_723653';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', '723653X434X26682', '723653X434X26683', '723653X435X26727', '723653X435X26684', '723653X435X26685', '723653X435X26686', '723653X435X26687', '723653X435X26688', '723653X435X26689', '723653X435X26690', '723653X435X26691', '723653X435X26692SQ001', '723653X435X26693', '723653X436X26728', '723653X436X26694', '723653X436X26695', '723653X436X26696', '723653X436X26697', '723653X436X26698', '723653X436X26699', '723653X436X26700SQ001', '723653X436X26701', '723653X436X26702SQ001', '723653X436X26703', '723653X437X26729', '723653X437X26704', '723653X437X26732SQ001', '723653X437X26733', '723653X437X26705', '723653X437X26710', '723653X437X26706', '723653X437X26707', '723653X437X26711', '723653X437X26712', '723653X437X26713', '723653X437X26714', '723653X437X26708SQ001', '723653X437X26709', '723653X438X26715', '723653X438X26716', '723653X438X26716other', '723653X438X26717', '723653X438X26718SQ001', '723653X438X26719', '723653X439X26724', '723653X439X26720SQ001', '723653X439X26721', '723653X439X26725SQ001', '723653X439X26726', '723653X439X26722SQ001', '723653X439X26723', '723653X440X26731', '723653X440X26730',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', '723653X434X26682' => 'string', '723653X434X26683' => 'string', '723653X435X26727' => 'string', '723653X435X26684' => 'string', '723653X435X26685' => 'string', '723653X435X26686' => 'string', '723653X435X26687' => 'string', '723653X435X26688' => 'string', '723653X435X26689' => 'string', '723653X435X26690' => 'string', '723653X435X26691' => 'string', '723653X435X26692SQ001' => 'string', '723653X435X26693' => 'string', '723653X436X26728' => 'string', '723653X436X26694' => 'string', '723653X436X26695' => 'string', '723653X436X26696' => 'string', '723653X436X26697' => 'string', '723653X436X26698' => 'string', '723653X436X26699' => 'string', '723653X436X26700SQ001' => 'string', '723653X436X26701' => 'string', '723653X436X26702SQ001' => 'string', '723653X436X26703' => 'string', '723653X437X26729' => 'string', '723653X437X26704' => 'string', '723653X437X26732SQ001' => 'string', '723653X437X26733' => 'string', '723653X437X26710' => 'string', '723653X437X26706' => 'string', '723653X437X26707' => 'string', '723653X437X26711' => 'string', '723653X437X26712' => 'string', '723653X437X26713' => 'string', '723653X437X26714' => 'string', '723653X437X26708SQ001' => 'string', '723653X437X26709' => 'string', '723653X438X26715' => 'string', '723653X438X26716' => 'string', '723653X438X26716other' => 'string', '723653X438X26717' => 'string', '723653X438X26718SQ001' => 'string', '723653X438X26719' => 'string', '723653X439X26724' => 'string', '723653X439X26720SQ001' => 'string', '723653X439X26721' => 'string', '723653X439X26725SQ001' => 'string', '723653X439X26726' => 'string', '723653X439X26722SQ001' => 'string', '723653X439X26723' => 'string', '723653X440X26731' => 'string', '723653X440X26730' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
