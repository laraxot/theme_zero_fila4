<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurveyLinkFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeSurveyLink
 *
 * @method static CachedBuilder|LimeSurveyLink all($columns = [])
 * @method static CachedBuilder|LimeSurveyLink avg($column)
 * @method static CachedBuilder|LimeSurveyLink cache(array $tags = [])
 * @method static CachedBuilder|LimeSurveyLink cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurveyLink count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurveyLink disableModelCaching()
 * @method static CachedBuilder|LimeSurveyLink exists()
 * @method static LimeSurveyLinkFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurveyLink flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurveyLink getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurveyLink inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurveyLink insert(array $values)
 * @method static CachedBuilder|LimeSurveyLink isCachable()
 * @method static CachedBuilder|LimeSurveyLink max($column)
 * @method static CachedBuilder|LimeSurveyLink min($column)
 * @method static CachedBuilder|LimeSurveyLink newModelQuery()
 * @method static CachedBuilder|LimeSurveyLink newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurveyLink query()
 * @method static CachedBuilder|LimeSurveyLink sum($column)
 * @method static CachedBuilder|LimeSurveyLink truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property string $participant_id
 * @property int $token_id
 * @property int $survey_id
 * @property Carbon|null $date_created
 * @property Carbon|null $date_invited
 * @property Carbon|null $date_completed
 *
 * @method static CachedBuilder|LimeSurveyLink whereDateCompleted($value)
 * @method static CachedBuilder|LimeSurveyLink whereDateCreated($value)
 * @method static CachedBuilder|LimeSurveyLink whereDateInvited($value)
 * @method static CachedBuilder|LimeSurveyLink whereParticipantId($value)
 * @method static CachedBuilder|LimeSurveyLink whereSurveyId($value)
 * @method static CachedBuilder|LimeSurveyLink whereTokenId($value)
 *
 * @mixin \Eloquent
 */
class LimeSurveyLink extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_survey_links';

    /**  @var string   */
    protected $primaryKey = 'participant_id';

    /** @var array<int, string>  */
    protected $fillable = [
        'token_id', 'survey_id', 'date_created', 'date_invited', 'date_completed',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'participant_id' => 'string', 'token_id' => 'int', 'survey_id' => 'int', 'date_created' => 'datetime', 'date_invited' => 'datetime', 'date_completed' => 'datetime',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
