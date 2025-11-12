<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Fieldset;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
// use Modules\Quaeris\Actions;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Chart\Actions\Chart\GetFontFamilyOptions;
use Modules\Chart\Actions\Chart\GetFontStyleOptions;
use Modules\Chart\Actions\Chart\GetTypeOptions;
use Modules\Quaeris\Actions\QuestionChart\GetQuestionOptionsBySurveyId;
use Modules\Quaeris\Actions\QuestionChart\MakeImgByQuestionChartModel2Action;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Exports\AlertExport;
use Modules\Quaeris\Exports\EmailsExport;
use Modules\Quaeris\Filament\Resources\QuestionChartResource;
use Modules\Quaeris\Models\QuestionChart;
use Modules\Quaeris\Models\SurveyPdf;
use Webmozart\Assert\Assert;

use function Safe\date;

class QuestionChartsRelationManager extends RelationManager
{
    public static array $route_params = [];

    protected static string $relationship = 'questionCharts';

    protected static ?string $recordTitleAttribute = 'id';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('question')
                    ->label('Domande')
                    ->options(
                        // fn (QuestionChart $questionChart) => app(GetQuestionOptionsBySurveyId::class)
                        //     ->execute($questionChart->survey_id)
                        function () {
                            Assert::isInstanceOf($surveyPdf = $this->ownerRecord, SurveyPdf::class);

                            return app(GetQuestionOptionsBySurveyId::class)
                                ->execute((string) $surveyPdf->survey_id);
                        }
                    )
                    ->columnSpan('full')
                    ->searchable(),

                Fieldset::make('Domande')
                    ->schema([
                        TextInput::make('group_name'),
                        TextInput::make('title'),
                    ]),

                Fieldset::make('Risposte')
                    ->schema([
                        TextInput::make('answer_value'),
                        TextInput::make('answer_value_txt'),
                        TextInput::make('answer_value_no_txt'),
                        Select::make('data_type')
                            ->options([
                                'zeroTen' => 'Da zero a dieci',
                                'text' => 'Testuale',
                            ]),
                        TextInput::make('take')
                            ->integer(),
                    ]),

                //Forms\Components\TextInput::make('pos')
                //    ->integer(),
                Toggle::make('show_on_pdf'),
                Toggle::make('show_tot_invited'),
                TextInput::make('min')
                    ->integer(),
                TextInput::make('max')
                    ->integer(),
                TextInput::make('col_size')
                    ->integer(),
                Toggle::make('add_nulls')
                    ->inline(false),

                //Forms\Components\TextInput::make('chart.type'),
                Fieldset::make('Chart vars')
                    ->relationship('chart')
                    ->schema([
                        Select::make('type')->options(app(GetTypeOptions::class)->execute()),
                        Select::make('group_by')
                            ->options([null => '---', 'date:o-W' => 'Settimanale', 'date:Y-M' => 'Mensile', 'date:Y-M-d' => 'Giornaliero', 'field:Q41' => 'field:Q41']),
                        Select::make('sort_by')
                            ->options([null => '---', 'date:o-W' => 'Settimanale', 'date:Y-m' => 'Mensile', 'date:Y-m-d' => 'Giornaliero', '_value' => '_value', 'field:Q41' => 'field:Q41']),

                        TextInput::make('width'),
                        TextInput::make('height'),
                        Toggle::make('show_box'),
                        Select::make('font_family')->options(app(GetFontFamilyOptions::class)->execute()),
                        Select::make('font_style')->options(app(GetFontStyleOptions::class)->execute()),
                        TextInput::make('font_size'),
                        // Forms\Components\TextInput::make('transparency'),
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
                        TextInput::make('y_grace'),
                        Toggle::make('yaxis_hide'),
                        TextInput::make('x_label_angle'),
                        TextInput::make('x_label_margin'),
                        TextInput::make('plot_perc_width'),
                        Toggle::make('plot_value_show'),
                        Select::make('plot_value_format')->options([1 => 'percentuale',
                            2 => '2 cifre decimali',
                            3 => '0 cifre decimali',
                        ]),
                        Toggle::make('plot_value_pos'),
                        ColorPicker::make('plot_value_color'),

                        //->scopeTo('user'),

                    ]),

