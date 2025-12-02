<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurveymenuFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeSurveymenu
 *
 * @method static CachedBuilder|LimeSurveymenu all($columns = [])
 * @method static CachedBuilder|LimeSurveymenu avg($column)
 * @method static CachedBuilder|LimeSurveymenu cache(array $tags = [])
 * @method static CachedBuilder|LimeSurveymenu cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurveymenu count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurveymenu disableModelCaching()
 * @method static CachedBuilder|LimeSurveymenu exists()
 * @method static LimeSurveymenuFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurveymenu flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurveymenu getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurveymenu inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurveymenu insert(array $values)
 * @method static CachedBuilder|LimeSurveymenu isCachable()
 * @method static CachedBuilder|LimeSurveymenu max($column)
 * @method static CachedBuilder|LimeSurveymenu min($column)
 * @method static CachedBuilder|LimeSurveymenu newModelQuery()
 * @method static CachedBuilder|LimeSurveymenu newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurveymenu query()
 * @method static CachedBuilder|LimeSurveymenu sum($column)
 * @method static CachedBuilder|LimeSurveymenu truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $survey_id
 * @property int|null $user_id
 * @property string|null $name
 * @property int|null $ordering
 * @property int|null $level
 * @property string $title
 * @property string $position
 * @property string|null $description
 * @property int|null $showincollapse
 * @property int $active
 * @property Carbon|null $changed_at
 * @property int $changed_by
 * @property Carbon|null $created_at
 * @property int $created_by
 *
 * @method static CachedBuilder|LimeSurveymenu whereActive($value)
 * @method static CachedBuilder|LimeSurveymenu whereChangedAt($value)
 * @method static CachedBuilder|LimeSurveymenu whereChangedBy($value)
 * @method static CachedBuilder|LimeSurveymenu whereCreatedAt($value)
 * @method static CachedBuilder|LimeSurveymenu whereCreatedBy($value)
 * @method static CachedBuilder|LimeSurveymenu whereDescription($value)
 * @method static CachedBuilder|LimeSurveymenu whereId($value)
 * @method static CachedBuilder|LimeSurveymenu whereLevel($value)
 * @method static CachedBuilder|LimeSurveymenu whereName($value)
 * @method static CachedBuilder|LimeSurveymenu whereOrdering($value)
 * @method static CachedBuilder|LimeSurveymenu whereParentId($value)
 * @method static CachedBuilder|LimeSurveymenu wherePosition($value)
 * @method static CachedBuilder|LimeSurveymenu whereShowincollapse($value)
 * @method static CachedBuilder|LimeSurveymenu whereSurveyId($value)
 * @method static CachedBuilder|LimeSurveymenu whereTitle($value)
 * @method static CachedBuilder|LimeSurveymenu whereUserId($value)
 *
 * @mixin \Eloquent
 */
class LimeSurveymenu extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_surveymenu';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'parent_id', 'survey_id', 'user_id', 'name', 'ordering', 'level', 'title', 'position', 'description', 'showincollapse', 'active', 'changed_at', 'changed_by', 'created_at', 'created_by',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'parent_id' => 'int', 'survey_id' => 'int', 'user_id' => 'int', 'name' => 'string', 'ordering' => 'int', 'level' => 'int', 'title' => 'string', 'position' => 'string', 'description' => 'string', 'showincollapse' => 'int', 'active' => 'int', 'changed_at' => 'datetime', 'changed_by' => 'int', 'created_at' => 'datetime', 'created_by' => 'int',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
