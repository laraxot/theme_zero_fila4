<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeParticipantAttributeValueFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeParticipantAttributeValue
 *
 * @method static CachedBuilder|LimeParticipantAttributeValue all($columns = [])
 * @method static CachedBuilder|LimeParticipantAttributeValue avg($column)
 * @method static CachedBuilder|LimeParticipantAttributeValue cache(array $tags = [])
 * @method static CachedBuilder|LimeParticipantAttributeValue cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeParticipantAttributeValue count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeParticipantAttributeValue disableModelCaching()
 * @method static CachedBuilder|LimeParticipantAttributeValue exists()
 * @method static LimeParticipantAttributeValueFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeParticipantAttributeValue flushCache(array $tags = [])
 * @method static CachedBuilder|LimeParticipantAttributeValue getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeParticipantAttributeValue inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeParticipantAttributeValue insert(array $values)
 * @method static CachedBuilder|LimeParticipantAttributeValue isCachable()
 * @method static CachedBuilder|LimeParticipantAttributeValue max($column)
 * @method static CachedBuilder|LimeParticipantAttributeValue min($column)
 * @method static CachedBuilder|LimeParticipantAttributeValue newModelQuery()
 * @method static CachedBuilder|LimeParticipantAttributeValue newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeParticipantAttributeValue query()
 * @method static CachedBuilder|LimeParticipantAttributeValue sum($column)
 * @method static CachedBuilder|LimeParticipantAttributeValue truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $value_id
 * @property int $attribute_id
 * @property string $value
 *
 * @method static CachedBuilder|LimeParticipantAttributeValue whereAttributeId($value)
 * @method static CachedBuilder|LimeParticipantAttributeValue whereValue($value)
 * @method static CachedBuilder|LimeParticipantAttributeValue whereValueId($value)
 *
 * @mixin \Eloquent
 */
class LimeParticipantAttributeValue extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_participant_attribute_values';

    /**  @var string   */
    protected $primaryKey = 'value_id';

    /** @var array<int, string>  */
    protected $fillable = [
        'attribute_id', 'value',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'value_id' => 'int', 'attribute_id' => 'int', 'value' => 'string',
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
