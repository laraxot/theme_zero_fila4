<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens578443Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens578443
 *
 * @method static CachedBuilder|LimeTokens578443 all($columns = [])
 * @method static CachedBuilder|LimeTokens578443 avg($column)
 * @method static CachedBuilder|LimeTokens578443 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens578443 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens578443 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens578443 disableModelCaching()
 * @method static CachedBuilder|LimeTokens578443 exists()
 * @method static LimeTokens578443Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens578443 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens578443 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens578443 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens578443 insert(array $values)
 * @method static CachedBuilder|LimeTokens578443 isCachable()
 * @method static CachedBuilder|LimeTokens578443 max($column)
 * @method static CachedBuilder|LimeTokens578443 min($column)
 * @method static CachedBuilder|LimeTokens578443 newModelQuery()
 * @method static CachedBuilder|LimeTokens578443 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens578443 query()
 * @method static CachedBuilder|LimeTokens578443 sum($column)
 * @method static CachedBuilder|LimeTokens578443 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @mixin \Eloquent
 */
class LimeTokens578443 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_578443';

    /**  @var string   */
    protected $primaryKey = 'tid';

    /** @var array<int, string>  */
    protected $fillable = [
        0 => 'tid',
        1 => 'participant_id',
        2 => 'firstname',
        3 => 'lastname',
        4 => 'email',
        5 => 'emailstatus',
        6 => 'token',
        7 => 'language',
        8 => 'blacklisted',
        9 => 'sent',
        10 => 'remindersent',
        11 => 'remindercount',
        12 => 'completed',
        13 => 'usesleft',
        14 => 'validfrom',
        15 => 'validuntil',
        16 => 'mpid',
        17 => 'attribute_1',
        18 => 'attribute_2',
        19 => 'attribute_3',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be casted to native types.
     * da fare.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     *  da fare
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
