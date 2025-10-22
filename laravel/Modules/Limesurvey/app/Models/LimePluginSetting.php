<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimePluginSettingFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimePluginSetting
 *
 * @method static CachedBuilder|LimePluginSetting all($columns = [])
 * @method static CachedBuilder|LimePluginSetting avg($column)
 * @method static CachedBuilder|LimePluginSetting cache(array $tags = [])
 * @method static CachedBuilder|LimePluginSetting cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimePluginSetting count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimePluginSetting disableModelCaching()
 * @method static CachedBuilder|LimePluginSetting exists()
 * @method static LimePluginSettingFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimePluginSetting flushCache(array $tags = [])
 * @method static CachedBuilder|LimePluginSetting getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimePluginSetting inRandomOrder($seed = '')
 * @method static CachedBuilder|LimePluginSetting insert(array $values)
 * @method static CachedBuilder|LimePluginSetting isCachable()
 * @method static CachedBuilder|LimePluginSetting max($column)
 * @method static CachedBuilder|LimePluginSetting min($column)
 * @method static CachedBuilder|LimePluginSetting newModelQuery()
 * @method static CachedBuilder|LimePluginSetting newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimePluginSetting query()
 * @method static CachedBuilder|LimePluginSetting sum($column)
 * @method static CachedBuilder|LimePluginSetting truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int $plugin_id
 * @property string|null $model
 * @property int|null $model_id
 * @property string $key
 * @property string|null $value
 *
 * @method static CachedBuilder|LimePluginSetting whereId($value)
 * @method static CachedBuilder|LimePluginSetting whereKey($value)
 * @method static CachedBuilder|LimePluginSetting whereModel($value)
 * @method static CachedBuilder|LimePluginSetting whereModelId($value)
 * @method static CachedBuilder|LimePluginSetting wherePluginId($value)
 * @method static CachedBuilder|LimePluginSetting whereValue($value)
 *
 * @mixin \Eloquent
 */
class LimePluginSetting extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_plugin_settings';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'plugin_id', 'model', 'model_id', 'key', 'value',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'plugin_id' => 'int', 'model' => 'string', 'model_id' => 'int', 'key' => 'string', 'value' => 'string',
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
