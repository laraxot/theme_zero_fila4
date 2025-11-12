<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey166311Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey166311
 *
 * @method static CachedBuilder|LimeSurvey166311 all($columns = [])
 * @method static CachedBuilder|LimeSurvey166311 avg($column)
 * @method static CachedBuilder|LimeSurvey166311 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey166311 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey166311 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey166311 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey166311 exists()
 * @method static LimeSurvey166311Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey166311 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey166311 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey166311 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey166311 insert(array $values)
 * @method static CachedBuilder|LimeSurvey166311 isCachable()
 * @method static CachedBuilder|LimeSurvey166311 max($column)
 * @method static CachedBuilder|LimeSurvey166311 min($column)
 * @method static CachedBuilder|LimeSurvey166311 newModelQuery()
 * @method static CachedBuilder|LimeSurvey166311 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey166311 query()
 * @method static CachedBuilder|LimeSurvey166311 sum($column)
 * @method static CachedBuilder|LimeSurvey166311 truncate()
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
 * @property string|null $166311X1557X38736
 * @property string|null $166311X1557X38737
 * @property string|null $166311X1558X38738
 * @property string|null $166311X1558X38739
 * @property string|null $166311X1558X38740
 * @property string|null $166311X1558X38741
 * @property string|null $166311X1558X38742
 * @property string|null $166311X1558X38743
 * @property string|null $166311X1558X38744
 * @property string|null $166311X1558X38745
 * @property string|null $166311X1558X3874601
 * @property string|null $166311X1558X38747
 * @property string|null $166311X1559X3874824
 * @property string|null $166311X1559X38749
 * @property string|null $166311X1559X38750
 * @property string|null $166311X1559X38751
 * @property string|null $166311X1559X38752
 * @property string|null $166311X1559X38753
 * @property string|null $166311X1559X38754
 * @property string|null $166311X1559X38755
 * @property string|null $166311X1559X38756
 * @property string|null $166311X1559X38757
 * @property string|null $166311X1559X3875834
 * @property string|null $166311X1559X38759
 * @property string|null $166311X1560X38760
 * @property string|null $166311X1560X38761
 * @property string|null $166311X1560X38762
 * @property string|null $166311X1560X3876339
 * @property string|null $166311X1560X38764
 * @property string|null $166311X1561X3876547
 * @property string|null $166311X1561X38766
 * @property string|null $166311X1561X3876749
 * @property string|null $166311X1561X38768
 * @property string|null $166311X1561X3876951
 * @property string|null $166311X1561X38770
 * @property string|null $166311X1562X3877153
 * @property string|null $166311X1562X38772
 * @property string|null $166311X1562X3877355
 * @property string|null $166311X1562X38774
 * @property string|null $166311X1562X3877557
 * @property string|null $166311X1562X38776
 * @property string|null $166311X1563X38777
 *
 * @method static CachedBuilder|LimeSurvey166311 where166311X1557X38736($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1557X38737($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X38738($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X38739($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X38740($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X38741($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X38742($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X38743($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X38744($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X38745($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X3874601($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1558X38747($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X3874824($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38749($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38750($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38751($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38752($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38753($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38754($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38755($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38756($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38757($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X3875834($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1559X38759($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1560X38760($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1560X38761($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1560X38762($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1560X3876339($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1560X38764($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1561X3876547($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1561X38766($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1561X3876749($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1561X38768($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1561X3876951($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1561X38770($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1562X3877153($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1562X38772($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1562X3877355($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1562X38774($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1562X3877557($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1562X38776($value)
 * @method static CachedBuilder|LimeSurvey166311 where166311X1563X38777($value)
 * @method static CachedBuilder|LimeSurvey166311 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey166311 whereId($value)
 * @method static CachedBuilder|LimeSurvey166311 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey166311 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey166311 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey166311 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey166311 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey166311 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey166311 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey166311 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_survey_166311';

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
        6 => 'startdate',
        7 => 'datestamp',
        8 => 'ipaddr',
        9 => '166311X1557X38736',
        10 => '166311X1557X38737',
        11 => '166311X1558X38738',
        12 => '166311X1558X38739',
        13 => '166311X1558X38740',
        14 => '166311X1558X38741',
        15 => '166311X1558X38742',
        16 => '166311X1558X38743',
        17 => '166311X1558X38744',
        18 => '166311X1558X38745',
        19 => '166311X1558X3874601',
        20 => '166311X1558X38747',
        21 => '166311X1559X3874824',
        22 => '166311X1559X38749',
        23 => '166311X1559X38750',
        24 => '166311X1559X38751',
        25 => '166311X1559X38752',
        26 => '166311X1559X38753',
        27 => '166311X1559X38754',
        28 => '166311X1559X38755',
        29 => '166311X1559X38756',
        30 => '166311X1559X38757',
        31 => '166311X1559X3875834',
        32 => '166311X1559X38759',
        33 => '166311X1560X38760',
        34 => '166311X1560X38761',
        35 => '166311X1560X38762',
        36 => '166311X1560X3876339',
        37 => '166311X1560X38764',
        38 => '166311X1561X3876547',
        39 => '166311X1561X38766',
        40 => '166311X1561X3876749',
        41 => '166311X1561X38768',
        42 => '166311X1561X3876951',
        43 => '166311X1561X38770',
        44 => '166311X1562X3877153',
        45 => '166311X1562X38772',
        46 => '166311X1562X3877355',
        47 => '166311X1562X38774',
        48 => '166311X1562X3877557',
        49 => '166311X1562X38776',
        50 => '166311X1563X38777',
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
     *
     *  da fare
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
