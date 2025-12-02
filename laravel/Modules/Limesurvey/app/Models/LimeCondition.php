<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeConditionFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeCondition
 *
 * @method static CachedBuilder|LimeCondition all($columns = [])
 * @method static CachedBuilder|LimeCondition avg($column)
 * @method static CachedBuilder|LimeCondition cache(array $tags = [])
 * @method static CachedBuilder|LimeCondition cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeCondition count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeCondition disableModelCaching()
 * @method static CachedBuilder|LimeCondition exists()
 * @method static LimeConditionFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeCondition flushCache(array $tags = [])
 * @method static CachedBuilder|LimeCondition getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeCondition inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeCondition insert(array $values)
 * @method static CachedBuilder|LimeCondition isCachable()
 * @method static CachedBuilder|LimeCondition max($column)
 * @method static CachedBuilder|LimeCondition min($column)
 * @method static CachedBuilder|LimeCondition newModelQuery()
 * @method static CachedBuilder|LimeCondition newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeCondition query()
 * @method static CachedBuilder|LimeCondition sum($column)
 * @method static CachedBuilder|LimeCondition truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $cid
 * @property int $qid
 * @property int $cqid
 * @property string $cfieldname
 * @property string $method
 * @property string $value
 * @property int $scenario
 *
 * @method static CachedBuilder|LimeCondition whereCfieldname($value)
 * @method static CachedBuilder|LimeCondition whereCid($value)
 * @method static CachedBuilder|LimeCondition whereCqid($value)
 * @method static CachedBuilder|LimeCondition whereMethod($value)
 * @method static CachedBuilder|LimeCondition whereQid($value)
 * @method static CachedBuilder|LimeCondition whereScenario($value)
 * @method static CachedBuilder|LimeCondition whereValue($value)
 *
 * @mixin \Eloquent
 */
class LimeCondition extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_conditions';

    /**  @var string   */
    protected $primaryKey = 'cid';

    /** @var array<int, string>  */
    protected $fillable = [
        'qid', 'cqid', 'cfieldname', 'method', 'value', 'scenario',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'cid' => 'int', 'qid' => 'int', 'cqid' => 'int', 'cfieldname' => 'string', 'method' => 'string', 'value' => 'string', 'scenario' => 'int',
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
