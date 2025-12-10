<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages;

use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Schemas\Components\Fieldset;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use Filament\Tables\Table;
use Webmozart\Assert\Assert;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\ToggleColumn;
use Modules\Quaeris\Models\QuestionChart;
use Filament\Forms\Components\ColorPicker;
use Illuminate\Database\Eloquent\Collection;
use Modules\Chart\Actions\Chart\GetTypeOptions;
use Modules\Chart\Actions\Chart\GetFontStyleOptions;
use Modules\Chart\Actions\Chart\GetFontFamilyOptions;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Quaeris\Filament\Resources\QuestionChartResource;
use Modules\Quaeris\Actions\QuestionChart\MakeImgByQuestionChartModel2Action;

class ListQuestionCharts extends XotBaseListRecords
{
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;
    // use \SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;
    protected static string $resource = QuestionChartResource::class;

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('id')->label('ID'),
            // Tables\Columns\TextColumn::make('question')->sortable()->wrap(),
            // Tables\Columns\TextColumn::make('limeQuestion.question')->sortable()->html(),
            TextColumn::make('questionTxt')->sortable()->wrap(),

            // Tables\Columns\TextColumn::make('chart.list_color')->label('list_color')->wrap(),

            // Tables\Columns\TextColumn::make('chart.colors')->label('colors'),

