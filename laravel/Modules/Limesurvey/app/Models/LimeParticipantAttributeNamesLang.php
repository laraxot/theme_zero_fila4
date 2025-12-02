<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeParticipantAttributeNamesLangFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeParticipantAttributeNamesLang
 *
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang all($columns = [])
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang avg($column)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang cache(array $tags = [])
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang disableModelCaching()
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang exists()
 * @method static LimeParticipantAttributeNamesLangFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang flushCache(array $tags = [])
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang insert(array $values)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang isCachable()
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang max($column)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang min($column)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang newModelQuery()
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang query()
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang sum($column)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $attribute_id
 * @property string $attribute_name
 * @property string $lang
 *
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang whereAttributeId($value)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang whereAttributeName($value)
 * @method static CachedBuilder|LimeParticipantAttributeNamesLang whereLang($value)
 *
 * @mixin \Eloquent
 */
class LimeParticipantAttributeNamesLang extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_participant_attribute_names_lang';

    /**  @var string   */
    protected $primaryKey = 'attribute_id';

    /** @var array<int, string>  */
    protected $fillable = [
        'lang', 'attribute_name',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'attribute_id' => 'int', 'lang' => 'string', 'attribute_name' => 'string',
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
