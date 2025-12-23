<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Arr;
use Modules\Quaeris\Actions\SurveyPdf\ExportTypeAction;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Datas\DashboardFilterData;
use Modules\Quaeris\Enums\SurveyExportTypesEnum;
use Modules\Quaeris\Models\SurveyPdf;
use Safe\DateTime;
use Spatie\Url\Url;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Webmozart\Assert\Assert;

/**
 * Undocumented class
 *
 * @property Schema $form
 */
class ExportPage extends Page implements HasForms
{
    use InteractsWithForms;

    public DashboardFilterData $filters_data;
    public array $filters = [];
    public ?array $data = [];

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document';
    protected string $view = 'quaeris::filament.pages.exports';
    // protected static ?int $navigationSort = 16;
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $title = 'Export Page';
    protected static string $routePath = 'v2/export';

    public function mount(): void
    {
        Assert::isArray($data = request()->all());
        Assert::isArray($filters = Arr::get($data, 'filters', []));

        $this->filters_data = DashboardFilterData::fromArray($filters);
        $this->filters = $filters;

        $this->form->fill($this->filters);
    }

    public function form(Schema $form): Schema
    {
        $schema = Arr::except($this->filters_data->getFiltersFormArray(), ['button']);

        $schema = [
            Section::make()
                ->schema($schema)
                ->columns(4),
        ];

        $schema[] = Radio::make('type')
            ->label('Seleziona cosa vuoi esportare')
            ->options(SurveyExportTypesEnum::class)

            ->required()
            ->columns(3)
            ->validationMessages([
                'required' => 'Devi selezionare un opzione',
            ]);

        return $form
            ->components($schema)

            // ->columns(2)
            ->statePath('data')
        ;
    }

    public function save(): null|BinaryFileResponse
    {
        if (! \is_array($this->data)) {
            return null;
        }

        $type = Arr::get($this->data, 'type', null);

        if (! \is_string($type)) {
            Notification::make()
                ->title('Errore di validazione')
                ->body('Non hai selezionato nessun tipo di esportazione')
                ->danger()
                ->send();

            return null;
        }

        $startDate = new DateTime($this->data['startDate']);
        $endDate = new DateTime($this->data['endDate']);
        $diffDays = $startDate->diff($endDate)->days;

        if ($diffDays > 45) {
            Notification::make()
                ->title('Errore di validazione')
                ->body('La differenza tra le date non deve superare i 45 giorni.')
                ->danger()
                ->send();

            return null;
        }

        if ($diffDays === 0) {
            Notification::make()
                ->title('Errore di validazione')
                ->body('La differenza tra le date non esiste.')
                ->danger()
                ->send();

            return null;
        }

        $answersFilterData = AnswersFilterData::from([
            'date_from' => $this->data['startDate'],
            'date_to' => $this->data['endDate'].' 23:59:59',
            'question_filter' => $this->filters_data->question_filter,
        ]);

        Assert::isInstanceOf($surveyPdf = SurveyPdf::find($this->filters_data->survey_pdf_id), SurveyPdf::class);

        return app(ExportTypeAction::class)->execute($surveyPdf, $type, $answersFilterData);

        // Notification::make()
        // ->success()
        // ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
        // ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Esporta')
                ->icon('heroicon-o-document-arrow-down')
                ->submit('save'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Dashboard')
                ->icon('heroicon-o-arrow-left')
                ->url(function () {
                    // $url = Url::fromString($this->url);
                    $url = Url::fromString('/quaeris/admin/v2');
                    $url = $url->withQueryParameters(['filters' => $this->filters]);
                    return urldecode((string) $url);
                }),
            // ExportsAction::make(),
        ];
    }
}
