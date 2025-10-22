<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey735128Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey735128
 *
 * @method static CachedBuilder|LimeSurvey735128 all($columns = [])
 * @method static CachedBuilder|LimeSurvey735128 avg($column)
 * @method static CachedBuilder|LimeSurvey735128 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey735128 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey735128 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey735128 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey735128 exists()
 * @method static LimeSurvey735128Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey735128 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey735128 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey735128 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey735128 insert(array $values)
 * @method static CachedBuilder|LimeSurvey735128 isCachable()
 * @method static CachedBuilder|LimeSurvey735128 max($column)
 * @method static CachedBuilder|LimeSurvey735128 min($column)
 * @method static CachedBuilder|LimeSurvey735128 newModelQuery()
 * @method static CachedBuilder|LimeSurvey735128 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey735128 query()
 * @method static CachedBuilder|LimeSurvey735128 sum($column)
 * @method static CachedBuilder|LimeSurvey735128 truncate()
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
 * @property string|null $735128X931X31971
 * @property string|null $735128X931X31823
 * @property string|null $735128X931X31824
 * @property string|null $735128X931X31824other
 * @property string|null $735128X931X31825
 * @property string|null $735128X932X31826004_01
 * @property string|null $735128X932X31826004_02
 * @property string|null $735128X932X31826005_01
 * @property string|null $735128X932X31826005_02
 * @property string|null $735128X932X31826006_01
 * @property string|null $735128X932X31826006_02
 * @property string|null $735128X932X31826007_01
 * @property string|null $735128X932X31826007_02
 * @property string|null $735128X932X31826008_01
 * @property string|null $735128X932X31826008_02
 * @property string|null $735128X932X31826009_01
 * @property string|null $735128X932X31826009_02
 * @property string|null $735128X932X31826010_01
 * @property string|null $735128X932X31826010_02
 * @property string|null $735128X932X31826011_01
 * @property string|null $735128X932X31826011_02
 * @property string|null $735128X932X31826012_01
 * @property string|null $735128X932X31826012_02
 * @property string|null $735128X932X31826013_01
 * @property string|null $735128X932X31826013_02
 * @property string|null $735128X932X31826014_01
 * @property string|null $735128X932X31826014_02
 * @property string|null $735128X932X31826015_01
 * @property string|null $735128X932X31826015_02
 * @property string|null $735128X932X31826016_01
 * @property string|null $735128X932X31826016_02
 * @property string|null $735128X932X31826017_01
 * @property string|null $735128X932X31826017_02
 * @property string|null $735128X932X31826018_01
 * @property string|null $735128X932X31826018_02
 * @property string|null $735128X932X31826019_01
 * @property string|null $735128X932X31826019_02
 * @property string|null $735128X932X31826020_01
 * @property string|null $735128X932X31826020_02
 * @property string|null $735128X932X31887
 * @property string|null $735128X932X31888
 * @property string|null $735128X932X31889023_001
 * @property string|null $735128X932X31889023_002
 * @property string|null $735128X932X31947
 * @property string|null $735128X932X31948025_001
 * @property string|null $735128X932X31948025_002
 * @property string|null $735128X933X31827
 * @property string|null $735128X933X31952
 * @property string|null $735128X933X31953
 * @property string|null $735128X933X319541
 * @property string|null $735128X933X319542
 * @property string|null $735128X933X319543
 * @property string|null $735128X933X319544
 * @property string|null $735128X933X319545
 * @property string|null $735128X933X319546
 * @property string|null $735128X933X319547
 * @property string|null $735128X933X319548
 * @property string|null $735128X933X319549
 * @property string|null $735128X934X31829
 * @property string|null $735128X934X31830
 * @property string|null $735128X934X31831
 * @property string|null $735128X934X31831other
 * @property string|null $735128X934X31832
 * @property string|null $735128X934X31967
 * @property string|null $735128X934X31965
 * @property string|null $735128X935X31966
 * @property string|null $735128X935X31968
 * @property Carbon|null $735128X935X31969
 * @property Carbon|null $735128X935X31970
 * @property string|null $735128X935X31972
 * @property string|null $735128X935X32032
 * @property string|null $735128X935X32032other
 *
 * @method static CachedBuilder|LimeSurvey735128 where735128X931X31823($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X931X31824($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X931X31824other($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X931X31825($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X931X31971($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600401($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600402($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600501($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600502($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600601($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600602($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600701($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600702($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600801($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600802($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600901($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182600902($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601001($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601002($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601101($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601102($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601201($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601202($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601301($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601302($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601401($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601402($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601501($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601502($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601601($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601602($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601701($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601702($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601801($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601802($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601901($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182601902($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182602001($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X3182602002($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X31887($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X31888($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X31889023001($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X31889023002($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X31947($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X31948025001($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X932X31948025002($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X31827($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X31952($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X31953($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X319541($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X319542($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X319543($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X319544($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X319545($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X319546($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X319547($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X319548($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X933X319549($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X934X31829($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X934X31830($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X934X31831($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X934X31831other($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X934X31832($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X934X31965($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X934X31967($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X935X31966($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X935X31968($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X935X31969($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X935X31970($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X935X31972($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X935X32032($value)
 * @method static CachedBuilder|LimeSurvey735128 where735128X935X32032other($value)
 * @method static CachedBuilder|LimeSurvey735128 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey735128 whereId($value)
 * @method static CachedBuilder|LimeSurvey735128 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey735128 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey735128 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey735128 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey735128 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey735128 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey735128 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey735128 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_735128';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '735128X931X31971', '735128X931X31823', '735128X931X31824', '735128X931X31824other', '735128X931X31825', '735128X932X31826004_01', '735128X932X31826004_02', '735128X932X31826005_01', '735128X932X31826005_02', '735128X932X31826006_01', '735128X932X31826006_02', '735128X932X31826007_01', '735128X932X31826007_02', '735128X932X31826008_01', '735128X932X31826008_02', '735128X932X31826009_01', '735128X932X31826009_02', '735128X932X31826010_01', '735128X932X31826010_02', '735128X932X31826011_01', '735128X932X31826011_02', '735128X932X31826012_01', '735128X932X31826012_02', '735128X932X31826013_01', '735128X932X31826013_02', '735128X932X31826014_01', '735128X932X31826014_02', '735128X932X31826015_01', '735128X932X31826015_02', '735128X932X31826016_01', '735128X932X31826016_02', '735128X932X31826017_01', '735128X932X31826017_02', '735128X932X31826018_01', '735128X932X31826018_02', '735128X932X31826019_01', '735128X932X31826019_02', '735128X932X31826020_01', '735128X932X31826020_02', '735128X932X31887', '735128X932X31888', '735128X932X31889023_001', '735128X932X31889023_002', '735128X932X31947', '735128X932X31948025_001', '735128X932X31948025_002', '735128X933X31827', '735128X933X31952', '735128X933X31953', '735128X933X319541', '735128X933X319542', '735128X933X319543', '735128X933X319544', '735128X933X319545', '735128X933X319546', '735128X933X319547', '735128X933X319548', '735128X933X319549', '735128X934X31829', '735128X934X31830', '735128X934X31831', '735128X934X31831other', '735128X934X31832', '735128X934X31967', '735128X934X31965', '735128X935X31966', '735128X935X31968', '735128X935X31969', '735128X935X31970', '735128X935X31972', '735128X935X32032', '735128X935X32032other',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '735128X931X31971' => 'string', '735128X931X31823' => 'string', '735128X931X31824' => 'string', '735128X931X31824other' => 'string', '735128X931X31825' => 'string', '735128X932X31826004_01' => 'string', '735128X932X31826004_02' => 'string', '735128X932X31826005_01' => 'string', '735128X932X31826005_02' => 'string', '735128X932X31826006_01' => 'string', '735128X932X31826006_02' => 'string', '735128X932X31826007_01' => 'string', '735128X932X31826007_02' => 'string', '735128X932X31826008_01' => 'string', '735128X932X31826008_02' => 'string', '735128X932X31826009_01' => 'string', '735128X932X31826009_02' => 'string', '735128X932X31826010_01' => 'string', '735128X932X31826010_02' => 'string', '735128X932X31826011_01' => 'string', '735128X932X31826011_02' => 'string', '735128X932X31826012_01' => 'string', '735128X932X31826012_02' => 'string', '735128X932X31826013_01' => 'string', '735128X932X31826013_02' => 'string', '735128X932X31826014_01' => 'string', '735128X932X31826014_02' => 'string', '735128X932X31826015_01' => 'string', '735128X932X31826015_02' => 'string', '735128X932X31826016_01' => 'string', '735128X932X31826016_02' => 'string', '735128X932X31826017_01' => 'string', '735128X932X31826017_02' => 'string', '735128X932X31826018_01' => 'string', '735128X932X31826018_02' => 'string', '735128X932X31826019_01' => 'string', '735128X932X31826019_02' => 'string', '735128X932X31826020_01' => 'string', '735128X932X31826020_02' => 'string', '735128X932X31887' => 'string', '735128X932X31888' => 'string', '735128X932X31889023_001' => 'string', '735128X932X31889023_002' => 'string', '735128X932X31947' => 'string', '735128X932X31948025_001' => 'string', '735128X932X31948025_002' => 'string', '735128X933X31827' => 'string', '735128X933X31952' => 'string', '735128X933X31953' => 'string', '735128X933X319541' => 'string', '735128X933X319542' => 'string', '735128X933X319543' => 'string', '735128X933X319544' => 'string', '735128X933X319545' => 'string', '735128X933X319546' => 'string', '735128X933X319547' => 'string', '735128X933X319548' => 'string', '735128X933X319549' => 'string', '735128X934X31829' => 'string', '735128X934X31830' => 'string', '735128X934X31831' => 'string', '735128X934X31831other' => 'string', '735128X934X31832' => 'string', '735128X934X31967' => 'string', '735128X934X31965' => 'string', '735128X935X31966' => 'string', '735128X935X31968' => 'string', '735128X935X31969' => 'datetime', '735128X935X31970' => 'datetime', '735128X935X31972' => 'string', '735128X935X32032' => 'string', '735128X935X32032other' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
