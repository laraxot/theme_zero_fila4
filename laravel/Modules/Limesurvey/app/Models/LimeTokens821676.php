<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens821676Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeTokens821676
 *
 * @method static CachedBuilder|LimeTokens821676 all($columns = [])
 * @method static CachedBuilder|LimeTokens821676 avg($column)
 * @method static CachedBuilder|LimeTokens821676 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens821676 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens821676 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens821676 disableModelCaching()
 * @method static CachedBuilder|LimeTokens821676 exists()
 * @method static LimeTokens821676Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens821676 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens821676 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens821676 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens821676 insert(array $values)
 * @method static CachedBuilder|LimeTokens821676 isCachable()
 * @method static CachedBuilder|LimeTokens821676 max($column)
 * @method static CachedBuilder|LimeTokens821676 min($column)
 * @method static CachedBuilder|LimeTokens821676 newModelQuery()
 * @method static CachedBuilder|LimeTokens821676 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens821676 query()
 * @method static CachedBuilder|LimeTokens821676 sum($column)
 * @method static CachedBuilder|LimeTokens821676 truncate()
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
 *
 * @method static CachedBuilder|LimeTokens821676 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens821676 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens821676 whereEmail($value)
 * @method static CachedBuilder|LimeTokens821676 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens821676 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens821676 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens821676 whereLastname($value)
 * @method static CachedBuilder|LimeTokens821676 whereMpid($value)
 * @method static CachedBuilder|LimeTokens821676 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens821676 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens821676 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens821676 whereSent($value)
 * @method static CachedBuilder|LimeTokens821676 whereTid($value)
 * @method static CachedBuilder|LimeTokens821676 whereToken($value)
 * @method static CachedBuilder|LimeTokens821676 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens821676 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens821676 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens821676 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_821676';

    /**  @var string   */
    protected $primaryKey = 'tid';

    /** @var array<int, string>  */
    protected $fillable = [
        'participant_id', 'firstname', 'lastname', 'email', 'emailstatus', 'token', 'language', 'blacklisted', 'sent', 'remindersent', 'remindercount', 'completed', 'usesleft', 'validfrom', 'validuntil', 'mpid',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'tid' => 'int', 'participant_id' => 'string', 'firstname' => 'string', 'lastname' => 'string', 'email' => 'string', 'emailstatus' => 'string', 'token' => 'string', 'language' => 'string', 'blacklisted' => 'string', 'sent' => 'string', 'remindersent' => 'string', 'remindercount' => 'int', 'completed' => 'string', 'usesleft' => 'int', 'validfrom' => 'datetime', 'validuntil' => 'datetime', 'mpid' => 'int',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
