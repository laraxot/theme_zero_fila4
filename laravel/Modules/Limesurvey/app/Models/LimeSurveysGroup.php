<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurveysGroupFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeSurveysGroup
 *
 * @method static CachedBuilder|LimeSurveysGroup all($columns = [])
 * @method static CachedBuilder|LimeSurveysGroup avg($column)
 * @method static CachedBuilder|LimeSurveysGroup cache(array $tags = [])
 * @method static CachedBuilder|LimeSurveysGroup cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurveysGroup count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurveysGroup disableModelCaching()
 * @method static CachedBuilder|LimeSurveysGroup exists()
 * @method static LimeSurveysGroupFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurveysGroup flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurveysGroup getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurveysGroup inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurveysGroup insert(array $values)
 * @method static CachedBuilder|LimeSurveysGroup isCachable()
 * @method static CachedBuilder|LimeSurveysGroup max($column)
 * @method static CachedBuilder|LimeSurveysGroup min($column)
 * @method static CachedBuilder|LimeSurveysGroup newModelQuery()
 * @method static CachedBuilder|LimeSurveysGroup newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurveysGroup query()
 * @method static CachedBuilder|LimeSurveysGroup sum($column)
 * @method static CachedBuilder|LimeSurveysGroup truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $gsid
 * @property string $name
 * @property string|null $title
 * @property string|null $template
 * @property string|null $description
 * @property int $sortorder
 * @property int|null $owner_id
 * @property int|null $parent_id
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property int $created_by
 * @property int|null $alwaysavailable
 *
 * @method static CachedBuilder|LimeSurveysGroup whereAlwaysavailable($value)
 * @method static CachedBuilder|LimeSurveysGroup whereCreated($value)
 * @method static CachedBuilder|LimeSurveysGroup whereCreatedBy($value)
 * @method static CachedBuilder|LimeSurveysGroup whereDescription($value)
 * @method static CachedBuilder|LimeSurveysGroup whereGsid($value)
 * @method static CachedBuilder|LimeSurveysGroup whereModified($value)
 * @method static CachedBuilder|LimeSurveysGroup whereName($value)
 * @method static CachedBuilder|LimeSurveysGroup whereOwnerId($value)
 * @method static CachedBuilder|LimeSurveysGroup whereParentId($value)
 * @method static CachedBuilder|LimeSurveysGroup whereSortorder($value)
 * @method static CachedBuilder|LimeSurveysGroup whereTemplate($value)
 * @method static CachedBuilder|LimeSurveysGroup whereTitle($value)
 *
 * @mixin \Eloquent
 */
class LimeSurveysGroup extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_surveys_groups';

    /**  @var string   */
    protected $primaryKey = 'gsid';

    /** @var array<int, string>  */
    protected $fillable = [
        'name', 'title', 'template', 'description', 'sortorder', 'owner_id', 'parent_id', 'created', 'modified', 'created_by',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'gsid' => 'int', 'name' => 'string', 'title' => 'string', 'template' => 'string', 'description' => 'string', 'sortorder' => 'int', 'owner_id' => 'int', 'parent_id' => 'int', 'created' => 'datetime', 'modified' => 'datetime', 'created_by' => 'int',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
