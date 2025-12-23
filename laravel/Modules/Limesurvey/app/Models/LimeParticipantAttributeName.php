<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeParticipantAttributeNameFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeParticipantAttributeName
 *
 * @method static CachedBuilder|LimeParticipantAttributeName all($columns = [])
 * @method static CachedBuilder|LimeParticipantAttributeName avg($column)
 * @method static CachedBuilder|LimeParticipantAttributeName cache(array $tags = [])
 * @method static CachedBuilder|LimeParticipantAttributeName cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeParticipantAttributeName count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeParticipantAttributeName disableModelCaching()
 * @method static CachedBuilder|LimeParticipantAttributeName exists()
 * @method static LimeParticipantAttributeNameFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeParticipantAttributeName flushCache(array $tags = [])
 * @method static CachedBuilder|LimeParticipantAttributeName getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeParticipantAttributeName inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeParticipantAttributeName insert(array $values)
 * @method static CachedBuilder|LimeParticipantAttributeName isCachable()
 * @method static CachedBuilder|LimeParticipantAttributeName max($column)
 * @method static CachedBuilder|LimeParticipantAttributeName min($column)
 * @method static CachedBuilder|LimeParticipantAttributeName newModelQuery()
 * @method static CachedBuilder|LimeParticipantAttributeName newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeParticipantAttributeName query()
 * @method static CachedBuilder|LimeParticipantAttributeName sum($column)
 * @method static CachedBuilder|LimeParticipantAttributeName truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $attribute_id
 * @property string $attribute_type
 * @property string $defaultname
 * @property string $visible
 * @property string $encrypted
 * @property string $core_attribute
 *
 * @method static CachedBuilder|LimeParticipantAttributeName whereAttributeId($value)
 * @method static CachedBuilder|LimeParticipantAttributeName whereAttributeType($value)
 * @method static CachedBuilder|LimeParticipantAttributeName whereCoreAttribute($value)
 * @method static CachedBuilder|LimeParticipantAttributeName whereDefaultname($value)
 * @method static CachedBuilder|LimeParticipantAttributeName whereEncrypted($value)
 * @method static CachedBuilder|LimeParticipantAttributeName whereVisible($value)
 *
 * @mixin \Eloquent
 */
class LimeParticipantAttributeName extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_participant_attribute_names';

    /**  @var string   */
    protected $primaryKey = 'attribute_id';

    /** @var array<int, string>  */
    protected $fillable = [
        'attribute_type', 'defaultname', 'visible',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'attribute_id' => 'int', 'attribute_type' => 'string', 'defaultname' => 'string', 'visible' => 'string',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = [
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
