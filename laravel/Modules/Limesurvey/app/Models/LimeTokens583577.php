<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens583577Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens583577
 *
 * @method static CachedBuilder|LimeTokens583577 all($columns = [])
 * @method static CachedBuilder|LimeTokens583577 avg($column)
 * @method static CachedBuilder|LimeTokens583577 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens583577 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens583577 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens583577 disableModelCaching()
 * @method static CachedBuilder|LimeTokens583577 exists()
 * @method static LimeTokens583577Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens583577 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens583577 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens583577 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens583577 insert(array $values)
 * @method static CachedBuilder|LimeTokens583577 isCachable()
 * @method static CachedBuilder|LimeTokens583577 max($column)
 * @method static CachedBuilder|LimeTokens583577 min($column)
 * @method static CachedBuilder|LimeTokens583577 newModelQuery()
 * @method static CachedBuilder|LimeTokens583577 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens583577 query()
 * @method static CachedBuilder|LimeTokens583577 sum($column)
 * @method static CachedBuilder|LimeTokens583577 truncate()
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
 * @property string|null $attribute_4
 * @property string|null $attribute_5
 * @property string|null $attribute_6
 * @property string|null $attribute_7
 *
 * @method static CachedBuilder|LimeTokens583577 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens583577 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens583577 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens583577 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens583577 whereAttribute5($value)
 * @method static CachedBuilder|LimeTokens583577 whereAttribute6($value)
 * @method static CachedBuilder|LimeTokens583577 whereAttribute7($value)
 * @method static CachedBuilder|LimeTokens583577 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens583577 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens583577 whereEmail($value)
 * @method static CachedBuilder|LimeTokens583577 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens583577 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens583577 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens583577 whereLastname($value)
 * @method static CachedBuilder|LimeTokens583577 whereMpid($value)
 * @method static CachedBuilder|LimeTokens583577 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens583577 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens583577 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens583577 whereSent($value)
 * @method static CachedBuilder|LimeTokens583577 whereTid($value)
 * @method static CachedBuilder|LimeTokens583577 whereToken($value)
 * @method static CachedBuilder|LimeTokens583577 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens583577 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens583577 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens583577 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_583577';

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
        20 => 'attribute_4',
        21 => 'attribute_5',
        22 => 'attribute_6',
        23 => 'attribute_7',
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
