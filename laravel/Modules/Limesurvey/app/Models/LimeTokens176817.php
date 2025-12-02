<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTokens176817Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeTokens176817
 *
 * @method static CachedBuilder|LimeTokens176817 all($columns = [])
 * @method static CachedBuilder|LimeTokens176817 avg($column)
 * @method static CachedBuilder|LimeTokens176817 cache(array $tags = [])
 * @method static CachedBuilder|LimeTokens176817 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTokens176817 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTokens176817 disableModelCaching()
 * @method static CachedBuilder|LimeTokens176817 exists()
 * @method static LimeTokens176817Factory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTokens176817 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTokens176817 getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTokens176817 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTokens176817 insert(array $values)
 * @method static CachedBuilder|LimeTokens176817 isCachable()
 * @method static CachedBuilder|LimeTokens176817 max($column)
 * @method static CachedBuilder|LimeTokens176817 min($column)
 * @method static CachedBuilder|LimeTokens176817 newModelQuery()
 * @method static CachedBuilder|LimeTokens176817 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTokens176817 query()
 * @method static CachedBuilder|LimeTokens176817 sum($column)
 * @method static CachedBuilder|LimeTokens176817 truncate()
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
 *
 * @method static CachedBuilder|LimeTokens176817 whereAttribute1($value)
 * @method static CachedBuilder|LimeTokens176817 whereAttribute2($value)
 * @method static CachedBuilder|LimeTokens176817 whereAttribute3($value)
 * @method static CachedBuilder|LimeTokens176817 whereAttribute4($value)
 * @method static CachedBuilder|LimeTokens176817 whereAttribute5($value)
 * @method static CachedBuilder|LimeTokens176817 whereAttribute6($value)
 * @method static CachedBuilder|LimeTokens176817 whereAttribute7($value)
 * @method static CachedBuilder|LimeTokens176817 whereBlacklisted($value)
 * @method static CachedBuilder|LimeTokens176817 whereCompleted($value)
 * @method static CachedBuilder|LimeTokens176817 whereEmail($value)
 * @method static CachedBuilder|LimeTokens176817 whereEmailstatus($value)
 * @method static CachedBuilder|LimeTokens176817 whereFirstname($value)
 * @method static CachedBuilder|LimeTokens176817 whereLanguage($value)
 * @method static CachedBuilder|LimeTokens176817 whereLastname($value)
 * @method static CachedBuilder|LimeTokens176817 whereMpid($value)
 * @method static CachedBuilder|LimeTokens176817 whereParticipantId($value)
 * @method static CachedBuilder|LimeTokens176817 whereRemindercount($value)
 * @method static CachedBuilder|LimeTokens176817 whereRemindersent($value)
 * @method static CachedBuilder|LimeTokens176817 whereSent($value)
 * @method static CachedBuilder|LimeTokens176817 whereTid($value)
 * @method static CachedBuilder|LimeTokens176817 whereToken($value)
 * @method static CachedBuilder|LimeTokens176817 whereUsesleft($value)
 * @method static CachedBuilder|LimeTokens176817 whereValidfrom($value)
 * @method static CachedBuilder|LimeTokens176817 whereValiduntil($value)
 *
 * @mixin \Eloquent
 */
class LimeTokens176817 extends BaseModel
{
    /** @var bool */
    public $timestamps = false;

    /**  @var string   */
    protected $table = 'lime_tokens_176817';

    /**  @var string   */
    protected $primaryKey = 'tid';

    /** @var array<int, string>  */
    protected $fillable = [
        'participant_id', 'firstname', 'lastname', 'email', 'emailstatus', 'token', 'language', 'blacklisted', 'sent', 'remindersent', 'remindercount', 'completed', 'usesleft', 'validfrom', 'validuntil', 'mpid', 'attribute_1', 'attribute_2', 'attribute_3', 'attribute_4', 'attribute_5', 'attribute_6', 'attribute_7',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'tid' => 'int', 'participant_id' => 'string', 'firstname' => 'string', 'lastname' => 'string', 'email' => 'string', 'emailstatus' => 'string', 'token' => 'string', 'language' => 'string', 'blacklisted' => 'string', 'sent' => 'string', 'remindersent' => 'string', 'remindercount' => 'int', 'completed' => 'string', 'usesleft' => 'int', 'validfrom' => 'datetime', 'validuntil' => 'datetime', 'mpid' => 'int', 'attribute_1' => 'string', 'attribute_2' => 'string', 'attribute_3' => 'string', 'attribute_4' => 'string', 'attribute_5' => 'string', 'attribute_6' => 'string', 'attribute_7' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
