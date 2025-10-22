<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeQuestionAttributeFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeQuestionAttribute
 *
 * @method static CachedBuilder|LimeQuestionAttribute all($columns = [])
 * @method static CachedBuilder|LimeQuestionAttribute avg($column)
 * @method static CachedBuilder|LimeQuestionAttribute cache(array $tags = [])
 * @method static CachedBuilder|LimeQuestionAttribute cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeQuestionAttribute count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeQuestionAttribute disableModelCaching()
 * @method static CachedBuilder|LimeQuestionAttribute exists()
 * @method static LimeQuestionAttributeFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeQuestionAttribute flushCache(array $tags = [])
 * @method static CachedBuilder|LimeQuestionAttribute getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeQuestionAttribute inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeQuestionAttribute insert(array $values)
 * @method static CachedBuilder|LimeQuestionAttribute isCachable()
 * @method static CachedBuilder|LimeQuestionAttribute max($column)
 * @method static CachedBuilder|LimeQuestionAttribute min($column)
 * @method static CachedBuilder|LimeQuestionAttribute newModelQuery()
 * @method static CachedBuilder|LimeQuestionAttribute newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeQuestionAttribute query()
 * @method static CachedBuilder|LimeQuestionAttribute sum($column)
 * @method static CachedBuilder|LimeQuestionAttribute truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int $qaid
 * @property int $qid
 * @property string|null $attribute
 * @property string|null $value
 * @property string|null $language
 *
 * @method static CachedBuilder|LimeQuestionAttribute whereAttribute($value)
 * @method static CachedBuilder|LimeQuestionAttribute whereLanguage($value)
 * @method static CachedBuilder|LimeQuestionAttribute whereQaid($value)
 * @method static CachedBuilder|LimeQuestionAttribute whereQid($value)
 * @method static CachedBuilder|LimeQuestionAttribute whereValue($value)
 *
 * @mixin \Eloquent
 */
class LimeQuestionAttribute extends BaseModel
{
    /** @var bool */
    public $timestamps = true;

    /**  @var string   */
    protected $table = 'lime_question_attributes';

    /**  @var string   */
    protected $primaryKey = 'qaid';

    /** @var array<int, string>  */
    protected $fillable = [
        'qid', 'attribute', 'value', 'language',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'qaid' => 'int', 'qid' => 'int', 'attribute' => 'string', 'value' => 'string', 'language' => 'string',
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
