<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimePermissionFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimePermission
 *
 * @method static CachedBuilder|LimePermission all($columns = [])
 * @method static CachedBuilder|LimePermission avg($column)
 * @method static CachedBuilder|LimePermission cache(array $tags = [])
 * @method static CachedBuilder|LimePermission cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimePermission count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimePermission disableModelCaching()
 * @method static CachedBuilder|LimePermission exists()
 * @method static LimePermissionFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimePermission flushCache(array $tags = [])
 * @method static CachedBuilder|LimePermission getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimePermission inRandomOrder($seed = '')
 * @method static CachedBuilder|LimePermission insert(array $values)
 * @method static CachedBuilder|LimePermission isCachable()
 * @method static CachedBuilder|LimePermission max($column)
 * @method static CachedBuilder|LimePermission min($column)
 * @method static CachedBuilder|LimePermission newModelQuery()
 * @method static CachedBuilder|LimePermission newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimePermission query()
 * @method static CachedBuilder|LimePermission sum($column)
 * @method static CachedBuilder|LimePermission truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string $entity
 * @property int $entity_id
 * @property int $uid
 * @property string $permission
 * @property int $create_p
 * @property int $read_p
 * @property int $update_p
 * @property int $delete_p
 * @property int $import_p
 * @property int $export_p
 *
 * @method static CachedBuilder|LimePermission whereCreateP($value)
 * @method static CachedBuilder|LimePermission whereDeleteP($value)
 * @method static CachedBuilder|LimePermission whereEntity($value)
 * @method static CachedBuilder|LimePermission whereEntityId($value)
 * @method static CachedBuilder|LimePermission whereExportP($value)
 * @method static CachedBuilder|LimePermission whereId($value)
 * @method static CachedBuilder|LimePermission whereImportP($value)
 * @method static CachedBuilder|LimePermission wherePermission($value)
 * @method static CachedBuilder|LimePermission whereReadP($value)
 * @method static CachedBuilder|LimePermission whereUid($value)
 * @method static CachedBuilder|LimePermission whereUpdateP($value)
 *
 * @mixin \Eloquent
 */
class LimePermission extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_permissions';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'entity', 'entity_id', 'uid', 'permission', 'create_p', 'read_p', 'update_p', 'delete_p', 'import_p', 'export_p',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'entity' => 'string', 'entity_id' => 'int', 'uid' => 'int', 'permission' => 'string', 'create_p' => 'int', 'read_p' => 'int', 'update_p' => 'int', 'delete_p' => 'int', 'import_p' => 'int', 'export_p' => 'int',
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
