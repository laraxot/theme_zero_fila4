<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTutorialEntryFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTutorialEntry
 *
 * @method static CachedBuilder|LimeTutorialEntry all($columns = [])
 * @method static CachedBuilder|LimeTutorialEntry avg($column)
 * @method static CachedBuilder|LimeTutorialEntry cache(array $tags = [])
 * @method static CachedBuilder|LimeTutorialEntry cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTutorialEntry count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTutorialEntry disableModelCaching()
 * @method static CachedBuilder|LimeTutorialEntry exists()
 * @method static LimeTutorialEntryFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTutorialEntry flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTutorialEntry getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTutorialEntry inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTutorialEntry insert(array $values)
 * @method static CachedBuilder|LimeTutorialEntry isCachable()
 * @method static CachedBuilder|LimeTutorialEntry max($column)
 * @method static CachedBuilder|LimeTutorialEntry min($column)
 * @method static CachedBuilder|LimeTutorialEntry newModelQuery()
 * @method static CachedBuilder|LimeTutorialEntry newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTutorialEntry query()
 * @method static CachedBuilder|LimeTutorialEntry sum($column)
 * @method static CachedBuilder|LimeTutorialEntry truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $teid
 * @property int|null $ordering
 * @property string|null $title
 * @property string|null $content
 * @property string|null $settings
 *
 * @method static CachedBuilder|LimeTutorialEntry whereContent($value)
 * @method static CachedBuilder|LimeTutorialEntry whereOrdering($value)
 * @method static CachedBuilder|LimeTutorialEntry whereSettings($value)
 * @method static CachedBuilder|LimeTutorialEntry whereTeid($value)
 * @method static CachedBuilder|LimeTutorialEntry whereTitle($value)
 *
 * @mixin \Eloquent
 */
class LimeTutorialEntry extends BaseModel
{
    public $timestamps = false;

    protected $table = 'lime_tutorial_entries';

    protected $primaryKey = 'teid';

    protected $casts = [
        'ordering' => 'int',
    ];

    protected $fillable = [
        'ordering',
        'title',
        'content',
        'settings',
    ];
}
