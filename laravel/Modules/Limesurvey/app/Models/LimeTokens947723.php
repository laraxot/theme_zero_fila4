<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens947723Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens947723
 *
 * @method static CachedBuilder|LimeTokens947723 all($columns = [])
 * @method static CachedBuilder|LimeTokens947723 avg($column)
 * @method static CachedBuilder|LimeTokens947723 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens947723 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens947723 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens947723 disableModelCaching()
 * @method static CachedBuilder|LimeTokens947723 exists()
 * @method static LimeTokens947723Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens947723 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens947723 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens947723 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens947723 insert(array $values)
 * @method static CachedBuilder|LimeTokens947723 isCachable()
 * @method static CachedBuilder|LimeTokens947723 max($column)
 * @method static CachedBuilder|LimeTokens947723 min($column)
 * @method static CachedBuilder|LimeTokens947723 newModelQuery()
 * @method static CachedBuilder|LimeTokens947723 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens947723 query()
 * @method static CachedBuilder|LimeTokens947723 sum($column)
 * @method static CachedBuilder|LimeTokens947723 truncate()
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
 * @method static CachedBuilder|LimeTokens947723 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute10($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute11($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute12($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute13($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute14($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute5($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute6($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute7($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute8($value)
 * @method static CachedBuilder|LimeTokens947723 whereAttribute9($value)
 * @method static CachedBuilder|LimeTokens947723 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens947723 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens947723 whereEmail($value)
 * @method static CachedBuilder|LimeTokens947723 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens947723 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens947723 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens947723 whereLastname($value)
 * @method static CachedBuilder|LimeTokens947723 whereMpid($value)
 * @method static CachedBuilder|LimeTokens947723 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens947723 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens947723 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens947723 whereSent($value)
 * @method static CachedBuilder|LimeTokens947723 whereTid($value)
 * @method static CachedBuilder|LimeTokens947723 whereToken($value)
 * @method static CachedBuilder|LimeTokens947723 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens947723 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens947723 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens947723 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_947723';

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
        24 => 'attribute_8',
        25 => 'attribute_9',
        26 => 'attribute_10',
        27 => 'attribute_11',
        28 => 'attribute_12',
        29 => 'attribute_13',
        30 => 'attribute_14',
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
