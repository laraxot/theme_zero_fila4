<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens594635Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens594635
 *
 * @method static CachedBuilder|LimeTokens594635 all($columns = [])
 * @method static CachedBuilder|LimeTokens594635 avg($column)
 * @method static CachedBuilder|LimeTokens594635 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens594635 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens594635 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens594635 disableModelCaching()
 * @method static CachedBuilder|LimeTokens594635 exists()
 * @method static LimeTokens594635Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens594635 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens594635 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens594635 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens594635 insert(array $values)
 * @method static CachedBuilder|LimeTokens594635 isCachable()
 * @method static CachedBuilder|LimeTokens594635 max($column)
 * @method static CachedBuilder|LimeTokens594635 min($column)
 * @method static CachedBuilder|LimeTokens594635 newModelQuery()
 * @method static CachedBuilder|LimeTokens594635 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens594635 query()
 * @method static CachedBuilder|LimeTokens594635 sum($column)
 * @method static CachedBuilder|LimeTokens594635 truncate()
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
 * @method static CachedBuilder|LimeTokens594635 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute10($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute11($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute12($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute13($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute14($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute5($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute6($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute7($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute8($value)
 * @method static CachedBuilder|LimeTokens594635 whereAttribute9($value)
 * @method static CachedBuilder|LimeTokens594635 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens594635 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens594635 whereEmail($value)
 * @method static CachedBuilder|LimeTokens594635 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens594635 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens594635 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens594635 whereLastname($value)
 * @method static CachedBuilder|LimeTokens594635 whereMpid($value)
 * @method static CachedBuilder|LimeTokens594635 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens594635 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens594635 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens594635 whereSent($value)
 * @method static CachedBuilder|LimeTokens594635 whereTid($value)
 * @method static CachedBuilder|LimeTokens594635 whereToken($value)
 * @method static CachedBuilder|LimeTokens594635 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens594635 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens594635 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens594635 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_594635';

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
