<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens955466Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens955466
 *
 * @method static CachedBuilder|LimeTokens955466 all($columns = [])
 * @method static CachedBuilder|LimeTokens955466 avg($column)
 * @method static CachedBuilder|LimeTokens955466 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens955466 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens955466 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens955466 disableModelCaching()
 * @method static CachedBuilder|LimeTokens955466 exists()
 * @method static LimeTokens955466Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens955466 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens955466 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens955466 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens955466 insert(array $values)
 * @method static CachedBuilder|LimeTokens955466 isCachable()
 * @method static CachedBuilder|LimeTokens955466 max($column)
 * @method static CachedBuilder|LimeTokens955466 min($column)
 * @method static CachedBuilder|LimeTokens955466 newModelQuery()
 * @method static CachedBuilder|LimeTokens955466 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens955466 query()
 * @method static CachedBuilder|LimeTokens955466 sum($column)
 * @method static CachedBuilder|LimeTokens955466 truncate()
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
 * @method static CachedBuilder|LimeTokens955466 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens955466 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens955466 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens955466 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens955466 whereAttribute5($value)
 * @method static CachedBuilder|LimeTokens955466 whereAttribute6($value)
 * @method static CachedBuilder|LimeTokens955466 whereAttribute7($value)
 * @method static CachedBuilder|LimeTokens955466 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens955466 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens955466 whereEmail($value)
 * @method static CachedBuilder|LimeTokens955466 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens955466 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens955466 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens955466 whereLastname($value)
 * @method static CachedBuilder|LimeTokens955466 whereMpid($value)
 * @method static CachedBuilder|LimeTokens955466 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens955466 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens955466 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens955466 whereSent($value)
 * @method static CachedBuilder|LimeTokens955466 whereTid($value)
 * @method static CachedBuilder|LimeTokens955466 whereToken($value)
 * @method static CachedBuilder|LimeTokens955466 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens955466 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens955466 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens955466 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_955466';

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
    ];

    /** @var array<int, string>  */
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
