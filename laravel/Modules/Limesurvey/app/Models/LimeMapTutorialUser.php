<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeMapTutorialUserFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeMapTutorialUser
 *
 * @method static CachedBuilder|LimeMapTutorialUser all($columns = [])
 * @method static CachedBuilder|LimeMapTutorialUser avg($column)
 * @method static CachedBuilder|LimeMapTutorialUser cache(array $tags = [])
 * @method static CachedBuilder|LimeMapTutorialUser cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeMapTutorialUser count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeMapTutorialUser disableModelCaching()
 * @method static CachedBuilder|LimeMapTutorialUser exists()
 * @method static LimeMapTutorialUserFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeMapTutorialUser flushCache(array $tags = [])
 * @method static CachedBuilder|LimeMapTutorialUser getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeMapTutorialUser inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeMapTutorialUser insert(array $values)
 * @method static CachedBuilder|LimeMapTutorialUser isCachable()
 * @method static CachedBuilder|LimeMapTutorialUser max($column)
 * @method static CachedBuilder|LimeMapTutorialUser min($column)
 * @method static CachedBuilder|LimeMapTutorialUser newModelQuery()
 * @method static CachedBuilder|LimeMapTutorialUser newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeMapTutorialUser query()
 * @method static CachedBuilder|LimeMapTutorialUser sum($column)
 * @method static CachedBuilder|LimeMapTutorialUser truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $tid
 * @property int $uid
 * @property int|null $taken
 *
 * @method static CachedBuilder|LimeMapTutorialUser whereTaken($value)
 * @method static CachedBuilder|LimeMapTutorialUser whereTid($value)
 * @method static CachedBuilder|LimeMapTutorialUser whereUid($value)
 *
 * @mixin \Eloquent
 */
class LimeMapTutorialUser extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_map_tutorial_users';

    /**  @var string   */
    protected $primaryKey = 'tid';

    /** @var array<int, string>  */
    protected $fillable = [
        'uid', 'taken',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'tid' => 'int', 'uid' => 'int', 'taken' => 'int',
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
