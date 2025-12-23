<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models;

use Modules\Limesurvey\Database\Factories\LimeQuestionFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Datas\AnswersFilterData;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Limesurvey\Casts\LimeLangField;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;
use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
use Webmozart\Assert\Assert;

/**
 * Modules\Limesurvey\Models\LimeQuestion
 *
 * @property int|string|array|null                                  $question
 * @property LimeGroup|null $group
 * @property LimeQuestionL10n|null $l10n
 * @property LimeQuestion|null                                      $parent
 * @property Collection<int, LimeAnswer> $props
 * @property int|null                                               $props_count
 *
 * @method static CachedBuilder|LimeQuestion                                 all($columns = [])
 * @method static CachedBuilder|LimeQuestion                                 avg($column)
 * @method static CachedBuilder|LimeQuestion                                 cache(array $tags = [])
 * @method static CachedBuilder|LimeQuestion                                 cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|LimeQuestion                                 count($columns = '*')
 * @method static CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|LimeQuestion                                 disableModelCaching()
 * @method static CachedBuilder|LimeQuestion                                 exists()
 * @method static LimeQuestionFactory factory($count = null, $state = [])
 * @method static CachedBuilder|LimeQuestion                                 flushCache(array $tags = [])
 * @method static CachedBuilder|LimeQuestion getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder|LimeQuestion                                 inRandomOrder($seed = '')
 * @method static CachedBuilder|LimeQuestion                                 insert(array $values)
 * @method static CachedBuilder|LimeQuestion                                 isCachable()
 * @method static CachedBuilder|LimeQuestion                                 max($column)
 * @method static CachedBuilder|LimeQuestion                                 min($column)
 * @method static CachedBuilder|LimeQuestion                                 newModelQuery()
 * @method static CachedBuilder|LimeQuestion                                 newQuery()
 * @method static CachedBuilder|BaseModel ofFilterData(AnswersFilterData $answersFilterData)
 * @method static CachedBuilder|LimeQuestion                                 query()
 * @method static CachedBuilder|LimeQuestion                                 sum($column)
 * @method static CachedBuilder|LimeQuestion                                 truncate()
 * @method static CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int         $qid
 * @property int         $parent_qid
 * @property int         $sid
 * @property int         $gid
 * @property string      $type
 * @property string      $title
 * @property string|null $preg
 * @property string      $other
 * @property string|null $mandatory
 * @property int         $question_order
 * @property int         $scale_id
 * @property int         $same_default
 * @property string      $field_name
 * @property string|null $relevance
 * @property string|null $modulename
 * @property string|null $encrypted
 * @property string|null $question_theme_name
 * @property int         $same_script
 *
 * @method static CachedBuilder|LimeQuestion whereEncrypted($value)
 * @method static CachedBuilder|LimeQuestion whereGid($value)
 * @method static CachedBuilder|LimeQuestion whereMandatory($value)
 * @method static CachedBuilder|LimeQuestion whereModulename($value)
 * @method static CachedBuilder|LimeQuestion whereOther($value)
 * @method static CachedBuilder|LimeQuestion whereParentQid($value)
 * @method static CachedBuilder|LimeQuestion wherePreg($value)
 * @method static CachedBuilder|LimeQuestion whereQid($value)
 * @method static CachedBuilder|LimeQuestion whereQuestionOrder($value)
 * @method static CachedBuilder|LimeQuestion whereQuestionThemeName($value)
 * @method static CachedBuilder|LimeQuestion whereRelevance($value)
 * @method static CachedBuilder|LimeQuestion whereSameDefault($value)
 * @method static CachedBuilder|LimeQuestion whereSameScript($value)
 * @method static CachedBuilder|LimeQuestion whereScaleId($value)
 * @method static CachedBuilder|LimeQuestion whereSid($value)
 * @method static CachedBuilder|LimeQuestion whereTitle($value)
 * @method static CachedBuilder|LimeQuestion whereType($value)
 *
 * @mixin \Eloquent
 */
