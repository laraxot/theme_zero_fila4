<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey733454Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey733454
 *
 * @method static CachedBuilder|LimeSurvey733454 all($columns = [])
 * @method static CachedBuilder|LimeSurvey733454 avg($column)
 * @method static CachedBuilder|LimeSurvey733454 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey733454 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey733454 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey733454 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey733454 exists()
 * @method static LimeSurvey733454Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey733454 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey733454 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey733454 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey733454 insert(array $values)
 * @method static CachedBuilder|LimeSurvey733454 isCachable()
 * @method static CachedBuilder|LimeSurvey733454 max($column)
 * @method static CachedBuilder|LimeSurvey733454 min($column)
 * @method static CachedBuilder|LimeSurvey733454 newModelQuery()
 * @method static CachedBuilder|LimeSurvey733454 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey733454 query()
 * @method static CachedBuilder|LimeSurvey733454 sum($column)
 * @method static CachedBuilder|LimeSurvey733454 truncate()
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
 * @property string|null $733454X953X32199
 * @property string|null $733454X954X321792_01
 * @property string|null $733454X954X321792_02
 * @property string|null $733454X954X321793_01
 * @property string|null $733454X954X321793_02
 * @property string|null $733454X954X321794_01
 * @property string|null $733454X954X321794_02
 * @property string|null $733454X954X321795_01
 * @property string|null $733454X954X321795_02
 * @property string|null $733454X954X321796_01
 * @property string|null $733454X954X321796_02
 * @property string|null $733454X954X321797_01
 * @property string|null $733454X954X321797_02
 * @property string|null $733454X954X321798_01
 * @property string|null $733454X954X321798_02
 * @property string|null $733454X954X321799_01
 * @property string|null $733454X954X321799_02
 * @property string|null $733454X954X3217910_01
 * @property string|null $733454X954X3217910_02
 * @property string|null $733454X954X3217911_01
 * @property string|null $733454X954X3217911_02
 * @property string|null $733454X954X3217912_01
 * @property string|null $733454X954X3217912_02
 * @property string|null $733454X954X3217913_01
 * @property string|null $733454X954X3217913_02
 * @property string|null $733454X954X3217914_01
 * @property string|null $733454X954X3217914_02
 * @property string|null $733454X954X3217915_01
 * @property string|null $733454X954X3217915_02
 * @property string|null $733454X954X3217916_01
 * @property string|null $733454X954X3217916_02
 * @property string|null $733454X954X3217917_01
 * @property string|null $733454X954X3217917_02
 * @property string|null $733454X954X3217918_01
 * @property string|null $733454X954X3217918_02
 * @property string|null $733454X954X3217919_01
 * @property string|null $733454X954X3217919_02
 * @property string|null $733454X954X32180
 * @property string|null $733454X954X32185
 * @property string|null $733454X955X32186
 * @property string|null $733454X955X32187
 * @property string|null $733454X958X32188
 * @property string|null $733454X958X32190
 * @property string|null $733454X958X32255
 * @property string|null $733454X956X32177
 * @property string|null $733454X956X32177other
 * @property string|null $733454X956X32176
 * @property string|null $733454X956X32178
 * @property string|null $733454X956X32178other
 * @property string|null $733454X956X32183
 * @property string|null $733454X956X32183other
 * @property string|null $733454X956X32182
 * @property string|null $733454X956X32181
 * @property string|null $733454X956X32184
 * @property string|null $733454X956X32193
 * @property string|null $733454X957X32194
 * @property string|null $733454X957X32196
 * @property Carbon|null $733454X957X32197
 * @property Carbon|null $733454X957X32198
 * @property string|null $733454X957X32200
 * @property string|null $733454X957X32201
 * @property string|null $733454X957X32201other
 *
 * @method static CachedBuilder|LimeSurvey733454 where733454X953X32199($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791001($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791002($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791101($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791102($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791201($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791202($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791301($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791302($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791401($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791402($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791501($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791502($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791601($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791602($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791701($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791702($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791801($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791802($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791901($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X321791902($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179201($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179202($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179301($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179302($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179401($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179402($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179501($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179502($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179601($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179602($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179701($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179702($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179801($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179802($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179901($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32179902($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32180($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X954X32185($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X955X32186($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X955X32187($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32176($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32177($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32177other($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32178($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32178other($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32181($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32182($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32183($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32183other($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32184($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X956X32193($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X957X32194($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X957X32196($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X957X32197($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X957X32198($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X957X32200($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X957X32201($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X957X32201other($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X958X32188($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X958X32190($value)
 * @method static CachedBuilder|LimeSurvey733454 where733454X958X32255($value)
 * @method static CachedBuilder|LimeSurvey733454 whereDatestamp($value)
 * @method static CachedBuilder|LimeSurvey733454 whereId($value)
 * @method static CachedBuilder|LimeSurvey733454 whereIpaddr($value)
 * @method static CachedBuilder|LimeSurvey733454 whereLastpage($value)
 * @method static CachedBuilder|LimeSurvey733454 whereSeed($value)
 * @method static CachedBuilder|LimeSurvey733454 whereStartdate($value)
 * @method static CachedBuilder|LimeSurvey733454 whereStartlanguage($value)
 * @method static CachedBuilder|LimeSurvey733454 whereSubmitdate($value)
 * @method static CachedBuilder|LimeSurvey733454 whereToken($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey733454 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_733454';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token', 'submitdate', 'lastpage', 'startlanguage', 'seed', 'startdate', 'datestamp', 'ipaddr', '733454X953X32199', '733454X954X321792_01', '733454X954X321792_02', '733454X954X321793_01', '733454X954X321793_02', '733454X954X321794_01', '733454X954X321794_02', '733454X954X321795_01', '733454X954X321795_02', '733454X954X321796_01', '733454X954X321796_02', '733454X954X321797_01', '733454X954X321797_02', '733454X954X321798_01', '733454X954X321798_02', '733454X954X321799_01', '733454X954X321799_02', '733454X954X3217910_01', '733454X954X3217910_02', '733454X954X3217911_01', '733454X954X3217911_02', '733454X954X3217912_01', '733454X954X3217912_02', '733454X954X3217913_01', '733454X954X3217913_02', '733454X954X3217914_01', '733454X954X3217914_02', '733454X954X3217915_01', '733454X954X3217915_02', '733454X954X3217916_01', '733454X954X3217916_02', '733454X954X3217917_01', '733454X954X3217917_02', '733454X954X3217918_01', '733454X954X3217918_02', '733454X954X3217919_01', '733454X954X3217919_02', '733454X954X32180', '733454X954X32185', '733454X955X32186', '733454X955X32187', '733454X958X32188', '733454X958X32190', '733454X958X32255', '733454X956X32177', '733454X956X32177other', '733454X956X32176', '733454X956X32178', '733454X956X32178other', '733454X956X32183', '733454X956X32183other', '733454X956X32182', '733454X956X32181', '733454X956X32184', '733454X956X32193', '733454X957X32194', '733454X957X32196', '733454X957X32197', '733454X957X32198', '733454X957X32200', '733454X957X32201', '733454X957X32201other',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'token' => 'string', 'submitdate' => 'datetime', 'lastpage' => 'int', 'startlanguage' => 'string', 'seed' => 'string', 'startdate' => 'datetime', 'datestamp' => 'datetime', 'ipaddr' => 'string', '733454X953X32199' => 'string', '733454X954X321792_01' => 'string', '733454X954X321792_02' => 'string', '733454X954X321793_01' => 'string', '733454X954X321793_02' => 'string', '733454X954X321794_01' => 'string', '733454X954X321794_02' => 'string', '733454X954X321795_01' => 'string', '733454X954X321795_02' => 'string', '733454X954X321796_01' => 'string', '733454X954X321796_02' => 'string', '733454X954X321797_01' => 'string', '733454X954X321797_02' => 'string', '733454X954X321798_01' => 'string', '733454X954X321798_02' => 'string', '733454X954X321799_01' => 'string', '733454X954X321799_02' => 'string', '733454X954X3217910_01' => 'string', '733454X954X3217910_02' => 'string', '733454X954X3217911_01' => 'string', '733454X954X3217911_02' => 'string', '733454X954X3217912_01' => 'string', '733454X954X3217912_02' => 'string', '733454X954X3217913_01' => 'string', '733454X954X3217913_02' => 'string', '733454X954X3217914_01' => 'string', '733454X954X3217914_02' => 'string', '733454X954X3217915_01' => 'string', '733454X954X3217915_02' => 'string', '733454X954X3217916_01' => 'string', '733454X954X3217916_02' => 'string', '733454X954X3217917_01' => 'string', '733454X954X3217917_02' => 'string', '733454X954X3217918_01' => 'string', '733454X954X3217918_02' => 'string', '733454X954X3217919_01' => 'string', '733454X954X3217919_02' => 'string', '733454X954X32180' => 'string', '733454X954X32185' => 'string', '733454X955X32186' => 'string', '733454X955X32187' => 'string', '733454X958X32188' => 'string', '733454X958X32190' => 'string', '733454X958X32255' => 'string', '733454X956X32177' => 'string', '733454X956X32177other' => 'string', '733454X956X32176' => 'string', '733454X956X32178' => 'string', '733454X956X32178other' => 'string', '733454X956X32183' => 'string', '733454X956X32183other' => 'string', '733454X956X32181' => 'string', '733454X956X32184' => 'string', '733454X956X32193' => 'string', '733454X957X32194' => 'string', '733454X957X32196' => 'string', '733454X957X32197' => 'datetime', '733454X957X32198' => 'datetime', '733454X957X32200' => 'string', '733454X957X32201' => 'string', '733454X957X32201other' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
