<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Clusters\Appearance\Pages;

use Filament\Schemas\Schema;
use Exception;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Arr;
use Modules\Cms\Actions\SaveHeadernavConfigAction;
use Modules\Cms\Datas\HeadernavData;
use Modules\Cms\Filament\Clusters\Appearance;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Actions\Filament\Block\GetViewBlocksOptionsByTypeAction;
use Webmozart\Assert\Assert;

/**
 * Page class for managing header navigation appearance settings.
 *
 * @property Schema $form
 */
class Headernav extends Page implements HasForms
{
    use InteractsWithForms;

    /**
     * @var HeadernavData|null the form data
     */
    public null|HeadernavData $headernavData = null;

    public null|array $data = [];

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'cms::filament.clusters.appearance.pages.headernav';

    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 1;

    /**
     * Initialize the page and fill the form state.
     */
    public function mount(): void
    {
        $this->fillForms();
    }

    /**
     * Define the form schema.
     */
    public function form(Schema $schema): Schema
    {
        $options = app(GetViewBlocksOptionsByTypeAction::class)->execute('headernav', false);

        return $schema
            ->components([
                ColorPicker::make('background_color')->label(__('Background Color')),
                FileUpload::make('background')->label(__('Background Image')),
                ColorPicker::make('overlay_color')->label(__('Overlay Color')),
                TextInput::make('overlay_opacity')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->label(__('Overlay Opacity')),
                TextInput::make('class')->label(__('CSS Class')),
                TextInput::make('style')->label(__('Inline Style')),
                Select::make('view')->options($options)->label(__('View Template')),
            ])
            ->columns(2)
            ->statePath('data');
    }

    /**
     * Update header navigation data and save it to the configuration.
     */
    public function updateData(): void
    {
        try {
            $data = HeadernavData::from($this->form->getState());

            app(SaveHeadernavConfigAction::class)->execute($data);

            Notification::make()
                ->title(__('Saved successfully'))
                ->success()
                ->send();
        } catch (Exception $exception) {
            Notification::make()
                ->title(__('Error!'))
                ->danger()
                ->body($exception->getMessage())
                ->persistent()
                ->send();
        }
    }

    /**
     * Fill the form with initial data.
     */
    protected function fillForms(): void
    {
        $appearanceConfig = TenantService::config('appearance');
        Assert::isArray($appearanceConfig);

        $headernavConfig = Arr::get($appearanceConfig, 'headernav', []);
        Assert::isArray($headernavConfig);

        $this->headernavData = HeadernavData::from($headernavConfig);
        /** @var array<string, mixed> $form_fill */
        $form_fill = $this->headernavData->toArray();

        $this->form->fill($form_fill);
    }

    /**
     * Get form actions for updating the header navigation settings.
     *
     * @return array<Action>
     */
    protected function getUpdateFormActions(): array
    {
        return [
            Action::make('updateAction')->label(__('Save Changes'))->submit('updateData'),
        ];
    }
}
