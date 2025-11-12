<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeBoxFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeBox
 *
 * @method static CachedBuilder|LimeBox all($columns = [])
 * @method static CachedBuilder|LimeBox avg($column)
 * @method static CachedBuilder|LimeBox cache(array $tags = [])
 * @method static CachedBuilder|LimeBox cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeBox count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeBox disableModelCaching()
 * @method static CachedBuilder|LimeBox exists()
 * @method static LimeBoxFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeBox flushCache(array $tags = [])
 * @method static CachedBuilder|LimeBox getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeBox inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeBox insert(array $values)
 * @method static CachedBuilder|LimeBox isCachable()
 * @method static CachedBuilder|LimeBox max($column)
 * @method static CachedBuilder|LimeBox min($column)
 * @method static CachedBuilder|LimeBox newModelQuery()
 * @method static CachedBuilder|LimeBox newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeBox query()
 * @method static CachedBuilder|LimeBox sum($column)
 * @method static CachedBuilder|LimeBox truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int|null $position
 * @property string $url
 * @property string $title
 * @property string|null $ico
 * @property string $desc
 * @property string $page
 * @property int $usergroup
 *
 * @method static CachedBuilder|LimeBox whereDesc($value)
 * @method static CachedBuilder|LimeBox whereIco($value)
 * @method static CachedBuilder|LimeBox whereId($value)
 * @method static CachedBuilder|LimeBox wherePage($value)
 * @method static CachedBuilder|LimeBox wherePosition($value)
 * @method static CachedBuilder|LimeBox whereTitle($value)
 * @method static CachedBuilder|LimeBox whereUrl($value)
 * @method static CachedBuilder|LimeBox whereUsergroup($value)
 *
 * @mixin \Eloquent
 */
class LimeBox extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_boxes';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'position', 'url', 'title', 'ico', 'desc', 'page', 'usergroup',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'position' => 'int', 'url' => 'string', 'title' => 'string', 'ico' => 'string', 'desc' => 'string', 'page' => 'string', 'usergroup' => 'int',
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
