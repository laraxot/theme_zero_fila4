<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeGroupFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Modules\Limesurvey\Models\LimeGroup
 *
 * @property-read string $group_name
 * @property-read LimeGroupL10n|null $labels
 *
 * @method static CachedBuilder|LimeGroup all($columns = [])
 * @method static CachedBuilder|LimeGroup avg($column)
 * @method static CachedBuilder|LimeGroup cache(array $tags = [])
 * @method static CachedBuilder|LimeGroup cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeGroup count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeGroup disableModelCaching()
 * @method static CachedBuilder|LimeGroup exists()
 * @method static LimeGroupFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeGroup flushCache(array $tags = [])
 * @method static CachedBuilder|LimeGroup getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeGroup inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeGroup insert(array $values)
 * @method static CachedBuilder|LimeGroup isCachable()
 * @method static CachedBuilder|LimeGroup max($column)
 * @method static CachedBuilder|LimeGroup min($column)
 * @method static CachedBuilder|LimeGroup newModelQuery()
 * @method static CachedBuilder|LimeGroup newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeGroup query()
 * @method static CachedBuilder|LimeGroup sum($column)
 * @method static CachedBuilder|LimeGroup truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $gid
 * @property int $sid
 * @property int $group_order
 * @property string $randomization_group
 * @property string|null $grelevance
 *
 * @method static CachedBuilder|LimeGroup whereGid($value)
 * @method static CachedBuilder|LimeGroup whereGrelevance($value)
 * @method static CachedBuilder|LimeGroup whereGroupOrder($value)
 * @method static CachedBuilder|LimeGroup whereRandomizationGroup($value)
 * @method static CachedBuilder|LimeGroup whereSid($value)
 *
 * @mixin \Eloquent
 */
class LimeGroup extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_groups';

    /**  @var string   */
    protected $primaryKey = 'gid';

    /** @var array<int, string>  */
    protected $fillable = [
        'language', 'sid', 'group_name', 'group_order', 'description', 'randomization_group', 'grelevance',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'gid' => 'int', 'language' => 'string', 'sid' => 'int', 'group_name' => 'string', 'group_order' => 'int', 'description' => 'string', 'randomization_group' => 'string', 'grelevance' => 'string',
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
    public function labels(): HasOne
    {
        return $this->hasOne(LimeGroupL10n::class, 'gid', 'gid')
            ->where('language', app()->getLocale());
    }

    // Mutators

    public function getGroupNameAttribute(): string
    {
        return $this->labels->group_name;
    }
}
