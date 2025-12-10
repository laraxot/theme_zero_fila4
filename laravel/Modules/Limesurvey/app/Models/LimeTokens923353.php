<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens923353Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens923353
 *
 * @method static CachedBuilder|LimeTokens923353 all($columns = [])
 * @method static CachedBuilder|LimeTokens923353 avg($column)
 * @method static CachedBuilder|LimeTokens923353 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens923353 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens923353 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens923353 disableModelCaching()
 * @method static CachedBuilder|LimeTokens923353 exists()
 * @method static LimeTokens923353Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens923353 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens923353 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens923353 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens923353 insert(array $values)
 * @method static CachedBuilder|LimeTokens923353 isCachable()
 * @method static CachedBuilder|LimeTokens923353 max($column)
 * @method static CachedBuilder|LimeTokens923353 min($column)
 * @method static CachedBuilder|LimeTokens923353 newModelQuery()
 * @method static CachedBuilder|LimeTokens923353 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens923353 query()
 * @method static CachedBuilder|LimeTokens923353 sum($column)
 * @method static CachedBuilder|LimeTokens923353 truncate()
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
 * @property string|null $attribute_8
 * @property string|null $attribute_9
 * @property string|null $attribute_10
 * @property string|null $attribute_11
 * @property string|null $attribute_12
 * @property string|null $attribute_13
 * @property string|null $attribute_14
 *
 * @method static CachedBuilder|LimeTokens923353 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute10($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute11($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute12($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute13($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute14($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute5($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute6($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute7($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute8($value)
 * @method static CachedBuilder|LimeTokens923353 whereAttribute9($value)
 * @method static CachedBuilder|LimeTokens923353 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens923353 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens923353 whereEmail($value)
 * @method static CachedBuilder|LimeTokens923353 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens923353 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens923353 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens923353 whereLastname($value)
 * @method static CachedBuilder|LimeTokens923353 whereMpid($value)
 * @method static CachedBuilder|LimeTokens923353 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens923353 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens923353 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens923353 whereSent($value)
 * @method static CachedBuilder|LimeTokens923353 whereTid($value)
 * @method static CachedBuilder|LimeTokens923353 whereToken($value)
 * @method static CachedBuilder|LimeTokens923353 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens923353 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens923353 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens923353 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_923353';

    /**  @var string   */
    protected $primaryKey = 'tid';

    /** @var array<int, string>  */
    protected $fillable = [
        'tid',
        'participant_id',
        'firstname',
        'lastname',
        'email',
        'emailstatus',
        'token',
        'language',
        'blacklisted',
        'sent',
        'remindersent',
        'remindercount',
        'completed',
        'usesleft',
        'validfrom',
        'validuntil',
        'mpid',
        'attribute_1',
        'attribute_2',
        'attribute_3',
        'attribute_4',
        'attribute_5',
        'attribute_6',
        'attribute_7',
        'attribute_8',
        'attribute_9',
        'attribute_10',
        'attribute_11',
        'attribute_12',
        'attribute_13',
        'attribute_14',
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
