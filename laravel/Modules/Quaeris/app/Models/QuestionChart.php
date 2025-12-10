<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Modules\Quaeris\Database\Factories\QuestionChartFactory;
use Modules\Xot\Models\Extra;
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\Chart\Models\Chart;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Limesurvey\Models\LimeSurvey;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Quaeris\Actions\Question\GetAnswerFieldNameByQuestionIdAction;
use Modules\Quaeris\Actions\QuestionChart\GetPieceQueryBySurveyIdAction;
use Modules\Quaeris\Models\Traits\HasChartTrait;
use Modules\Xot\Actions\Generate\GenerateModelByModelClass;
use Modules\Xot\Models\Traits\HasExtraTrait;
use Modules\Xot\Relations\CustomRelation;
use Modules\Xot\Traits\HasCustomRelations;
use Webmozart\Assert\Assert;

/**
 * Model QuestionChart.
 *
 * @property int                                                                            $id
 * @property int|null                                                                       $survey_pdf_id
 * @property string|null                                                                    $question
 * @property string|null                                                                    $subquestion
 * @property string|null                                                                    $width
 * @property string|null                                                                    $height
 * @property string|null                                                                    $group_by
 * @property int|null                                                                       $take
 * @property string|null                                                                    $chart_type
 * @property Carbon|null                                                                    $created_at
 * @property Carbon|null                                                                    $updated_at
 * @property string|null                                                                    $created_by
 * @property string|null                                                                    $updated_by
 * @property string|null                                                                    $sort_by
 * @property int|null                                                                       $pos
 * @property string|null                                                                    $max
 * @property string|null                                                                    $min
 * @property string|null                                                                    $img_src
 * @property Carbon|null                                                                    $generated_at
 * @property int|null                                                                       $col_size
 * @property string|null                                                                    $question_txt
 * @property string|null                                                                    $answer_value
 * @property string|null                                                                    $title
 * @property string|null                                                                    $subtitle
 * @property string|null                                                                    $answer_value_txt
 * @property string|null                                                                    $answer_value_no_txt
 * @property string|null                                                                    $group_name
 * @property string|null                                                                    $list_color
 * @property string|null                                                                    $question_type
 * @property string|null                                                                    $sub_question_type
 * @property string|null                                                                    $question_title
 * @property string|null                                                                    $page_type
 * @property string|null                                                                    $data_type
 * @property string|null                                                                    $add_nulls
 * @property string|null                                                                    $interval
 * @property int                                                                            $show_on_pdf
 * @property int                                                                            $show_tot_invited
 * @property string                                                                         $field_name
 * @property string                                                                         $group_title
 * @property Chart                                                                          $chart
 * @property \Illuminate\Database\Eloquent\Collection<int, Contact> $contacts
 * @property int|null                                                                       $contacts_count
 * @property array<mixed>                                                                   $charts
 * @property string|null                                                                    $date_from
 * @property string|null                                                                    $date_to
 * @property string|null                                                                    $full_question_txt
 * @property string|null                                                                    $group_by_sql
 * @property string|null                                                                    $mandatory
 * @property string                                                                         $parent_qid
 * @property string|null                                                                    $sort_by_sql
 * @property string|null                                                                    $subquestion_type
 * @property string                                                                         $survey_id
 * @property LimeQuestion|null                                                              $limeQuestion
 * @property LimeQuestion|null                                                              $props
 * @property SurveyPdf|null                                                                 $surveyPdf
 * @property string                                                                         $extra_attributes
 * @property int|null                                                                       $mixed_chart_id
 *
 * @method static CachedBuilder                              all($columns = [])
 * @method static CachedBuilder                              avg($column)
 * @method static CachedBuilder                              cache(array $tags = [])
 * @method static CachedBuilder                              cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder                              count($columns = '*')
 * @method static CachedBuilder disableCache()
 * @method static CachedBuilder                              disableModelCaching()
 * @method static CachedBuilder                              exists()
 * @method static QuestionChartFactory factory($count = null, $state = [])
 * @method static CachedBuilder                              flushCache(array $tags = [])
 * @method static CachedBuilder getModelCacheCooldown(Model $instance)
 * @method static CachedBuilder                              inRandomOrder($seed = '')
 * @method static CachedBuilder                              insert(array $values)
 * @method static CachedBuilder                              isCachable()
 * @method static CachedBuilder                              max($column)
 * @method static CachedBuilder                              min($column)
 * @method static CachedBuilder                              newModelQuery()
 * @method static CachedBuilder                              newQuery()
 * @method static CachedBuilder                              query()
 * @method static CachedBuilder                              sum($column)
 * @method static CachedBuilder                              truncate()
 * @method static CachedBuilder                              whereAddNulls($value)
 * @method static CachedBuilder                              whereAnswerValue($value)
 * @method static CachedBuilder                              whereAnswerValueNoTxt($value)
 * @method static CachedBuilder                              whereAnswerValueTxt($value)
 * @method static CachedBuilder                              whereChartType($value)
 * @method static CachedBuilder                              whereColSize($value)
 * @method static CachedBuilder                              whereCreatedAt($value)
 * @method static CachedBuilder                              whereCreatedBy($value)
 * @method static CachedBuilder                              whereDataType($value)
 * @method static CachedBuilder                              whereFieldName($value)
 * @method static CachedBuilder                              whereGeneratedAt($value)
 * @method static CachedBuilder                              whereGroupBy($value)
 * @method static CachedBuilder                              whereGroupName($value)
 * @method static CachedBuilder                              whereGroupTitle($value)
 * @method static CachedBuilder                              whereHeight($value)
 * @method static CachedBuilder                              whereId($value)
 * @method static CachedBuilder                              whereImgSrc($value)
 * @method static CachedBuilder                              whereInterval($value)
 * @method static CachedBuilder                              whereListColor($value)
 * @method static CachedBuilder                              whereMax($value)
 * @method static CachedBuilder                              whereMin($value)
 * @method static CachedBuilder                              wherePageType($value)
 * @method static CachedBuilder                              wherePos($value)
 * @method static CachedBuilder                              whereQuestion($value)
 * @method static CachedBuilder                              whereQuestionTitle($value)
 * @method static CachedBuilder                              whereQuestionTxt($value)
 * @method static CachedBuilder                              whereQuestionType($value)
 * @method static CachedBuilder                              whereShowOnPdf($value)
 * @method static CachedBuilder                              whereShowTotInvited($value)
 * @method static CachedBuilder                              whereSortBy($value)
 * @method static CachedBuilder                              whereSubQuestionType($value)
 * @method static CachedBuilder                              whereSubquestion($value)
 * @method static CachedBuilder                              whereSubtitle($value)
 * @method static CachedBuilder                              whereSurveyPdfId($value)
 * @method static CachedBuilder                              whereTake($value)
 * @method static CachedBuilder                              whereTitle($value)
 * @method static CachedBuilder                              whereUpdatedAt($value)
 * @method static CachedBuilder                              whereUpdatedBy($value)
 * @method static CachedBuilder                              whereWidth($value)
 * @method static CachedBuilder withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property string|null $chart_color
 * @property string|null $chart_font_family
 * @property string|null $chart_font_size
 * @property string|null $chart_font_style
 *
 * @method static CachedBuilder whereChartColor($value)
 * @method static CachedBuilder whereChartFontFamily($value)
 * @method static CachedBuilder whereChartFontSize($value)
 * @method static CachedBuilder whereChartFontStyle($value)
 * @method static CachedBuilder whereSubquestionType($value)
 *
 * @property Extra|null $extra
 *
 * @mixin \Eloquent
 */
