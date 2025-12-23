<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTemplateFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeTemplate
 *
 * @method static CachedBuilder|LimeTemplate all($columns = [])
 * @method static CachedBuilder|LimeTemplate avg($column)
 * @method static CachedBuilder|LimeTemplate cache(array $tags = [])
 * @method static CachedBuilder|LimeTemplate cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTemplate count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTemplate disableModelCaching()
 * @method static CachedBuilder|LimeTemplate exists()
 * @method static LimeTemplateFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTemplate flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTemplate getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTemplate inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTemplate insert(array $values)
 * @method static CachedBuilder|LimeTemplate isCachable()
 * @method static CachedBuilder|LimeTemplate max($column)
 * @method static CachedBuilder|LimeTemplate min($column)
 * @method static CachedBuilder|LimeTemplate newModelQuery()
 * @method static CachedBuilder|LimeTemplate newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTemplate query()
 * @method static CachedBuilder|LimeTemplate sum($column)
 * @method static CachedBuilder|LimeTemplate truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string $name
 * @property string|null $folder
 * @property string $title
 * @property Carbon|null $creation_date
 * @property string|null $author
 * @property string|null $author_email
 * @property string|null $author_url
 * @property string|null $copyright
 * @property string|null $license
 * @property string|null $version
 * @property string $api_version
 * @property string $view_folder
 * @property string $files_folder
 * @property string|null $description
 * @property Carbon|null $last_update
 * @property int|null $owner_id
 * @property string|null $extends
 *
 * @method static CachedBuilder|LimeTemplate whereApiVersion($value)
 * @method static CachedBuilder|LimeTemplate whereAuthor($value)
 * @method static CachedBuilder|LimeTemplate whereAuthorEmail($value)
 * @method static CachedBuilder|LimeTemplate whereAuthorUrl($value)
 * @method static CachedBuilder|LimeTemplate whereCopyright($value)
 * @method static CachedBuilder|LimeTemplate whereCreationDate($value)
 * @method static CachedBuilder|LimeTemplate whereDescription($value)
 * @method static CachedBuilder|LimeTemplate whereExtends($value)
 * @method static CachedBuilder|LimeTemplate whereFilesFolder($value)
 * @method static CachedBuilder|LimeTemplate whereFolder($value)
 * @method static CachedBuilder|LimeTemplate whereId($value)
 * @method static CachedBuilder|LimeTemplate whereLastUpdate($value)
 * @method static CachedBuilder|LimeTemplate whereLicense($value)
 * @method static CachedBuilder|LimeTemplate whereName($value)
 * @method static CachedBuilder|LimeTemplate whereOwnerId($value)
 * @method static CachedBuilder|LimeTemplate whereTitle($value)
 * @method static CachedBuilder|LimeTemplate whereVersion($value)
 * @method static CachedBuilder|LimeTemplate whereViewFolder($value)
 *
 * @mixin \Eloquent
 */
class LimeTemplate extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_templates';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'name', 'folder', 'title', 'creation_date', 'author', 'author_email', 'author_url', 'copyright', 'license', 'version', 'api_version', 'view_folder', 'files_folder', 'description', 'last_update', 'owner_id', 'extends',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'name' => 'string', 'folder' => 'string', 'title' => 'string', 'creation_date' => 'datetime', 'author' => 'string', 'author_email' => 'string', 'author_url' => 'string', 'copyright' => 'string', 'license' => 'string', 'version' => 'string', 'api_version' => 'string', 'view_folder' => 'string', 'files_folder' => 'string', 'description' => 'string', 'last_update' => 'datetime', 'owner_id' => 'int', 'extends' => 'string',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
