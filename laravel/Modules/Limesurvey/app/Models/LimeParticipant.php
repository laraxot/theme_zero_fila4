<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeParticipantFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeParticipant
 *
 * @method static CachedBuilder|LimeParticipant all($columns = [])
 * @method static CachedBuilder|LimeParticipant avg($column)
 * @method static CachedBuilder|LimeParticipant cache(array $tags = [])
 * @method static CachedBuilder|LimeParticipant cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeParticipant count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeParticipant disableModelCaching()
 * @method static CachedBuilder|LimeParticipant exists()
 * @method static LimeParticipantFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeParticipant flushCache(array $tags = [])
 * @method static CachedBuilder|LimeParticipant getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeParticipant inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeParticipant insert(array $values)
 * @method static CachedBuilder|LimeParticipant isCachable()
 * @method static CachedBuilder|LimeParticipant max($column)
 * @method static CachedBuilder|LimeParticipant min($column)
 * @method static CachedBuilder|LimeParticipant newModelQuery()
 * @method static CachedBuilder|LimeParticipant newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeParticipant query()
 * @method static CachedBuilder|LimeParticipant sum($column)
 * @method static CachedBuilder|LimeParticipant truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property string $participant_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $email
 * @property string|null $language
 * @property string $blacklisted
 * @property int $owner_uid
 * @property int $created_by
 * @property Carbon|null $created
 * @property Carbon|null $modified
 *
 * @method static CachedBuilder|LimeParticipant whereBlacklisted($value)
 * @method static CachedBuilder|LimeParticipant whereCreated($value)
 * @method static CachedBuilder|LimeParticipant whereCreatedBy($value)
 * @method static CachedBuilder|LimeParticipant whereEmail($value)
 * @method static CachedBuilder|LimeParticipant whereFirstname($value)
 * @method static CachedBuilder|LimeParticipant whereLanguage($value)
 * @method static CachedBuilder|LimeParticipant whereLastname($value)
 * @method static CachedBuilder|LimeParticipant whereModified($value)
 * @method static CachedBuilder|LimeParticipant whereOwnerUid($value)
 * @method static CachedBuilder|LimeParticipant whereParticipantId($value)
 *
 * @mixin \Eloquent
 */
class LimeParticipant extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_participants';

    /**  @var string   */
    protected $primaryKey = 'participant_id';

    /** @var array<int, string>  */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'language', 'blacklisted', 'owner_uid', 'created_by', 'created', 'modified',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'participant_id' => 'string', 'firstname' => 'string', 'lastname' => 'string', 'email' => 'string', 'language' => 'string', 'blacklisted' => 'string', 'owner_uid' => 'int', 'created_by' => 'int', 'created' => 'datetime', 'modified' => 'datetime',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
