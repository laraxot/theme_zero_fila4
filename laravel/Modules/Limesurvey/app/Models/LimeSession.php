<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSessionFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeSession
 *
 * @method static CachedBuilder|LimeSession all($columns = [])
 * @method static CachedBuilder|LimeSession avg($column)
 * @method static CachedBuilder|LimeSession cache(array $tags = [])
 * @method static CachedBuilder|LimeSession cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSession count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSession disableModelCaching()
 * @method static CachedBuilder|LimeSession exists()
 * @method static LimeSessionFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSession flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSession getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSession inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSession insert(array $values)
 * @method static CachedBuilder|LimeSession isCachable()
 * @method static CachedBuilder|LimeSession max($column)
 * @method static CachedBuilder|LimeSession min($column)
 * @method static CachedBuilder|LimeSession newModelQuery()
 * @method static CachedBuilder|LimeSession newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSession query()
 * @method static CachedBuilder|LimeSession sum($column)
 * @method static CachedBuilder|LimeSession truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property string $id
 * @property int|null $expire
 * @property mixed|null $data
 *
 * @method static CachedBuilder|LimeSession whereData($value)
 * @method static CachedBuilder|LimeSession whereExpire($value)
 * @method static CachedBuilder|LimeSession whereId($value)
 *
 * @mixin \Eloquent
 */
class LimeSession extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_sessions';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'expire', 'data',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'string', 'expire' => 'int',
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
