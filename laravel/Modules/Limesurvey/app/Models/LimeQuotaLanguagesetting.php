<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeQuotaLanguagesettingFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeQuotaLanguagesetting
 *
 * @method static CachedBuilder|LimeQuotaLanguagesetting all($columns = [])
 * @method static CachedBuilder|LimeQuotaLanguagesetting avg($column)
 * @method static CachedBuilder|LimeQuotaLanguagesetting cache(array $tags = [])
 * @method static CachedBuilder|LimeQuotaLanguagesetting cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeQuotaLanguagesetting count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeQuotaLanguagesetting disableModelCaching()
 * @method static CachedBuilder|LimeQuotaLanguagesetting exists()
 * @method static LimeQuotaLanguagesettingFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeQuotaLanguagesetting flushCache(array $tags = [])
 * @method static CachedBuilder|LimeQuotaLanguagesetting getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeQuotaLanguagesetting inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeQuotaLanguagesetting insert(array $values)
 * @method static CachedBuilder|LimeQuotaLanguagesetting isCachable()
 * @method static CachedBuilder|LimeQuotaLanguagesetting max($column)
 * @method static CachedBuilder|LimeQuotaLanguagesetting min($column)
 * @method static CachedBuilder|LimeQuotaLanguagesetting newModelQuery()
 * @method static CachedBuilder|LimeQuotaLanguagesetting newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeQuotaLanguagesetting query()
 * @method static CachedBuilder|LimeQuotaLanguagesetting sum($column)
 * @method static CachedBuilder|LimeQuotaLanguagesetting truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $quotals_id
 * @property int $quotals_quota_id
 * @property string $quotals_language
 * @property string|null $quotals_name
 * @property string $quotals_message
 * @property string|null $quotals_url
 * @property string|null $quotals_urldescrip
 *
 * @method static CachedBuilder|LimeQuotaLanguagesetting whereQuotalsId($value)
 * @method static CachedBuilder|LimeQuotaLanguagesetting whereQuotalsLanguage($value)
 * @method static CachedBuilder|LimeQuotaLanguagesetting whereQuotalsMessage($value)
 * @method static CachedBuilder|LimeQuotaLanguagesetting whereQuotalsName($value)
 * @method static CachedBuilder|LimeQuotaLanguagesetting whereQuotalsQuotaId($value)
 * @method static CachedBuilder|LimeQuotaLanguagesetting whereQuotalsUrl($value)
 * @method static CachedBuilder|LimeQuotaLanguagesetting whereQuotalsUrldescrip($value)
 *
 * @mixin \Eloquent
 */
class LimeQuotaLanguagesetting extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_quota_languagesettings';

    /**  @var string   */
    protected $primaryKey = 'quotals_id';

    /** @var array<int, string>  */
    protected $fillable = [
        'quotals_quota_id', 'quotals_language', 'quotals_name', 'quotals_message', 'quotals_url', 'quotals_urldescrip',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'quotals_id' => 'int', 'quotals_quota_id' => 'int', 'quotals_language' => 'string', 'quotals_name' => 'string', 'quotals_message' => 'string', 'quotals_url' => 'string', 'quotals_urldescrip' => 'string',
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
