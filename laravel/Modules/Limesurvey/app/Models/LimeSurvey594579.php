<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey594579Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey594579
 *
 * @method static CachedBuilder|LimeSurvey594579 all($columns = [])
 * @method static CachedBuilder|LimeSurvey594579 avg($column)
 * @method static CachedBuilder|LimeSurvey594579 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey594579 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey594579 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey594579 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey594579 exists()
 * @method static LimeSurvey594579Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey594579 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey594579 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey594579 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey594579 insert(array $values)
 * @method static CachedBuilder|LimeSurvey594579 isCachable()
 * @method static CachedBuilder|LimeSurvey594579 max($column)
 * @method static CachedBuilder|LimeSurvey594579 min($column)
 * @method static CachedBuilder|LimeSurvey594579 newModelQuery()
 * @method static CachedBuilder|LimeSurvey594579 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey594579 query()
 * @method static CachedBuilder|LimeSurvey594579 sum($column)
 * @method static CachedBuilder|LimeSurvey594579 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @mixin \Eloquent
 */
class LimeSurvey594579 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_survey_594579';

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
        8 => '594579X1419X37098SQ001',
        9 => '594579X1419X37109',
        10 => '594579X1419X37118SQ001',
        11 => '594579X1419X37121SQ001',
        12 => '594579X1419X37125',
        13 => '594579X1419X37126SQ001',
        14 => '594579X1419X37130SQ001',
        15 => '594579X1419X37134',
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
