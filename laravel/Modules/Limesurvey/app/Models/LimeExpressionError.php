<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeExpressionErrorFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeExpressionError
 *
 * @method static CachedBuilder|LimeExpressionError all($columns = [])
 * @method static CachedBuilder|LimeExpressionError avg($column)
 * @method static CachedBuilder|LimeExpressionError cache(array $tags = [])
 * @method static CachedBuilder|LimeExpressionError cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeExpressionError count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeExpressionError disableModelCaching()
 * @method static CachedBuilder|LimeExpressionError exists()
 * @method static LimeExpressionErrorFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeExpressionError flushCache(array $tags = [])
 * @method static CachedBuilder|LimeExpressionError getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeExpressionError inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeExpressionError insert(array $values)
 * @method static CachedBuilder|LimeExpressionError isCachable()
 * @method static CachedBuilder|LimeExpressionError max($column)
 * @method static CachedBuilder|LimeExpressionError min($column)
 * @method static CachedBuilder|LimeExpressionError newModelQuery()
 * @method static CachedBuilder|LimeExpressionError newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeExpressionError query()
 * @method static CachedBuilder|LimeExpressionError sum($column)
 * @method static CachedBuilder|LimeExpressionError truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string|null $errortime
 * @property int|null $sid
 * @property int|null $gid
 * @property int|null $qid
 * @property int|null $gseq
 * @property int|null $qseq
 * @property string|null $type
 * @property string|null $eqn
 * @property string|null $prettyprint
 *
 * @method static CachedBuilder|LimeExpressionError whereEqn($value)
 * @method static CachedBuilder|LimeExpressionError whereErrortime($value)
 * @method static CachedBuilder|LimeExpressionError whereGid($value)
 * @method static CachedBuilder|LimeExpressionError whereGseq($value)
 * @method static CachedBuilder|LimeExpressionError whereId($value)
 * @method static CachedBuilder|LimeExpressionError wherePrettyprint($value)
 * @method static CachedBuilder|LimeExpressionError whereQid($value)
 * @method static CachedBuilder|LimeExpressionError whereQseq($value)
 * @method static CachedBuilder|LimeExpressionError whereSid($value)
 * @method static CachedBuilder|LimeExpressionError whereType($value)
 *
 * @mixin \Eloquent
 */
class LimeExpressionError extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_expression_errors';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'errortime', 'sid', 'gid', 'qid', 'gseq', 'qseq', 'type', 'eqn', 'prettyprint',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'errortime' => 'string', 'sid' => 'int', 'gid' => 'int', 'qid' => 'int', 'gseq' => 'int', 'qseq' => 'int', 'type' => 'string', 'eqn' => 'string', 'prettyprint' => 'string',
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
