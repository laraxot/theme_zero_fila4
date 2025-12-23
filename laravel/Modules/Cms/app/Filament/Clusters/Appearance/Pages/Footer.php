<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Clusters\Appearance\Pages;

use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Arr;
use Modules\Cms\Actions\SaveFooterConfigAction;
use Modules\Cms\Datas\FooterData;
use Modules\Cms\Filament\Clusters\Appearance;
use Modules\Tenant\Services\TenantService;
use Modules\UI\Filament\Forms\Components\RadioImage;
use Modules\Xot\Actions\Filament\Block\GetViewBlocksOptionsByTypeAction;
use Webmozart\Assert\Assert;

/**
 * Page class for managing footer appearance settings.
 *
 * @property Schema $form
 */
class Footer extends Page implements HasForms
{
    use InteractsWithForms;

    /**
     * @var FooterData|null the form data
     */
    public null|FooterData $footerData = null;

    public null|array $data = [];

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'cms::filament.clusters.appearance.pages.headernav';

    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 2;

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
        $options = app(GetViewBlocksOptionsByTypeAction::class)->execute('footer', false);

        return $schema
            ->components([
                ColorPicker::make('background_color')->label(__('Background Color')),
                FileUpload::make('background')->label(__('Background Image')),
                ColorPicker::make('overlay_color')->label(__('Overlay Color')),
                Select::make('view')->options($options)->label(__('View Template')),
                /*
                 * RadioImage::make('_tpl')
                 * ->options($options)
                 * ->columnSpanFull()
                 * ->label(__('Template Selection')),
                 */
            ])
            ->columns(2)
            ->statePath('data');
    }

    /**
     * Update footer data and save it to the configuration.
     */
    public function updateData(): void
    {
        try {
            $data = FooterData::from($this->form->getState());

            app(SaveFooterConfigAction::class)->execute($data);

            Notification::make()
                ->title(__('Saved successfully'))
                ->success()
                ->send();
        } catch (Halt $exception) {
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

        $footerConfig = Arr::get($appearanceConfig, 'footer', []);
        Assert::isArray($footerConfig);

        $this->footerData = FooterData::from($footerConfig);
        /** @var array<string, mixed> */
        $form_fill = $this->footerData->toArray();
        $this->form->fill($form_fill);
    }

    /**
     * Get form actions for updating the footer settings.
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
