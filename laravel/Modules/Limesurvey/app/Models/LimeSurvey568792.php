<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey568792Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey568792
 *
 * @method static CachedBuilder|LimeSurvey568792 all($columns = [])
 * @method static CachedBuilder|LimeSurvey568792 avg($column)
 * @method static CachedBuilder|LimeSurvey568792 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey568792 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey568792 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey568792 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey568792 exists()
 * @method static LimeSurvey568792Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey568792 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey568792 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey568792 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey568792 insert(array $values)
 * @method static CachedBuilder|LimeSurvey568792 isCachable()
 * @method static CachedBuilder|LimeSurvey568792 max($column)
 * @method static CachedBuilder|LimeSurvey568792 min($column)
 * @method static CachedBuilder|LimeSurvey568792 newModelQuery()
 * @method static CachedBuilder|LimeSurvey568792 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey568792 query()
 * @method static CachedBuilder|LimeSurvey568792 sum($column)
 * @method static CachedBuilder|LimeSurvey568792 truncate()
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
 * @property string|null $568792X987X32761
 * @property string|null $568792X988X32785
 * @property string|null $568792X989X327452_01
 * @property string|null $568792X989X327452_02
 * @property string|null $568792X989X327453_01
 * @property string|null $568792X989X327453_02
 * @property string|null $568792X989X327454_01
 * @property string|null $568792X989X327454_02
 * @property string|null $568792X989X327455_01
 * @property string|null $568792X989X327455_02
 * @property string|null $568792X989X327456_01
 * @property string|null $568792X989X327456_02
 * @property string|null $568792X989X327457_01
 * @property string|null $568792X989X327457_02
 * @property string|null $568792X989X327458_01
 * @property string|null $568792X989X327458_02
 * @property string|null $568792X989X327459_01
 * @property string|null $568792X989X327459_02
 * @property string|null $568792X989X3274510_01
 * @property string|null $568792X989X3274510_02
 * @property string|null $568792X989X3274511_01
 * @property string|null $568792X989X3274511_02
 * @property string|null $568792X989X3274512_01
 * @property string|null $568792X989X3274512_02
 * @property string|null $568792X989X32746
 * @property string|null $568792X993X32799
 * @property string|null $568792X993X32800
 * @property string|null $568792X993X32801
 * @property string|null $568792X994X32802
 * @property string|null $568792X994X32803
 * @property string|null $568792X994X3280418
 * @property string|null $568792X994X3280419
 * @property string|null $568792X994X3280420
 * @property string|null $568792X994X32808
 * @property string|null $568792X990X32747
 * @property string|null $568792X990X32809
 * @property string|null $568792X990X32810
 * @property string|null $568792X990X32811
 * @property string|null $568792X990X32812
 * @property Carbon|null $568792X991X32759
 * @property Carbon|null $568792X991X32760
 * @property string|null $568792X991X32762
 * @property string|null $568792X991X32763
 * @property string|null $568792X991X32763other
 *
 * @method static CachedBuilder|LimeSurvey568792 where568792X987X32761($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X988X32785($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X327451001($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X327451002($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X327451101($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X327451102($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X327451201($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X327451202($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745201($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745202($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745301($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745302($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745401($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745402($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745501($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745502($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745601($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745602($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745701($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745702($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745801($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745802($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745901($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32745902($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X989X32746($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X990X32747($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X990X32809($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X990X32810($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X990X32811($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X990X32812($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X991X32759($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X991X32760($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X991X32762($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X991X32763($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X991X32763other($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X993X32799($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X993X32800($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X993X32801($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X994X32802($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X994X32803($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X994X3280418($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X994X3280419($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X994X3280420($value)
 * @method static CachedBuilder|LimeSurvey568792 where568792X994X32808($value)
 * @method static CachedBuilder|LimeSurvey568792 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey568792 whereId($value)
 * @method static CachedBuilder|LimeSurvey568792 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey568792 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey568792 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey568792 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey568792 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey568792 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey568792 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey568792 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_568792';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '568792X987X32761', '568792X988X32785', '568792X989X327452_01', '568792X989X327452_02', '568792X989X327453_01', '568792X989X327453_02', '568792X989X327454_01', '568792X989X327454_02', '568792X989X327455_01', '568792X989X327455_02', '568792X989X327456_01', '568792X989X327456_02', '568792X989X327457_01', '568792X989X327457_02', '568792X989X327458_01', '568792X989X327458_02', '568792X989X327459_01', '568792X989X327459_02', '568792X989X3274510_01', '568792X989X3274510_02', '568792X989X3274511_01', '568792X989X3274511_02', '568792X989X3274512_01', '568792X989X3274512_02', '568792X989X32746', '568792X993X32799', '568792X993X32800', '568792X993X32801', '568792X994X32802', '568792X994X32803', '568792X994X3280418', '568792X994X3280419', '568792X994X3280420', '568792X994X32808', '568792X990X32747', '568792X990X32809', '568792X990X32810', '568792X990X32811', '568792X990X32812', '568792X991X32759', '568792X991X32760', '568792X991X32762', '568792X991X32763', '568792X991X32763other',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '568792X987X32761' => 'string', '568792X988X32785' => 'string', '568792X989X327452_01' => 'string', '568792X989X327452_02' => 'string', '568792X989X327453_01' => 'string', '568792X989X327453_02' => 'string', '568792X989X327454_01' => 'string', '568792X989X327454_02' => 'string', '568792X989X327455_01' => 'string', '568792X989X327455_02' => 'string', '568792X989X327456_01' => 'string', '568792X989X327456_02' => 'string', '568792X989X327457_01' => 'string', '568792X989X327457_02' => 'string', '568792X989X327458_01' => 'string', '568792X989X327458_02' => 'string', '568792X989X327459_01' => 'string', '568792X989X327459_02' => 'string', '568792X989X3274510_01' => 'string', '568792X989X3274510_02' => 'string', '568792X989X3274511_01' => 'string', '568792X989X3274511_02' => 'string', '568792X989X3274512_01' => 'string', '568792X989X3274512_02' => 'string', '568792X989X32746' => 'string', '568792X993X32799' => 'string', '568792X993X32800' => 'string', '568792X993X32801' => 'string', '568792X994X32802' => 'string', '568792X994X32803' => 'string', '568792X994X3280418' => 'string', '568792X994X3280419' => 'string', '568792X994X3280420' => 'string', '568792X994X32808' => 'string', '568792X990X32747' => 'string', '568792X990X32809' => 'string', '568792X990X32810' => 'string', '568792X990X32811' => 'string', '568792X990X32812' => 'string', '568792X991X32759' => 'datetime', '568792X991X32760' => 'datetime', '568792X991X32762' => 'string', '568792X991X32763' => 'string', '568792X991X32763other' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
