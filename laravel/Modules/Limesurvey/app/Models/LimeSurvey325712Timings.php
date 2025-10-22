<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey325712TimingsFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurvey325712Timings
 *
 * @method static CachedBuilder|LimeSurvey325712Timings all($columns = [])
 * @method static CachedBuilder|LimeSurvey325712Timings avg($column)
 * @method static CachedBuilder|LimeSurvey325712Timings cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey325712Timings cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey325712Timings count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey325712Timings disableModelCaching()
 * @method static CachedBuilder|LimeSurvey325712Timings exists()
 * @method static LimeSurvey325712TimingsFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey325712Timings flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey325712Timings getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey325712Timings inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey325712Timings insert(array $values)
 * @method static CachedBuilder|LimeSurvey325712Timings isCachable()
 * @method static CachedBuilder|LimeSurvey325712Timings max($column)
 * @method static CachedBuilder|LimeSurvey325712Timings min($column)
 * @method static CachedBuilder|LimeSurvey325712Timings newModelQuery()
 * @method static CachedBuilder|LimeSurvey325712Timings newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey325712Timings query()
 * @method static CachedBuilder|LimeSurvey325712Timings sum($column)
 * @method static CachedBuilder|LimeSurvey325712Timings truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property float|null $interviewtime
 * @property float|null $325712X973time
 * @property float|null $325712X973X32478time
 * @property float|null $325712X974time
 * @property float|null $325712X974X32502time
 * @property float|null $325712X974X32503time
 * @property float|null $325712X974X32504time
 * @property float|null $325712X975time
 * @property float|null $325712X975X32505time
 * @property float|null $325712X978time
 * @property float|null $325712X978X32516time
 * @property float|null $325712X978X32517time
 * @property float|null $325712X978X32518time
 * @property float|null $325712X978X32519time
 * @property float|null $325712X976time
 * @property float|null $325712X976X32520time
 * @property float|null $325712X976X32531time
 * @property float|null $325712X976X32532time
 * @property float|null $325712X979time
 * @property float|null $325712X979X32533time
 * @property float|null $325712X979X32544time
 * @property float|null $325712X979X32557time
 * @property float|null $325712X979X32579time
 * @property float|null $325712X979X32590time
 * @property float|null $325712X979X32601time
 * @property float|null $325712X979X32613time
 * @property float|null $325712X979X32624time
 * @property float|null $325712X979X32635time
 * @property float|null $325712X979X32646time
 * @property float|null $325712X979X32657time
 * @property float|null $325712X980time
 * @property float|null $325712X980X32658time
 * @property float|null $325712X980X32659time
 * @property float|null $325712X980X32660time
 * @property float|null $325712X980X32661time
 * @property float|null $325712X980X32668time
 * @property float|null $325712X977time
 * @property float|null $325712X977X32474time
 * @property float|null $325712X977X32476time
 * @property float|null $325712X977X32477time
 * @property float|null $325712X977X32479time
 * @property float|null $325712X977X32480time
 *
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X973X32478time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X973time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X974X32502time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X974X32503time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X974X32504time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X974time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X975X32505time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X975time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X976X32520time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X976X32531time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X976X32532time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X976time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X977X32474time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X977X32476time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X977X32477time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X977X32479time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X977X32480time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X977time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X978X32516time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X978X32517time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X978X32518time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X978X32519time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X978time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32533time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32544time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32557time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32579time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32590time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32601time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32613time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32624time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32635time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32646time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979X32657time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X979time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X980X32658time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X980X32659time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X980X32660time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X980X32661time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X980X32668time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings where325712X980time($value)
 * @method static CachedBuilder|LimeSurvey325712Timings whereId($value)
 * @method static CachedBuilder|LimeSurvey325712Timings whereInterviewtime($value)
 *
 * @mixin \Eloquent
 */
class LimeSurvey325712Timings extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_325712_timings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'interviewtime', '325712X973time', '325712X973X32478time', '325712X974time', '325712X974X32502time', '325712X974X32503time', '325712X974X32504time', '325712X975time', '325712X975X32505time', '325712X978time', '325712X978X32516time', '325712X978X32517time', '325712X978X32518time', '325712X978X32519time', '325712X976time', '325712X976X32520time', '325712X976X32531time', '325712X976X32532time', '325712X979time', '325712X979X32533time', '325712X979X32544time', '325712X979X32557time', '325712X979X32579time', '325712X979X32590time', '325712X979X32601time', '325712X979X32613time', '325712X979X32624time', '325712X979X32635time', '325712X979X32646time', '325712X979X32657time', '325712X980time', '325712X980X32658time', '325712X980X32659time', '325712X980X32660time', '325712X980X32661time', '325712X980X32668time', '325712X977time', '325712X977X32474time', '325712X977X32476time', '325712X977X32477time', '325712X977X32479time', '325712X977X32480time',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'interviewtime' => 'float', '325712X973time' => 'float', '325712X973X32478time' => 'float', '325712X974time' => 'float', '325712X974X32502time' => 'float', '325712X974X32503time' => 'float', '325712X974X32504time' => 'float', '325712X975time' => 'float', '325712X975X32505time' => 'float', '325712X978time' => 'float', '325712X978X32516time' => 'float', '325712X978X32517time' => 'float', '325712X978X32518time' => 'float', '325712X978X32519time' => 'float', '325712X976time' => 'float', '325712X976X32520time' => 'float', '325712X976X32531time' => 'float', '325712X976X32532time' => 'float', '325712X979time' => 'float', '325712X979X32533time' => 'float', '325712X979X32544time' => 'float', '325712X979X32557time' => 'float', '325712X979X32579time' => 'float', '325712X979X32590time' => 'float', '325712X979X32601time' => 'float', '325712X979X32613time' => 'float', '325712X979X32624time' => 'float', '325712X979X32635time' => 'float', '325712X979X32646time' => 'float', '325712X979X32657time' => 'float', '325712X980time' => 'float', '325712X980X32658time' => 'float', '325712X980X32659time' => 'float', '325712X980X32660time' => 'float', '325712X980X32661time' => 'float', '325712X980X32668time' => 'float', '325712X977time' => 'float', '325712X977X32474time' => 'float', '325712X977X32476time' => 'float', '325712X977X32477time' => 'float', '325712X977X32479time' => 'float', '325712X977X32480time' => 'float',
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
