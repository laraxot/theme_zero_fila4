<?php

namespace Modules\Quaeris\Filament\Widgets;

use Illuminate\Database\Eloquent\Relations\Relation;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Filament\Tables\Actions;
use Maatwebsite\Excel\Excel;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Modules\Quaeris\Models\SurveyPdf;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Enums\FiltersLayout;
use Modules\Xot\Exports\QueryExport;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Concerns\InteractsWithTable;
use Modules\Limesurvey\Models\SurveyFlipResponse;
use Modules\Quaeris\Datas\AlertDashboardFilterData;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Limesurvey\Exports\SurveyFlipResponseExport;
use Modules\Limesurvey\Actions\PopulateSurveyFlipBySurveyIdAction;

/**
 * Undocumented class
 *
 * @property array $filters
 */
class AlertWidget extends BaseTableWidget
{
    public function getTableQuery(): Builder|Relation|null
    {

        app(PopulateSurveyFlipBySurveyIdAction::class)
            ->onQueue()
            ->execute($this->getSurveyId());


        Assert::isArray($this->pageFilters);
        $filter_data = AlertDashboardFilterData::from($this->pageFilters);
        // dddx([$this->filters, $filter_data]);


        // return SurveyFlipResponse::where('survey_id', $this->getSurveyId())
        //     ->join('lime_tokens_'.$this->getSurveyId(), 'survey_flip_responses.token', '=', 'lime_tokens_'.$this->getSurveyId().'.token')
        //     ->ofAlertDashboardFilterData($filter_data)
        // ;

        return
            SurveyFlipResponse::where('survey_id', $this->getSurveyId())
                ->join('lime_tokens_' . $this->getSurveyId(), 'survey_flip_responses.token', '=', 'lime_tokens_' . $this->getSurveyId() . '.token')
                ->join('lime_questions', 'survey_flip_responses.question_id', '=', 'lime_questions.qid')
                ->join('lime_question_l10ns', 'lime_questions.qid', '=', 'lime_question_l10ns.qid')
                ->leftJoin('lime_questions as parent_questions', 'lime_questions.parent_qid', '=', 'parent_questions.qid')
                ->leftJoin('lime_question_l10ns as parent_lime_question_l10ns', 'parent_questions.qid', '=', 'parent_lime_question_l10ns.qid')

                // AGGIUNTA: leftJoin con lime_answers
                ->leftJoin('lime_answers', function ($join) {
                    $join->on(DB::raw('CAST(survey_flip_responses.question_id AS UNSIGNED)'), '=', 'lime_answers.qid')
                        ->on('survey_flip_responses.answer', '=', 'lime_answers.code');
                })



                ->select(
                    'survey_flip_responses.*',
                    'lime_tokens_' . $this->getSurveyId() . '.email',
                    'lime_tokens_' . $this->getSurveyId() . '.attribute_3',
                    DB::raw('CONCAT(
                        COALESCE(REGEXP_REPLACE(parent_lime_question_l10ns.question, "<[^>]*>", ""), ""),
                        " ",
                        REGEXP_REPLACE(lime_question_l10ns.question, "<[^>]*>", "")
                    ) as full_question')
                )

            // FILTRO: solo dove NON esiste traduzione
            ->whereNull('lime_answers.code')


            ->ofAlertDashboardFilterData($filter_data)
        ;


        // return SurveyFlipResponse::where('survey_id', $this->getSurveyId())
        //     ->join('lime_tokens_' . $this->getSurveyId(), 'survey_flip_responses.token', '=', 'lime_tokens_' . $this->getSurveyId() . '.token')
        //     ->join('lime_questions', 'survey_flip_responses.question_id', '=', 'lime_questions.qid')
        //     ->join('lime_question_l10ns', 'lime_questions.qid', '=', 'lime_question_l10ns.qid')
        //     ->select('survey_flip_responses.*', 'lime_question_l10ns.question')
        //     ->ofAlertDashboardFilterData($filter_data);

    }

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('populate')
                //->requiresConfirmation()
                ->action(fn ($data) => app(PopulateSurveyFlipBySurveyIdAction::class)->execute($this->getSurveyId()))
                ->icon('heroicon-o-plus')
                ->color('success'),

            Action::make('export-table-xls')
                ->label('')
                ->icon('fas-file-excel')
                ->action(function () {

                    $fields = [
                        'email',
                        'attribute_3',
                        'answer',
                        'value',
                        'submitdate',
                        'feedback',
                        // 'full_question' //se inserisco questo da errore
                    ];

                    $query = $this->getTableQuery()
                        ->select($fields)
                        ->addSelect([
                            DB::raw('CONCAT(
                                COALESCE(REGEXP_REPLACE(parent_lime_question_l10ns.question, "<[^>]*>", ""), ""),
                                " ",
                                REGEXP_REPLACE(lime_question_l10ns.question, "<[^>]*>", "")
                            ) as full_question')
                        ])
                    ;

                    $filename = class_basename($this) . '_' . $this->getSurvey()->name . '.xlsx';
                    return (new QueryExport($query, null, $fields))
                        ->download($filename);
                }),
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id')->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('old_id')->toggleable(isToggledHiddenByDefault: true),
            //Tables\Columns\TextColumn::make('survey_id'),
            TextColumn::make('email')->searchable(),
            TextColumn::make('attribute_3')->label('Cellulare')->searchable(),
            TextColumn::make('answer')
                ->wrap()
                ->sortable()
                ->searchable(),
            TextColumn::make('value'),
            // Tables\Columns\TextColumn::make('participant_id'),
            TextColumn::make('submitdate'),
            TextColumn::make('feedback')->wrap(),
            // Tables\Columns\TextColumn::make('question.text')->wrap(),
            TextColumn::make('full_question'),
            TextColumn::make('question_id')->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('question_type')->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('fieldname')->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('token')->searchable(['survey_flip_responses.token'])->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
