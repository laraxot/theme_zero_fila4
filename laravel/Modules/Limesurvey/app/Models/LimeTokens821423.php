<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens821423Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeTokens821423
 *
 * @method static CachedBuilder|LimeTokens821423 all($columns = [])
 * @method static CachedBuilder|LimeTokens821423 avg($column)
 * @method static CachedBuilder|LimeTokens821423 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens821423 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens821423 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens821423 disableModelCaching()
 * @method static CachedBuilder|LimeTokens821423 exists()
 * @method static LimeTokens821423Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens821423 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens821423 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens821423 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens821423 insert(array $values)
 * @method static CachedBuilder|LimeTokens821423 isCachable()
 * @method static CachedBuilder|LimeTokens821423 max($column)
 * @method static CachedBuilder|LimeTokens821423 min($column)
 * @method static CachedBuilder|LimeTokens821423 newModelQuery()
 * @method static CachedBuilder|LimeTokens821423 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens821423 query()
 * @method static CachedBuilder|LimeTokens821423 sum($column)
 * @method static CachedBuilder|LimeTokens821423 truncate()
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
 * @method static CachedBuilder|LimeTokens821423 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens821423 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens821423 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens821423 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens821423 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens821423 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens821423 whereEmail($value)
 * @method static CachedBuilder|LimeTokens821423 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens821423 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens821423 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens821423 whereLastname($value)
 * @method static CachedBuilder|LimeTokens821423 whereMpid($value)
 * @method static CachedBuilder|LimeTokens821423 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens821423 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens821423 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens821423 whereSent($value)
 * @method static CachedBuilder|LimeTokens821423 whereTid($value)
 * @method static CachedBuilder|LimeTokens821423 whereToken($value)
 * @method static CachedBuilder|LimeTokens821423 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens821423 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens821423 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens821423 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_821423';

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
