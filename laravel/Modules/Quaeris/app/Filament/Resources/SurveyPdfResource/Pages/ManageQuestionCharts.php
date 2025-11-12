<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages;

use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables\Table;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Exports\AlertExport;
use Modules\Quaeris\Exports\EmailsExport;
use Modules\Quaeris\Filament\Resources\QuestionChartResource;
use Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages\ListQuestionCharts;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource;
use Modules\Quaeris\Models\SurveyPdf;
use Webmozart\Assert\Assert;

use function Safe\date;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

/**
 * @property SurveyPdf $record
 */
class ManageQuestionCharts extends ManageRelatedRecords
{
    protected static string $resource = SurveyPdfResource::class;

    protected static string $relationship = 'questionCharts';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-chart-pie';

    public static function getNavigationLabel(): string
    {
        return 'Question Charts';
    }

    public function form(Schema $schema): Schema
    {
        $survey_id = $this->record->survey_id;
        if ($survey_id === null) {
            return $schema;
        }
        $form_schema = QuestionChartResource::getFormSchemaBySurveyId($survey_id);
        return $schema->components($form_schema);
    }

    public function getTableHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('exportPdf')
                ->label('Pdf ')
                ->icon('heroicon-s-document')
                ->url(route('export.pdf', ['surveyPdf' => $this->record])),

            Action::make('alert')

                ->icon('heroicon-o-document-arrow-down')
                ->color('gray')
                ->modalDescription('Default temporale degli ultimi 3 mesi')
                ->action(function (array $data) {
                    // $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                    $answersFilterData = AnswersFilterData::from(['date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                    Assert::isInstanceOf($this->record, SurveyPdf::class);

                    return Excel::download(
                        new AlertExport($this->record, $answersFilterData),
                        $this->record->name.'_alert_Sett_'.date('W').'.xlsx'
                    );
                })
                ->schema([
                    DatePicker::make('date_from')->displayFormat('d/m/Y'),
                    DatePicker::make('date_to')->displayFormat('d/m/Y'),
                ]),

            Action::make('email')

                ->icon('heroicon-o-document-arrow-down')
                ->color('gray')
                ->modalDescription('Default temporale degli ultimi 3 mesi')
                ->action(function (array $data) {
                    // $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                    $answersFilterData = AnswersFilterData::from(['date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                    Assert::isInstanceOf($this->record, SurveyPdf::class);

                    return Excel::download(
                        new EmailsExport($this->record, $answersFilterData),
                        $this->record->name.'_contact_emails_Sett_'.date('W').'.xlsx'
                    );
                })
                ->schema([
                    DatePicker::make('date_from')->displayFormat('d/m/Y'),
                    DatePicker::make('date_to')->displayFormat('d/m/Y'),
                ]),
        ];
    }

    public function table(Table $table): Table
    {

        return app(ListQuestionCharts::class)->table($table)
            ->headerActions($this->getTableHeaderActions());
    }
}
