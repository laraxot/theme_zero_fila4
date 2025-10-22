<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey325712Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey325712
 *
 * @method static CachedBuilder|LimeSurvey325712 all($columns = [])
 * @method static CachedBuilder|LimeSurvey325712 avg($column)
 * @method static CachedBuilder|LimeSurvey325712 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey325712 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey325712 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey325712 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey325712 exists()
 * @method static LimeSurvey325712Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey325712 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey325712 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey325712 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey325712 insert(array $values)
 * @method static CachedBuilder|LimeSurvey325712 isCachable()
 * @method static CachedBuilder|LimeSurvey325712 max($column)
 * @method static CachedBuilder|LimeSurvey325712 min($column)
 * @method static CachedBuilder|LimeSurvey325712 newModelQuery()
 * @method static CachedBuilder|LimeSurvey325712 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey325712 query()
 * @method static CachedBuilder|LimeSurvey325712 sum($column)
 * @method static CachedBuilder|LimeSurvey325712 truncate()
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
 * @property string|null $325712X973X32478
 * @property string|null $325712X974X32502
 * @property string|null $325712X974X32503
 * @property string|null $325712X974X32504
 * @property string|null $325712X974X32504other
 * @property string|null $325712X975X325051
 * @property string|null $325712X975X325052
 * @property string|null $325712X975X325053
 * @property string|null $325712X975X325054
 * @property string|null $325712X975X325055
 * @property string|null $325712X975X325056
 * @property string|null $325712X975X325057
 * @property string|null $325712X975X325058
 * @property string|null $325712X978X32516
 * @property string|null $325712X978X32517
 * @property string|null $325712X978X32518
 * @property string|null $325712X978X32519
 * @property string|null $325712X976X325201
 * @property string|null $325712X976X325202
 * @property string|null $325712X976X325203
 * @property string|null $325712X976X325204
 * @property string|null $325712X976X325205
 * @property string|null $325712X976X325206
 * @property string|null $325712X976X325207
 * @property string|null $325712X976X325208
 * @property string|null $325712X976X32520other
 * @property string|null $325712X976X32531
 * @property string|null $325712X976X32532
 * @property string|null $325712X979X32533
 * @property string|null $325712X979X325441
 * @property string|null $325712X979X325442
 * @property string|null $325712X979X325443
 * @property string|null $325712X979X325444
 * @property string|null $325712X979X325445
 * @property string|null $325712X979X325446
 * @property string|null $325712X979X325447
 * @property string|null $325712X979X325448
 * @property string|null $325712X979X325449
 * @property string|null $325712X979X3254410
 * @property string|null $325712X979X32544other
 * @property string|null $325712X979X325571
 * @property string|null $325712X979X325572
 * @property string|null $325712X979X325573
 * @property string|null $325712X979X325574
 * @property string|null $325712X979X325575
 * @property string|null $325712X979X325576
 * @property string|null $325712X979X325577
 * @property string|null $325712X979X325578
 * @property string|null $325712X979X325579
 * @property string|null $325712X979X3255710
 * @property string|null $325712X979X32557other
 * @property string|null $325712X979X325791
 * @property string|null $325712X979X325792
 * @property string|null $325712X979X325793
 * @property string|null $325712X979X325794
 * @property string|null $325712X979X325795
 * @property string|null $325712X979X325796
 * @property string|null $325712X979X325797
 * @property string|null $325712X979X325798
 * @property string|null $325712X979X325799
 * @property string|null $325712X979X3257910
 * @property string|null $325712X979X32579other
 * @property string|null $325712X979X325901
 * @property string|null $325712X979X325902
 * @property string|null $325712X979X325903
 * @property string|null $325712X979X325904
 * @property string|null $325712X979X325905
 * @property string|null $325712X979X325906
 * @property string|null $325712X979X325907
 * @property string|null $325712X979X325908
 * @property string|null $325712X979X325909
 * @property string|null $325712X979X3259010
 * @property string|null $325712X979X32590other
 * @property string|null $325712X979X326011
 * @property string|null $325712X979X326012
 * @property string|null $325712X979X326013
 * @property string|null $325712X979X326014
 * @property string|null $325712X979X326015
 * @property string|null $325712X979X326016
 * @property string|null $325712X979X326017
 * @property string|null $325712X979X326018
 * @property string|null $325712X979X326019
 * @property string|null $325712X979X3260110
 * @property string|null $325712X979X32601other
 * @property string|null $325712X979X326131
 * @property string|null $325712X979X326132
 * @property string|null $325712X979X326133
 * @property string|null $325712X979X326134
 * @property string|null $325712X979X326135
 * @property string|null $325712X979X326136
 * @property string|null $325712X979X326137
 * @property string|null $325712X979X326138
 * @property string|null $325712X979X326139
 * @property string|null $325712X979X3261310
 * @property string|null $325712X979X32613other
 * @property string|null $325712X979X326241
 * @property string|null $325712X979X326242
 * @property string|null $325712X979X326243
 * @property string|null $325712X979X326244
 * @property string|null $325712X979X326245
 * @property string|null $325712X979X326246
 * @property string|null $325712X979X326247
 * @property string|null $325712X979X326248
 * @property string|null $325712X979X326249
 * @property string|null $325712X979X3262410
 * @property string|null $325712X979X32624other
 * @property string|null $325712X979X326351
 * @property string|null $325712X979X326352
 * @property string|null $325712X979X326353
 * @property string|null $325712X979X326354
 * @property string|null $325712X979X326355
 * @property string|null $325712X979X326356
 * @property string|null $325712X979X326357
 * @property string|null $325712X979X326358
 * @property string|null $325712X979X326359
 * @property string|null $325712X979X3263510
 * @property string|null $325712X979X32635other
 * @property string|null $325712X979X326461
 * @property string|null $325712X979X326462
 * @property string|null $325712X979X326463
 * @property string|null $325712X979X326464
 * @property string|null $325712X979X326465
 * @property string|null $325712X979X326466
 * @property string|null $325712X979X326467
 * @property string|null $325712X979X326468
 * @property string|null $325712X979X326469
 * @property string|null $325712X979X3264610
 * @property string|null $325712X979X32646other
 * @property string|null $325712X979X32657
 * @property string|null $325712X980X32658
 * @property string|null $325712X980X32658other
 * @property string|null $325712X980X32659
 * @property string|null $325712X980X32660
 * @property string|null $325712X980X326611
 * @property string|null $325712X980X326612
 * @property string|null $325712X980X326613
 * @property string|null $325712X980X326614
 * @property string|null $325712X980X326681
 * @property string|null $325712X980X326682
 * @property string|null $325712X980X326683
 * @property string|null $325712X980X326684
 * @property string|null $325712X980X326685
 * @property string|null $325712X977X32474
 * @property string|null $325712X977X32474other
 * @property Carbon|null $325712X977X32476
 * @property Carbon|null $325712X977X32477
 * @property string|null $325712X977X32479
 * @property string|null $325712X977X32480
 * @property string|null $325712X977X32480other
 *
 * @method static CachedBuilder|LimeSurvey325712 where325712X973X32478($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X974X32502($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X974X32503($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X974X32504($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X974X32504other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X975X325051($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X975X325052($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X975X325053($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X975X325054($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X975X325055($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X975X325056($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X975X325057($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X975X325058($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X325201($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X325202($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X325203($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X325204($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X325205($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X325206($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X325207($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X325208($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X32520other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X32531($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X976X32532($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X977X32474($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X977X32474other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X977X32476($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X977X32477($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X977X32479($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X977X32480($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X977X32480other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X978X32516($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X978X32517($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X978X32518($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X978X32519($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32533($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325441($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X3254410($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325442($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325443($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325444($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325445($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325446($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325447($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325448($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325449($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32544other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325571($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X3255710($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325572($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325573($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325574($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325575($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325576($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325577($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325578($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325579($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32557other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325791($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X3257910($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325792($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325793($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325794($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325795($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325796($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325797($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325798($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325799($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32579other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325901($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X3259010($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325902($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325903($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325904($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325905($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325906($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325907($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325908($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X325909($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32590other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326011($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X3260110($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326012($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326013($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326014($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326015($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326016($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326017($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326018($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326019($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32601other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326131($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X3261310($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326132($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326133($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326134($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326135($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326136($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326137($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326138($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326139($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32613other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326241($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X3262410($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326242($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326243($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326244($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326245($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326246($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326247($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326248($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326249($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32624other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326351($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X3263510($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326352($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326353($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326354($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326355($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326356($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326357($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326358($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326359($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32635other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326461($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X3264610($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326462($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326463($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326464($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326465($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326466($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326467($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326468($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X326469($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32646other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X979X32657($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X32658($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X32658other($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X32659($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X32660($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X326611($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X326612($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X326613($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X326614($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X326681($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X326682($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X326683($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X326684($value)
 * @method static CachedBuilder|LimeSurvey325712 where325712X980X326685($value)
 * @method static CachedBuilder|LimeSurvey325712 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey325712 whereId($value)
 * @method static CachedBuilder|LimeSurvey325712 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey325712 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey325712 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey325712 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey325712 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey325712 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey325712 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey325712 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_325712';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '325712X973X32478', '325712X974X32502', '325712X974X32503', '325712X974X32504', '325712X974X32504other', '325712X975X325051', '325712X975X325052', '325712X975X325053', '325712X975X325054', '325712X975X325055', '325712X975X325056', '325712X975X325057', '325712X975X325058', '325712X978X32516', '325712X978X32517', '325712X978X32518', '325712X978X32519', '325712X976X325201', '325712X976X325202', '325712X976X325203', '325712X976X325204', '325712X976X325205', '325712X976X325206', '325712X976X325207', '325712X976X325208', '325712X976X32520other', '325712X976X32531', '325712X976X32532', '325712X979X32533', '325712X979X325441', '325712X979X325442', '325712X979X325443', '325712X979X325444', '325712X979X325445', '325712X979X325446', '325712X979X325447', '325712X979X325448', '325712X979X325449', '325712X979X3254410', '325712X979X32544other', '325712X979X325571', '325712X979X325572', '325712X979X325573', '325712X979X325574', '325712X979X325575', '325712X979X325576', '325712X979X325577', '325712X979X325578', '325712X979X325579', '325712X979X3255710', '325712X979X32557other', '325712X979X325791', '325712X979X325792', '325712X979X325793', '325712X979X325794', '325712X979X325795', '325712X979X325796', '325712X979X325797', '325712X979X325798', '325712X979X325799', '325712X979X3257910', '325712X979X32579other', '325712X979X325901', '325712X979X325902', '325712X979X325903', '325712X979X325904', '325712X979X325905', '325712X979X325906', '325712X979X325907', '325712X979X325908', '325712X979X325909', '325712X979X3259010', '325712X979X32590other', '325712X979X326011', '325712X979X326012', '325712X979X326013', '325712X979X326014', '325712X979X326015', '325712X979X326016', '325712X979X326017', '325712X979X326018', '325712X979X326019', '325712X979X3260110', '325712X979X32601other', '325712X979X326131', '325712X979X326132', '325712X979X326133', '325712X979X326134', '325712X979X326135', '325712X979X326136', '325712X979X326137', '325712X979X326138', '325712X979X326139', '325712X979X3261310', '325712X979X32613other', '325712X979X326241', '325712X979X326242', '325712X979X326243', '325712X979X326244', '325712X979X326245', '325712X979X326246', '325712X979X326247', '325712X979X326248', '325712X979X326249', '325712X979X3262410', '325712X979X32624other', '325712X979X326351', '325712X979X326352', '325712X979X326353', '325712X979X326354', '325712X979X326355', '325712X979X326356', '325712X979X326357', '325712X979X326358', '325712X979X326359', '325712X979X3263510', '325712X979X32635other', '325712X979X326461', '325712X979X326462', '325712X979X326463', '325712X979X326464', '325712X979X326465', '325712X979X326466', '325712X979X326467', '325712X979X326468', '325712X979X326469', '325712X979X3264610', '325712X979X32646other', '325712X979X32657', '325712X980X32658', '325712X980X32658other', '325712X980X32659', '325712X980X32660', '325712X980X326611', '325712X980X326612', '325712X980X326613', '325712X980X326614', '325712X980X326681', '325712X980X326682', '325712X980X326683', '325712X980X326684', '325712X980X326685', '325712X977X32474', '325712X977X32474other', '325712X977X32476', '325712X977X32477', '325712X977X32479', '325712X977X32480', '325712X977X32480other',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '325712X973X32478' => 'string', '325712X974X32502' => 'string', '325712X974X32503' => 'string', '325712X974X32504' => 'string', '325712X974X32504other' => 'string', '325712X975X325051' => 'string', '325712X975X325052' => 'string', '325712X975X325053' => 'string', '325712X975X325054' => 'string', '325712X975X325055' => 'string', '325712X975X325056' => 'string', '325712X975X325057' => 'string', '325712X975X325058' => 'string', '325712X978X32516' => 'string', '325712X978X32517' => 'string', '325712X978X32518' => 'string', '325712X978X32519' => 'string', '325712X976X325201' => 'string', '325712X976X325202' => 'string', '325712X976X325203' => 'string', '325712X976X325204' => 'string', '325712X976X325205' => 'string', '325712X976X325206' => 'string', '325712X976X325207' => 'string', '325712X976X325208' => 'string', '325712X976X32520other' => 'string', '325712X976X32531' => 'string', '325712X976X32532' => 'string', '325712X979X32533' => 'string', '325712X979X325441' => 'string', '325712X979X325442' => 'string', '325712X979X325443' => 'string', '325712X979X325444' => 'string', '325712X979X325445' => 'string', '325712X979X325446' => 'string', '325712X979X325447' => 'string', '325712X979X325448' => 'string', '325712X979X325449' => 'string', '325712X979X3254410' => 'string', '325712X979X32544other' => 'string', '325712X979X325571' => 'string', '325712X979X325572' => 'string', '325712X979X325573' => 'string', '325712X979X325574' => 'string', '325712X979X325575' => 'string', '325712X979X325576' => 'string', '325712X979X325577' => 'string', '325712X979X325578' => 'string', '325712X979X325579' => 'string', '325712X979X3255710' => 'string', '325712X979X32557other' => 'string', '325712X979X325791' => 'string', '325712X979X325792' => 'string', '325712X979X325793' => 'string', '325712X979X325794' => 'string', '325712X979X325795' => 'string', '325712X979X325796' => 'string', '325712X979X325797' => 'string', '325712X979X325798' => 'string', '325712X979X325799' => 'string', '325712X979X3257910' => 'string', '325712X979X32579other' => 'string', '325712X979X325901' => 'string', '325712X979X325902' => 'string', '325712X979X325903' => 'string', '325712X979X325904' => 'string', '325712X979X325905' => 'string', '325712X979X325906' => 'string', '325712X979X325907' => 'string', '325712X979X325908' => 'string', '325712X979X325909' => 'string', '325712X979X3259010' => 'string', '325712X979X32590other' => 'string', '325712X979X326011' => 'string', '325712X979X326012' => 'string', '325712X979X326013' => 'string', '325712X979X326014' => 'string', '325712X979X326015' => 'string', '325712X979X326016' => 'string', '325712X979X326017' => 'string', '325712X979X326018' => 'string', '325712X979X326019' => 'string', '325712X979X3260110' => 'string', '325712X979X32601other' => 'string', '325712X979X326131' => 'string', '325712X979X326132' => 'string', '325712X979X326133' => 'string', '325712X979X326134' => 'string', '325712X979X326135' => 'string', '325712X979X326136' => 'string', '325712X979X326137' => 'string', '325712X979X326138' => 'string', '325712X979X326139' => 'string', '325712X979X3261310' => 'string', '325712X979X32613other' => 'string', '325712X979X326241' => 'string', '325712X979X326242' => 'string', '325712X979X326243' => 'string', '325712X979X326244' => 'string', '325712X979X326245' => 'string', '325712X979X326246' => 'string', '325712X979X326247' => 'string', '325712X979X326248' => 'string', '325712X979X326249' => 'string', '325712X979X3262410' => 'string', '325712X979X32624other' => 'string', '325712X979X326351' => 'string', '325712X979X326352' => 'string', '325712X979X326353' => 'string', '325712X979X326354' => 'string', '325712X979X326355' => 'string', '325712X979X326356' => 'string', '325712X979X326357' => 'string', '325712X979X326358' => 'string', '325712X979X326359' => 'string', '325712X979X3263510' => 'string', '325712X979X32635other' => 'string', '325712X979X326461' => 'string', '325712X979X326462' => 'string', '325712X979X326463' => 'string', '325712X979X326464' => 'string', '325712X979X326465' => 'string', '325712X979X326466' => 'string', '325712X979X326467' => 'string', '325712X979X326468' => 'string', '325712X979X326469' => 'string', '325712X979X3264610' => 'string', '325712X979X32646other' => 'string', '325712X979X32657' => 'string', '325712X980X32658' => 'string', '325712X980X32658other' => 'string', '325712X980X32659' => 'string', '325712X980X32660' => 'string', '325712X980X326611' => 'string', '325712X980X326612' => 'string', '325712X980X326613' => 'string', '325712X980X326614' => 'string', '325712X980X326681' => 'string', '325712X980X326682' => 'string', '325712X980X326683' => 'string', '325712X980X326684' => 'string', '325712X980X326685' => 'string', '325712X977X32474' => 'string', '325712X977X32474other' => 'string', '325712X977X32476' => 'datetime', '325712X977X32477' => 'datetime', '325712X977X32479' => 'string', '325712X977X32480' => 'string', '325712X977X32480other' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
