<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources;

use Filament\Pages\Enums\SubNavigationPosition;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages\ManageQuestionCharts;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages\ManageNotifyThemes;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages\ManageCharts;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages\ManagePdfStyle;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages\ManageContacts;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages\ManageMailTemplates;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Modules\Quaeris\Models\SurveyPdf;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Modules\Quaeris\Actions\Question\GetSurveysOptsAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages\EditSurveyPdf;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages\ListSurveyPdfs;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages\CreateSurveyPdf;

use function Safe\ini_set;

class SurveyPdfResource extends XotBaseResource
{
    protected static ?string $model = SurveyPdf::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?\Filament\Pages\Enums\SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?int $navigationSort = 1;

    // public static function getParent(): string
    // {
    //     return CustomerResource::class;
    // }
    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required(),
            TextInput::make('title'),
            // *
            Select::make('survey_id')
                ->label('Questionario')
                ->helperText('Seleziona il questionario di riferimento')
                ->options(static function () {
                    return app(GetSurveysOptsAction::class)->execute();
                }),
            // */
            Toggle::make('allow_multiple_invite')->inline(false),

            Select::make('pdf_view')
                ->options([
                    'template1' => 'Domanda e risposta sulla stessa pagina',
                    'template2' => 'Una pagina domanda, una pagina risposta',
                    'template3' => 'Domanda e risposta sulla stessa pagina, con pagina iniziale custom (campo title)',
                ])->required(),
            DatePicker::make('date_from')
                ->displayFormat('d/m/Y'),
            DatePicker::make('date_to')
                ->displayFormat('d/m/Y'),
            SpatieMediaLibraryFileUpload::make('logo')
                ->openable()
                ->downloadable()
                ->columnSpanFull()
                ->disk('uploads')
                ->directory('photos'),
            TextInput::make('question_contact_email')
                ->helperText('Inserisci il codice della domanda dove viene indicata la mail per essere contattati, servirà per xls contact'),
            TextInput::make('question_filter')
                ->helperText('Inserisci il codice della domanda che verrà utilizzata come filtro'),
            TextInput::make('xls_field_1'),
            CheckboxList::make('xls_field_json')
                ->options(static function (?SurveyPdf $surveyPdf) {
                    if ($surveyPdf instanceof SurveyPdf) {
                        $data = $surveyPdf->optionsQuestions();

                        $tmp = [];
                        foreach ($data as $item) {
                            $tmp[$item['key']] = $item['label'];
                            if (! empty($item['sons'])) {
                                foreach ($item['sons'] as $son) {
                                    $tmp[$son['key']] = $son['label'];
                                }
                            }
                        }

                        return $tmp;
                    }

                    return [];
                }),
            Hidden::make('customer_id')->default(auth()->user()?->currentTeam?->getKey()),
        ];
    }



    public static function getRelations(): array
    {
        return [
            // RelationManagers\QuestionChartsRelationManager::class,
            // RelationManagers\ContactsRelationManager::class,
            // RelationManagers\NotifyThemesRelationManager::class,
            // RelationManagers\ChartStyleRelationManager::class,
            // RelationManagers\PdfStyleRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSurveyPdfs::route('/'),
            'create' => CreateSurveyPdf::route('/create'),
            'edit' => EditSurveyPdf::route('/{record}/edit'),
            'question-charts' => ManageQuestionCharts::route('/{record}/question-charts'),
            'notify-themes' => ManageNotifyThemes::route('/{record}/notify-themes'),
            'charts' => ManageCharts::route('/{record}/charts'),
            'pdf-style' => ManagePdfStyle::route('/{record}/pdf-style'),
            'contacts' => ManageContacts::route('/{record}/contacts'),
            'mail-templates' => ManageMailTemplates::route('/{record}/mail-templates'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            // ...
            ManageQuestionCharts::class,
            ManageContacts::class,
            ManageNotifyThemes::class,
            ManageCharts::class,
            ManagePdfStyle::class,
            ManageMailTemplates::class,
        ]);
    }

    // da tema a tenant
    // public static function getEloquentQuery(): Builder
    // {
    //     Assert::notNull(auth()->user(), '['.__FILE__.']['.__LINE__.']');
    //     $current_team_id = auth()->user()->currentTeam?->getKey();
    //     return parent::getEloquentQuery()->where('customer_id', $current_team_id);
    // }

    public function hasCombinedRelationManagerTabsWithForm(): bool
    {
        return true;
    }
}
