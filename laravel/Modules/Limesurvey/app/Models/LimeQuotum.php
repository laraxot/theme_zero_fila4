<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeQuotumFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeQuotum
 *
 * @method static CachedBuilder|LimeQuotum all($columns = [])
 * @method static CachedBuilder|LimeQuotum avg($column)
 * @method static CachedBuilder|LimeQuotum cache(array $tags = [])
 * @method static CachedBuilder|LimeQuotum cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeQuotum count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeQuotum disableModelCaching()
 * @method static CachedBuilder|LimeQuotum exists()
 * @method static LimeQuotumFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeQuotum flushCache(array $tags = [])
 * @method static CachedBuilder|LimeQuotum getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeQuotum inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeQuotum insert(array $values)
 * @method static CachedBuilder|LimeQuotum isCachable()
 * @method static CachedBuilder|LimeQuotum max($column)
 * @method static CachedBuilder|LimeQuotum min($column)
 * @method static CachedBuilder|LimeQuotum newModelQuery()
 * @method static CachedBuilder|LimeQuotum newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeQuotum query()
 * @method static CachedBuilder|LimeQuotum sum($column)
 * @method static CachedBuilder|LimeQuotum truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int|null $sid
 * @property string|null $name
 * @property int|null $qlimit
 * @property int|null $action
 * @property int $active
 * @property int $autoload_url
 *
 * @method static CachedBuilder|LimeQuotum whereAction($value)
 * @method static CachedBuilder|LimeQuotum whereActive($value)
 * @method static CachedBuilder|LimeQuotum whereAutoloadUrl($value)
 * @method static CachedBuilder|LimeQuotum whereId($value)
 * @method static CachedBuilder|LimeQuotum whereName($value)
 * @method static CachedBuilder|LimeQuotum whereQlimit($value)
 * @method static CachedBuilder|LimeQuotum whereSid($value)
 *
 * @mixin \Eloquent
 */
class LimeQuotum extends BaseModel
{
    public $timestamps = false;

    protected $table = 'lime_quota';

    protected $casts = [
        'sid' => 'int',
        'qlimit' => 'int',
        'action' => 'int',
        'active' => 'int',
        'autoload_url' => 'int',
    ];

    protected $fillable = [
        'sid',
        'name',
        'qlimit',
        'action',
        'active',
        'autoload_url',
    ];
}
