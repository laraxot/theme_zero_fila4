<?php

declare(strict_types=1);

namespace Modules\Cms\Models;

use Modules\Cms\Models\Traits\HasBlocks;
use Override;
use Illuminate\Support\Carbon;
use Modules\Cms\Database\Factories\SectionFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Tenant\Models\Traits\SushiToJsons;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\Translatable\HasTranslations;

/**
 * Modules\Cms\Models\Section
 *
 * @property array|null                                  $blocks
 * @property string|null                                 $id
 * @property array|null                                  $name
 * @property string|null                                 $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null                                 $created_by
 * @property string|null                                 $updated_by
 * @property mixed                                       $translations
 * @method static SectionFactory factory($count = null, $state = [])
 * @method static Builder|Section newModelQuery()
 * @method static Builder|Section newQuery()
 * @method static Builder|Section query()
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|Section whereBlocks($value)
 * @method static Builder<static>|Section whereCreatedAt($value)
 * @method static Builder<static>|Section whereCreatedBy($value)
 * @method static Builder<static>|Section whereId($value)
 * @method static Builder<static>|Section whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Section whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Section whereLocale(string $column, string $locale)
 * @method static Builder<static>|Section whereLocales(string $column, array $locales)
 * @method static Builder<static>|Section whereName($value)
 * @method static Builder<static>|Section whereSlug($value)
 * @method static Builder<static>|Section whereUpdatedAt($value)
 * @method static Builder<static>|Section whereUpdatedBy($value)
 * @mixin IdeHelperSection
 * @mixin \Eloquent
 */
class Section extends BaseModelLang
{
    use SushiToJsons;
    use HasBlocks;

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

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'name' => 'array',
            'slug' => 'string',
            'blocks' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
        return $this->getSushiRows();
    }
}
