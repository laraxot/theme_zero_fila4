<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeTemplateConfigurationFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeTemplateConfiguration
 *
 * @method static CachedBuilder|LimeTemplateConfiguration all($columns = [])
 * @method static CachedBuilder|LimeTemplateConfiguration avg($column)
 * @method static CachedBuilder|LimeTemplateConfiguration cache(array $tags = [])
 * @method static CachedBuilder|LimeTemplateConfiguration cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeTemplateConfiguration count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeTemplateConfiguration disableModelCaching()
 * @method static CachedBuilder|LimeTemplateConfiguration exists()
 * @method static LimeTemplateConfigurationFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeTemplateConfiguration flushCache(array $tags = [])
 * @method static CachedBuilder|LimeTemplateConfiguration getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeTemplateConfiguration inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeTemplateConfiguration insert(array $values)
 * @method static CachedBuilder|LimeTemplateConfiguration isCachable()
 * @method static CachedBuilder|LimeTemplateConfiguration max($column)
 * @method static CachedBuilder|LimeTemplateConfiguration min($column)
 * @method static CachedBuilder|LimeTemplateConfiguration newModelQuery()
 * @method static CachedBuilder|LimeTemplateConfiguration newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeTemplateConfiguration query()
 * @method static CachedBuilder|LimeTemplateConfiguration sum($column)
 * @method static CachedBuilder|LimeTemplateConfiguration truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $id
 * @property string $template_name
 * @property int|null $sid
 * @property int|null $gsid
 * @property int|null $uid
 * @property string|null $files_css
 * @property string|null $files_js
 * @property string|null $files_print_css
 * @property string|null $options
 * @property string|null $cssframework_name
 * @property string|null $cssframework_css
 * @property string|null $cssframework_js
 * @property string|null $packages_to_load
 * @property string|null $packages_ltr
 * @property string|null $packages_rtl
 *
 * @method static CachedBuilder|LimeTemplateConfiguration whereCssframeworkCss($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereCssframeworkJs($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereCssframeworkName($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereFilesCss($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereFilesJs($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereFilesPrintCss($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereGsid($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereId($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereOptions($value)
 * @method static CachedBuilder|LimeTemplateConfiguration wherePackagesLtr($value)
 * @method static CachedBuilder|LimeTemplateConfiguration wherePackagesRtl($value)
 * @method static CachedBuilder|LimeTemplateConfiguration wherePackagesToLoad($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereSid($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereTemplateName($value)
 * @method static CachedBuilder|LimeTemplateConfiguration whereUid($value)
 *
 * @mixin \Eloquent
 */
class LimeTemplateConfiguration extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_template_configuration';

    /**  @var string   */
    protected $primaryKey = 'id';

    /** @var array<int, string>  */
    protected $fillable = [
        'template_name', 'sid', 'gsid', 'uid', 'files_css', 'files_js', 'files_print_css', 'options', 'cssframework_name', 'cssframework_css', 'cssframework_js', 'packages_to_load', 'packages_ltr', 'packages_rtl',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'id' => 'int', 'template_name' => 'string', 'sid' => 'int', 'gsid' => 'int', 'uid' => 'int', 'files_css' => 'string', 'files_js' => 'string', 'files_print_css' => 'string', 'options' => 'string', 'cssframework_name' => 'string', 'cssframework_css' => 'string', 'cssframework_js' => 'string', 'packages_to_load' => 'string', 'packages_ltr' => 'string', 'packages_rtl' => 'string',
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