class QuestionChart extends BaseModel
{
    use HasChartTrait;
    use HasCustomRelations;
    use HasExtraTrait;

    protected $fillable = [
        'survey_pdf_id',
        'question',
        'question_txt',
        'subquestion',
        'width', 'height',
        'group_by',
        'sort_by',
        'take',
        'chart_type',
        'pos', 'min', 'max',
        'col_size',
        'img_src',
        'generated_at',
        'answer_value',
        'title',
        'subtitle',
        'answer_value_txt',
        'answer_value_no_txt',
        'group_name',
        'question_type',
        'subquestion_type',
        'question_title',
        'page_type',
        'data_type',
        'add_nulls',
        'interval',
        'show_on_pdf',
        'show_tot_invited',
        'field_name',
        // 'chart.colors', // ???
        'group_title',
        'mixed_chart_id',
    ];

    /** @var list<string> */
    protected $appends = [
        'survey_id',
        'date_from',
        'date_to',
        'mandatory',
    ];

    /** @var list<string> */
    protected $with = [
        'extra',
    ];

    /**
     * Undocumented variable.
     *
     * @var array<string, int|string|null>
     */
    protected $attributes = [
        'col_size' => 6,
    ];

    /** @var array<string, string> */
    protected $casts = [
        // 'published_at' => 'datetime:Y-m-d', // da verificare
        'survey_id' => 'string',
        'chart.colors' => 'array',
        'colors' => 'array',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'generated_at' => 'datetime',
    ];

