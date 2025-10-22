<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurveyUrlParameterFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSurveyUrlParameter
 *
 * @method static CachedBuilder|LimeSurveyUrlParameter all($columns = [])
 * @method static CachedBuilder|LimeSurveyUrlParameter avg($column)
 * @method static CachedBuilder|LimeSurveyUrlParameter cache(array $tags = [])
 * @method static CachedBuilder|LimeSurveyUrlParameter cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurveyUrlParameter count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurveyUrlParameter disableModelCaching()
 * @method static CachedBuilder|LimeSurveyUrlParameter exists()
 * @method static LimeSurveyUrlParameterFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurveyUrlParameter flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurveyUrlParameter getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurveyUrlParameter inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurveyUrlParameter insert(array $values)
 * @method static CachedBuilder|LimeSurveyUrlParameter isCachable()
 * @method static CachedBuilder|LimeSurveyUrlParameter max($column)
 * @method static CachedBuilder|LimeSurveyUrlParameter min($column)
 * @method static CachedBuilder|LimeSurveyUrlParameter newModelQuery()
 * @method static CachedBuilder|LimeSurveyUrlParameter newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurveyUrlParameter query()
 * @method static CachedBuilder|LimeSurveyUrlParameter sum($column)
 * @method static CachedBuilder|LimeSurveyUrlParameter truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int $sid
 * @property string $parameter
 * @property int|null $targetqid
 * @property int|null $targetsqid
 *
 * @method static CachedBuilder|LimeSurveyUrlParameter whereId($value)
 * @method static CachedBuilder|LimeSurveyUrlParameter whereParameter($value)
 * @method static CachedBuilder|LimeSurveyUrlParameter whereSid($value)
 * @method static CachedBuilder|LimeSurveyUrlParameter whereTargetqid($value)
 * @method static CachedBuilder|LimeSurveyUrlParameter whereTargetsqid($value)
 *
 * @mixin \Eloquent
 */
class LimeSurveyUrlParameter extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_url_parameters';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'sid', 'parameter', 'targetqid', 'targetsqid',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'sid' => 'int', 'parameter' => 'string', 'targetqid' => 'int', 'targetsqid' => 'int',
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
