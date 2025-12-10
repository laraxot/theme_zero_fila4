<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Modules\Chart\Models\Chart;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Limesurvey\Models\LimeSurvey;
use Modules\Notify\Models\NotifyTheme;
use Modules\Quaeris\Database\Factories\SurveyPdfFactory;
use Modules\Quaeris\Models\Traits\HasChartTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Webmozart\Assert\Assert;

/**
 * Model SurveyPdf.
 *
 * Represents a Survey PDF document with metadata and related questions, contacts, and chart information.
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $survey_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $name
 * @property string $pdf_view
 * @property string|null $logo
 * @property string|null $email
 * @property int|null $schedule_days
 * @property string|null $date_from
 * @property string|null $date_to
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $xls_field_1
 * @property string|null $xls_field_2
 * @property string|null $xls_field_3
 * @property string|null $xls_field_4
 * @property string|null $xls_field_5
 * @property string|null $question_contact_email
 * @property string $chart_engine
 * @property string|null $question_filter
 * @property string|null $question_filter_txt
 * @property int $allow_multiple_invite
 * @property array $xls_field_json
 * @property Chart $chart
 * @property Collection<int, Contact> $contacts
 * @property int|null $contacts_count
 * @property Customer|null $customer
 * @property LimeSurvey|null $info
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @property Collection<int, NotifyTheme> $notifyThemes
 * @property int|null $notify_themes_count
 * @property PdfStyle $pdfStyle
 * @property Collection<int, QuestionChart> $questionCharts
 * @property int|null $question_charts_count
 * @property Collection<int, LimeQuestion> $questions
 * @property int|null $questions_count
 *
 * @mixin \Eloquent
 */
class SurveyPdf extends BaseModel
{
    use HasChartTrait;

    /** @var list<string> */
    protected $fillable = [
        'survey_id', 'customer_id', 'name', 'pdf_view', 'logo',
        'date_from', 'date_to', 'title', 'subtitle',
        'xls_field_1', 'xls_field_2', 'xls_field_3', 'xls_field_4', 'xls_field_5',
        'question_contact_email', 'chart_engine', 'question_filter',
        'question_filter_txt', 'allow_multiple_invite', 'xls_field_json',
    ];

    /** @var array<string, string> */
    protected $casts = [
        'xls_field_json' => 'array',
        'survey_id' => 'string',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /** @var list<string> */
    protected $with = [
        'extra',
    ];

    // ---------- Relationships ----------

    public function questionCharts(): HasMany
    {
        return $this->hasMany(QuestionChart::class);
    }

    /**
     * @return HasMany<LimeQuestion>
     */
    public function questions(): HasMany
    {
        return $this->hasMany(LimeQuestion::class, 'sid', 'survey_id');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function notifyThemes(): MorphMany
    {
        return $this->morphMany(NotifyTheme::class, 'post');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function pdfStyle(): MorphOne
    {
        return $this->morphOne(PdfStyle::class, 'style')->withDefault([
            'backtop' => '35',
            'backbottom' => '14',
            'backleft' => '2',
            'backright' => '2',
            'x_label_angle' => '0',
            'font_size_question' => '100',
        ]);
    }

    public function info(): BelongsTo
    {
        return $this->belongsTo(LimeSurvey::class, 'survey_id', 'sid');
    }

    // ---------- Scopes ----------

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->whereHas('info', static function ($query) {
            $query->where('active', '!=', 'N');
        });
    }

    // ---------- Custom Methods ----------

    public function getInfo(): LimeSurvey
    {
        $limeSurvey = LimeSurvey::with(['lang', 'questions'])
            ->where('active', 'Y')
            ->firstWhere('sid', $this->survey_id);

        if ($limeSurvey === null) {
            throw new Exception('Survey not found.');
        }

        return $limeSurvey;
    }

    public function surveylsTitle(): string
    {
        $title = $this->getInfo()->lang?->surveyls_title;
        Assert::string($title, 'Survey title not found.');

        return $title;
    }

    public function getLogoAttribute(?string $value): ?string
    {
        return $this->getFirstMediaUrl();
    }

    public function getDateFromAttribute(?string $value): ?string
    {
        return $value === '0000-00-00' ? null : $value;
    }

    public function getDateToAttribute(?string $value): ?string
    {
        return $value === '0000-00-00' ? null : $value;
    }

    public function getXlsFieldJsonAttribute(string|array|null $value): array
    {
        if (is_array($value)) {
            return $value;
        }

        return empty($this->xls_field_1) ? [] : explode(',', $this->xls_field_1);
    }

    public function optionsQuestions(): array
    {
        // return app(GetQuestionOptionsBySurveyId::class)->execute($this->survey_id);
        $questions = $this->questions;

        if ($questions->isEmpty()) {
            return [];
        }

        $callable = function ($item) {
            // Ensure the item is an array, check or handle type here.
            Assert::isInstanceOf($item, LimeQuestion::class);

            Assert::string($question = $item->question);

            return [
                'id' => $item->qid,
                'key' => $item->qid,
                'slug' => $item->title,
                'label' => $item->qid . '] ' . $item->title . '] ' . strip_tags($question),
                'parent_id' => $item->parent_qid,
                'pos' => $item->qid,
            ];
        };

        // Apply mapping, ensure grouping is properly handled
        $grouped = $questions->map($callable)->groupBy('parent_id');

        if (! isset($grouped[0])) {
            throw new Exception('Parent questions not found.');
        }

        // Correctly map the questions and their children (ensure types match)
        $data = $grouped[0]->map(function (array $item) use ($grouped) {
            $item['sons'] = $grouped->get($item['id'], []);
            return $item;
        });

        // Map over the data again to format the keys correctly (array type)
        return $data->map(function (array $item) {
            $item['key'] = (string) $item['slug'];
            if ($item['sons'] instanceof \Illuminate\Support\Collection) {
                $item['sons'] = $item['sons']->toArray();
            }
            $item['sons'] = Arr::map($item['sons'], function (array $son) use ($item) {
                $son['key'] = (string) $item['slug'] . '[' . (string) $son['slug'] . ']';
                return $son;
            });

            return $item;
        })->all();
    }

    public function answers(): LimeSurveyXXXContract
    {
        $class = LimeSurvey::class . $this->survey_id;
        return app($class);
    }

    // ---------- Factory ----------

    protected static function newFactory(): Factory
    {
        return SurveyPdfFactory::new();
    }
}
