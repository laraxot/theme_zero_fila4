<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeQuestionL10nFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

/**
 * Modules\Limesurvey\Models\LimeQuestionL10n
 *
 * @property int $id
 * @property int $qid
 * @property string $question
 * @property string|null $help
 * @property string|null $script
 * @property string $language
 *
 * @method static CachedBuilder|LimeQuestionL10n all($columns = [])
 * @method static CachedBuilder|LimeQuestionL10n avg($column)
 * @method static CachedBuilder|LimeQuestionL10n cache(array $tags = [])
 * @method static CachedBuilder|LimeQuestionL10n cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeQuestionL10n count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeQuestionL10n disableModelCaching()
 * @method static CachedBuilder|LimeQuestionL10n exists()
 * @method static LimeQuestionL10nFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeQuestionL10n flushCache(array $tags = [])
 * @method static CachedBuilder|LimeQuestionL10n getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeQuestionL10n inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeQuestionL10n insert(array $values)
 * @method static CachedBuilder|LimeQuestionL10n isCachable()
 * @method static CachedBuilder|LimeQuestionL10n max($column)
 * @method static CachedBuilder|LimeQuestionL10n min($column)
 * @method static CachedBuilder|LimeQuestionL10n newModelQuery()
 * @method static CachedBuilder|LimeQuestionL10n newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeQuestionL10n query()
 * @method static CachedBuilder|LimeQuestionL10n sum($column)
 * @method static CachedBuilder|LimeQuestionL10n truncate()
 * @method static CachedBuilder|LimeQuestionL10n whereHelp($value)
 * @method static CachedBuilder|LimeQuestionL10n whereId($value)
 * @method static CachedBuilder|LimeQuestionL10n whereLanguage($value)
 * @method static CachedBuilder|LimeQuestionL10n whereQid($value)
 * @method static CachedBuilder|LimeQuestionL10n whereQuestion($value)
 * @method static CachedBuilder|LimeQuestionL10n whereScript($value)
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @mixin \Eloquent
 */
class LimeQuestionL10n extends BaseModel
{
    public $timestamps = false;

    protected $table = 'lime_question_l10ns';

    protected $casts = [
        'qid' => 'int',
    ];

    protected $fillable = [
        'qid',
        'question',
        'help',
        'script',
        'language',
    ];
}
