<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeUserFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Support\Carbon;

/**
 * Modules\Limesurvey\Models\LimeUser
 *
 * @method static CachedBuilder|LimeUser all($columns = [])
 * @method static CachedBuilder|LimeUser avg($column)
 * @method static CachedBuilder|LimeUser cache(array $tags = [])
 * @method static CachedBuilder|LimeUser cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeUser count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeUser disableModelCaching()
 * @method static CachedBuilder|LimeUser exists()
 * @method static LimeUserFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeUser flushCache(array $tags = [])
 * @method static CachedBuilder|LimeUser getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeUser inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeUser insert(array $values)
 * @method static CachedBuilder|LimeUser isCachable()
 * @method static CachedBuilder|LimeUser max($column)
 * @method static CachedBuilder|LimeUser min($column)
 * @method static CachedBuilder|LimeUser newModelQuery()
 * @method static CachedBuilder|LimeUser newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeUser query()
 * @method static CachedBuilder|LimeUser sum($column)
 * @method static CachedBuilder|LimeUser truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $uid
 * @property string $users_name
 * @property string $password
 * @property string $full_name
 * @property int $parent_id
 * @property string|null $lang
 * @property string|null $email
 * @property string|null $htmleditormode
 * @property string $templateeditormode
 * @property string $questionselectormode
 * @property string|null $one_time_pw
 * @property int $dateformat
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $last_login
 * @property string|null $validation_key
 * @property string|null $validation_key_expiration
 * @property string|null $last_forgot_email_password
 *
 * @method static CachedBuilder|LimeUser whereCreated($value)
 * @method static CachedBuilder|LimeUser whereDateformat($value)
 * @method static CachedBuilder|LimeUser whereEmail($value)
 * @method static CachedBuilder|LimeUser whereFullName($value)
 * @method static CachedBuilder|LimeUser whereHtmleditormode($value)
 * @method static CachedBuilder|LimeUser whereLang($value)
 * @method static CachedBuilder|LimeUser whereLastForgotEmailPassword($value)
 * @method static CachedBuilder|LimeUser whereLastLogin($value)
 * @method static CachedBuilder|LimeUser whereModified($value)
 * @method static CachedBuilder|LimeUser whereOneTimePw($value)
 * @method static CachedBuilder|LimeUser whereParentId($value)
 * @method static CachedBuilder|LimeUser wherePassword($value)
 * @method static CachedBuilder|LimeUser whereQuestionselectormode($value)
 * @method static CachedBuilder|LimeUser whereTemplateeditormode($value)
 * @method static CachedBuilder|LimeUser whereUid($value)
 * @method static CachedBuilder|LimeUser whereUsersName($value)
 * @method static CachedBuilder|LimeUser whereValidationKey($value)
 * @method static CachedBuilder|LimeUser whereValidationKeyExpiration($value)
 *
 * @mixin \Eloquent
 */
class LimeUser extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_users';

    /**  @var string   */
    protected $primaryKey = 'uid';

    /** @var array<int, string>  */
    protected $fillable = [
        'users_name', 'password', 'full_name', 'parent_id', 'lang', 'email', 'htmleditormode', 'templateeditormode', 'questionselectormode', 'one_time_pw', 'dateformat', 'created', 'modified',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'uid' => 'int', 'users_name' => 'string', 'password' => 'string', 'full_name' => 'string', 'parent_id' => 'int', 'lang' => 'string', 'email' => 'string', 'htmleditormode' => 'string', 'templateeditormode' => 'string', 'questionselectormode' => 'string', 'one_time_pw' => 'string', 'dateformat' => 'int', 'created' => 'datetime', 'modified' => 'datetime',
    ];

    // Scopes...

    // Functions ...

    // Relations ...
}
