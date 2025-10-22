<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens155327Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTokens155327
 *
 * @method static CachedBuilder|LimeTokens155327 all($columns = [])
 * @method static CachedBuilder|LimeTokens155327 avg($column)
 * @method static CachedBuilder|LimeTokens155327 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens155327 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens155327 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens155327 disableModelCaching()
 * @method static CachedBuilder|LimeTokens155327 exists()
 * @method static LimeTokens155327Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens155327 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens155327 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens155327 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens155327 insert(array $values)
 * @method static CachedBuilder|LimeTokens155327 isCachable()
 * @method static CachedBuilder|LimeTokens155327 max($column)
 * @method static CachedBuilder|LimeTokens155327 min($column)
 * @method static CachedBuilder|LimeTokens155327 newModelQuery()
 * @method static CachedBuilder|LimeTokens155327 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens155327 query()
 * @method static CachedBuilder|LimeTokens155327 sum($column)
 * @method static CachedBuilder|LimeTokens155327 truncate()
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
 * @method static CachedBuilder|LimeTokens155327 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens155327 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens155327 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens155327 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens155327 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens155327 whereEmail($value)
 * @method static CachedBuilder|LimeTokens155327 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens155327 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens155327 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens155327 whereLastname($value)
 * @method static CachedBuilder|LimeTokens155327 whereMpid($value)
 * @method static CachedBuilder|LimeTokens155327 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens155327 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens155327 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens155327 whereSent($value)
 * @method static CachedBuilder|LimeTokens155327 whereTid($value)
 * @method static CachedBuilder|LimeTokens155327 whereToken($value)
 * @method static CachedBuilder|LimeTokens155327 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens155327 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens155327 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens155327 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_155327';

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
