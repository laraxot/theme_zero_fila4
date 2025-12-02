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
use Filament\Tables\Filters\Filter;
use Modules\Quaeris\Models\SurveyPdf;
use Filament\Forms\Components\TextInput;
use Modules\Limesurvey\Models\LimeGroup;
use Modules\Quaeris\Exports\QueryExport;
use Illuminate\Database\Eloquent\Builder;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Limesurvey\Models\LimeQuestion;
use Illuminate\Database\Eloquent\Collection;
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

use function Safe\mb_convert_encoding;

/**
 * Undocumented class
 *
 * @property array $filters
 */
class CompleteAnswers extends BaseTableWidget
{
    public function getXlsFields(): array
    {

        $limeQuestions = $this->getAllQuestions();
        $table = 'lime_survey_'.$this->getSurveyId();
        $fieldnames = (app(GetFieldnamesByTablenameAction::class)->execute($table, 'limesurvey'));

        $fields = ['token', 'attribute_3', 'email'];

        foreach ($limeQuestions as $question) {
            if (!in_array($question->fieldname, $fieldnames)) {
                continue;
            }

            if ($question->hasTrans()) {
                $fields[] = $question->fieldname.'answer';
            } else {
                $fields[] = $question->fieldname;
            }
        }
        return $fields;
    }



    public function getTableQuery(): Builder|Relation|null
    {
        $survey_response = SurveyResponse::getResponsesForSurvey($this->getSurveyId());

        Assert::isArray($this->pageFilters);
        $filter_data = DashboardFilterData::from($this->pageFilters);

        $query = $survey_response
            ->withParticipants()
            ->where('submitdate', '!=', null)
            ->ofDashboardFilterData($filter_data)
            ->withAllAnswers('subquery')
        ;
        $query->addSelect('email', 'attribute_1', 'attribute_2', 'attribute_3');
        // dddx($query->first());
        return $query;
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

    protected function getTableFilters(): array
    {
        return [
            Filter::make('token')
                ->schema([
                    TextInput::make('token')
                        ->label('Token')
                        ->placeholder('Enter token'),
                ])
                ->query(function (Builder $query, array $data) {
                    if (!empty($data['token'])) {
                        $query->where("lime_survey_{$this->getSurveyId()}.token", 'like', '%' . $data['token'] . '%');
                    }
                }),
        ];
    }



}
