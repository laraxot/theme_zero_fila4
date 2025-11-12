<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeSavedControlFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeSavedControl
 *
 * @method static CachedBuilder|LimeSavedControl all($columns = [])
 * @method static CachedBuilder|LimeSavedControl avg($column)
 * @method static CachedBuilder|LimeSavedControl cache(array $tags = [])
 * @method static CachedBuilder|LimeSavedControl cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeSavedControl count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeSavedControl disableModelCaching()
 * @method static CachedBuilder|LimeSavedControl exists()
 * @method static LimeSavedControlFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeSavedControl flushCache(array $tags = [])
 * @method static CachedBuilder|LimeSavedControl getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeSavedControl inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeSavedControl insert(array $values)
 * @method static CachedBuilder|LimeSavedControl isCachable()
 * @method static CachedBuilder|LimeSavedControl max($column)
 * @method static CachedBuilder|LimeSavedControl min($column)
 * @method static CachedBuilder|LimeSavedControl newModelQuery()
 * @method static CachedBuilder|LimeSavedControl newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeSavedControl query()
 * @method static CachedBuilder|LimeSavedControl sum($column)
 * @method static CachedBuilder|LimeSavedControl truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $scid
 * @property int $sid
 * @property int $srid
 * @property string $identifier
 * @property string $access_code
 * @property string|null $email
 * @property string $ip
 * @property string $saved_thisstep
 * @property string $status
 * @property Carbon $saved_date
 * @property string|null $refurl
 *
 * @method static CachedBuilder|LimeSavedControl whereAccessCode($value)
 * @method static CachedBuilder|LimeSavedControl whereEmail($value)
 * @method static CachedBuilder|LimeSavedControl whereIdentifier($value)
 * @method static CachedBuilder|LimeSavedControl whereIp($value)
 * @method static CachedBuilder|LimeSavedControl whereRefurl($value)
 * @method static CachedBuilder|LimeSavedControl whereSavedDate($value)
 * @method static CachedBuilder|LimeSavedControl whereSavedThisstep($value)
 * @method static CachedBuilder|LimeSavedControl whereScid($value)
 * @method static CachedBuilder|LimeSavedControl whereSid($value)
 * @method static CachedBuilder|LimeSavedControl whereSrid($value)
 * @method static CachedBuilder|LimeSavedControl whereStatus($value)
 *
 * @mixin \Eloquent
 */
class LimeSavedControl extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_saved_control';

    /**  @var string   */
    protected $primaryKey = 'scid';

    /** @var array<int, string>  */
    protected $fillable = [
        'sid', 'srid', 'identifier', 'access_code', 'email', 'ip', 'saved_thisstep', 'status', 'saved_date', 'refurl',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'scid' => 'int', 'sid' => 'int', 'srid' => 'int', 'identifier' => 'string', 'access_code' => 'string', 'email' => 'string', 'ip' => 'string', 'saved_thisstep' => 'string', 'status' => 'string', 'saved_date' => 'datetime', 'refurl' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
