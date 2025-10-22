<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Modules\Quaeris\Database\Factories\PdfStyleFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

// use Illuminate\Database\Eloquent\Relations\MorphOne;
// use Illuminate\Database\Eloquent\Relations
/**
 * Modules\Quaeris\Models\Style.
 *
 * @property int $id
 * @property string|null $style_type
 * @property int|null $style_id
 * @property string|null $color
 * @property string|null $bg_color
 * @property string|null $font_family
 * @property string|null $font_size
 * @property string|null $font_style
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $backtop
 * @property string|null $backbottom
 * @property string|null $backleft
 * @property string|null $backright
 * @property string|null $font_size_question
 *
 * @method static CachedBuilder all($columns = [])
 * @method static CachedBuilder avg($column)
 * @method static CachedBuilder cache(array $tags = [])
 * @method static CachedBuilder cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder count($columns = '*')
 * @method static CachedBuilder disableCache()
 * @method static CachedBuilder disableModelCaching()
 * @method static CachedBuilder exists()
 * @method static PdfStyleFactory factory($count = null, $state = [])
 * @method static CachedBuilder flushCache(array $tags = [])
 * @method static CachedBuilder getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder inRandomOrder($seed = '')
 * @method static CachedBuilder insert(array $values)
 * @method static CachedBuilder isCachable()
 * @method static CachedBuilder max($column)
 * @method static CachedBuilder min($column)
 * @method static CachedBuilder newModelQuery()
 * @method static CachedBuilder newQuery()
 * @method static CachedBuilder query()
 * @method static CachedBuilder sum($column)
 * @method static CachedBuilder truncate()
 * @method static CachedBuilder whereBackbottom($value)
 * @method static CachedBuilder whereBackleft($value)
 * @method static CachedBuilder whereBackright($value)
 * @method static CachedBuilder whereBacktop($value)
 * @method static CachedBuilder whereBgColor($value)
 * @method static CachedBuilder whereColor($value)
 * @method static CachedBuilder whereCreatedAt($value)
 * @method static CachedBuilder whereCreatedBy($value)
 * @method static CachedBuilder whereFontFamily($value)
 * @method static CachedBuilder whereFontSize($value)
 * @method static CachedBuilder whereFontSizeQuestion($value)
 * @method static CachedBuilder whereFontStyle($value)
 * @method static CachedBuilder whereId($value)
 * @method static CachedBuilder whereStyleId($value)
 * @method static CachedBuilder whereStyleType($value)
 * @method static CachedBuilder whereUpdatedAt($value)
 * @method static CachedBuilder whereUpdatedBy($value)
 * @method static CachedBuilder withCacheCooldownSeconds(?int $seconds = null)
 *
 * @mixin \Eloquent
 */
class PdfStyle extends BaseModel
{
    protected $fillable = [
        'id',
        'style_id', 'style_type',
        'color',
        'bg_color',
        'font_family',
        'font_size',
        'font_style',
        'backtop',
        'backbottom',
        'backleft',
        'backright',
        'font_size_question',
    ];
}