class LimeQuestion extends BaseModel implements HasRecursiveRelationshipsContract
{
    use HasRecursiveRelationships;

    /** @var bool */
    public $timestamps = true;

    /** @var string */
    protected $connection = 'limesurvey';

    /**  @var string   */
    protected $table = 'lime_questions';

    /**  @var string   */
    protected $primaryKey = 'qid';

    /** @var array<int, string>  */
    protected $fillable = [
        'language',
        'parent_qid',
        'sid',
        'gid',
        'type',
        'title',
        'question',
        'preg',
        'help',
        'other',
        'mandatory',
        'question_order',
        'scale_id',
        'same_default',
        'relevance',
        'modulename',
    ];

    /** @var array<int, string>  */
    protected $hidden = [
    ];

    /** @return array<string, string>     */
    protected $casts = [
        'qid' => 'int',
        'language' => 'string',
        'parent_qid' => 'int',
        'sid' => 'int',
        'gid' => 'int',
        'type' => 'string',
        'title' => 'string',
        // 'question' => 'string',
        'question' => LimeLangField::class,
        'preg' => 'string',
        'help' => 'string',
        'other' => 'string',
        'mandatory' => 'string',
        'question_order' => 'int',
        'scale_id' => 'int',
        'same_default' => 'int',
        'relevance' => 'string',
        'modulename' => 'string',
    ];

    /** @var array<string > */
    protected $with = [
        'l10n',
        'parent',
       // 'extra',
    ];

    /** @var array<int, string> */
    protected $appends = [
        // 'field_name',
    ];

    // Scopes...

    // Functions ...

    // Mutators
    /* -- move to CASTS
    public function getQuestionAttribute(?string $value): ?string {
        if (null == $value && Schema::hasTable('lime_question_l10ns')) {
            // if (is_null($value)) {
            $questionsL10n = LimeQuestionL10n::where('qid', $this->qid)->first();
            $value = $questionsL10n->question;
        }

        return $value;
    }
    */

    public function getParentKeyName()
    {
        return 'parent_qid';
    }

    public function getLocalKeyName()
    {
        return 'qid';
    }

    public function getLabel(): string
    {
        return $this->qid.']'.$this->title.']'.strip_tags($this->question);
    }

    /*
    public function getCustomPaths(): array
    {
        return [
            [
                'name' => 'breads',
                'column' => 'title',
                'separator' => '/',
            ],
        ];
    }
    */

    public function hasTrans(): bool
    {
        return in_array($this->type, [
            //'1','B','T','G','L','!',
           // 'Y','5','S','R','N',
           // 'X',';','D','F','M',
           // 'Q','K','E','*','P','U',
           // 'A','C'
            '!','1','F','L','R',

        ]);
    }

    //public function getFeedback():?string{

    //}

    public function getGroupOrderAttribute(?int $value): ?int
    {
        return $this->group()->first()->group_order;
    }

    public function getFieldNameAttribute(?string $value): string
    {
        if ($value !== null) {
            return $value;
        }
        /*
        if (\is_string($value = $this->getExtra('field_name'))) {
            return $value;
        }

        $value = app(GetAnswerFieldNameByQuestionIdAction::class)->execute((string) $this->qid);
        $this->setExtra('field_name', $value);

        return $value;
        */

        $res = $this->sid.'X'.$this->gid.'X';
        // if ($this->type === 'F') {
        //     return $res.$this->qid.''.$this->child?->title;
        // }
        if ($this->type === 'F' && $this->child != null) {
            return $res.$this->qid.''.$this->child->title;
        }
        if ($this->type === 'F') {
            return $res.$this->parent->qid.$this->title;
        }
        if ($this->parent_qid === 0) {
            return $res.$this->qid;
        }
        return $res.$this->parent_qid.''.$this->title;
    }

    public function getTextAttribute(?string $value): string
    {
        $value = strip_tags($this->getFullTitle());
        return $value;
    }

