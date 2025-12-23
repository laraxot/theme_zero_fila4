<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens799586Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeTokens799586
 *
 * @method static CachedBuilder|LimeTokens799586 all($columns = [])
 * @method static CachedBuilder|LimeTokens799586 avg($column)
 * @method static CachedBuilder|LimeTokens799586 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens799586 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens799586 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens799586 disableModelCaching()
 * @method static CachedBuilder|LimeTokens799586 exists()
 * @method static LimeTokens799586Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens799586 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens799586 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens799586 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens799586 insert(array $values)
 * @method static CachedBuilder|LimeTokens799586 isCachable()
 * @method static CachedBuilder|LimeTokens799586 max($column)
 * @method static CachedBuilder|LimeTokens799586 min($column)
 * @method static CachedBuilder|LimeTokens799586 newModelQuery()
 * @method static CachedBuilder|LimeTokens799586 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens799586 query()
 * @method static CachedBuilder|LimeTokens799586 sum($column)
 * @method static CachedBuilder|LimeTokens799586 truncate()
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
 * @method static CachedBuilder|LimeTokens799586 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens799586 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens799586 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens799586 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens799586 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens799586 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens799586 whereEmail($value)
 * @method static CachedBuilder|LimeTokens799586 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens799586 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens799586 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens799586 whereLastname($value)
 * @method static CachedBuilder|LimeTokens799586 whereMpid($value)
 * @method static CachedBuilder|LimeTokens799586 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens799586 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens799586 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens799586 whereSent($value)
 * @method static CachedBuilder|LimeTokens799586 whereTid($value)
 * @method static CachedBuilder|LimeTokens799586 whereToken($value)
 * @method static CachedBuilder|LimeTokens799586 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens799586 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens799586 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens799586 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_799586';

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
