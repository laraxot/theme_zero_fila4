<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeDefaultvalueFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeDefaultvalue
 *
 * @method static CachedBuilder|LimeDefaultvalue all($columns = [])
 * @method static CachedBuilder|LimeDefaultvalue avg($column)
 * @method static CachedBuilder|LimeDefaultvalue cache(array $tags = [])
 * @method static CachedBuilder|LimeDefaultvalue cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeDefaultvalue count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeDefaultvalue disableModelCaching()
 * @method static CachedBuilder|LimeDefaultvalue exists()
 * @method static LimeDefaultvalueFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeDefaultvalue flushCache(array $tags = [])
 * @method static CachedBuilder|LimeDefaultvalue getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeDefaultvalue inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeDefaultvalue insert(array $values)
 * @method static CachedBuilder|LimeDefaultvalue isCachable()
 * @method static CachedBuilder|LimeDefaultvalue max($column)
 * @method static CachedBuilder|LimeDefaultvalue min($column)
 * @method static CachedBuilder|LimeDefaultvalue newModelQuery()
 * @method static CachedBuilder|LimeDefaultvalue newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeDefaultvalue query()
 * @method static CachedBuilder|LimeDefaultvalue sum($column)
 * @method static CachedBuilder|LimeDefaultvalue truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $dvid
 * @property int $qid
 * @property int $scale_id
 * @property int $sqid
 * @property string $specialtype
 *
 * @method static CachedBuilder|LimeDefaultvalue whereDvid($value)
 * @method static CachedBuilder|LimeDefaultvalue whereQid($value)
 * @method static CachedBuilder|LimeDefaultvalue whereScaleId($value)
 * @method static CachedBuilder|LimeDefaultvalue whereSpecialtype($value)
 * @method static CachedBuilder|LimeDefaultvalue whereSqid($value)
 *
 * @mixin \Eloquent
 */
class LimeDefaultvalue extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_defaultvalues';

    /**  @var string   */
    protected $primaryKey = 'qid';

    /** @var array<int, string>  */
    protected $fillable = [
        'scale_id', 'sqid', 'language', 'specialtype', 'defaultvalue',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'qid' => 'int', 'scale_id' => 'int', 'sqid' => 'int', 'language' => 'string', 'specialtype' => 'string', 'defaultvalue' => 'string',
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
