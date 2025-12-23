<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimePluginFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimePlugin
 *
 * @method static CachedBuilder|LimePlugin all($columns = [])
 * @method static CachedBuilder|LimePlugin avg($column)
 * @method static CachedBuilder|LimePlugin cache(array $tags = [])
 * @method static CachedBuilder|LimePlugin cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimePlugin count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimePlugin disableModelCaching()
 * @method static CachedBuilder|LimePlugin exists()
 * @method static LimePluginFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimePlugin flushCache(array $tags = [])
 * @method static CachedBuilder|LimePlugin getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimePlugin inRandomOrder($seed = '')
 * @method static CachedBuilder|LimePlugin insert(array $values)
 * @method static CachedBuilder|LimePlugin isCachable()
 * @method static CachedBuilder|LimePlugin max($column)
 * @method static CachedBuilder|LimePlugin min($column)
 * @method static CachedBuilder|LimePlugin newModelQuery()
 * @method static CachedBuilder|LimePlugin newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimePlugin query()
 * @method static CachedBuilder|LimePlugin sum($column)
 * @method static CachedBuilder|LimePlugin truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property string|null $version
 * @property int|null $load_error
 * @property string|null $load_error_message
 * @property string|null $plugin_type
 * @property int $priority
 *
 * @method static CachedBuilder|LimePlugin whereActive($value)
 * @method static CachedBuilder|LimePlugin whereId($value)
 * @method static CachedBuilder|LimePlugin whereLoadError($value)
 * @method static CachedBuilder|LimePlugin whereLoadErrorMessage($value)
 * @method static CachedBuilder|LimePlugin whereName($value)
 * @method static CachedBuilder|LimePlugin wherePluginType($value)
 * @method static CachedBuilder|LimePlugin wherePriority($value)
 * @method static CachedBuilder|LimePlugin whereVersion($value)
 *
 * @mixin \Eloquent
 */
class LimePlugin extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_plugins';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'name', 'active', 'version',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'name' => 'string', 'active' => 'int', 'version' => 'string',
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
