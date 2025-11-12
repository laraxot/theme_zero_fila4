<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens657328Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeTokens657328
 *
 * @method static CachedBuilder|LimeTokens657328 all($columns = [])
 * @method static CachedBuilder|LimeTokens657328 avg($column)
 * @method static CachedBuilder|LimeTokens657328 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens657328 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens657328 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens657328 disableModelCaching()
 * @method static CachedBuilder|LimeTokens657328 exists()
 * @method static LimeTokens657328Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens657328 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens657328 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens657328 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens657328 insert(array $values)
 * @method static CachedBuilder|LimeTokens657328 isCachable()
 * @method static CachedBuilder|LimeTokens657328 max($column)
 * @method static CachedBuilder|LimeTokens657328 min($column)
 * @method static CachedBuilder|LimeTokens657328 newModelQuery()
 * @method static CachedBuilder|LimeTokens657328 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens657328 query()
 * @method static CachedBuilder|LimeTokens657328 sum($column)
 * @method static CachedBuilder|LimeTokens657328 truncate()
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
 * @property Carbon|null $validfrom
 * @property Carbon|null $validuntil
 * @property int|null $mpid
 * @property string|null $attribute_1
 * @property string|null $attribute_2
 * @property string|null $attribute_3
 * @property string|null $attribute_4
 *
 * @method static CachedBuilder|LimeTokens657328 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens657328 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens657328 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens657328 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens657328 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens657328 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens657328 whereEmail($value)
 * @method static CachedBuilder|LimeTokens657328 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens657328 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens657328 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens657328 whereLastname($value)
 * @method static CachedBuilder|LimeTokens657328 whereMpid($value)
 * @method static CachedBuilder|LimeTokens657328 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens657328 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens657328 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens657328 whereSent($value)
 * @method static CachedBuilder|LimeTokens657328 whereTid($value)
 * @method static CachedBuilder|LimeTokens657328 whereToken($value)
 * @method static CachedBuilder|LimeTokens657328 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens657328 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens657328 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens657328 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_657328';

    /**  @var string   */
    protected $primaryKey = 'tid';

    /** @var array<int, string>  */
    protected $fillable = [
        'participant_id', 'firstname', 'lastname', 'email', 'emailstatus', 'token', 'language', 'blacklisted', 'sent', 'remindersent', 'remindercount', 'completed', 'usesleft', 'validfrom', 'validuntil', 'mpid', 'attribute_1', 'attribute_2', 'attribute_3', 'attribute_4',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'tid' => 'int', 'participant_id' => 'string', 'firstname' => 'string', 'lastname' => 'string', 'email' => 'string', 'emailstatus' => 'string', 'token' => 'string', 'language' => 'string', 'blacklisted' => 'string', 'sent' => 'string', 'remindersent' => 'string', 'remindercount' => 'int', 'completed' => 'string', 'usesleft' => 'int', 'validfrom' => 'datetime', 'validuntil' => 'datetime', 'mpid' => 'int', 'attribute_1' => 'string', 'attribute_2' => 'string', 'attribute_3' => 'string', 'attribute_4' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
