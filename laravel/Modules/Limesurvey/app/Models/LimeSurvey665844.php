<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey665844Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey665844
 *
 * @method static CachedBuilder|LimeSurvey665844 all($columns = [])
 * @method static CachedBuilder|LimeSurvey665844 avg($column)
 * @method static CachedBuilder|LimeSurvey665844 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey665844 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey665844 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey665844 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey665844 exists()
 * @method static LimeSurvey665844Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey665844 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey665844 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey665844 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey665844 insert(array $values)
 * @method static CachedBuilder|LimeSurvey665844 isCachable()
 * @method static CachedBuilder|LimeSurvey665844 max($column)
 * @method static CachedBuilder|LimeSurvey665844 min($column)
 * @method static CachedBuilder|LimeSurvey665844 newModelQuery()
 * @method static CachedBuilder|LimeSurvey665844 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey665844 query()
 * @method static CachedBuilder|LimeSurvey665844 sum($column)
 * @method static CachedBuilder|LimeSurvey665844 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $665844X907X31547
 * @property string|null $665844X907X31548
 * @property string|null $665844X907X31549
 * @property string|null $665844X907X31569
 * @property string|null $665844X908X31550
 * @property string|null $665844X908X315511
 * @property string|null $665844X908X315512
 * @property string|null $665844X908X31552
 * @property string|null $665844X908X315531
 * @property string|null $665844X908X315532
 * @property string|null $665844X908X31554
 * @property string|null $665844X908X315551
 * @property string|null $665844X908X315552
 * @property string|null $665844X908X31572
 * @property string|null $665844X908X315731
 * @property string|null $665844X908X315732
 * @property string|null $665844X909X31556
 * @property string|null $665844X909X315571
 * @property string|null $665844X909X315572
 * @property string|null $665844X909X315573
 * @property string|null $665844X909X31558
 * @property string|null $665844X909X315591
 * @property string|null $665844X909X315592
 * @property string|null $665844X909X31560
 * @property string|null $665844X909X315611
 * @property string|null $665844X909X315612
 * @property string|null $665844X909X315613
 * @property string|null $665844X909X315614
 * @property string|null $665844X909X31562
 * @property string|null $665844X909X315631
 * @property string|null $665844X909X315632
 * @property string|null $665844X909X315633
 * @property string|null $665844X910X31564
 * @property string|null $665844X910X315651
 * @property string|null $665844X910X315652
 * @property string|null $665844X910X315653
 * @property string|null $665844X910X315654
 * @property string|null $665844X910X31566
 * @property string|null $665844X910X315671
 * @property string|null $665844X910X315672
 * @property string|null $665844X910X31574
 * @property string|null $665844X910X315751
 * @property string|null $665844X910X315752
 * @property string|null $665844X910X315753
 * @property string|null $665844X910X315754
 * @property string|null $665844X910X31576
 * @property string|null $665844X910X315771
 * @property string|null $665844X910X315772
 * @property string|null $665844X910X315773
 * @property string|null $665844X911X31570
 * @property string|null $665844X911X31571
 * @property string|null $665844X911X31568
 *
 * @method static CachedBuilder|LimeSurvey665844 where665844X907X31547($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X907X31548($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X907X31549($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X907X31569($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X31550($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X315511($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X315512($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X31552($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X315531($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X315532($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X31554($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X315551($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X315552($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X31572($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X315731($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X908X315732($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X31556($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315571($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315572($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315573($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X31558($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315591($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315592($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X31560($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315611($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315612($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315613($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315614($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X31562($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315631($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315632($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X909X315633($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X31564($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315651($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315652($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315653($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315654($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X31566($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315671($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315672($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X31574($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315751($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315752($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315753($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315754($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X31576($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315771($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315772($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X910X315773($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X911X31568($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X911X31570($value)
 * @method static CachedBuilder|LimeSurvey665844 where665844X911X31571($value)
 * @method static CachedBuilder|LimeSurvey665844 whereId($value)
 * @method static CachedBuilder|LimeSurvey665844 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey665844 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey665844 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey665844 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey665844 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey665844 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_665844';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', '665844X907X31547', '665844X907X31548', '665844X907X31549', '665844X907X31569', '665844X908X31550', '665844X908X315511', '665844X908X315512', '665844X908X31552', '665844X908X315531', '665844X908X315532', '665844X908X31554', '665844X908X315551', '665844X908X315552', '665844X908X31572', '665844X908X315731', '665844X908X315732', '665844X909X31556', '665844X909X315571', '665844X909X315572', '665844X909X315573', '665844X909X31558', '665844X909X315591', '665844X909X315592', '665844X909X31560', '665844X909X315611', '665844X909X315612', '665844X909X315613', '665844X909X315614', '665844X909X31562', '665844X909X315631', '665844X909X315632', '665844X909X315633', '665844X910X31564', '665844X910X315651', '665844X910X315652', '665844X910X315653', '665844X910X315654', '665844X910X31566', '665844X910X315671', '665844X910X315672', '665844X910X31574', '665844X910X315751', '665844X910X315752', '665844X910X315753', '665844X910X315754', '665844X910X31576', '665844X910X315771', '665844X910X315772', '665844X910X315773', '665844X911X31570', '665844X911X31571', '665844X911X31568',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', '665844X907X31547' => 'string', '665844X907X31548' => 'string', '665844X907X31549' => 'string', '665844X907X31569' => 'string', '665844X908X31550' => 'string', '665844X908X315511' => 'string', '665844X908X315512' => 'string', '665844X908X31552' => 'string', '665844X908X315531' => 'string', '665844X908X315532' => 'string', '665844X908X31554' => 'string', '665844X908X315551' => 'string', '665844X908X315552' => 'string', '665844X908X31572' => 'string', '665844X908X315731' => 'string', '665844X908X315732' => 'string', '665844X909X31556' => 'string', '665844X909X315571' => 'string', '665844X909X315572' => 'string', '665844X909X315573' => 'string', '665844X909X31558' => 'string', '665844X909X315591' => 'string', '665844X909X315592' => 'string', '665844X909X31560' => 'string', '665844X909X315611' => 'string', '665844X909X315612' => 'string', '665844X909X315613' => 'string', '665844X909X315614' => 'string', '665844X909X31562' => 'string', '665844X909X315631' => 'string', '665844X909X315632' => 'string', '665844X909X315633' => 'string', '665844X910X31564' => 'string', '665844X910X315651' => 'string', '665844X910X315652' => 'string', '665844X910X315653' => 'string', '665844X910X315654' => 'string', '665844X910X31566' => 'string', '665844X910X315671' => 'string', '665844X910X315672' => 'string', '665844X910X31574' => 'string', '665844X910X315751' => 'string', '665844X910X315752' => 'string', '665844X910X315753' => 'string', '665844X910X315754' => 'string', '665844X910X31576' => 'string', '665844X910X315771' => 'string', '665844X910X315772' => 'string', '665844X910X315773' => 'string', '665844X911X31570' => 'string', '665844X911X31571' => 'string', '665844X911X31568' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