                Repeater::make('chart colorissimi')
                    ->relationship('chart')
                    //->statePath('chart')
                    ->schema([
                        ColorPicker::make('list_color'),
                    ]),

            ]);
    }

    public function table(Table $table): Table
    {
        //-- pettone, aspettiamo che sistemano il pacchetto
        //-- https://github.com/Sevendays-Digital/filament-nested-resources/issues/15

        // self::$route_params=array_merge(self::$route_params, getRouteParameters(), (array) session('route_params', []));
        // self::$route_params = array_merge(self::$route_params, (array) session('route_params', []), getRouteParameters());
        // session(['route_params' => self::$route_params]);

        // $customer = Customer::find(self::$route_params['customer']);
        // /**
        //  * @var SurveyPdf
        //  */
        // $surveyPdf = SurveyPdf::find(self::$route_params['surveyPdf']);
        // if ($surveyPdf == null) {
        //     throw new Exception('surveyPdf is null');
        // }

        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                //Tables\Columns\TextColumn::make('question')->sortable()->wrap(),
                //Tables\Columns\TextColumn::make('limeQuestion.question')->sortable()->html(),
                TextColumn::make('questionTxt')->sortable()->wrap(),

                //Tables\Columns\TextColumn::make('chart.list_color')->label('list_color')->wrap(),

                //Tables\Columns\TextColumn::make('chart.colors')->label('colors'),

                //Tables\Columns\TextColumn::make('pos')->sortable(),
                //Tables\Columns\TextColumn::make('img_src'),
                ImageColumn::make('img_src')->label('img')->disk('public_html')->height(120)->width(120),
                ToggleColumn::make('show_on_pdf'),
            ])
            ->filters([

            ])

            ->recordActions([
                EditAction::make(),
                // Tables\Actions\Action::make('regenImg')
                //     ->label('regenerate')
                //     ->icon('heroicon-o-arrow-path')
                //     ->url(fn ($record): string => QuestionChartResource::getUrl('regen-img', ['record' => $record, ...self::$route_params])),
                Action::make('regenImg2')
                    ->label('regenerate2')
                    ->icon('heroicon-o-arrow-path')
                    ->url(static fn ($record): string => QuestionChartResource::getUrl('regen-img-2', ['record' => $record, ...self::$route_params])),
            ])

            ->toolbarActions([
                DeleteBulkAction::make(),
                BulkAction::make('regen-imgs')

                    ->icon('heroicon-o-arrow-path')
                    //->action(fn (Collection $records) => $records->each->delete()),
                    ->requiresConfirmation()
                    ->action(function (Collection $collection): void {
                        foreach ($collection as $record) {
                            Assert::isInstanceOf($questionChart = $record, QuestionChart::class);
                            app(MakeImgByQuestionChartModel2Action::class)
                                ->onQueue()
                                ->execute($questionChart);
                        }
                    }),
            ])
            ->headerActions([
                CreateAction::make(),
                Action::make('exportPdf')
                    ->label('Pdf ')
                    ->icon('heroicon-s-document')
                    // ->url(route('export.pdf', ['customer' => $customer, 'surveyPdf' => $surveyPdf])),
                    ->url(route('export.pdf', ['surveyPdf' => $this->ownerRecord])),

                Action::make('alert')

                    ->icon('heroicon-o-document-arrow-down')
                    ->color('gray')
                    // ->action(fn($data) => Excel::download(
                    //     new AlertExport($surveyPdf, $data),
                    //     $surveyPdf->name.'_alert_Sett_'.date('W').'.xlsx'
                    // ))
                    ->action(function (array $data) {
                        // $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                        $answersFilterData = AnswersFilterData::from(['date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                        Assert::isInstanceOf($this->ownerRecord, SurveyPdf::class);

                        return Excel::download(
                            new AlertExport($this->ownerRecord, $answersFilterData),
                            $this->ownerRecord->name.'_alert_Sett_'.date('W').'.xlsx'
                        );
                    })
                    ->schema([
                        DatePicker::make('date_from')->displayFormat('d/m/Y'),
                        DatePicker::make('date_to')->displayFormat('d/m/Y'),
                    ]),

                Action::make('email')

                    ->icon('heroicon-o-document-arrow-down')
                    ->color('gray')
                    // ->action(fn ($data) => Excel::download(
                    //     new EmailsExport($surveyPdf, $data),
                    //     $surveyPdf->name.'_contact_emails_Sett_'.date('W').'.xlsx'
                    // ))
                    ->action(function (array $data) {
                        // $surveyFilterData = SurveyFilterData::from(['survey_id' => $surveyPdf->id, 'date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                        $answersFilterData = AnswersFilterData::from(['date_from' => $data['date_from'], 'date_to' => $data['date_to']]);
                        Assert::isInstanceOf($this->ownerRecord, SurveyPdf::class);

                        return Excel::download(
                            new EmailsExport($this->ownerRecord, $answersFilterData),
                            $this->ownerRecord->name.'_contact_emails_Sett_'.date('W').'.xlsx'
                        );
                    })
                    ->schema([
                        DatePicker::make('date_from')->displayFormat('d/m/Y'),
                        DatePicker::make('date_to')->displayFormat('d/m/Y'),
                    ]),

            ])

            ->defaultSort(
                'pos',
                'asc',
            );
    }
}
