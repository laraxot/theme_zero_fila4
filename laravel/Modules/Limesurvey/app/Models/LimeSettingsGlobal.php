<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSettingsGlobalFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSettingsGlobal
 *
 * @method static CachedBuilder|LimeSettingsGlobal all($columns = [])
 * @method static CachedBuilder|LimeSettingsGlobal avg($column)
 * @method static CachedBuilder|LimeSettingsGlobal cache(array $tags = [])
 * @method static CachedBuilder|LimeSettingsGlobal cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSettingsGlobal count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSettingsGlobal disableModelCaching()
 * @method static CachedBuilder|LimeSettingsGlobal exists()
 * @method static LimeSettingsGlobalFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSettingsGlobal flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSettingsGlobal getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSettingsGlobal inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSettingsGlobal insert(array $values)
 * @method static CachedBuilder|LimeSettingsGlobal isCachable()
 * @method static CachedBuilder|LimeSettingsGlobal max($column)
 * @method static CachedBuilder|LimeSettingsGlobal min($column)
 * @method static CachedBuilder|LimeSettingsGlobal newModelQuery()
 * @method static CachedBuilder|LimeSettingsGlobal newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSettingsGlobal query()
 * @method static CachedBuilder|LimeSettingsGlobal sum($column)
 * @method static CachedBuilder|LimeSettingsGlobal truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @mixin \Eloquent
 */
class LimeSettingsGlobal extends BaseModel
{
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['stg_name', 'stg_value'];

    // protected string $table = 'lime_settings_global';
    protected $primaryKey = 'stg_name';
}