            // Tables\Columns\TextColumn::make('pos')->sortable(),
            // Tables\Columns\TextColumn::make('img_src'),
            ImageColumn::make('img_src')->label('img')->disk('public_html')->height(120)->width(120),
            ToggleColumn::make('show_on_pdf'),
        ];
    }

    public function getTableFilters(): array
    {
        return [
        ];
    }

    public function getTableActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Chart Vars')
                ->label('Chart Vars')
                ->fillForm(fn (QuestionChart $record): array => [
                    'chart' => $record->chart,
                ])
                ->schema([
                    Fieldset::make('Chart vars')
                        ->relationship('chart')
                        ->schema([
                            Select::make('type')->options(app(GetTypeOptions::class)->execute()),
                            Select::make('group_by')
                                ->options(['date:o-W' => 'Settimanale', 'date:Y-M' => 'Mensile', 'date:Y-M-d' => 'Giornaliero', 'field:Q41' => 'field:Q41']),
                            Select::make('sort_by')
                                ->options(['date:o-W' => 'Settimanale', 'date:Y-m' => 'Mensile', 'date:Y-m-d' => 'Giornaliero', '_value' => '_value', 'field:Q41' => 'field:Q41']),

                            TextInput::make('width'),
                            TextInput::make('height'),
                            Toggle::make('show_box'),
                            Select::make('font_family')->options(app(GetFontFamilyOptions::class)->execute()),
                            Select::make('font_style')->options(app(GetFontStyleOptions::class)->execute()),
                            TextInput::make('font_size'),
                            Select::make('transparency')->options([
                                '0.0' => '0%',
                                '0.1' => '10%',
                                '0.2' => '20%',
                                '0.3' => '30%',
                                '0.4' => '40%',
                                '0.5' => '50%',
                                '0.6' => '60%',
                                '0.7' => '70%',
                                '0.8' => '80%',
                                '0.9' => '90%',
                                '1.0' => '100%',
                            ]),
                            TextInput::make('y_grace')
                                ->helperText('Per grafici a barre orizzontali: "appiattire/accorciare/schiacciare” il grafico lungo la linea orizzontale'),
                            Toggle::make('yaxis_hide'),
                            TextInput::make('x_label_angle'),
                            TextInput::make('x_label_margin'),
                            TextInput::make('plot_perc_width'),
                            Toggle::make('plot_value_show')
                                ->helperText('Visualizza i dati per barra'),
                            Select::make('plot_value_format')->options([1 => 'percentuale',
                                2 => '2 cifre decimali',
                                3 => '0 cifre decimali',
                            ]),
                            Toggle::make('plot_value_pos')
                                ->helperText('Centra il valore nella barra'),
                            ColorPicker::make('plot_value_color'),
                        ]),
                ])
                ->action(function (QuestionChart $record): void {
                    $record->chart->update();
                }),
            Action::make('regenImg2')
                ->label('regenerate2')
                ->icon('heroicon-o-arrow-path')
                // ->url(static fn ($record): string => QuestionChartResource::getUrl('regen-img-2', ['record' => $record, ...self::$route_params])),

                ->url(static fn ($record): string => QuestionChartResource::getUrl('regen-img-2', ['record' => $record])),

        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
            BulkAction::make('regen-imgs')

                ->icon('heroicon-o-arrow-path')
                ->requiresConfirmation()
                ->modalDescription('Seleziona le domande su cui vuoi generare l\'immagine')
                ->action(static function (Collection $collection): void {
                    foreach ($collection as $record) {
                        Assert::isInstanceOf($questionChart = $record, QuestionChart::class);
                        app(MakeImgByQuestionChartModel2Action::class)
                            ->onQueue()
                            ->execute($questionChart);
                    }
                }),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [];
        // QUYESTE SOTTO SONO AZIONI CHE ESISTONO SOLO SE C?E? IL PARAMETRO SURVEYPDF PERCIO SOLO NEL MANAGE
        /*
        return [
            CreateAction::make(),
            Action::make('exportPdf')
               ->label('Pdf ')
               ->icon('heroicon-s-document')
               ->url(route('export.pdf', ['surveyPdf' => $table->getLivewire()->record])),

            Action::make('alert')

               ->icon('heroicon-o-document-arrow-down')
               ->color('gray')
               ->modalDescription('Default temporale degli ultimi 3 mesi')
               ->action(static function (array $data) use ($table) {
                   // $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                   $answersFilterData = AnswersFilterData::from(['date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                   Assert::isInstanceOf($table->getLivewire()->record, SurveyPdf::class);

                   return Excel::download(
                       new AlertExport($table->getLivewire()->record, $answersFilterData),
                       $table->getLivewire()->record->name.'_alert_Sett_'.date('W').'.xlsx'
                   );
               })
               ->form([
                   DatePicker::make('date_from')->displayFormat('d/m/Y'),
                   DatePicker::make('date_to')->displayFormat('d/m/Y'),
               ]),

            Action::make('email')

               ->icon('heroicon-o-document-arrow-down')
               ->color('gray')
               ->modalDescription('Default temporale degli ultimi 3 mesi')
               ->action(static function (array $data) use ($table) {
                   // $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                   $answersFilterData = AnswersFilterData::from(['date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                   Assert::isInstanceOf($table->getLivewire()->record, SurveyPdf::class);

                   return Excel::download(
                       new EmailsExport($table->getLivewire()->record, $answersFilterData),
                       $table->getLivewire()->record->name.'_contact_emails_Sett_'.date('W').'.xlsx'
                   );
               })
               ->form([
                   DatePicker::make('date_from')->displayFormat('d/m/Y'),
                   DatePicker::make('date_to')->displayFormat('d/m/Y'),
               ]),
        ];
        */
    }

    protected function getHeaderActions(): array
    {
        // /**
        //  * @var SurveyPdf
        //  */
        // $surveyPdf = $this->getParent();

        return [
            CreateAction::make(),

            // Actions\Action::make('exportPdf')
            //     ->label('Pdf ')
            //     ->icon('heroicon-s-document')
            //     ->url(route('export.pdf', ['customer' => $surveyPdf->customer, 'surveyPdf' => $surveyPdf])),

            // Actions\Action::make('alert')
            //
            //     ->icon('heroicon-o-document-arrow-down')
            //     ->color('secondary')
            //     // ->action(fn($data) => Excel::download(
            //     //     new AlertExport($surveyPdf, $data),
            //     //     $surveyPdf->name.'_alert_Sett_'.date('W').'.xlsx'
            //     //  ))
            //     ->action(function($data) use ($surveyPdf){
            //         $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
            //         return Excel::download(
            //             new AlertExport($surveyFilterData),
            //             $surveyPdf->name.'_alert_Sett_'.date('W').'.xlsx'
            //         );
            //     })
            //     ->form([
            //         Forms\Components\DatePicker::make('date_from')->displayFormat('d/m/Y'),
            //         Forms\Components\DatePicker::make('date_to')->displayFormat('d/m/Y'),
            //     ]),

            // Actions\Action::make('email')
            //
            //     ->icon('heroicon-o-document-arrow-down')
            //     ->color('secondary')
            //     // ->action(fn ($data) => Excel::download(
            //     //     new EmailsExport($surveyPdf, $data),
            //     //     $surveyPdf->name.'_contact_emails_Sett_'.date('W').'.xlsx'
            //     //  ))
            //     ->action(function($data) use ($surveyPdf){
            //         $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
            //         return Excel::download(
            //             new EmailsExport($surveyFilterData),
            //             $surveyPdf->name.'_contact_emails_Sett_'.date('W').'.xlsx'
            //         );
            //     })
            //     ->form([
            //         Forms\Components\DatePicker::make('date_from')->displayFormat('d/m/Y'),
            //         Forms\Components\DatePicker::make('date_to')->displayFormat('d/m/Y'),
            //     ]),

            // Actions\Action::make('optout')
            //
            //     ->icon('heroicon-o-document-arrow-down')
            //     ->color('secondary')
            //     // ->action(fn ($data) => Excel::download(
            //     //     new EmailsExport($surveyPdf, $data),
            //     //     $surveyPdf->name.'_contact_emails_Sett_'.date('W').'.xlsx'
            //     //  ))
            //     ->action(function($data) use ($surveyPdf){
            //         $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
            //         return Excel::download(
            //             new OptOutExport($surveyFilterData),
            //             $surveyPdf->name.'_OptOut_Sett_'.date('W').'.xlsx'
            //         );
            //     })
            //     ->form([
            //         Forms\Components\DatePicker::make('date_from')->displayFormat('d/m/Y'),
            //         Forms\Components\DatePicker::make('date_to')->displayFormat('d/m/Y'),
            //     ]),

            // Actions\Action::make('export_xls')
            //
            //     ->icon('heroicon-o-document-arrow-down')
            //     ->color('gray')
            //     ->action(function (array $data) use ($surveyPdf) {
            //         // $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
            //         $answersFilterData = AnswersFilterData::from(['date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
            //         if ($data['type'] == 'xls_alert') {
            //             return Excel::download(
            //                 new AlertExport($surveyPdf, $answersFilterData),
            //                 $surveyPdf->name . '_alert_Sett_' . date('W') . '.xlsx'
            //             );
            //         }
            //         if ($data['type'] == 'xls_email') {
            //             return Excel::download(
            //                 new EmailsExport($surveyPdf, $answersFilterData),
            //                 $surveyPdf->name . '_contact_emails_Sett_' . date('W') . '.xlsx'
            //             );
            //         }
            //         if ($data['type'] == 'xls_optout') {
            //             return Excel::download(
            //                 new OptOutExport($surveyPdf, $answersFilterData),
            //                 $surveyPdf->name . '_OptOut_Sett_' . date('W') . '.xlsx'
            //             );
            //         }
            //     })->form([
            //         Forms\Components\DatePicker::make('date_from')->displayFormat('d/m/Y'),
            //         Forms\Components\DatePicker::make('date_to')->displayFormat('d/m/Y'),
            //         Forms\Components\Radio::make('type')
            //             ->options([
            //                 'xls_alert' => 'xls_alert',
            //                 'xls_email' => 'xls_email',
            //                 'xls_optout' => 'xls_optout',
            //             ]),
            //     ]),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            // WidgetTest::class,
        ];
    }
}
