<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeQuotaMemberFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeQuotaMember
 *
 * @method static CachedBuilder|LimeQuotaMember all($columns = [])
 * @method static CachedBuilder|LimeQuotaMember avg($column)
 * @method static CachedBuilder|LimeQuotaMember cache(array $tags = [])
 * @method static CachedBuilder|LimeQuotaMember cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeQuotaMember count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeQuotaMember disableModelCaching()
 * @method static CachedBuilder|LimeQuotaMember exists()
 * @method static LimeQuotaMemberFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeQuotaMember flushCache(array $tags = [])
 * @method static CachedBuilder|LimeQuotaMember getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeQuotaMember inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeQuotaMember insert(array $values)
 * @method static CachedBuilder|LimeQuotaMember isCachable()
 * @method static CachedBuilder|LimeQuotaMember max($column)
 * @method static CachedBuilder|LimeQuotaMember min($column)
 * @method static CachedBuilder|LimeQuotaMember newModelQuery()
 * @method static CachedBuilder|LimeQuotaMember newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeQuotaMember query()
 * @method static CachedBuilder|LimeQuotaMember sum($column)
 * @method static CachedBuilder|LimeQuotaMember truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int|null $sid
 * @property int|null $qid
 * @property int|null $quota_id
 * @property string|null $code
 *
 * @method static CachedBuilder|LimeQuotaMember whereCode($value)
 * @method static CachedBuilder|LimeQuotaMember whereId($value)
 * @method static CachedBuilder|LimeQuotaMember whereQid($value)
 * @method static CachedBuilder|LimeQuotaMember whereQuotaId($value)
 * @method static CachedBuilder|LimeQuotaMember whereSid($value)
 *
 * @mixin \Eloquent
 */
class LimeQuotaMember extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_quota_members';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'sid', 'qid', 'quota_id', 'code',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'sid' => 'int', 'qid' => 'int', 'quota_id' => 'int', 'code' => 'string',
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
