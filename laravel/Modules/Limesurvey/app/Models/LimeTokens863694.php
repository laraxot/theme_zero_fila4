<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens863694Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens863694
 *
 * @method static CachedBuilder|LimeTokens863694 all($columns = [])
 * @method static CachedBuilder|LimeTokens863694 avg($column)
 * @method static CachedBuilder|LimeTokens863694 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens863694 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens863694 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens863694 disableModelCaching()
 * @method static CachedBuilder|LimeTokens863694 exists()
 * @method static LimeTokens863694Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens863694 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens863694 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens863694 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens863694 insert(array $values)
 * @method static CachedBuilder|LimeTokens863694 isCachable()
 * @method static CachedBuilder|LimeTokens863694 max($column)
 * @method static CachedBuilder|LimeTokens863694 min($column)
 * @method static CachedBuilder|LimeTokens863694 newModelQuery()
 * @method static CachedBuilder|LimeTokens863694 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens863694 query()
 * @method static CachedBuilder|LimeTokens863694 sum($column)
 * @method static CachedBuilder|LimeTokens863694 truncate()
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
 *
 * @method static CachedBuilder|LimeTokens863694 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens863694 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens863694 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens863694 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens863694 whereAttribute5($value)
 * @method static CachedBuilder|LimeTokens863694 whereAttribute6($value)
 * @method static CachedBuilder|LimeTokens863694 whereAttribute7($value)
 * @method static CachedBuilder|LimeTokens863694 whereAttribute8($value)
 * @method static CachedBuilder|LimeTokens863694 whereAttribute9($value)
 * @method static CachedBuilder|LimeTokens863694 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens863694 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens863694 whereEmail($value)
 * @method static CachedBuilder|LimeTokens863694 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens863694 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens863694 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens863694 whereLastname($value)
 * @method static CachedBuilder|LimeTokens863694 whereMpid($value)
 * @method static CachedBuilder|LimeTokens863694 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens863694 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens863694 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens863694 whereSent($value)
 * @method static CachedBuilder|LimeTokens863694 whereTid($value)
 * @method static CachedBuilder|LimeTokens863694 whereToken($value)
 * @method static CachedBuilder|LimeTokens863694 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens863694 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens863694 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens863694 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_863694';

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
