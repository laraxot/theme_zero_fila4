<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTutorialEntrieFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTutorialEntrie
 *
 * @method static CachedBuilder|LimeTutorialEntrie all($columns = [])
 * @method static CachedBuilder|LimeTutorialEntrie avg($column)
 * @method static CachedBuilder|LimeTutorialEntrie cache(array $tags = [])
 * @method static CachedBuilder|LimeTutorialEntrie cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTutorialEntrie count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTutorialEntrie disableModelCaching()
 * @method static CachedBuilder|LimeTutorialEntrie exists()
 * @method static LimeTutorialEntrieFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTutorialEntrie flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTutorialEntrie getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTutorialEntrie inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTutorialEntrie insert(array $values)
 * @method static CachedBuilder|LimeTutorialEntrie isCachable()
 * @method static CachedBuilder|LimeTutorialEntrie max($column)
 * @method static CachedBuilder|LimeTutorialEntrie min($column)
 * @method static CachedBuilder|LimeTutorialEntrie newModelQuery()
 * @method static CachedBuilder|LimeTutorialEntrie newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTutorialEntrie query()
 * @method static CachedBuilder|LimeTutorialEntrie sum($column)
 * @method static CachedBuilder|LimeTutorialEntrie truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $teid
 * @property int|null $ordering
 * @property string|null $title
 * @property string|null $content
 * @property string|null $settings
 *
 * @method static CachedBuilder|LimeTutorialEntrie whereContent($value)
 * @method static CachedBuilder|LimeTutorialEntrie whereOrdering($value)
 * @method static CachedBuilder|LimeTutorialEntrie whereSettings($value)
 * @method static CachedBuilder|LimeTutorialEntrie whereTeid($value)
 * @method static CachedBuilder|LimeTutorialEntrie whereTitle($value)
 *
 * @mixin \Eloquent
 */
class LimeTutorialEntrie extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_tutorial_entries';

    /**  @var string   */
    protected $primaryKey = 'teid';

    /** @var array<int, string>  */
    protected $fillable = [
        'ordering', 'title', 'content', 'settings',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'teid' => 'int', 'ordering' => 'int', 'title' => 'string', 'content' => 'string', 'settings' => 'string',
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
