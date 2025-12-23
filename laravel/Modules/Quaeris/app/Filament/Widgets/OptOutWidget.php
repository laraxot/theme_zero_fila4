<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Widgets;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Filament\Tables\Actions;
use Webmozart\Assert\Assert;
use Modules\Xot\Exports\QueryExport;
use Modules\Quaeris\Models\SurveyPdf;
use Modules\Limesurvey\Models\LimeGroup;
use Modules\Limesurvey\Models\TokensResponse;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Concerns\InteractsWithTable;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

/**
 * Undocumented class
 *
 * @property array $filters
 */
class OptOutWidget extends BaseWidget
{
    use InteractsWithTable;
    use InteractsWithPageFilters;
    /*
    use HasXotTable {
        getTableHeaderActions as getXotTableHeaderActions;
        InteractsWithTable::getTableHeaderActions insteadof HasXotTable;
        HasXotTable::getTableHeaderActions insteadof InteractsWithTable;
        HasXotTable::table insteadof InteractsWithTable;
        HasXotTable::getTableFilters insteadof InteractsWithTable;
        HasXotTable::getTableActions insteadof InteractsWithTable;
        HasXotTable::getTableBulkActions insteadof InteractsWithTable;
    }
    */

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns($this->getTableColumns())
            ->headerActions($this->getTableHeaderActions())
            ->persistFiltersInSession()
            //->extremePaginationLinks()
        ;
    }

    public function getXlsFields(): array
    {
        $query = $this->getTableQuery();
        $fields = collect($query->first()->toArray())->filter(function ($value, $key) {
            return Str::endsWith($key, 'answer');
        })->keys()->all();
        $fields[] = 'attribute_3';
        $fields[] = 'email';
        $fields[] = 'token';
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
        return TokensResponse::getResponsesForSurvey($this->getSurveyId())
            ->where('emailstatus', 'OptOut');
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('export-table-xls')
                ->label('')
                ->icon('fas-file-excel')
                ->action(function () {
                    $fields = [
                        'firstname',
                        'lastname',
                        'email',
                        'token',
                        'sent',
                    ];

                    $query = $this->getTableQuery();

                    $filename = class_basename($this).'_'.$this->getSurvey()->name.'.xlsx';
                    return (new QueryExport($query, null, $fields))
                        ->download($filename);
                }),
        ];
    }

    protected function getTableColumns(): array
    {
        $columns = [
            TextColumn::make('tid')
                ->label('ID')
                ->searchable()
                ->sortable(),
            TextColumn::make('firstname'),
            TextColumn::make('lastname'),
            TextColumn::make('language'),
            TextColumn::make('email')->searchable(),

            TextColumn::make('emailstatus')
                ->label('Email Status')
                ->sortable(),
            TextColumn::make('sent')
                ->label('Data Invio')
                ->dateTime('d-m-Y')
                ->sortable(),
            // Aggiungi altre colonne se necessario
        ];
        $attrs = [];
        for ($i = 1;$i <= 6;$i++) {
            $attrs[] = TextColumn::make('attribute_'.$i);
        }

        $columns[] = GroupColumn::make('attributes')->schema($attrs);

        return $columns;
    }
}
