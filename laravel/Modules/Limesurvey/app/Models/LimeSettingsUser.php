<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSettingsUserFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSettingsUser
 *
 * @method static CachedBuilder|LimeSettingsUser all($columns = [])
 * @method static CachedBuilder|LimeSettingsUser avg($column)
 * @method static CachedBuilder|LimeSettingsUser cache(array $tags = [])
 * @method static CachedBuilder|LimeSettingsUser cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSettingsUser count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSettingsUser disableModelCaching()
 * @method static CachedBuilder|LimeSettingsUser exists()
 * @method static LimeSettingsUserFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSettingsUser flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSettingsUser getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSettingsUser inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSettingsUser insert(array $values)
 * @method static CachedBuilder|LimeSettingsUser isCachable()
 * @method static CachedBuilder|LimeSettingsUser max($column)
 * @method static CachedBuilder|LimeSettingsUser min($column)
 * @method static CachedBuilder|LimeSettingsUser newModelQuery()
 * @method static CachedBuilder|LimeSettingsUser newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSettingsUser query()
 * @method static CachedBuilder|LimeSettingsUser sum($column)
 * @method static CachedBuilder|LimeSettingsUser truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int $uid
 * @property string|null $entity
 * @property string|null $entity_id
 * @property string $stg_name
 * @property string|null $stg_value
 *
 * @method static CachedBuilder|LimeSettingsUser whereEntity($value)
 * @method static CachedBuilder|LimeSettingsUser whereEntityId($value)
 * @method static CachedBuilder|LimeSettingsUser whereId($value)
 * @method static CachedBuilder|LimeSettingsUser whereStgName($value)
 * @method static CachedBuilder|LimeSettingsUser whereStgValue($value)
 * @method static CachedBuilder|LimeSettingsUser whereUid($value)
 *
 * @mixin \Eloquent
 */
class LimeSettingsUser extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_settings_user';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'uid', 'entity', 'entity_id', 'stg_name', 'stg_value',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'uid' => 'int', 'entity' => 'string', 'entity_id' => 'string', 'stg_name' => 'string', 'stg_value' => 'string',
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
