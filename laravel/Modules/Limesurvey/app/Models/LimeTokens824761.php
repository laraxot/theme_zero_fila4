<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens824761Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeTokens824761
 *
 * @method static CachedBuilder|LimeTokens824761 all($columns = [])
 * @method static CachedBuilder|LimeTokens824761 avg($column)
 * @method static CachedBuilder|LimeTokens824761 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens824761 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens824761 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens824761 disableModelCaching()
 * @method static CachedBuilder|LimeTokens824761 exists()
 * @method static LimeTokens824761Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens824761 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens824761 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens824761 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens824761 insert(array $values)
 * @method static CachedBuilder|LimeTokens824761 isCachable()
 * @method static CachedBuilder|LimeTokens824761 max($column)
 * @method static CachedBuilder|LimeTokens824761 min($column)
 * @method static CachedBuilder|LimeTokens824761 newModelQuery()
 * @method static CachedBuilder|LimeTokens824761 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens824761 query()
 * @method static CachedBuilder|LimeTokens824761 sum($column)
 * @method static CachedBuilder|LimeTokens824761 truncate()
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
 * @method static CachedBuilder|LimeTokens824761 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens824761 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens824761 whereEmail($value)
 * @method static CachedBuilder|LimeTokens824761 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens824761 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens824761 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens824761 whereLastname($value)
 * @method static CachedBuilder|LimeTokens824761 whereMpid($value)
 * @method static CachedBuilder|LimeTokens824761 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens824761 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens824761 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens824761 whereSent($value)
 * @method static CachedBuilder|LimeTokens824761 whereTid($value)
 * @method static CachedBuilder|LimeTokens824761 whereToken($value)
 * @method static CachedBuilder|LimeTokens824761 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens824761 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens824761 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens824761 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_824761';

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
