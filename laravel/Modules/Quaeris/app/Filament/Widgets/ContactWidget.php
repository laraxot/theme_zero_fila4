<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Filament\Tables\Actions;
use Webmozart\Assert\Assert;
use Filament\Tables\Filters\Filter;
use Modules\Quaeris\Models\Contact;
use Modules\Xot\Exports\QueryExport;
use Filament\Forms\Components\Select;
use Modules\Quaeris\Models\SurveyPdf;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Concerns\InteractsWithTable;
use Modules\Limesurvey\Models\SurveyFlipResponse;
use Modules\Quaeris\Datas\AlertDashboardFilterData;
use Illuminate\Database\Eloquent\Relations\Relation;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Modules\Limesurvey\Actions\PopulateSurveyFlipBySurveyIdAction;

/**
 * Undocumented class
 *
 * @property array $filters
 */
class ContactWidget extends BaseTableWidget
{
    public function getTableQuery(): EloquentBuilder|Relation|null
    {
        //----------
        $ups = Contact::where('survey_id', null)
            ->inRandomOrder()
            ->limit(100)
            ->get();

        foreach ($ups as $up) {
            $up->survey_id = $up->getSurveyId();
            $up->save();
        }
        //---------------

        return Contact::where('survey_id', $this->getSurveyId())
        ;
    }

    protected function getTableHeaderActions(): array
    {

        return [
            Action::make('export-table-xls')
                ->label('')
                ->icon('fas-file-excel')
                ->action(function () {
                    $fields = [
                        'email',
                        'mobile_phone',
                        'token',
                        'duplicate_count'
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




        return [
            TextColumn::make('id'),
            TextColumn::make('mobile_phone'),
            TextColumn::make('token'),
            TextColumn::make('email')->searchable(),
            TextColumn::make('duplicate_count'),



        ];
    }
}
