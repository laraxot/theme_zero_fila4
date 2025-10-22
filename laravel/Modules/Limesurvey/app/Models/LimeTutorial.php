<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTutorialFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTutorial
 *
 * @method static CachedBuilder|LimeTutorial all($columns = [])
 * @method static CachedBuilder|LimeTutorial avg($column)
 * @method static CachedBuilder|LimeTutorial cache(array $tags = [])
 * @method static CachedBuilder|LimeTutorial cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTutorial count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTutorial disableModelCaching()
 * @method static CachedBuilder|LimeTutorial exists()
 * @method static LimeTutorialFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTutorial flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTutorial getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTutorial inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTutorial insert(array $values)
 * @method static CachedBuilder|LimeTutorial isCachable()
 * @method static CachedBuilder|LimeTutorial max($column)
 * @method static CachedBuilder|LimeTutorial min($column)
 * @method static CachedBuilder|LimeTutorial newModelQuery()
 * @method static CachedBuilder|LimeTutorial newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTutorial query()
 * @method static CachedBuilder|LimeTutorial sum($column)
 * @method static CachedBuilder|LimeTutorial truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $tid
 * @property string|null $name
 * @property string|null $title
 * @property string|null $icon
 * @property string|null $description
 * @property int|null $active
 * @property string|null $settings
 * @property string $permission
 * @property string $permission_grade
 *
 * @method static CachedBuilder|LimeTutorial whereActive($value)
 * @method static CachedBuilder|LimeTutorial whereDescription($value)
 * @method static CachedBuilder|LimeTutorial whereIcon($value)
 * @method static CachedBuilder|LimeTutorial whereName($value)
 * @method static CachedBuilder|LimeTutorial wherePermission($value)
 * @method static CachedBuilder|LimeTutorial wherePermissionGrade($value)
 * @method static CachedBuilder|LimeTutorial whereSettings($value)
 * @method static CachedBuilder|LimeTutorial whereTid($value)
 * @method static CachedBuilder|LimeTutorial whereTitle($value)
 *
 * @mixin \Eloquent
 */
class LimeTutorial extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_tutorials';

    /**  @var string   */
    protected $primaryKey = 'tid';

    /** @var array<int, string>  */
    protected $fillable = [
        'name', 'title', 'icon', 'description', 'active', 'settings', 'permission', 'permission_grade',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'tid' => 'int', 'name' => 'string', 'title' => 'string', 'icon' => 'string', 'description' => 'string', 'active' => 'int', 'settings' => 'string', 'permission' => 'string', 'permission_grade' => 'string',
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
