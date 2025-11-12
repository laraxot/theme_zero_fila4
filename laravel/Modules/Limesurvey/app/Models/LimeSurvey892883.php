<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey892883Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey892883
 *
 * @method static CachedBuilder|LimeSurvey892883 all($columns = [])
 * @method static CachedBuilder|LimeSurvey892883 avg($column)
 * @method static CachedBuilder|LimeSurvey892883 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey892883 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey892883 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey892883 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey892883 exists()
 * @method static LimeSurvey892883Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey892883 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey892883 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey892883 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey892883 insert(array $values)
 * @method static CachedBuilder|LimeSurvey892883 isCachable()
 * @method static CachedBuilder|LimeSurvey892883 max($column)
 * @method static CachedBuilder|LimeSurvey892883 min($column)
 * @method static CachedBuilder|LimeSurvey892883 newModelQuery()
 * @method static CachedBuilder|LimeSurvey892883 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey892883 query()
 * @method static CachedBuilder|LimeSurvey892883 sum($column)
 * @method static CachedBuilder|LimeSurvey892883 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property string|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string $startdate
 * @property string $datestamp
 * @property string|null $ipaddr
 * @property string|null $892883X1301X35368
 * @property string|null $892883X1301X35369
 * @property string|null $892883X1302X35370
 * @property string|null $892883X1302X35371
 * @property string|null $892883X1302X35372
 * @property string|null $892883X1302X35373
 * @property string|null $892883X1302X35374
 * @property string|null $892883X1302X35375
 * @property string|null $892883X1302X35376
 * @property string|null $892883X1302X35377
 * @property string|null $892883X1302X3537801
 * @property string|null $892883X1302X35391
 * @property string|null $892883X1303X35392
 * @property string|null $892883X1303X35393
 * @property string|null $892883X1303X35394
 * @property string|null $892883X1303X35395
 * @property string|null $892883X1303X35396
 * @property string|null $892883X1303X35397
 * @property string|null $892883X1303X3539819
 * @property string|null $892883X1303X35399
 * @property string|null $892883X1303X3540021
 * @property string|null $892883X1303X35401
 * @property string|null $892883X1304X35404
 * @property string|null $892883X1304X3540524
 * @property string|null $892883X1304X35407
 * @property string|null $892883X1304X35408
 * @property string|null $892883X1304X35409
 * @property string|null $892883X1304X35410
 * @property string|null $892883X1304X35411
 * @property string|null $892883X1304X35412
 * @property string|null $892883X1304X35413
 * @property string|null $892883X1304X35414
 * @property string|null $892883X1304X35415
 * @property string|null $892883X1304X3541634
 * @property string|null $892883X1304X35418
 * @property string|null $892883X1305X35419
 * @property string|null $892883X1305X35420
 * @property string|null $892883X1305X35421
 * @property string|null $892883X1305X3542239
 * @property string|null $892883X1305X35423
 * @property string|null $892883X1306X3542441
 * @property string|null $892883X1306X35426
 * @property string|null $892883X1306X3542743
 * @property string|null $892883X1306X35431
 * @property string|null $892883X1306X3543345
 * @property string|null $892883X1306X35432
 * @property string|null $892883X1307X3543747
 * @property string|null $892883X1307X35439
 * @property string|null $892883X1307X3544049
 * @property string|null $892883X1307X35442
 * @property string|null $892883X1307X3544351
 * @property string|null $892883X1307X35445
 * @property string|null $892883X1308X3544653
 * @property string|null $892883X1308X35448
 * @property string|null $892883X1308X3544955
 * @property string|null $892883X1308X35451
 * @property string|null $892883X1308X3545257
 * @property string|null $892883X1308X35454
 * @property string|null $892883X1309X35455
 *
 * @method static CachedBuilder|LimeSurvey892883 where892883X1301X35368($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1301X35369($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X35370($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X35371($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X35372($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X35373($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X35374($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X35375($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X35376($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X35377($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X3537801($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1302X35391($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X35392($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X35393($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X35394($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X35395($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X35396($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X35397($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X3539819($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X35399($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X3540021($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1303X35401($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35404($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X3540524($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35407($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35408($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35409($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35410($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35411($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35412($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35413($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35414($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35415($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X3541634($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1304X35418($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1305X35419($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1305X35420($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1305X35421($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1305X3542239($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1305X35423($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1306X3542441($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1306X35426($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1306X3542743($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1306X35431($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1306X35432($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1306X3543345($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1307X3543747($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1307X35439($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1307X3544049($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1307X35442($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1307X3544351($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1307X35445($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1308X3544653($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1308X35448($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1308X3544955($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1308X35451($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1308X3545257($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1308X35454($value)
 * @method static CachedBuilder|LimeSurvey892883 where892883X1309X35455($value)
 * @method static CachedBuilder|LimeSurvey892883 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey892883 whereId($value)
 * @method static CachedBuilder|LimeSurvey892883 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey892883 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey892883 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey892883 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey892883 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey892883 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey892883 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey892883 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_survey_892883';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        0 => 'id',
        1 => 'token',
        2 => 'submitdate',
        3 => 'lastpage',
        4 => 'startlanguage',
        5 => 'seed',
        6 => '892883X1301X35368',
        7 => '892883X1301X35369',
        8 => '892883X1302X35370',
        9 => '892883X1302X35371',
        10 => '892883X1302X35372',
        11 => '892883X1302X35373',
        12 => '892883X1302X35374',
        13 => '892883X1302X35375',
        14 => '892883X1302X35376',
        15 => '892883X1302X35377',
        16 => '892883X1302X3537801',
        17 => '892883X1302X35391',
        18 => '892883X1303X35392',
        19 => '892883X1303X35393',
        20 => '892883X1303X35394',
        21 => '892883X1303X35395',
        22 => '892883X1303X35396',
        23 => '892883X1303X35397',
        24 => '892883X1303X3539819',
        25 => '892883X1303X35399',
        26 => '892883X1303X3540021',
        27 => '892883X1303X35401',
        28 => '892883X1304X35404',
        29 => '892883X1304X3540524',
        30 => '892883X1304X35407',
        31 => '892883X1304X35408',
        32 => '892883X1304X35409',
        33 => '892883X1304X35410',
        34 => '892883X1304X35411',
        35 => '892883X1304X35412',
        36 => '892883X1304X35413',
        37 => '892883X1304X35414',
        38 => '892883X1304X35415',
        39 => '892883X1304X3541634',
        40 => '892883X1304X35418',
        41 => '892883X1305X35419',
        42 => '892883X1305X35420',
        43 => '892883X1305X35421',
        44 => '892883X1305X3542239',
        45 => '892883X1305X35423',
        46 => '892883X1306X3542441',
        47 => '892883X1306X35426',
        48 => '892883X1306X3542743',
        49 => '892883X1306X35431',
        50 => '892883X1306X3543345',
        51 => '892883X1306X35432',
        52 => '892883X1307X3543747',
        53 => '892883X1307X35439',
        54 => '892883X1307X3544049',
        55 => '892883X1307X35442',
        56 => '892883X1307X3544351',
        57 => '892883X1307X35445',
        58 => '892883X1308X3544653',
        59 => '892883X1308X35448',
        60 => '892883X1308X3544955',
        61 => '892883X1308X35451',
        62 => '892883X1308X3545257',
        63 => '892883X1308X35454',
        64 => '892883X1309X35455',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be casted to native types.
     * da fare.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *  da fare.
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
