<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens417991Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use Illuminate\Support\Carbon;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Limesurvey\Models\LimeTokens417991
 *
 * @method static CachedBuilder|LimeTokens417991 all($columns = [])
 * @method static CachedBuilder|LimeTokens417991 avg($column)
 * @method static CachedBuilder|LimeTokens417991 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens417991 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens417991 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens417991 disableModelCaching()
 * @method static CachedBuilder|LimeTokens417991 exists()
 * @method static LimeTokens417991Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens417991 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens417991 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens417991 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens417991 insert(array $values)
 * @method static CachedBuilder|LimeTokens417991 isCachable()
 * @method static CachedBuilder|LimeTokens417991 max($column)
 * @method static CachedBuilder|LimeTokens417991 min($column)
 * @method static CachedBuilder|LimeTokens417991 newModelQuery()
 * @method static CachedBuilder|LimeTokens417991 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens417991 query()
 * @method static CachedBuilder|LimeTokens417991 sum($column)
 * @method static CachedBuilder|LimeTokens417991 truncate()
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
 *
 * @method static Builder|LimeTokens417991 whereAttribute1($value)
 * @method static Builder|LimeTokens417991 whereAttribute2($value)
 * @method static Builder|LimeTokens417991 whereBlacklisted($value)
 * @method static Builder|LimeTokens417991 whereCompleted($value)
 * @method static Builder|LimeTokens417991 whereEmail($value)
 * @method static Builder|LimeTokens417991 whereEmailstatus($value)
 * @method static Builder|LimeTokens417991 whereFirstname($value)
 * @method static Builder|LimeTokens417991 whereLanguage($value)
 * @method static Builder|LimeTokens417991 whereLastname($value)
 * @method static Builder|LimeTokens417991 whereMpid($value)
 * @method static Builder|LimeTokens417991 whereParticipantId($value)
 * @method static Builder|LimeTokens417991 whereRemindercount($value)
 * @method static Builder|LimeTokens417991 whereRemindersent($value)
 * @method static Builder|LimeTokens417991 whereSent($value)
 * @method static Builder|LimeTokens417991 whereTid($value)
 * @method static Builder|LimeTokens417991 whereToken($value)
 * @method static Builder|LimeTokens417991 whereUsesleft($value)
 * @method static Builder|LimeTokens417991 whereValidfrom($value)
 * @method static Builder|LimeTokens417991 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens417991 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_417991';

    /**  @var string   */
    protected $primaryKey = 'tid';

    /** @var array<int, string>  */
    protected $fillable = [
        'participant_id', 'firstname', 'lastname', 'email', 'emailstatus', 'token', 'language', 'blacklisted', 'sent', 'remindersent', 'remindercount', 'completed', 'usesleft', 'validfrom', 'validuntil', 'mpid', 'attribute_1', 'attribute_2',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'tid' => 'int', 'participant_id' => 'string', 'firstname' => 'string', 'lastname' => 'string', 'email' => 'string', 'emailstatus' => 'string', 'token' => 'string', 'language' => 'string', 'blacklisted' => 'string', 'sent' => 'string', 'remindersent' => 'string', 'remindercount' => 'int', 'completed' => 'string', 'usesleft' => 'int', 'validfrom' => 'datetime', 'validuntil' => 'datetime', 'mpid' => 'int', 'attribute_1' => 'string', 'attribute_2' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
