<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources;

use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Modules\Quaeris\Actions\QuestionChart\GetQuestionOptionsBySurveyId2;
use Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages\CreateQuestionChart;
use Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages\EditQuestionChart;
use Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages\ListQuestionCharts;
use Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages\Pdf;
use Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages\RegenImg2;
use Modules\Quaeris\Models\QuestionChart;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * @property QuestionChart $record
 */
class QuestionChartResource extends XotBaseResource
{
    public static array $route_params = [];

    protected static ?string $model = QuestionChart::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static bool $shouldRegisterNavigation = false;

    public static function getFormSchemaBySurveyId(string $survey_id): array
    {
        return [
            Select::make('question')
                ->options(
                    // fn () => app(GetQuestionOptionsBySurveyId::class)->execute($survey_id)
                    fn () => app(GetQuestionOptionsBySurveyId2::class)->execute($survey_id)
                )
                ->columnSpan('full')
                ->searchable(),

            Select::make('subquestion')
                ->options(
                    // fn () => app(GetQuestionOptionsBySurveyId::class)->execute($survey_id)
                    fn () => app(GetQuestionOptionsBySurveyId2::class)->execute($survey_id)
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

            // Forms\Components\TextInput::make('pos')
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

            // Forms\Components\TextInput::make('chart.type'),
            // Fieldset::make('Chart vars')
            //     ->relationship('chart')
            //     ->schema([
            //         Select::make('type')->options(app(GetTypeOptions::class)->execute()),
                    // Select::make('group_by')
                    //     ->options(['date:o-W' => 'Settimanale', 'date:Y-M' => 'Mensile', 'date:Y-M-d' => 'Giornaliero', 'field:Q41' => 'field:Q41']),
                    // Select::make('sort_by')
                    //     ->options(['date:o-W' => 'Settimanale', 'date:Y-m' => 'Mensile', 'date:Y-m-d' => 'Giornaliero', '_value' => '_value', 'field:Q41' => 'field:Q41']),

                    // TextInput::make('width'),
                    // TextInput::make('height'),
                    // Toggle::make('show_box'),
                    // Select::make('font_family')->options(app(GetFontFamilyOptions::class)->execute()),
                    // Select::make('font_style')->options(app(GetFontStyleOptions::class)->execute()),
                    // TextInput::make('font_size'),
                    // // Forms\Components\TextInput::make('transparency'),
                    // Select::make('transparency')->options([
                    //     '0.0' => '0%',
                    //     '0.1' => '10%',
                    //     '0.2' => '20%',
                    //     '0.3' => '30%',
                    //     '0.4' => '40%',
                    //     '0.5' => '50%',
                    //     '0.6' => '60%',
                    //     '0.7' => '70%',
                    //     '0.8' => '80%',
                    //     '0.9' => '90%',
                    //     '1.0' => '100%',
                    // ]),
                    // TextInput::make('y_grace')
                    //     ->helperText('Per grafici a barre orizzontali: "appiattire/accorciare/schiacciare” il grafico lungo la linea orizzontale'),
                    // Toggle::make('yaxis_hide'),
                    // TextInput::make('x_label_angle'),
                    // TextInput::make('x_label_margin'),
                    // TextInput::make('plot_perc_width'),
                    // Toggle::make('plot_value_show')
                    //     ->helperText('Visualizza i dati per barra'),
                    // Select::make('plot_value_format')->options([1 => 'percentuale',
                    //     2 => '2 cifre decimali',
                    //     3 => '0 cifre decimali',
                    // ]),
                    // Toggle::make('plot_value_pos')
                    //     ->helperText('Centra il valore nella barra'),
                    // ColorPicker::make('plot_value_color'),
                // ]),

            Repeater::make('chart colorissimi')
                ->relationship('chart')
                // ->statePath('chart')
                ->schema([
                    // Forms\Components\ColorPicker::make('colors'),
                    ColorPicker::make('list_color')->required(),
                ]),
            TextInput::make('field_name'),
            TextInput::make('question_type'),
        ];
    }

    public static function getFormSchema(): array
    {
        // $survey_id = (string) $form->getLivewire()->record->survey_id;
        // Assert::notNull($model = $form->model);
        // Assert::isInstanceOf($model, QuestionChart::class);
        // $survey_id = $model->survey_id;

        return [];
    }

    public static function getWidgets(): array
    {
        return [
            // WidgetTest::class,
        ];
    }

    // public static function getParent(): string
    // {
    //     return SurveyPdfResource::class;
    // }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\SurveyPdfRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListQuestionCharts::route('/'),
            'create' => CreateQuestionChart::route('/create'),
            'edit' => EditQuestionChart::route('/{record}/edit'),
            // 'regen-img' => Pages\RegenImg::route('/{record}/regen-img'),
            'pdf' => Pdf::route('/pdf'),
            'regen-img-2' => RegenImg2::route('/{record}/regen-img-2'),
            // 'test' => Pages\Test::route('/test'),
        ];
    }

    protected function getTableReorderColumn(): ?string
    {
        return 'pos';
    }
}
