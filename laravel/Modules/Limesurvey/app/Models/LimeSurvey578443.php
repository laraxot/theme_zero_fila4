<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurvey578443Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;

/**
 * Modules\Limesurvey\Models\LimeSurvey578443
 *
 * @method static CachedBuilder|LimeSurvey578443 all($columns = [])
 * @method static CachedBuilder|LimeSurvey578443 avg($column)
 * @method static CachedBuilder|LimeSurvey578443 cache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey578443 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurvey578443 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurvey578443 disableModelCaching()
 * @method static CachedBuilder|LimeSurvey578443 exists()
 * @method static LimeSurvey578443Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurvey578443 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurvey578443 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurvey578443 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurvey578443 insert(array $values)
 * @method static CachedBuilder|LimeSurvey578443 isCachable()
 * @method static CachedBuilder|LimeSurvey578443 max($column)
 * @method static CachedBuilder|LimeSurvey578443 min($column)
 * @method static CachedBuilder|LimeSurvey578443 newModelQuery()
 * @method static CachedBuilder|LimeSurvey578443 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurvey578443 query()
 * @method static CachedBuilder|LimeSurvey578443 sum($column)
 * @method static CachedBuilder|LimeSurvey578443 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @mixin \Eloquent
 */
class LimeSurvey578443 extends BaseModel implements LimeSurveyXXXContract
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_survey_578443';

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
        8 => '578443X1420X37135SQ001',
        9 => '578443X1420X37138',
        10 => '578443X1420X37139SQ001',
        11 => '578443X1420X37145SQ001',
        12 => '578443X1420X37150',
        13 => '578443X1420X37151SQ001',
        14 => '578443X1420X37157',
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
