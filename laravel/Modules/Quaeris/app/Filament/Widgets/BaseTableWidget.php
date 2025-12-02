<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Widgets;

use Illuminate\Database\Eloquent\Relations\Relation;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Modules\Quaeris\Models\SurveyPdf;
use function Safe\mb_convert_encoding;
use Filament\Tables\Enums\FiltersLayout;
use Modules\Limesurvey\Models\LimeGroup;
use Modules\Quaeris\Exports\QueryExport;
use Illuminate\Database\Eloquent\Builder;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Limesurvey\Models\LimeQuestion;
use Illuminate\Database\Eloquent\Collection;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Limesurvey\Models\SurveyResponse;
// use Modules\Xot\Exports\QueryExport;
use Modules\Quaeris\Datas\DashboardFilterData;
use Modules\Xot\Actions\Array\SaveArrayAction;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Concerns\InteractsWithTable;

use Modules\UI\Filament\Tables\Columns\GroupColumn;

use Modules\Xot\Actions\Trans\GetTransFilenameAction;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Xot\Actions\Query\GetFieldnamesByTablenameAction;

/**
 * Undocumented class
 *
 * @property array $filters
 */
abstract class BaseTableWidget extends BaseWidget
{
    use InteractsWithTable;
    use InteractsWithPageFilters;
    //use HasXotTable;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns($this->getTableColumns())
            ->headerActions($this->getTableHeaderActions())
            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(1)
            ->persistFiltersInSession()
            ->extremePaginationLinks()
            ->paginated([10, 25, 50, 100])
        ;
    }

    public function populateTrans(): void
    {
        $surveyId = $this->getSurveyId();
        $transKey = "limesurvey::lime_survey_{$surveyId}";

        $questions = LimeQuestion::with(['l10n'])
            ->where('sid', $surveyId)
            ->get()
            // ->mapWithKeys(fn($q) => [
            //     $q->fieldname => trim(strip_tags($q->l10n->question)),
            //     $q->fieldname.'answer' => trim(strip_tags($q->l10n->question)),
            //     ])
            ->mapWithKeys(function ($q) {
                $question = trim(strip_tags($q->l10n->question));
                $question_parent = $q->parent_qid != 0 ? trim(strip_tags($q->parent->l10n->question)) . ' ' : '';

                $content = $question_parent . $question;
                if(is_iterable($q->childs)) {
                    if($q->childs->count() > 0) {
                        // dddx([$q, $q->childs]);
                        foreach($q->childs as $child) {
                            $content = $child->getFullTitle();
                            return [
                                $child->fieldname => $content,
                                $child->fieldname . 'answer' => $content,
                                $q->fieldname => $content,
                                $q->fieldname . 'answer' => $content,
                            ];
                        }
                    }
                }

                return [
                    $q->fieldname => $content,
                    $q->fieldname . 'answer' => $content,
                ];
            })
            ->toArray()
        ;

        app(SaveTransAction::class)->execute($transKey, $questions);
    }




    public function getXlsFields(): array
    {

        $limeQuestions = $this->getAllQuestions();
        $table = 'lime_survey_'.$this->getSurveyId();
        $fieldnames = (app(GetFieldnamesByTablenameAction::class)->execute($table, 'limesurvey'));

        $fields = ['token', 'attribute_3', 'email'];

        foreach ($limeQuestions as $question) {
            if(!in_array($question->fieldname, $fieldnames)) {
                continue;
            }

            if($question->hasTrans()) {
                $fields[] = $question->fieldname.'answer';
            } else {
                $fields[] = $question->fieldname;
            }
        }
        return $fields;
    }

    public function getGroups(): array
    {
        return LimeGroup::where('sid', $this->getSurveyId())
            ->with('labels')
            ->get()
            ->pluck('labels.group_name', 'gid')
            ->all()
        ;
    }

    public function getSurvey(): SurveyPdf
    {
        $survey_pdf_id = Arr::get($this->pageFilters ?? [], 'survey_pdf_id', null);
        $survey_pdf = SurveyPdf::with(['questionCharts', 'questionCharts.extra'])
            ->firstWhere(['id' => $survey_pdf_id]);
        Assert::notNull($survey_pdf);
        return $survey_pdf;
    }

    public function getSurveyId(): string
    {
        $survey_pdf = $this->getSurvey();
        Assert::notNull($survey_pdf->survey_id);
        return $survey_pdf->survey_id;
    }

    public function getTableQuery(): Builder|Relation|null
    {
        $survey_response = SurveyResponse::getResponsesForSurvey($this->getSurveyId());

        Assert::isArray($this->pageFilters);
        $filter_data = DashboardFilterData::from($this->pageFilters);

        $query = $survey_response
            ->withParticipants()
            ->where('submitdate', '!=', null)
            ->ofDashboardFilterData($filter_data);
        $query->addSelect('*');

        $questions = $this->getLeafQuestions();

        foreach ($questions as $q) {
            Assert::isInstanceOf($q, LimeQuestion::class, '['.__LINE__.']['.class_basename(self::class).']');
            $main = $q->qid;

            if ($q->parent_qid !== 0) {
                $main = $q->parent_qid;
            }

            $query = $query->withAnswersLabel($main, $q->fieldName, $q->fieldName, 'subquery');
        }

        return $query;
    }

    public function getLeafQuestions(): Collection
    {
        $questions = LimeQuestion::where('sid', $this->getSurveyId())
            ->whereNotIn('type', ['X'])
            ->isLeaf();

        return $this->applyFilterSort($questions);
    }

    public function getAllQuestions(): Collection
    {
        $questions = LimeQuestion::where('sid', $this->getSurveyId())
            ->whereNotIn('type', ['X']);

        return $this->applyFilterSort($questions);
    }

    public function getRootQuestions(): Collection
    {
        $questions = LimeQuestion::where('sid', $this->getSurveyId())
            ->where('parent_qid', 0)
            ->whereNotIn('type', ['X']);

        return $this->applyFilterSort($questions);
    }

    public function applyFilterSort(Builder $questions): Collection
    {
        Assert::isArray($this->pageFilters, '['.__LINE__.']['.class_basename(self::class).']');
        if (isset($this->pageFilters['group'])) {
            $questions = $questions->where('gid', $this->pageFilters['group']);
        }

        return $questions->get()
            ->sortBy(function ($item) {
                Assert::notNull($item->group, '['.__LINE__.']['.class_basename(self::class).']');
                return $item->group->group_order * 1000 + $item->question_order;
            });
    }

    public function getFilterField(): string|null
    {
        $survey_pdf = $this->getSurvey();

        $limeSurvey = $survey_pdf->info;
        if ($limeSurvey === null) {
            return null;
        }
        $limeQuestion = $limeSurvey->questions->where('qid', $survey_pdf->question_filter)->first();
        if ($limeQuestion === null) {
            return null;
        }

        $gid = $limeQuestion->gid;
        return $survey_pdf->survey_id.'X'.$gid.'X'.$survey_pdf->question_filter;
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('export-table-xls')
                ->label('')
                ->icon('fas-file-excel')
                ->action(function () {
                    $fields = $this->getXlsFields();
                    $query = $this->getTableQuery();
                    $transkey = "limesurvey::lime_survey_{$this->getSurveyId()}";
                    $this->populateTrans();
                    $filename = class_basename($this).'_'.$this->getSurvey()->name.'.xlsx';
                    return (new QueryExport($query, $transkey, $fields))
                        ->download($filename);
                }),
        ];
    }

    protected function getTableColumns(): array
    {
        $columns = [
            TextColumn::make('_id')
                ->label('ID')
                ->sortable()
                ,
            GroupColumn::make('user')->schema([
                TextColumn::make('submitdate'),
                TextColumn::make('firstname'),
                TextColumn::make('lastname'),
                TextColumn::make('email')->searchable(),
                TextColumn::make('language'),
                TextColumn::make('token'),
            ]),
        ];

        $attrs = [];
        for ($i = 1;$i <= 6;$i++) {
            $attrs[] = TextColumn::make('attribute_'.$i);
        }

        $columns[] = GroupColumn::make('attributes')->schema($attrs);

        foreach ($this->getRootQuestions() as $q) {
            Assert::isInstanceOf($q, LimeQuestion::class, '['.__LINE__.']['.class_basename(self::class).']');

            /** @var string */
            $label = $q->question;
            $label = strip_tags($label);
            $label = Str::limit($label, 150);

            if ($q->children->count() === 0) {
                $columns[] = TextColumn::make($q->field_name)
                    ->label($label)
                    ->wrapHeader()
                    ->verticallyAlignStart()
                    ->grow()
                    ->wrap()
                    ->formatStateUsing(function ($record) use ($q) {
                        $msg = '['.$record->getAttribute($q->field_name).'] '.$record->getAttribute($q->field_name.'answer');
                        Assert::string(mb_detect_encoding($msg));
                        return mb_convert_encoding($msg, mb_detect_encoding($msg), 'UTF-8');
                    });
            } else {
                $sub = [];
                foreach ($q->children as $child) {
                    $sub[] = TextColumn::make($child->field_name.'-')
                        ->label($label)
                        ->wrapHeader()
                        ->verticallyAlignStart()
                        ->grow()
                        ->wrap()
                        ->default(function ($record) use ($child) {
                            Assert::string($child->question);
                            $answer = $record->getAttribute($child->field_name.'answer');
                            if ($answer === '') {
                                return '';
                            }
                            $msg = '['.$record->getAttribute($child->field_name).'] '.PHP_EOL;
                            $msg .= $child->question.'  :'.PHP_EOL;
                            $msg .= $answer;
                            Assert::string(mb_detect_encoding($msg));
                            return mb_convert_encoding($msg, mb_detect_encoding($msg), 'UTF-8');
                        })
                        ->limit(50);
                }
                $columns[] = GroupColumn::make($q->field_name)
                    ->label($label)
                    ->wrapHeader()
                    ->verticallyAlignStart()
                    ->grow()
                    ->schema($sub);
            }
        }

        return $columns;
    }
}
