<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSurveymenuEntryFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeSurveymenuEntry
 *
 * @method static CachedBuilder|LimeSurveymenuEntry all($columns = [])
 * @method static CachedBuilder|LimeSurveymenuEntry avg($column)
 * @method static CachedBuilder|LimeSurveymenuEntry cache(array $tags = [])
 * @method static CachedBuilder|LimeSurveymenuEntry cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSurveymenuEntry count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSurveymenuEntry disableModelCaching()
 * @method static CachedBuilder|LimeSurveymenuEntry exists()
 * @method static LimeSurveymenuEntryFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSurveymenuEntry flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSurveymenuEntry getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSurveymenuEntry inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSurveymenuEntry insert(array $values)
 * @method static CachedBuilder|LimeSurveymenuEntry isCachable()
 * @method static CachedBuilder|LimeSurveymenuEntry max($column)
 * @method static CachedBuilder|LimeSurveymenuEntry min($column)
 * @method static CachedBuilder|LimeSurveymenuEntry newModelQuery()
 * @method static CachedBuilder|LimeSurveymenuEntry newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSurveymenuEntry query()
 * @method static CachedBuilder|LimeSurveymenuEntry sum($column)
 * @method static CachedBuilder|LimeSurveymenuEntry truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int|null $menu_id
 * @property int|null $user_id
 * @property int|null $ordering
 * @property string|null $name
 * @property string $title
 * @property string $menu_title
 * @property string|null $menu_description
 * @property string $menu_icon
 * @property string $menu_icon_type
 * @property string $menu_class
 * @property string $menu_link
 * @property string $action
 * @property string $template
 * @property string $partial
 * @property string $classes
 * @property string $permission
 * @property string|null $permission_grade
 * @property string|null $data
 * @property string $getdatamethod
 * @property string $language
 * @property int|null $showincollapse
 * @property int $active
 * @property Carbon|null $changed_at
 * @property int $changed_by
 * @property Carbon|null $created_at
 * @property int $created_by
 *
 * @method static CachedBuilder|LimeSurveymenuEntry whereAction($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereActive($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereChangedAt($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereChangedBy($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereClasses($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereCreatedAt($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereCreatedBy($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereData($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereGetdatamethod($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereId($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereLanguage($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereMenuClass($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereMenuDescription($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereMenuIcon($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereMenuIconType($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereMenuId($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereMenuLink($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereMenuTitle($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereName($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereOrdering($value)
 * @method static CachedBuilder|LimeSurveymenuEntry wherePartial($value)
 * @method static CachedBuilder|LimeSurveymenuEntry wherePermission($value)
 * @method static CachedBuilder|LimeSurveymenuEntry wherePermissionGrade($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereShowincollapse($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereTemplate($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereTitle($value)
 * @method static CachedBuilder|LimeSurveymenuEntry whereUserId($value)
 *
 * @mixin \Eloquent
 */
class LimeSurveymenuEntry extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_surveymenu_entries';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'menu_id', 'user_id', 'ordering', 'name', 'title', 'menu_title', 'menu_description', 'menu_icon', 'menu_icon_type', 'menu_class', 'menu_link', 'action', 'template', 'partial', 'classes', 'permission', 'permission_grade', 'data', 'getdatamethod', 'language', 'showincollapse', 'active', 'changed_at', 'changed_by', 'created_at', 'created_by',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'menu_id' => 'int', 'user_id' => 'int', 'ordering' => 'int', 'name' => 'string', 'title' => 'string', 'menu_title' => 'string', 'menu_description' => 'string', 'menu_icon' => 'string', 'menu_icon_type' => 'string', 'menu_class' => 'string', 'menu_link' => 'string', 'action' => 'string', 'template' => 'string', 'partial' => 'string', 'classes' => 'string', 'permission' => 'string', 'permission_grade' => 'string', 'data' => 'string', 'getdatamethod' => 'string', 'language' => 'string', 'showincollapse' => 'int', 'active' => 'int', 'changed_at' => 'datetime', 'changed_by' => 'int', 'created_at' => 'datetime', 'created_by' => 'int',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
