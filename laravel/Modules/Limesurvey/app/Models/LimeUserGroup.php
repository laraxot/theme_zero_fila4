<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeUserGroupFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeUserGroup
 *
 * @method static CachedBuilder|LimeUserGroup all($columns = [])
 * @method static CachedBuilder|LimeUserGroup avg($column)
 * @method static CachedBuilder|LimeUserGroup cache(array $tags = [])
 * @method static CachedBuilder|LimeUserGroup cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeUserGroup count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeUserGroup disableModelCaching()
 * @method static CachedBuilder|LimeUserGroup exists()
 * @method static LimeUserGroupFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeUserGroup flushCache(array $tags = [])
 * @method static CachedBuilder|LimeUserGroup getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeUserGroup inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeUserGroup insert(array $values)
 * @method static CachedBuilder|LimeUserGroup isCachable()
 * @method static CachedBuilder|LimeUserGroup max($column)
 * @method static CachedBuilder|LimeUserGroup min($column)
 * @method static CachedBuilder|LimeUserGroup newModelQuery()
 * @method static CachedBuilder|LimeUserGroup newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeUserGroup query()
 * @method static CachedBuilder|LimeUserGroup sum($column)
 * @method static CachedBuilder|LimeUserGroup truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $ugid
 * @property string $name
 * @property string $description
 * @property int $owner_id
 *
 * @method static CachedBuilder|LimeUserGroup whereDescription($value)
 * @method static CachedBuilder|LimeUserGroup whereName($value)
 * @method static CachedBuilder|LimeUserGroup whereOwnerId($value)
 * @method static CachedBuilder|LimeUserGroup whereUgid($value)
 *
 * @mixin \Eloquent
 */
class LimeUserGroup extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_user_groups';

    /**  @var string   */
    protected $primaryKey = 'ugid';

    /** @var array<int, string>  */
    protected $fillable = [
        'name', 'description', 'owner_id',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'ugid' => 'int', 'name' => 'string', 'description' => 'string', 'owner_id' => 'int',
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
