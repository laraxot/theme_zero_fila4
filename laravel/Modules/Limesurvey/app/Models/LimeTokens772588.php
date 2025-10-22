<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens772588Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens772588
 *
 * @method static CachedBuilder|LimeTokens772588 all($columns = [])
 * @method static CachedBuilder|LimeTokens772588 avg($column)
 * @method static CachedBuilder|LimeTokens772588 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens772588 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens772588 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens772588 disableModelCaching()
 * @method static CachedBuilder|LimeTokens772588 exists()
 * @method static LimeTokens772588Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens772588 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens772588 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens772588 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens772588 insert(array $values)
 * @method static CachedBuilder|LimeTokens772588 isCachable()
 * @method static CachedBuilder|LimeTokens772588 max($column)
 * @method static CachedBuilder|LimeTokens772588 min($column)
 * @method static CachedBuilder|LimeTokens772588 newModelQuery()
 * @method static CachedBuilder|LimeTokens772588 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens772588 query()
 * @method static CachedBuilder|LimeTokens772588 sum($column)
 * @method static CachedBuilder|LimeTokens772588 truncate()
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
 *
 * @method static CachedBuilder|LimeTokens772588 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens772588 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens772588 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens772588 whereEmail($value)
 * @method static CachedBuilder|LimeTokens772588 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens772588 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens772588 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens772588 whereLastname($value)
 * @method static CachedBuilder|LimeTokens772588 whereMpid($value)
 * @method static CachedBuilder|LimeTokens772588 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens772588 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens772588 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens772588 whereSent($value)
 * @method static CachedBuilder|LimeTokens772588 whereTid($value)
 * @method static CachedBuilder|LimeTokens772588 whereToken($value)
 * @method static CachedBuilder|LimeTokens772588 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens772588 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens772588 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens772588 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_772588';

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
