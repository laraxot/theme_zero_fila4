<?php

declare(strict_types=1);

namespace Modules\Cms\Models;

use Override;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Cms\Database\Factories\PageContentFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Tenant\Models\Traits\SushiToJsons;
use Spatie\Translatable\HasTranslations;

/**
 * Modules\Cms\Models\PageContent.
 *
 * @property array|null                                  $blocks
 * @property string|null                                 $id
 * @property array|null                                  $name
 * @property string|null                                 $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null                                 $created_by
 * @property string|null                                 $updated_by
 * @property ProfileContract|null $creator
 * @property mixed                                       $translations
 * @property ProfileContract|null $updater
 * @method static PageContentFactory factory($count = null, $state = [])
 * @method static Builder|PageContent newModelQuery()
 * @method static Builder|PageContent newQuery()
 * @method static Builder|PageContent query()
 * @method static Builder|PageContent whereBlocks($value)
 * @method static Builder|PageContent whereCreatedAt($value)
 * @method static Builder|PageContent whereCreatedBy($value)
 * @method static Builder|PageContent whereId($value)
 * @method static Builder|PageContent whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder|PageContent whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder|PageContent whereLocale(string $column, string $locale)
 * @method static Builder|PageContent whereLocales(string $column, array $locales)
 * @method static Builder|PageContent whereName($value)
 * @method static Builder|PageContent whereSlug($value)
 * @method static Builder|PageContent whereUpdatedAt($value)
 * @method static Builder|PageContent whereUpdatedBy($value)
 * @mixin IdeHelperPageContent
 * @mixin \Eloquent
 */
class PageContent extends BaseModel
{
    use HasTranslations;
    use SushiToJsons;

    /** @var array<int, string> */
    public $translatable = [
        'name',
        'blocks',
    ];

    /** @var list<string> */
    protected $fillable = [
        'name',
        'slug',
        'blocks',
    ];

    protected array $schema = [
        'id' => 'integer',
        'name' => 'json',
        'slug' => 'string',
        'blocks' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_by' => 'string',
        'updated_by' => 'string',
    ];

    public function getRows(): array
    {
        return $this->getSushiRows();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
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
            'name' => 'string',
            'slug' => 'string',
            'blocks' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