    // --------- relationship
    /**
     * @return BelongsTo ;
     */
    public function surveyPdf(): BelongsTo
    {
        return $this->belongsTo(SurveyPdf::class);
    }

    // public function questionChartAddons(): HasMany
    // {
    //     return $this->hasMany(QuestionChartAddon::class);
    // }

    public function props(): BelongsTo
    {
        return $this->belongsTo(LimeQuestion::class, 'question', 'qid');
    }

    public function limeQuestion(): BelongsTo
    {
        return $this->belongsTo(LimeQuestion::class, 'question', 'qid');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'survey_pdf_id', 'survey_pdf_id');
    }

    // ---mutators

    public function getParentQidAttribute(?string $value): string
    {
        if ($this->limeQuestion === null) {
            // throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
            return '';
        }

        if (\is_string($value = $this->getExtra('parent_qid'))) {
            return $value;
        }

        $res = (string) $this->limeQuestion->parent_qid;
        $this->setExtra('parent_qid', $res);

        return $res;
    }

    public function getSurveyIdAttribute(?string $value): string
    {
        // $dirty = self::where('survey_pdf_id', null)->delete();

        if (\is_string($value = $this->getExtra('survey_id'))) {
            return $value;
        }

        if ($value !== null) {
            return '';
        }

        if ($this->getKey() === null) {
            return '';
        }

        if ($this->surveyPdf === null) {
            return '';
        }

        // return (string) $this->surveyPdf->survey_id;

        $value = (string) $this->surveyPdf->survey_id;
        $this->setExtra('survey_id', $value);

        return $value;
    }

    public function getDateToAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->getKey() === null) {
            return $value;
        }

        if ($this->surveyPdf === null) {
            return $value;
        }

        $value = $this->surveyPdf->date_to;
        if ($value === '0000-00-00') {
            return null;
        }

        return $value;
    }

    public function getDateFromAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->getKey() === null) {
            return $value;
        }

        if ($this->surveyPdf === null) {
            return $value;
        }

        $value = $this->surveyPdf->date_from;
        if ($value === '0000-00-00') {
            return null;
        }

        return $value;
    }

    /*
    public function getColorsAttribute(string|array|null $value):array{
        dd(['this'=>$this,'value'=>$value]);
        return explode(',',$this->list_colors);
    }

    public function setColorsAttribute(string|array|null $value):array{
        dd(['this'=>$this,'value'=>$value,'a'=>Arr::wrap($value)]);
    }
    */

    public function getColSizeAttribute(?int $value): ?int
    {
        if ($value === 0) {
            $value = null;
        }

        if ($value !== null || $this->getKey() === null) {
            return $value;
        }

        $value = 6;
        $this->col_size = $value;
        $this->save();

        return $value;
    }

    public function getQuestionTxtAttribute(?string $value): ?string
    {
        if ($value !== null) {
            // return utf8_decode($value);
            return $value;
        }

        if ($this->survey_id === null) {
            return $value;
        }

        if ($this->question === null) {
            return null;
        }

        if (Str::startsWith($this->question, 'custom:')) {
            Assert::string($key = Str::replace('custom:', 'question.custom.', $this->question), 'wip');
            $value = trans('quaeris::'.$key);
            $this->question_txt = $value;
            $this->save();

            return $value;
        }

        // --189
        $question = LimeQuestion::find($this->question);

        if ($question === null) {
            return null;
        }
        try {
            Assert::string($question->question);
            $value = strip_tags((string) $question->question);
        } catch (Exception $e) {
            $value = '';
        }

        if ($value === '' && $question->parent_qid !== 0) {
            $parent_question = LimeQuestion::find($question->parent_qid);
            Assert::notNull($parent_question, '['.__FILE__.']['.__LINE__.']');
            Assert::string($parent_question->question);
            $value = strip_tags((string) $parent_question->question);
        }

        // $props=$lime->getQuestionsPropertiesById($this->question);
        // dddx($props);

        $this->question_txt = $value;
        $this->save();

        return utf8_decode($value);
    }

    public function getImgSrcAttribute(?string $value): ?string
    {
        return $value;
    }

    // ---- extras
    public function getQuestionBreads(): Collection
    {
        if ($this->survey_id === null) {
            return collect([]);
        }

        // $questions = app(GetQuestionsBySurveyIdAction::class)->execute((int) $this->survey_id);

        $questions = $this->surveyPdf?->questions;
        $breads = collect([]);
        if ($questions === null) {
            return $breads;
        }

        // $question = $lime->getQuestions()->firstWhere('qid', $qid);
        /**
         * @var LimeQuestion
         */
        $question = $questions->firstWhere('qid', $this->question);

        if ($question === null) {
            // throw new Exception('['.__LINE__.']['.__FILE__.']');
            return $breads;
        }

        $breads[] = $question;
        while ($question->parent_qid !== 0) {
            // $question = $lime->getQuestions()->firstWhere('qid', $question->parent_qid);
            /**
             * @var LimeQuestion
             */
            $question = $questions->firstWhere('qid', $question->parent_qid);
            if ($question === null) {
                throw new Exception('['.__LINE__.']['.__FILE__.']');
            }

            $breads->prepend($question);
        }

        $breads[0]->group_question = $question->group ?? '';

        return $breads;
    }

    public function getTitleAttribute(?string $value): ?string
    {
        if (! isset($value)) {
            return null;
        }

        return strtoupper($value);
    }

    public function getQuestionTypeById(?string $id): ?string
    {
        // dddx($id);
        // if (null === $id) {
        //     return null;
        // }
        // $lime = LimeModelService::make()->setSurveyId((string) $this->survey_id);

        // return $lime->getQuestionTypeById($id);
        if ($this->props === null) {
            // dddx($this);
            return '';
        }

        return $this->props->type;
    }

    public function setQuestionTypeAttribute(): void
    {
        $this->attributes['question_type'] = $this->getQuestionTypeById($this->question);
    }

    public function getQuestionTypeAttribute(?string $value): ?string
    {
        if ($this->question === null) {
            return null;
        }

        if ($value === '' && Str::contains($this->question, 'custom')) {
            $value = Str::studly(Str::after($this->question, 'custom:'));
        }

        if ($value === '!') {
            $value = 'ExclamationPoint';
        }

        if ($value !== null || $this->getKey() === null) {
            return $value;
        }

        if ($this->question === null) {
            return null;
        }

        $value = Str::contains($this->question, 'custom') ? 'custom' : $this->getQuestionTypeById($this->question);

        // $value = $this->getQuestionTypeById($this->question);

        $this->question_type = $value;
        $this->save();

        return $value;
    }

    public function setSubquestionTypeAttribute(): void
    {
        if ($this->subquestion !== '') {
            $this->attributes['subquestion_type'] = $this->getQuestionTypeById($this->subquestion);
        }
    }

    public function getSubquestionTypeAttribute(?string $value): ?string
    {
        if ($value !== null || $this->getKey() === null) {
            return $value;
        }

        if ($this->subquestion === null) {
            return null;
        }

        $value = $this->getQuestionTypeById($this->subquestion);
        $this->subquestion_type = $value;
        $this->save();

        return $value;
    }

    public function getMandatoryAttribute(?string $value): ?string
    {
        if (! $this->props instanceof LimeQuestion) {
            return null;
        }

        $value = $this->props->mandatory;

        if (empty($value)) {
            return 'N';
        }

        // $value = $this->props->mandatory;
        // // if null it's subquestion, check parent question
        // if (null == $value) {
        //     $lime = LimeModelService::make()->setSurveyId((string) $this->survey_id);

        //     $question = $lime->getQuestions()->firstWhere('qid', $this->props->parent_qid);
        //     if (null === $question) {
        //         return null;
        //     }
        //     $value = $question->mandatory;
        // }

        return $value;
    }

    public function getFullQuestionTxtAttribute(): ?string
    {
        if ($this->question === null) {
            return null;
        }

        if (\is_string($value = $this->getExtra('full_question_txt'))) {
            return $value;
        }

        // $title = $this->question_txt;
        // dddx($title);
        $title = '';
        // dddx($title);
        $breads = $this->getQuestionBreads();

        if ($breads->count() === 0 && Str::startsWith($this->question, 'custom')) {
            // dddx($this->question);
            switch ($this->question) {
                case 'custom:contacts_completed':
                    $title = 'Tasso di risposta totale sms + email';
                    break;
                case 'custom:mail_response_rate':
                    $title = 'Tasso di risposta totale email';
                    break;
                case 'custom:sms_response_rate':
                    $title = 'Tasso di risposta totale sms';
                    break;
                case 'custom:root_grouped_bf':
                case 'custom:avg_group_4':
                case 'custom:avg_group_2':
                    $title = 'Distribuzione delle valutazioni medie';
                    break;

                default:
                    dddx($this->question);
                    break;
            }

            $value = $title;
        }

        if ($breads->count() >= 1) {
            // $title = '';
            foreach ($breads as $q) {
                Assert::isInstanceOf($lime_question = $q, LimeQuestion::class);
                $title .= strip_tags((string) $lime_question->l10n?->question);
            }
            $value = $title;
        }
        /*
        $this->extra->extra_attributes->set(['full_question_txt'=>$value]);
        $this->extra->save();
        */
        Assert::string($value, '['.__LINE__.']['.__FILE__.']');
        $this->setExtra('full_question_txt', $value);

        return $value;
    }

    // da problemi salvataggio relazione
    // public function getChartsAttribute(?array $value): array
    // {
    //     if (\is_array($value = $this->getExtra('charts'))) {
    //         return $value;
    //     }
    //     Assert::isInstanceOf($this->chart, Chart::class);
    //     $charts = $this->chart->getSettings();
    //     $default = $this->getAttributes();
    //     foreach ($charts as $k => $chart) {
    //         $charts[$k] = array_merge($default, $chart);
    //     }
    //     $this->setExtra('charts', $charts);

    //     return $charts;
    // }

    // DEPRECATED(?)
    // public function getGroupTitle(): array {
    //     $gid = $this->getQuestionBreads()[0]->gid;

    //     $group_props = LimeModelService::make()->getGroupProperties($gid);

    //     return [$group_props['group_name'], $group_props['description']];
    // }

    public function getGroupTitleAttribute(?string $value): string
    {
        /*
        if($this->extra?->extra_attributes->group_title !== null) {
            Assert::notNull($this->extra->extra_attributes, '['.__FILE__.']['.__LINE__.']');
            return $this->extra?->extra_attributes->group_title;
        }
        */
        if (\is_string($value = $this->getExtra('group_title'))) {
            return $value;
        }

        $value = 'Tassi di risposta';

        $group = $this->limeQuestion?->group;
        if ($group !== null) {
            Assert::notNull($this->limeQuestion, '['.__FILE__.']['.__LINE__.']');
            Assert::notNull($this->limeQuestion->group, '['.__FILE__.']['.__LINE__.']');
            $value = $this->limeQuestion->group->group_name;
        }

        $this->setExtra('group_title', $value);

        return $value;
    }

    // public function answers(): CustomRelation
    // {
    //     /** @var class-string */
    //     $model_class = LimeSurvey::class.$this->survey_id;

    //     if (! class_exists($model_class)) {
    //         app(GenerateModelByModelClass::class)
    //             ->setCustomReplaces(['DummyTable' => 'lime_survey_'.$this->survey_id])
    //             ->execute($model_class);
    //     }

    //     return $this->customRelation(
    //         $model_class,
    //         // add constraints
    //         static function ($relation): void {
    //             $relation->getQuery()
    //                 ->where('submitdate', '!=', null);
    //         },
    //         // add eager constraints
    //         static function ($relation, $models): void {
    //             dddx($models);
    //         }
    //     );
    // }

    public function answers(): Builder
    {
        return SurveyResponse::getResponsesForSurvey($this->survey_id)
            // ->withParticipants()
            ->where('submitdate', '!=', null);
    }

    public function participants(): CustomRelation
    {
        /** @var class-string */
        $model_class = 'Modules\Limesurvey\Models\LimeTokens'.$this->survey_id;
        if (! class_exists($model_class)) {
            app(GenerateModelByModelClass::class)
                ->setCustomReplaces(['DummyTable' => 'lime_tokens_'.$this->survey_id])
                ->execute($model_class);
        }

        return $this->customRelation(
            // '\Modules\Limesurvey\Models\LimeTokens' . $this->survey_id,
            $model_class,
            // add constraints
            static function ($relation): void {
                $relation->getQuery();
                // ->where('submitdate', '!=', null);
            },
            // add eager constraints
            static function ($relation, $models): void {
                dddx($models);
            }
        );
    }

    public function getFieldNameAttribute(?string $value): string
    {
        if ($value !== null) {
            return $value;
        }

        $value = $this->getFieldname();
        $this->update(['field_name' => $value]);

        return $value;
    }

    public function getFieldname(): string
    {
        if ($this->question === null) {
            // throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
            return '';
        }

        return app(GetAnswerFieldNameByQuestionIdAction::class)->execute($this->question);
    }

    public function getSurveyModel(): Model
    {
        return app('\\'.LimeSurvey::class.$this->survey_id);
    }

    public function getGroupBySqlAttribute(?string $value): ?string
    {
        if ($this->group_by === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        return $this->getSql($this->group_by, 'name');
    }

    public function getSortBySqlAttribute(?string $value): ?string
    {
        if ($this->sort_by === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        return $this->getSql($this->sort_by, 'number');
    }

    public function getSql(string $str, string $type = 'name', ?string $fieldname = 'submitdate'): string
    {
        return app(GetPieceQueryBySurveyIdAction::class)->execute($this->survey_id, $str, $type, $fieldname);
        // if ('' == $str) {
        //     $str = 'null';
        // }
        // $month = match ($type) {
        //     'name' => 'b',
        //     default => 'm',
        // };

        // if (Str::startsWith($str, 'date:')) {
        //     $format = Str::after($str, 'date:');
        //     switch ($format) {
        //         case 'Y-M':$str = 'DATE_FORMAT(' . $fieldname . ', "%Y-%' . $month . '")';
        //             break;
        //         case 'o-W':$str = 'concat(substr(YEARWEEK(' . $fieldname . '),1,4)," - ",substr(YEARWEEK(' . $fieldname . '),-2))';
        //             break;
        //         case 'Y-m':$str = 'DATE_FORMAT(' . $fieldname . ', "%Y-%' . $month . '")';
        //             break;
        //         case 'Y-m-d':
        //         case 'Y-M-d': $str = 'DATE_FORMAT(' . $fieldname . ', "%Y-%' . $month . '-%d")';
        //             break;
        //         default:dddx($format);
        //     }

        //     return $str;
        // }

        // if ('_value' == $str) {
        //     $str = '"_value"';
        // }

        // if (Str::startsWith($str, 'field:')) {
        //     $field = Str::after($str, 'field:');
        //     $q = LimeQuestion::where('sid', $this->survey_id)
        //         ->where('title', $field)->first();
        //     if (null == $q) {
        //         throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
        //     }

        //     return app(GetAnswerFieldNameByQuestionIdAction::class)->execute((string) $q->qid);
        // }

        // return $str;
    }
}
