<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens594579Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens594579
 *
 * @method static CachedBuilder|LimeTokens594579 all($columns = [])
 * @method static CachedBuilder|LimeTokens594579 avg($column)
 * @method static CachedBuilder|LimeTokens594579 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens594579 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens594579 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens594579 disableModelCaching()
 * @method static CachedBuilder|LimeTokens594579 exists()
 * @method static LimeTokens594579Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens594579 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens594579 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens594579 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens594579 insert(array $values)
 * @method static CachedBuilder|LimeTokens594579 isCachable()
 * @method static CachedBuilder|LimeTokens594579 max($column)
 * @method static CachedBuilder|LimeTokens594579 min($column)
 * @method static CachedBuilder|LimeTokens594579 newModelQuery()
 * @method static CachedBuilder|LimeTokens594579 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens594579 query()
 * @method static CachedBuilder|LimeTokens594579 sum($column)
 * @method static CachedBuilder|LimeTokens594579 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @mixin \Eloquent
 */
class LimeTokens594579 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_594579';

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