    public function getFullTitle(): string
    {
        if (\is_string($value = $this->getExtra('full_title'))) {
            return $value;
        }
        $title = '';
        if ($this->parent !== null) {
            $title .= $this->parent->getFullTitle().' - ';
        }

        $value = $title.$this->l10n->question;
        $this->setExtra('full_title', $value);
        return $value;
    }

    public function getFullTitleNew(): ?string
    {
        $ancestors = $this->ancestorsAndSelf()
        // $ancestors = $this->ancestors()
            ->pluck('title')
            ->reverse()
            ->toArray();

        // dddx($ancestors);

        $value = implode('_', $ancestors);

        return $value;



        // $ancestors = $this->ancestorsAndSelf()
        //     ->with('l10n') // Carica la relazione l10n per evitare problemi N+1
        //     ->orderBy('parent_qid', 'asc')
        //     ->get();

        // // Mappa ogni elemento per ottenere la stringa dalla relazione `l10n`
        // $titles = $ancestors->map(function ($ancestor) {
        //     // Verifica che la relazione `l10n` esista
        //     return $ancestor->l10n->question ?? '';
        // });

        // // Combina le stringhe con un separatore, ad esempio " "
        // return $titles->filter()->implode(' '); // Filtra eventuali stringhe vuote
    }

    public function getFullTitleAttribute(?string $value): ?string
    {
        if ($value != null) {
            return $value;
        }

        $value = $this->getFullTitle();
        return $value;
    }

    public function getFullType(): string
    {
        if (\is_string($value = $this->getExtra('full_type'))) {
            return $value;
        }

        $title = '';
        if ($this->parent !== null) {
            $title .= $this->parent->getFullType();
        }

        $value = $title.$this->type;
        $this->setExtra('full_type', $value);
        return $value;
    }

    public function brothers(): HasMany
    {
        return $this->hasMany(LimeQuestion::class, 'sid', 'sid');
    }

    public function getFeedback(LimeSurveyXXXContract $row): ?string
    {
        if (\is_string($value = $this->getExtra('feedback'.$row->id))) {
            return $value;
        }
        $question_c = $this->brothers->firstWhere('title', $this->title.'c');
        $feedback = null;
        if ($question_c === null && $this->parent !== null) {
            $parent_question = $this->brothers->firstWhere('title', $this->parent->title.'c');

            if ($parent_question !== null) {
                Assert::isInstanceOf($parent_question, LimeQuestion::class);
                $field = $parent_question->sid.'X'.$parent_question->gid.'X'.$parent_question->qid;
                $feedback = $row->{$field};
            }
        } elseif ($question_c !== null) {
            //Assert::isInstanceOf($question_c, QuestionChart::class);
            $question_field_name = $question_c->field_name;
            $feedback = $row->{$question_field_name};
        }

        $this->setExtra('feedback'.$row->id, $feedback);
        return $feedback;
    }

    public function getGroupName(): ?string
    {
        if (\is_string($value = $this->getExtra('group_name'))) {
            return $value;
        }
        $value = $this->group->labels->group_name;
        $this->setExtra('group_name', $value);
        return $value;
    }

    // Relations ...

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    public function child(): HasOne
    {
        return $this->hasOne(self::class, 'parent_qid', 'qid');
    }

    public function props(): HasMany
    {
        return $this->hasMany(LimeAnswer::class, 'qid', 'qid');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(LimeAnswer::class, 'qid', 'qid');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(LimeGroup::class, 'gid', 'gid')
            ->where('sid', $this->sid);
    }

    public function limeGroup(): BelongsTo
    {
        return $this->belongsTo(LimeGroup::class, 'gid', 'gid')
            ->where('sid', $this->sid);
    }

    public function l10n(): HasOne
    {
        $lang = app()->getLocale();

        return $this->hasOne(LimeQuestionL10n::class, 'qid', 'qid')
            ->where('language', $lang);
    }
}
