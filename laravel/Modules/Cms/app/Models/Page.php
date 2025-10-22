<?php

declare(strict_types=1);

namespace Modules\Cms\Models;

use Override;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Modules\Cms\Database\Factories\PageFactory;
use Modules\Tenant\Models\Traits\SushiToJsons;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\Translatable\HasTranslations;

/**
 * Modules\Cms\Models\Page.
 *
 * @property string                          $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string                          $slug
 * @property string                          $title
 * @property string|null                     $description
 * @property string                          $content
 * @property string|null                     $updated_by
 * @property string|null                     $created_by
 * @property Carbon|null $deleted_at
 * @property string|null                     $deleted_by
 * @property array|null                      $content_blocks
 * @method static Builder|Page newModelQuery()
 * @method static Builder|Page newQuery()
 * @method static Builder|Page onlyTrashed()
 * @method static Builder|Page query()
 * @method static Builder|Page whereContent($value)
 * @method static Builder|Page whereContentBlocks($value)
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereCreatedBy($value)
 * @method static Builder|Page whereDeletedAt($value)
 * @method static Builder|Page whereDeletedBy($value)
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereSlug($value)
 * @method static Builder|Page whereTitle($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @method static Builder|Page whereUpdatedBy($value)
 * @method static Builder|Page withTrashed()
 * @method static Builder|Page withoutTrashed()
 * @property array|null $sidebar_blocks
 * @property array      $footer_blocks
 * @method static Builder|Page whereFooterBlocks($value)
 * @method static Builder|Page whereSidebarBlocks($value)
 * @property mixed $translations
 * @method static Builder|Page whereLocale(string $column, string $locale)
 * @method static Builder|Page whereLocales(string $column, array $locales)
 * @method static Builder|Page whereJsonContainsLocale(string $column, string $locale, ?mixed $value)
 * @method static Builder|Page whereJsonContainsLocales(string $column, array $locales, ?mixed $value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static PageFactory factory($count = null, $state = [])
 * @property array<array-key, mixed>|null $middleware
 * @method static Builder<static>|Page whereMiddleware($value)
 * @mixin IdeHelperPage
 * @mixin \Eloquent
 */
class Page extends BaseModelLang
{
    use SushiToJsons;

    /** @var array<int, string> */
    public $translatable = [
        'title',
        // 'description',
        'content_blocks',
        'sidebar_blocks',
        'footer_blocks',
    ];

    protected $fillable = [
        'content',
        'description',
        'slug',
        'title',
        'middleware',
        'content_blocks',
        'sidebar_blocks',
        'footer_blocks',
    ];

    protected array $schema = [
        'id' => 'integer',
        'title' => 'json',
        'slug' => 'string',
        'middleware' => 'json',
        'content' => 'string',
        'description' => 'string',
        'content_blocks' => 'json',
        'sidebar_blocks' => 'json',
        'footer_blocks' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_by' => 'string',
        'updated_by' => 'string',
    ];

    public function getRows(): array
    {
        return $this->getSushiRows();
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @return array<string, string> */
    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            // 'images' => 'array',
            'date' => 'datetime',
            'published_at' => 'datetime',
            'active' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'content_blocks' => 'array',
            'sidebar_blocks' => 'array',
            'footer_blocks' => 'array',
            'middleware' => 'array',
        ];
    }

    public static function getMiddlewareBySlug(string $slug): array
    {
        $page = self::where('slug', $slug)->first();
        return $page->middleware ?? [];
    }
}
