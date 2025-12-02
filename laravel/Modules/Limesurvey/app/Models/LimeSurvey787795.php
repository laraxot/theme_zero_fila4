<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey787795Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey787795
 *
 * @method static CachedBuilder|LimeSurvey787795 all($columns = [])
 * @method static CachedBuilder|LimeSurvey787795 avg($column)
 * @method static CachedBuilder|LimeSurvey787795 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey787795 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey787795 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey787795 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey787795 exists()
 * @method static LimeSurvey787795Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey787795 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey787795 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey787795 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey787795 insert(array $values)
 * @method static CachedBuilder|LimeSurvey787795 isCachable()
 * @method static CachedBuilder|LimeSurvey787795 max($column)
 * @method static CachedBuilder|LimeSurvey787795 min($column)
 * @method static CachedBuilder|LimeSurvey787795 newModelQuery()
 * @method static CachedBuilder|LimeSurvey787795 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey787795 query()
 * @method static CachedBuilder|LimeSurvey787795 sum($column)
 * @method static CachedBuilder|LimeSurvey787795 truncate()
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
 * @property string|null $787795X946X32093
 * @property string|null $787795X946X32094
 * @property string|null $787795X947X32138
 * @property string|null $787795X947X32095
 * @property string|null $787795X947X32096
 * @property string|null $787795X947X32097
 * @property string|null $787795X947X32098
 * @property string|null $787795X947X32099
 * @property string|null $787795X947X32100
 * @property string|null $787795X947X32101
 * @property string|null $787795X947X32102
 * @property string|null $787795X947X32103SQ001
 * @property string|null $787795X947X32104SQ001
 * @property string|null $787795X947X32104SQ002
 * @property string|null $787795X947X32104SQ003
 * @property string|null $787795X947X32104SQ004
 * @property string|null $787795X948X32139
 * @property string|null $787795X948X32105
 * @property string|null $787795X948X32106
 * @property string|null $787795X948X32107
 * @property string|null $787795X948X32108
 * @property string|null $787795X948X32109
 * @property string|null $787795X948X32110
 * @property string|null $787795X948X32111SQ001
 * @property string|null $787795X948X32112
 * @property string|null $787795X948X32113SQ001
 * @property string|null $787795X948X32114SQ001
 * @property string|null $787795X948X32114SQ002
 * @property string|null $787795X948X32114SQ003
 * @property string|null $787795X948X32114SQ004
 * @property string|null $787795X949X32140
 * @property string|null $787795X949X32115
 * @property string|null $787795X949X32143SQ001
 * @property string|null $787795X949X32144
 * @property string|null $787795X949X32116
 * @property string|null $787795X949X32121
 * @property string|null $787795X949X32117
 * @property string|null $787795X949X32118
 * @property string|null $787795X949X32122
 * @property string|null $787795X949X32123
 * @property string|null $787795X949X32124
 * @property string|null $787795X949X32125
 * @property string|null $787795X949X32119SQ001
 * @property string|null $787795X949X32120SQ001
 * @property string|null $787795X949X32120SQ002
 * @property string|null $787795X949X32120SQ003
 * @property string|null $787795X949X32120SQ004
 * @property string|null $787795X949X32120SQ005
 * @property string|null $787795X950X32126
 * @property string|null $787795X950X32127
 * @property string|null $787795X950X32127other
 * @property string|null $787795X950X32128
 * @property string|null $787795X950X32129SQ001
 * @property string|null $787795X950X32130SQ001
 * @property string|null $787795X950X32130SQ002
 * @property string|null $787795X951X32135
 * @property string|null $787795X951X32131SQ001
 * @property string|null $787795X951X32132
 * @property string|null $787795X951X32136SQ001
 * @property string|null $787795X951X32137
 * @property string|null $787795X951X32133SQ001
 * @property string|null $787795X951X32134SQ001
 * @property string|null $787795X951X32134SQ002
 * @property string|null $787795X952X32142
 * @property string|null $787795X952X32141
 *
 * @method static CachedBuilder|LimeSurvey787795 where787795X946X32093($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X946X32094($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32095($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32096($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32097($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32098($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32099($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32100($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32101($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32102($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32103SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32104SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32104SQ002($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32104SQ003($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32104SQ004($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X947X32138($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32105($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32106($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32107($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32108($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32109($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32110($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32111SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32112($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32113SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32114SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32114SQ002($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32114SQ003($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32114SQ004($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X948X32139($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32115($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32116($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32117($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32118($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32119SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32120SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32120SQ002($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32120SQ003($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32120SQ004($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32120SQ005($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32121($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32122($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32123($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32124($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32125($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32140($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32143SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X949X32144($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X950X32126($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X950X32127($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X950X32127other($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X950X32128($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X950X32129SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X950X32130SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X950X32130SQ002($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X951X32131SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X951X32132($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X951X32133SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X951X32134SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X951X32134SQ002($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X951X32135($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X951X32136SQ001($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X951X32137($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X952X32141($value)
 * @method static CachedBuilder|LimeSurvey787795 where787795X952X32142($value)
 * @method static CachedBuilder|LimeSurvey787795 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey787795 whereId($value)
 * @method static CachedBuilder|LimeSurvey787795 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey787795 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey787795 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey787795 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey787795 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey787795 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey787795 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_787795';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', '787795X946X32093', '787795X946X32094', '787795X947X32138', '787795X947X32095', '787795X947X32096', '787795X947X32097', '787795X947X32098', '787795X947X32099', '787795X947X32100', '787795X947X32101', '787795X947X32102', '787795X947X32103SQ001', '787795X947X32104SQ001', '787795X947X32104SQ002', '787795X947X32104SQ003', '787795X947X32104SQ004', '787795X948X32139', '787795X948X32105', '787795X948X32106', '787795X948X32107', '787795X948X32108', '787795X948X32109', '787795X948X32110', '787795X948X32111SQ001', '787795X948X32112', '787795X948X32113SQ001', '787795X948X32114SQ001', '787795X948X32114SQ002', '787795X948X32114SQ003', '787795X948X32114SQ004', '787795X949X32140', '787795X949X32115', '787795X949X32143SQ001', '787795X949X32144', '787795X949X32116', '787795X949X32121', '787795X949X32117', '787795X949X32118', '787795X949X32122', '787795X949X32123', '787795X949X32124', '787795X949X32125', '787795X949X32119SQ001', '787795X949X32120SQ001', '787795X949X32120SQ002', '787795X949X32120SQ003', '787795X949X32120SQ004', '787795X949X32120SQ005', '787795X950X32126', '787795X950X32127', '787795X950X32127other', '787795X950X32128', '787795X950X32129SQ001', '787795X950X32130SQ001', '787795X950X32130SQ002', '787795X951X32135', '787795X951X32131SQ001', '787795X951X32132', '787795X951X32136SQ001', '787795X951X32137', '787795X951X32133SQ001', '787795X951X32134SQ001', '787795X951X32134SQ002', '787795X952X32142', '787795X952X32141',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', '787795X946X32093' => 'string', '787795X946X32094' => 'string', '787795X947X32138' => 'string', '787795X947X32095' => 'string', '787795X947X32096' => 'string', '787795X947X32097' => 'string', '787795X947X32098' => 'string', '787795X947X32099' => 'string', '787795X947X32100' => 'string', '787795X947X32101' => 'string', '787795X947X32102' => 'string', '787795X947X32103SQ001' => 'string', '787795X947X32104SQ001' => 'string', '787795X947X32104SQ002' => 'string', '787795X947X32104SQ003' => 'string', '787795X947X32104SQ004' => 'string', '787795X948X32139' => 'string', '787795X948X32105' => 'string', '787795X948X32106' => 'string', '787795X948X32107' => 'string', '787795X948X32108' => 'string', '787795X948X32109' => 'string', '787795X948X32110' => 'string', '787795X948X32111SQ001' => 'string', '787795X948X32112' => 'string', '787795X948X32113SQ001' => 'string', '787795X948X32114SQ001' => 'string', '787795X948X32114SQ002' => 'string', '787795X948X32114SQ003' => 'string', '787795X948X32114SQ004' => 'string', '787795X949X32140' => 'string', '787795X949X32115' => 'string', '787795X949X32143SQ001' => 'string', '787795X949X32144' => 'string', '787795X949X32121' => 'string', '787795X949X32117' => 'string', '787795X949X32118' => 'string', '787795X949X32122' => 'string', '787795X949X32123' => 'string', '787795X949X32124' => 'string', '787795X949X32125' => 'string', '787795X949X32119SQ001' => 'string', '787795X949X32120SQ001' => 'string', '787795X949X32120SQ002' => 'string', '787795X949X32120SQ003' => 'string', '787795X949X32120SQ004' => 'string', '787795X949X32120SQ005' => 'string', '787795X950X32126' => 'string', '787795X950X32127' => 'string', '787795X950X32127other' => 'string', '787795X950X32128' => 'string', '787795X950X32129SQ001' => 'string', '787795X950X32130SQ001' => 'string', '787795X950X32130SQ002' => 'string', '787795X951X32135' => 'string', '787795X951X32131SQ001' => 'string', '787795X951X32132' => 'string', '787795X951X32136SQ001' => 'string', '787795X951X32137' => 'string', '787795X951X32133SQ001' => 'string', '787795X951X32134SQ001' => 'string', '787795X951X32134SQ002' => 'string', '787795X952X32142' => 'string', '787795X952X32141' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
