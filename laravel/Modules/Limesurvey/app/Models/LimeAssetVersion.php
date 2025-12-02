<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeAssetVersionFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeAssetVersion
 *
 * @method static CachedBuilder|LimeAssetVersion all($columns = [])
 * @method static CachedBuilder|LimeAssetVersion avg($column)
 * @method static CachedBuilder|LimeAssetVersion cache(array $tags = [])
 * @method static CachedBuilder|LimeAssetVersion cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeAssetVersion count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeAssetVersion disableModelCaching()
 * @method static CachedBuilder|LimeAssetVersion exists()
 * @method static LimeAssetVersionFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeAssetVersion flushCache(array $tags = [])
 * @method static CachedBuilder|LimeAssetVersion getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeAssetVersion inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeAssetVersion insert(array $values)
 * @method static CachedBuilder|LimeAssetVersion isCachable()
 * @method static CachedBuilder|LimeAssetVersion max($column)
 * @method static CachedBuilder|LimeAssetVersion min($column)
 * @method static CachedBuilder|LimeAssetVersion newModelQuery()
 * @method static CachedBuilder|LimeAssetVersion newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeAssetVersion query()
 * @method static CachedBuilder|LimeAssetVersion sum($column)
 * @method static CachedBuilder|LimeAssetVersion truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string $path
 * @property int $version
 *
 * @method static CachedBuilder|LimeAssetVersion whereId($value)
 * @method static CachedBuilder|LimeAssetVersion wherePath($value)
 * @method static CachedBuilder|LimeAssetVersion whereVersion($value)
 *
 * @mixin \Eloquent
 */
class LimeAssetVersion extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_asset_version';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'path', 'version',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'path' => 'string', 'version' => 'int',
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
