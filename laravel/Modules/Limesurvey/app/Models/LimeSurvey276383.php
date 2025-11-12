<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey276383Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey276383
 *
 * @method static CachedBuilder|LimeSurvey276383 all($columns = [])
 * @method static CachedBuilder|LimeSurvey276383 avg($column)
 * @method static CachedBuilder|LimeSurvey276383 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey276383 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey276383 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey276383 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey276383 exists()
 * @method static LimeSurvey276383Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey276383 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey276383 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey276383 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey276383 insert(array $values)
 * @method static CachedBuilder|LimeSurvey276383 isCachable()
 * @method static CachedBuilder|LimeSurvey276383 max($column)
 * @method static CachedBuilder|LimeSurvey276383 min($column)
 * @method static CachedBuilder|LimeSurvey276383 newModelQuery()
 * @method static CachedBuilder|LimeSurvey276383 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey276383 query()
 * @method static CachedBuilder|LimeSurvey276383 sum($column)
 * @method static CachedBuilder|LimeSurvey276383 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $276383X900X31445
 * @property string|null $276383X900X31446
 * @property string|null $276383X900X314481
 * @property string|null $276383X900X314482
 * @property string|null $276383X900X31447
 * @property string|null $276383X900X31488
 * @property string|null $276383X900X314491
 * @property string|null $276383X900X314492
 * @property string|null $276383X900X314493
 * @property string|null $276383X900X314494
 * @property string|null $276383X900X31450
 * @property string|null $276383X900X31486
 * @property string|null $276383X901X31451
 * @property string|null $276383X901X314521
 * @property string|null $276383X901X314522
 * @property string|null $276383X901X314523
 * @property string|null $276383X901X31453
 * @property string|null $276383X901X314541
 * @property string|null $276383X901X314542
 * @property string|null $276383X901X314543
 * @property string|null $276383X901X314544
 * @property string|null $276383X901X31455
 * @property string|null $276383X901X314561
 * @property string|null $276383X901X314562
 * @property string|null $276383X901X314563
 * @property string|null $276383X901X31457
 * @property string|null $276383X901X314581
 * @property string|null $276383X901X314582
 * @property string|null $276383X901X314583
 * @property string|null $276383X902X31459
 * @property string|null $276383X902X314601
 * @property string|null $276383X902X314602
 * @property string|null $276383X902X314603
 * @property string|null $276383X902X314604
 * @property string|null $276383X902X31461
 * @property string|null $276383X902X31462
 * @property string|null $276383X902X314631
 * @property string|null $276383X902X314632
 * @property string|null $276383X903X31464
 * @property string|null $276383X903X314651
 * @property string|null $276383X903X314652
 * @property string|null $276383X903X31466
 * @property string|null $276383X903X31489
 * @property string|null $276383X903X31468
 * @property string|null $276383X903X314691
 * @property string|null $276383X903X314692
 * @property string|null $276383X903X314693
 * @property string|null $276383X903X31470
 * @property string|null $276383X903X314711
 * @property string|null $276383X903X314712
 * @property string|null $276383X903X314713
 * @property string|null $276383X903X31472
 * @property string|null $276383X903X314731
 * @property string|null $276383X903X314732
 * @property string|null $276383X903X31474
 * @property string|null $276383X903X314751
 * @property string|null $276383X903X314752
 * @property string|null $276383X903X31467
 * @property string|null $276383X903X31476
 * @property string|null $276383X903X314771
 * @property string|null $276383X903X314772
 * @property string|null $276383X904X31478
 * @property string|null $276383X904X314791
 * @property string|null $276383X904X314792
 * @property string|null $276383X904X314793
 * @property string|null $276383X904X31480
 * @property string|null $276383X904X314811
 * @property string|null $276383X904X314812
 * @property string|null $276383X904X314813
 * @property string|null $276383X904X314814
 * @property string|null $276383X904X314815
 * @property string|null $276383X904X31482
 * @property string|null $276383X904X314831
 * @property string|null $276383X904X314832
 * @property string|null $276383X904X314833
 * @property string|null $276383X904X314834
 * @property string|null $276383X905X31484
 * @property string|null $276383X905X314851
 * @property string|null $276383X905X314852
 * @property string|null $276383X905X31490
 * @property string|null $276383X905X314911
 * @property string|null $276383X905X314912
 * @property string|null $276383X906X31487
 *
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X31445($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X31446($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X31447($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X314481($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X314482($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X314491($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X314492($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X314493($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X314494($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X31450($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X31486($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X900X31488($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X31451($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314521($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314522($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314523($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X31453($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314541($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314542($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314543($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314544($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X31455($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314561($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314562($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314563($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X31457($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314581($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314582($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X901X314583($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X902X31459($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X902X314601($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X902X314602($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X902X314603($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X902X314604($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X902X31461($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X902X31462($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X902X314631($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X902X314632($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X31464($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314651($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314652($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X31466($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X31467($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X31468($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314691($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314692($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314693($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X31470($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314711($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314712($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314713($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X31472($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314731($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314732($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X31474($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314751($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314752($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X31476($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314771($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X314772($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X903X31489($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X31478($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314791($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314792($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314793($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X31480($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314811($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314812($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314813($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314814($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314815($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X31482($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314831($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314832($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314833($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X904X314834($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X905X31484($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X905X314851($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X905X314852($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X905X31490($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X905X314911($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X905X314912($value)
 * @method static CachedBuilder|LimeSurvey276383 where276383X906X31487($value)
 * @method static CachedBuilder|LimeSurvey276383 whereId($value)
 * @method static CachedBuilder|LimeSurvey276383 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey276383 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey276383 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey276383 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey276383 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey276383 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_276383';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', '276383X900X31445', '276383X900X31446', '276383X900X314481', '276383X900X314482', '276383X900X31447', '276383X900X31488', '276383X900X314491', '276383X900X314492', '276383X900X314493', '276383X900X314494', '276383X900X31450', '276383X900X31486', '276383X901X31451', '276383X901X314521', '276383X901X314522', '276383X901X314523', '276383X901X31453', '276383X901X314541', '276383X901X314542', '276383X901X314543', '276383X901X314544', '276383X901X31455', '276383X901X314561', '276383X901X314562', '276383X901X314563', '276383X901X31457', '276383X901X314581', '276383X901X314582', '276383X901X314583', '276383X902X31459', '276383X902X314601', '276383X902X314602', '276383X902X314603', '276383X902X314604', '276383X902X31461', '276383X902X31462', '276383X902X314631', '276383X902X314632', '276383X903X31464', '276383X903X314651', '276383X903X314652', '276383X903X31466', '276383X903X31489', '276383X903X31468', '276383X903X314691', '276383X903X314692', '276383X903X314693', '276383X903X31470', '276383X903X314711', '276383X903X314712', '276383X903X314713', '276383X903X31472', '276383X903X314731', '276383X903X314732', '276383X903X31474', '276383X903X314751', '276383X903X314752', '276383X903X31467', '276383X903X31476', '276383X903X314771', '276383X903X314772', '276383X904X31478', '276383X904X314791', '276383X904X314792', '276383X904X314793', '276383X904X31480', '276383X904X314811', '276383X904X314812', '276383X904X314813', '276383X904X314814', '276383X904X314815', '276383X904X31482', '276383X904X314831', '276383X904X314832', '276383X904X314833', '276383X904X314834', '276383X905X31484', '276383X905X314851', '276383X905X314852', '276383X905X31490', '276383X905X314911', '276383X905X314912', '276383X906X31487',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', '276383X900X31445' => 'string', '276383X900X31446' => 'string', '276383X900X314481' => 'string', '276383X900X314482' => 'string', '276383X900X31447' => 'string', '276383X900X31488' => 'string', '276383X900X314491' => 'string', '276383X900X314492' => 'string', '276383X900X314493' => 'string', '276383X900X314494' => 'string', '276383X900X31450' => 'string', '276383X900X31486' => 'string', '276383X901X31451' => 'string', '276383X901X314521' => 'string', '276383X901X314522' => 'string', '276383X901X314523' => 'string', '276383X901X31453' => 'string', '276383X901X314541' => 'string', '276383X901X314542' => 'string', '276383X901X314543' => 'string', '276383X901X314544' => 'string', '276383X901X31455' => 'string', '276383X901X314561' => 'string', '276383X901X314562' => 'string', '276383X901X314563' => 'string', '276383X901X31457' => 'string', '276383X901X314581' => 'string', '276383X901X314582' => 'string', '276383X901X314583' => 'string', '276383X902X31459' => 'string', '276383X902X314601' => 'string', '276383X902X314602' => 'string', '276383X902X314603' => 'string', '276383X902X314604' => 'string', '276383X902X31461' => 'string', '276383X902X31462' => 'string', '276383X902X314631' => 'string', '276383X902X314632' => 'string', '276383X903X31464' => 'string', '276383X903X314651' => 'string', '276383X903X314652' => 'string', '276383X903X31466' => 'string', '276383X903X31489' => 'string', '276383X903X31468' => 'string', '276383X903X314691' => 'string', '276383X903X314692' => 'string', '276383X903X314693' => 'string', '276383X903X31470' => 'string', '276383X903X314711' => 'string', '276383X903X314712' => 'string', '276383X903X314713' => 'string', '276383X903X31472' => 'string', '276383X903X314731' => 'string', '276383X903X314732' => 'string', '276383X903X31474' => 'string', '276383X903X314751' => 'string', '276383X903X314752' => 'string', '276383X903X31467' => 'string', '276383X903X31476' => 'string', '276383X903X314771' => 'string', '276383X903X314772' => 'string', '276383X904X31478' => 'string', '276383X904X314791' => 'string', '276383X904X314792' => 'string', '276383X904X314793' => 'string', '276383X904X31480' => 'string', '276383X904X314811' => 'string', '276383X904X314812' => 'string', '276383X904X314813' => 'string', '276383X904X314814' => 'string', '276383X904X314815' => 'string', '276383X904X31482' => 'string', '276383X904X314831' => 'string', '276383X904X314832' => 'string', '276383X904X314833' => 'string', '276383X904X314834' => 'string', '276383X905X31484' => 'string', '276383X905X314851' => 'string', '276383X905X314852' => 'string', '276383X905X31490' => 'string', '276383X905X314911' => 'string', '276383X905X314912' => 'string', '276383X906X31487' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
