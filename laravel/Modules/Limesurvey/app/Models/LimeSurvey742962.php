<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey742962Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey742962
 *
 * @method static CachedBuilder|LimeSurvey742962 all($columns = [])
 * @method static CachedBuilder|LimeSurvey742962 avg($column)
 * @method static CachedBuilder|LimeSurvey742962 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey742962 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey742962 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey742962 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey742962 exists()
 * @method static LimeSurvey742962Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey742962 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey742962 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey742962 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey742962 insert(array $values)
 * @method static CachedBuilder|LimeSurvey742962 isCachable()
 * @method static CachedBuilder|LimeSurvey742962 max($column)
 * @method static CachedBuilder|LimeSurvey742962 min($column)
 * @method static CachedBuilder|LimeSurvey742962 newModelQuery()
 * @method static CachedBuilder|LimeSurvey742962 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey742962 query()
 * @method static CachedBuilder|LimeSurvey742962 sum($column)
 * @method static CachedBuilder|LimeSurvey742962 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $token
 * @property Carbon|null $submitdate
 * @property int|null $lastpage
 * @property string $startlanguage
 * @property string|null $seed
 * @property string|null $742962X919X31626
 * @property string|null $742962X919X31762
 * @property string|null $742962X919X31624
 * @property string|null $742962X919X31671
 * @property string|null $742962X919X31625
 * @property string|null $742962X912X31677
 * @property string|null $742962X912X316111_SQ001
 * @property string|null $742962X912X316111_SQ002
 * @property string|null $742962X912X316112_SQ001
 * @property string|null $742962X912X316112_SQ002
 * @property string|null $742962X912X316113_SQ001
 * @property string|null $742962X912X316113_SQ002
 * @property string|null $742962X912X316114_SQ001
 * @property string|null $742962X912X316114_SQ002
 * @property string|null $742962X912X31612
 * @property string|null $742962X913X316781_SQ001
 * @property string|null $742962X913X316781_SQ002
 * @property string|null $742962X913X316782_SQ001
 * @property string|null $742962X913X316782_SQ002
 * @property string|null $742962X913X316783_SQ001
 * @property string|null $742962X913X316783_SQ002
 * @property string|null $742962X913X316784_SQ001
 * @property string|null $742962X913X316784_SQ002
 * @property string|null $742962X913X316785_SQ001
 * @property string|null $742962X913X316785_SQ002
 * @property string|null $742962X913X316786_SQ001
 * @property string|null $742962X913X316786_SQ002
 * @property string|null $742962X913X31691
 * @property string|null $742962X914X316921_SQ001
 * @property string|null $742962X914X316921_SQ002
 * @property string|null $742962X914X316922_SQ001
 * @property string|null $742962X914X316922_SQ002
 * @property string|null $742962X914X316923_SQ001
 * @property string|null $742962X914X316923_SQ002
 * @property string|null $742962X914X316924_SQ001
 * @property string|null $742962X914X316924_SQ002
 * @property string|null $742962X914X31706
 * @property string|null $742962X915X31722
 * @property string|null $742962X915X31723
 * @property string|null $742962X915X317151
 * @property string|null $742962X915X317152
 * @property string|null $742962X915X317153
 * @property string|null $742962X915X317154
 * @property string|null $742962X915X317155
 * @property string|null $742962X915X317156
 * @property string|null $742962X915X31715other
 * @property string|null $742962X916X31724
 * @property string|null $742962X920X317251_SQ001
 * @property string|null $742962X920X317251_SQ002
 * @property string|null $742962X920X317252_SQ001
 * @property string|null $742962X920X317252_SQ002
 * @property string|null $742962X920X317253_SQ001
 * @property string|null $742962X920X317253_SQ002
 * @property string|null $742962X920X317351
 * @property string|null $742962X920X317352
 * @property string|null $742962X920X317353
 * @property string|null $742962X920X317354
 * @property string|null $742962X920X31735other
 * @property string|null $742962X920X31740
 * @property string|null $742962X917X317411_SQ001
 * @property string|null $742962X917X317411_SQ002
 * @property string|null $742962X917X317412_SQ001
 * @property string|null $742962X917X317412_SQ002
 * @property string|null $742962X917X31751
 * @property string|null $742962X917X31752
 * @property string|null $742962X917X31621
 * @property string|null $742962X921X31753
 * @property string|null $742962X921X31754
 * @property string|null $742962X918X31755
 * @property string|null $742962X918X31756
 * @property string|null $742962X918X31757
 * @property string|null $742962X918X31758
 * @property string|null $742962X918X31759
 * @property string|null $742962X918X31622
 * @property Carbon|null $742962X922X31760
 * @property Carbon|null $742962X922X31761
 * @property string|null $742962X922X31763
 * @property string|null $742962X922X31764
 *
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X316111SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X316111SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X316112SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X316112SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X316113SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X316113SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X316114SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X316114SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X31612($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X912X31677($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316781SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316781SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316782SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316782SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316783SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316783SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316784SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316784SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316785SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316785SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316786SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X316786SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X913X31691($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X914X316921SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X914X316921SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X914X316922SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X914X316922SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X914X316923SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X914X316923SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X914X316924SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X914X316924SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X914X31706($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X915X317151($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X915X317152($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X915X317153($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X915X317154($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X915X317155($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X915X317156($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X915X31715other($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X915X31722($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X915X31723($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X916X31724($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X917X31621($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X917X317411SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X917X317411SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X917X317412SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X917X317412SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X917X31751($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X917X31752($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X918X31622($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X918X31755($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X918X31756($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X918X31757($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X918X31758($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X918X31759($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X919X31624($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X919X31625($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X919X31626($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X919X31671($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X919X31762($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317251SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317251SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317252SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317252SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317253SQ001($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317253SQ002($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317351($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317352($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317353($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X317354($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X31735other($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X920X31740($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X921X31753($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X921X31754($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X922X31760($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X922X31761($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X922X31763($value)
 * @method static CachedBuilder|LimeSurvey742962 where742962X922X31764($value)
 * @method static CachedBuilder|LimeSurvey742962 whereId($value)
 * @method static CachedBuilder|LimeSurvey742962 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey742962 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey742962 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey742962 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey742962 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey742962 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_742962';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', '742962X919X31626', '742962X919X31762', '742962X919X31624', '742962X919X31671', '742962X919X31625', '742962X912X31677', '742962X912X316111_SQ001', '742962X912X316111_SQ002', '742962X912X316112_SQ001', '742962X912X316112_SQ002', '742962X912X316113_SQ001', '742962X912X316113_SQ002', '742962X912X316114_SQ001', '742962X912X316114_SQ002', '742962X912X31612', '742962X913X316781_SQ001', '742962X913X316781_SQ002', '742962X913X316782_SQ001', '742962X913X316782_SQ002', '742962X913X316783_SQ001', '742962X913X316783_SQ002', '742962X913X316784_SQ001', '742962X913X316784_SQ002', '742962X913X316785_SQ001', '742962X913X316785_SQ002', '742962X913X316786_SQ001', '742962X913X316786_SQ002', '742962X913X31691', '742962X914X316921_SQ001', '742962X914X316921_SQ002', '742962X914X316922_SQ001', '742962X914X316922_SQ002', '742962X914X316923_SQ001', '742962X914X316923_SQ002', '742962X914X316924_SQ001', '742962X914X316924_SQ002', '742962X914X31706', '742962X915X31722', '742962X915X31723', '742962X915X317151', '742962X915X317152', '742962X915X317153', '742962X915X317154', '742962X915X317155', '742962X915X317156', '742962X915X31715other', '742962X916X31724', '742962X920X317251_SQ001', '742962X920X317251_SQ002', '742962X920X317252_SQ001', '742962X920X317252_SQ002', '742962X920X317253_SQ001', '742962X920X317253_SQ002', '742962X920X317351', '742962X920X317352', '742962X920X317353', '742962X920X317354', '742962X920X31735other', '742962X920X31740', '742962X917X317411_SQ001', '742962X917X317411_SQ002', '742962X917X317412_SQ001', '742962X917X317412_SQ002', '742962X917X31751', '742962X917X31752', '742962X917X31621', '742962X921X31753', '742962X921X31754', '742962X918X31755', '742962X918X31756', '742962X918X31757', '742962X918X31758', '742962X918X31759', '742962X918X31622', '742962X922X31760', '742962X922X31761', '742962X922X31763', '742962X922X31764',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', '742962X919X31626' => 'string', '742962X919X31762' => 'string', '742962X919X31624' => 'string', '742962X919X31671' => 'string', '742962X919X31625' => 'string', '742962X912X31677' => 'string', '742962X912X316111_SQ001' => 'string', '742962X912X316111_SQ002' => 'string', '742962X912X316112_SQ001' => 'string', '742962X912X316112_SQ002' => 'string', '742962X912X316113_SQ001' => 'string', '742962X912X316113_SQ002' => 'string', '742962X912X316114_SQ001' => 'string', '742962X912X316114_SQ002' => 'string', '742962X912X31612' => 'string', '742962X913X316781_SQ001' => 'string', '742962X913X316781_SQ002' => 'string', '742962X913X316782_SQ001' => 'string', '742962X913X316782_SQ002' => 'string', '742962X913X316783_SQ001' => 'string', '742962X913X316783_SQ002' => 'string', '742962X913X316784_SQ001' => 'string', '742962X913X316784_SQ002' => 'string', '742962X913X316785_SQ001' => 'string', '742962X913X316785_SQ002' => 'string', '742962X913X316786_SQ001' => 'string', '742962X913X316786_SQ002' => 'string', '742962X913X31691' => 'string', '742962X914X316921_SQ001' => 'string', '742962X914X316921_SQ002' => 'string', '742962X914X316922_SQ001' => 'string', '742962X914X316922_SQ002' => 'string', '742962X914X316923_SQ001' => 'string', '742962X914X316923_SQ002' => 'string', '742962X914X316924_SQ001' => 'string', '742962X914X316924_SQ002' => 'string', '742962X914X31706' => 'string', '742962X915X31722' => 'string', '742962X915X31723' => 'string', '742962X915X317151' => 'string', '742962X915X317152' => 'string', '742962X915X317153' => 'string', '742962X915X317154' => 'string', '742962X915X317155' => 'string', '742962X915X317156' => 'string', '742962X915X31715other' => 'string', '742962X916X31724' => 'string', '742962X920X317251_SQ001' => 'string', '742962X920X317251_SQ002' => 'string', '742962X920X317252_SQ001' => 'string', '742962X920X317252_SQ002' => 'string', '742962X920X317253_SQ001' => 'string', '742962X920X317253_SQ002' => 'string', '742962X920X317351' => 'string', '742962X920X317352' => 'string', '742962X920X317353' => 'string', '742962X920X317354' => 'string', '742962X920X31735other' => 'string', '742962X920X31740' => 'string', '742962X917X317411_SQ001' => 'string', '742962X917X317411_SQ002' => 'string', '742962X917X317412_SQ001' => 'string', '742962X917X317412_SQ002' => 'string', '742962X917X31751' => 'string', '742962X917X31752' => 'string', '742962X917X31621' => 'string', '742962X921X31753' => 'string', '742962X921X31754' => 'string', '742962X918X31755' => 'string', '742962X918X31756' => 'string', '742962X918X31757' => 'string', '742962X918X31622' => 'string', '742962X922X31760' => 'datetime', '742962X922X31761' => 'datetime', '742962X922X31763' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
