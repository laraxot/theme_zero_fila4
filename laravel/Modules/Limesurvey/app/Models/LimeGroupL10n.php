<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeGroupL10nFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeGroupL10n
 *
 * @method static CachedBuilder|LimeGroupL10n all($columns = [])
 * @method static CachedBuilder|LimeGroupL10n avg($column)
 * @method static CachedBuilder|LimeGroupL10n cache(array $tags = [])
 * @method static CachedBuilder|LimeGroupL10n cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeGroupL10n count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeGroupL10n disableModelCaching()
 * @method static CachedBuilder|LimeGroupL10n exists()
 * @method static LimeGroupL10nFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeGroupL10n flushCache(array $tags = [])
 * @method static CachedBuilder|LimeGroupL10n getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeGroupL10n inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeGroupL10n insert(array $values)
 * @method static CachedBuilder|LimeGroupL10n isCachable()
 * @method static CachedBuilder|LimeGroupL10n max($column)
 * @method static CachedBuilder|LimeGroupL10n min($column)
 * @method static CachedBuilder|LimeGroupL10n newModelQuery()
 * @method static CachedBuilder|LimeGroupL10n newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeGroupL10n query()
 * @method static CachedBuilder|LimeGroupL10n sum($column)
 * @method static CachedBuilder|LimeGroupL10n truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property int $gid
 * @property string $group_name
 * @property string|null $description
 * @property string $language
 *
 * @method static CachedBuilder|LimeGroupL10n whereDescription($value)
 * @method static CachedBuilder|LimeGroupL10n whereGid($value)
 * @method static CachedBuilder|LimeGroupL10n whereGroupName($value)
 * @method static CachedBuilder|LimeGroupL10n whereId($value)
 * @method static CachedBuilder|LimeGroupL10n whereLanguage($value)
 *
 * @mixin \Eloquent
 */
class LimeGroupL10n extends BaseModel
{
    public $timestamps = false;

    protected $table = 'lime_group_l10ns';

    protected $casts = [
        'gid' => 'int',
    ];

    protected $fillable = [
        'gid',
        'group_name',
        'description',
        'language',
    ];
}
