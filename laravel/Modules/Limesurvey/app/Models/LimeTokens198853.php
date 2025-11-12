<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens198853Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens198853
 *
 * @method static CachedBuilder|LimeTokens198853 all($columns = [])
 * @method static CachedBuilder|LimeTokens198853 avg($column)
 * @method static CachedBuilder|LimeTokens198853 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens198853 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens198853 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens198853 disableModelCaching()
 * @method static CachedBuilder|LimeTokens198853 exists()
 * @method static LimeTokens198853Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens198853 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens198853 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens198853 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens198853 insert(array $values)
 * @method static CachedBuilder|LimeTokens198853 isCachable()
 * @method static CachedBuilder|LimeTokens198853 max($column)
 * @method static CachedBuilder|LimeTokens198853 min($column)
 * @method static CachedBuilder|LimeTokens198853 newModelQuery()
 * @method static CachedBuilder|LimeTokens198853 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens198853 query()
 * @method static CachedBuilder|LimeTokens198853 sum($column)
 * @method static CachedBuilder|LimeTokens198853 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @mixin \Eloquent
 */
class LimeTokens198853 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_198853';

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
