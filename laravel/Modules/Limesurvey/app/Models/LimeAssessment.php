<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeAssessmentFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeAssessment
 *
 * @method static CachedBuilder|LimeAssessment all($columns = [])
 * @method static CachedBuilder|LimeAssessment avg($column)
 * @method static CachedBuilder|LimeAssessment cache(array $tags = [])
 * @method static CachedBuilder|LimeAssessment cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeAssessment count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeAssessment disableModelCaching()
 * @method static CachedBuilder|LimeAssessment exists()
 * @method static LimeAssessmentFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeAssessment flushCache(array $tags = [])
 * @method static CachedBuilder|LimeAssessment getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeAssessment inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeAssessment insert(array $values)
 * @method static CachedBuilder|LimeAssessment isCachable()
 * @method static CachedBuilder|LimeAssessment max($column)
 * @method static CachedBuilder|LimeAssessment min($column)
 * @method static CachedBuilder|LimeAssessment newModelQuery()
 * @method static CachedBuilder|LimeAssessment newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeAssessment query()
 * @method static CachedBuilder|LimeAssessment sum($column)
 * @method static CachedBuilder|LimeAssessment truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int $sid
 * @property string $scope
 * @property int $gid
 * @property string $name
 * @property string $minimum
 * @property string $maximum
 * @property string $message
 * @property string $language
 *
 * @method static CachedBuilder|LimeAssessment whereGid($value)
 * @method static CachedBuilder|LimeAssessment whereId($value)
 * @method static CachedBuilder|LimeAssessment whereLanguage($value)
 * @method static CachedBuilder|LimeAssessment whereMaximum($value)
 * @method static CachedBuilder|LimeAssessment whereMessage($value)
 * @method static CachedBuilder|LimeAssessment whereMinimum($value)
 * @method static CachedBuilder|LimeAssessment whereName($value)
 * @method static CachedBuilder|LimeAssessment whereScope($value)
 * @method static CachedBuilder|LimeAssessment whereSid($value)
 *
 * @mixin \Eloquent
 */
class LimeAssessment extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_assessments';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'language', 'sid', 'scope', 'gid', 'name', 'minimum', 'maximum', 'message',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'language' => 'string', 'sid' => 'int', 'scope' => 'string', 'gid' => 'int', 'name' => 'string', 'minimum' => 'string', 'maximum' => 'string', 'message' => 'string',
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
