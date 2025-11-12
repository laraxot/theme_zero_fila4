<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTutorialEntryRelationFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTutorialEntryRelation
 *
 * @method static CachedBuilder|LimeTutorialEntryRelation all($columns = [])
 * @method static CachedBuilder|LimeTutorialEntryRelation avg($column)
 * @method static CachedBuilder|LimeTutorialEntryRelation cache(array $tags = [])
 * @method static CachedBuilder|LimeTutorialEntryRelation cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTutorialEntryRelation count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTutorialEntryRelation disableModelCaching()
 * @method static CachedBuilder|LimeTutorialEntryRelation exists()
 * @method static LimeTutorialEntryRelationFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTutorialEntryRelation flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTutorialEntryRelation getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTutorialEntryRelation inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTutorialEntryRelation insert(array $values)
 * @method static CachedBuilder|LimeTutorialEntryRelation isCachable()
 * @method static CachedBuilder|LimeTutorialEntryRelation max($column)
 * @method static CachedBuilder|LimeTutorialEntryRelation min($column)
 * @method static CachedBuilder|LimeTutorialEntryRelation newModelQuery()
 * @method static CachedBuilder|LimeTutorialEntryRelation newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTutorialEntryRelation query()
 * @method static CachedBuilder|LimeTutorialEntryRelation sum($column)
 * @method static CachedBuilder|LimeTutorialEntryRelation truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $teid
 * @property int $tid
 * @property int|null $uid
 * @property int|null $sid
 *
 * @method static CachedBuilder|LimeTutorialEntryRelation whereSid($value)
 * @method static CachedBuilder|LimeTutorialEntryRelation whereTeid($value)
 * @method static CachedBuilder|LimeTutorialEntryRelation whereTid($value)
 * @method static CachedBuilder|LimeTutorialEntryRelation whereUid($value)
 *
 * @mixin \Eloquent
 */
class LimeTutorialEntryRelation extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_tutorial_entry_relation';

    /**  @var string   */
    protected $primaryKey = 'teid';

    /** @var array<int, string>  */
    protected $fillable = [
        'tid', 'uid', 'sid',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'teid' => 'int', 'tid' => 'int', 'uid' => 'int', 'sid' => 'int',
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
