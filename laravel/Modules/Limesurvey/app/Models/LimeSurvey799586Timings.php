<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey799586TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey799586Timings
 *
 * @method static CachedBuilder|LimeSurvey799586Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey799586Timings avg($column)
 * @method static CachedBuilder|LimeSurvey799586Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey799586Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey799586Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey799586Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey799586Timings exists()
 * @method static LimeSurvey799586TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey799586Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey799586Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey799586Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey799586Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey799586Timings isCachable()
 * @method static CachedBuilder|LimeSurvey799586Timings max($column)
 * @method static CachedBuilder|LimeSurvey799586Timings min($column)
 * @method static CachedBuilder|LimeSurvey799586Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey799586Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey799586Timings query()
 * @method static CachedBuilder|LimeSurvey799586Timings sum($column)
 * @method static CachedBuilder|LimeSurvey799586Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $799586X1018time
 * @property float|null $799586X1018X33007time
 * @property float|null $799586X1007time
 * @property float|null $799586X1007X33041time
 * @property float|null $799586X1007X33012time
 * @property float|null $799586X1007X33013time
 * @property float|null $799586X1007X33014time
 * @property float|null $799586X1009time
 * @property float|null $799586X1009X33044time
 * @property float|null $799586X1008time
 * @property float|null $799586X1008X33015time
 * @property float|null $799586X1008X33016time
 * @property float|null $799586X1008X33017time
 * @property float|null $799586X1010time
 * @property float|null $799586X1010X33018time
 * @property float|null $799586X1010X33043time
 * @property float|null $799586X1010X33019time
 * @property float|null $799586X1010X33020time
 * @property float|null $799586X1011time
 * @property float|null $799586X1011X33021time
 * @property float|null $799586X1011X33022time
 * @property float|null $799586X1011X33023time
 * @property float|null $799586X1012time
 * @property float|null $799586X1012X33024time
 * @property float|null $799586X1012X33025time
 * @property float|null $799586X1012X33026time
 * @property float|null $799586X1013time
 * @property float|null $799586X1013X33027time
 * @property float|null $799586X1013X33028time
 * @property float|null $799586X1013X33029time
 * @property float|null $799586X1014time
 * @property float|null $799586X1014X33030time
 * @property float|null $799586X1014X33031time
 * @property float|null $799586X1015time
 * @property float|null $799586X1015X33032time
 * @property float|null $799586X1015X33033time
 * @property float|null $799586X1015X33034time
 * @property float|null $799586X1015X33042time
 * @property float|null $799586X1015X33035time
 * @property float|null $799586X1015X33036time
 * @property float|null $799586X1016time
 * @property float|null $799586X1016X33008time
 * @property float|null $799586X1016X33009time
 * @property float|null $799586X1016X33010time
 * @property float|null $799586X1016X33037time
 * @property float|null $799586X1016X33011time
 * @property float|null $799586X1016X33038time
 * @property float|null $799586X1017time
 * @property float|null $799586X1017X33006time
 * @property float|null $799586X1017X33039time
 * @property float|null $799586X1017X33040time
 * @property float|null $799586X1017X33045time
 *
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1007X33012time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1007X33013time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1007X33014time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1007X33041time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1007time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1008X33015time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1008X33016time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1008X33017time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1008time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1009X33044time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1009time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1010X33018time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1010X33019time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1010X33020time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1010X33043time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1010time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1011X33021time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1011X33022time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1011X33023time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1011time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1012X33024time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1012X33025time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1012X33026time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1012time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1013X33027time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1013X33028time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1013X33029time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1013time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1014X33030time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1014X33031time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1014time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1015X33032time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1015X33033time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1015X33034time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1015X33035time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1015X33036time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1015X33042time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1015time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1016X33008time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1016X33009time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1016X33010time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1016X33011time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1016X33037time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1016X33038time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1016time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1017X33006time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1017X33039time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1017X33040time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1017X33045time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1017time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1018X33007time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings where799586X1018time($value)
 * @method static CachedBuilder|LimeSurvey799586Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey799586Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey799586Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_799586_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '799586X1018time', '799586X1018X33007time', '799586X1007time', '799586X1007X33041time', '799586X1007X33012time', '799586X1007X33013time', '799586X1007X33014time', '799586X1009time', '799586X1009X33044time', '799586X1008time', '799586X1008X33015time', '799586X1008X33016time', '799586X1008X33017time', '799586X1010time', '799586X1010X33018time', '799586X1010X33043time', '799586X1010X33019time', '799586X1010X33020time', '799586X1011time', '799586X1011X33021time', '799586X1011X33022time', '799586X1011X33023time', '799586X1012time', '799586X1012X33024time', '799586X1012X33025time', '799586X1012X33026time', '799586X1013time', '799586X1013X33027time', '799586X1013X33028time', '799586X1013X33029time', '799586X1014time', '799586X1014X33030time', '799586X1014X33031time', '799586X1015time', '799586X1015X33032time', '799586X1015X33033time', '799586X1015X33034time', '799586X1015X33042time', '799586X1015X33035time', '799586X1015X33036time', '799586X1016time', '799586X1016X33008time', '799586X1016X33009time', '799586X1016X33010time', '799586X1016X33037time', '799586X1016X33011time', '799586X1016X33038time', '799586X1017time', '799586X1017X33006time', '799586X1017X33039time', '799586X1017X33040time', '799586X1017X33045time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '799586X1018time' => 'float', '799586X1018X33007time' => 'float', '799586X1007time' => 'float', '799586X1007X33041time' => 'float', '799586X1007X33012time' => 'float', '799586X1007X33013time' => 'float', '799586X1007X33014time' => 'float', '799586X1009time' => 'float', '799586X1009X33044time' => 'float', '799586X1008time' => 'float', '799586X1008X33015time' => 'float', '799586X1008X33016time' => 'float', '799586X1008X33017time' => 'float', '799586X1010time' => 'float', '799586X1010X33018time' => 'float', '799586X1010X33043time' => 'float', '799586X1010X33019time' => 'float', '799586X1010X33020time' => 'float', '799586X1011time' => 'float', '799586X1011X33021time' => 'float', '799586X1011X33022time' => 'float', '799586X1011X33023time' => 'float', '799586X1012time' => 'float', '799586X1012X33024time' => 'float', '799586X1012X33025time' => 'float', '799586X1012X33026time' => 'float', '799586X1013time' => 'float', '799586X1013X33027time' => 'float', '799586X1013X33028time' => 'float', '799586X1013X33029time' => 'float', '799586X1014time' => 'float', '799586X1014X33030time' => 'float', '799586X1014X33031time' => 'float', '799586X1015time' => 'float', '799586X1015X33032time' => 'float', '799586X1015X33033time' => 'float', '799586X1015X33034time' => 'float', '799586X1015X33042time' => 'float', '799586X1015X33035time' => 'float', '799586X1015X33036time' => 'float', '799586X1016time' => 'float', '799586X1016X33008time' => 'float', '799586X1016X33009time' => 'float', '799586X1016X33010time' => 'float', '799586X1016X33037time' => 'float', '799586X1016X33011time' => 'float', '799586X1016X33038time' => 'float', '799586X1017time' => 'float', '799586X1017X33006time' => 'float', '799586X1017X33039time' => 'float', '799586X1017X33040time' => 'float', '799586X1017X33045time' => 'float',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
