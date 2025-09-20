<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeParticipantShareFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeParticipantShare
 *
 * @method static CachedBuilder|LimeParticipantShare all($columns = [])
 * @method static CachedBuilder|LimeParticipantShare avg($column)
 * @method static CachedBuilder|LimeParticipantShare cache(array $tags = [])
 * @method static CachedBuilder|LimeParticipantShare cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeParticipantShare count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeParticipantShare disableModelCaching()
 * @method static CachedBuilder|LimeParticipantShare exists()
 * @method static LimeParticipantShareFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeParticipantShare flushCache(array $tags = [])
 * @method static CachedBuilder|LimeParticipantShare getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeParticipantShare inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeParticipantShare insert(array $values)
 * @method static CachedBuilder|LimeParticipantShare isCachable()
 * @method static CachedBuilder|LimeParticipantShare max($column)
 * @method static CachedBuilder|LimeParticipantShare min($column)
 * @method static CachedBuilder|LimeParticipantShare newModelQuery()
 * @method static CachedBuilder|LimeParticipantShare newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeParticipantShare query()
 * @method static CachedBuilder|LimeParticipantShare sum($column)
 * @method static CachedBuilder|LimeParticipantShare truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property string $participant_id
 * @property int $share_uid
 * @property Carbon $date_added
 * @property string $can_edit
 *
 * @method static CachedBuilder|LimeParticipantShare whereCanEdit($value)
 * @method static CachedBuilder|LimeParticipantShare whereDateAdded($value)
 * @method static CachedBuilder|LimeParticipantShare whereParticipantId($value)
 * @method static CachedBuilder|LimeParticipantShare whereShareUid($value)
 *
 * @mixin \Eloquent
 */
class LimeParticipantShare extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_participant_shares';

    /**  @var string   */
    protected $primaryKey = 'participant_id';

    /** @var array<int, string>  */
    protected $fillable = [
        'share_uid', 'date_added', 'can_edit',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'participant_id' => 'string', 'share_uid' => 'int', 'date_added' => 'datetime', 'can_edit' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
