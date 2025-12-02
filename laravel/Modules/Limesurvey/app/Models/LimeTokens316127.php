<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens316127Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens316127
 *
 * @method static CachedBuilder|LimeTokens316127 all($columns = [])
 * @method static CachedBuilder|LimeTokens316127 avg($column)
 * @method static CachedBuilder|LimeTokens316127 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens316127 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens316127 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens316127 disableModelCaching()
 * @method static CachedBuilder|LimeTokens316127 exists()
 * @method static LimeTokens316127Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens316127 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens316127 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens316127 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens316127 insert(array $values)
 * @method static CachedBuilder|LimeTokens316127 isCachable()
 * @method static CachedBuilder|LimeTokens316127 max($column)
 * @method static CachedBuilder|LimeTokens316127 min($column)
 * @method static CachedBuilder|LimeTokens316127 newModelQuery()
 * @method static CachedBuilder|LimeTokens316127 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens316127 query()
 * @method static CachedBuilder|LimeTokens316127 sum($column)
 * @method static CachedBuilder|LimeTokens316127 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $tid
 * @property string|null $participant_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $email
 * @property string|null $emailstatus
 * @property string|null $token
 * @property string|null $language
 * @property string|null $blacklisted
 * @property string|null $sent
 * @property string|null $remindersent
 * @property int|null $remindercount
 * @property string|null $completed
 * @property int|null $usesleft
 * @property string|null $validfrom
 * @property string|null $validuntil
 * @property int|null $mpid
 * @property string|null $attribute_1
 * @property string|null $attribute_2
 * @property string|null $attribute_3
 *
 * @method static CachedBuilder|LimeTokens316127 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens316127 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens316127 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens316127 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens316127 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens316127 whereEmail($value)
 * @method static CachedBuilder|LimeTokens316127 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens316127 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens316127 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens316127 whereLastname($value)
 * @method static CachedBuilder|LimeTokens316127 whereMpid($value)
 * @method static CachedBuilder|LimeTokens316127 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens316127 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens316127 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens316127 whereSent($value)
 * @method static CachedBuilder|LimeTokens316127 whereTid($value)
 * @method static CachedBuilder|LimeTokens316127 whereToken($value)
 * @method static CachedBuilder|LimeTokens316127 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens316127 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens316127 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens316127 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_316127';

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
     *  da fare.
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
