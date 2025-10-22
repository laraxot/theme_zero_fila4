<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens196427Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeTokens196427
 *
 * @method static CachedBuilder|LimeTokens196427 all($columns = [])
 * @method static CachedBuilder|LimeTokens196427 avg($column)
 * @method static CachedBuilder|LimeTokens196427 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens196427 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens196427 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens196427 disableModelCaching()
 * @method static CachedBuilder|LimeTokens196427 exists()
 * @method static LimeTokens196427Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens196427 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens196427 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens196427 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens196427 insert(array $values)
 * @method static CachedBuilder|LimeTokens196427 isCachable()
 * @method static CachedBuilder|LimeTokens196427 max($column)
 * @method static CachedBuilder|LimeTokens196427 min($column)
 * @method static CachedBuilder|LimeTokens196427 newModelQuery()
 * @method static CachedBuilder|LimeTokens196427 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens196427 query()
 * @method static CachedBuilder|LimeTokens196427 sum($column)
 * @method static CachedBuilder|LimeTokens196427 truncate()
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
 * @property string|null $attribute_5
 * @property string|null $attribute_6
 * @property string|null $attribute_7
 * @property string|null $attribute_8
 *
 * @method static CachedBuilder|LimeTokens196427 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens196427 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens196427 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens196427 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens196427 whereAttribute5($value)
 * @method static CachedBuilder|LimeTokens196427 whereAttribute6($value)
 * @method static CachedBuilder|LimeTokens196427 whereAttribute7($value)
 * @method static CachedBuilder|LimeTokens196427 whereAttribute8($value)
 * @method static CachedBuilder|LimeTokens196427 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens196427 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens196427 whereEmail($value)
 * @method static CachedBuilder|LimeTokens196427 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens196427 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens196427 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens196427 whereLastname($value)
 * @method static CachedBuilder|LimeTokens196427 whereMpid($value)
 * @method static CachedBuilder|LimeTokens196427 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens196427 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens196427 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens196427 whereSent($value)
 * @method static CachedBuilder|LimeTokens196427 whereTid($value)
 * @method static CachedBuilder|LimeTokens196427 whereToken($value)
 * @method static CachedBuilder|LimeTokens196427 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens196427 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens196427 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens196427 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_196427';

    /**  @var string   */
    protected $primaryKey = 'tid';

    /** @var array<int, string>  */
    protected $fillable = [
        'participant_id', 'firstname', 'lastname', 'email', 'emailstatus', 'token', 'language', 'blacklisted', 'sent', 'remindersent', 'remindercount', 'completed', 'usesleft', 'validfrom', 'validuntil', 'mpid', 'attribute_1', 'attribute_2', 'attribute_3', 'attribute_4', 'attribute_5', 'attribute_6', 'attribute_7', 'attribute_8',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'tid' => 'int', 'participant_id' => 'string', 'firstname' => 'string', 'lastname' => 'string', 'email' => 'string', 'emailstatus' => 'string', 'token' => 'string', 'language' => 'string', 'blacklisted' => 'string', 'sent' => 'string', 'remindersent' => 'string', 'remindercount' => 'int', 'completed' => 'string', 'usesleft' => 'int', 'validfrom' => 'datetime', 'validuntil' => 'datetime', 'mpid' => 'int', 'attribute_1' => 'string', 'attribute_2' => 'string', 'attribute_3' => 'string', 'attribute_4' => 'string', 'attribute_5' => 'string', 'attribute_6' => 'string', 'attribute_7' => 'string', 'attribute_8' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
