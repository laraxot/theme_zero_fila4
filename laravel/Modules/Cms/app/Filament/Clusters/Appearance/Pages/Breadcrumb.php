<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Clusters\Appearance\Pages;

use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Arr;
use Modules\Cms\Filament\Clusters\Appearance;
use Modules\Tenant\Services\TenantService;
use Spatie\Data\Data;
use Webmozart\Assert\Assert;

/**
 * Class Breadcrumb.
 *
 * @property Schema $form
 */
class Breadcrumb extends Page implements HasForms
{
    use InteractsWithForms;

    /**
     * Data for the form state.
     *
     * @var array<string, mixed>|null
     */
    public null|array $data = [];

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'cms::filament.clusters.appearance.pages.headernav';

    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 2;

    /**
     * Mount the page and initialize the form state.
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
        return $schema
            ->components([
                TextInput::make('class')->label(__('Class'))->placeholder(__('Enter breadcrumb class')),
                TextInput::make('style')->label(__('Style'))->placeholder(__('Enter breadcrumb style')),
            ])
            ->columns(2)
            ->statePath('data');
    }

    /**
     * Update the breadcrumb data.
     */
    public function updateData(): void
    {
        try {
            $data = $this->form->getState();

            // Save the data using TenantService
            $up = [
                'breadcrumb' => $data,
            ];
            TenantService::saveConfig('appearance', $up);

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

        /** @var array<string, mixed> */
        $breadcrumbData = Arr::get($appearanceConfig, 'breadcrumb', []);
        Assert::isArray($breadcrumbData);

        $this->form->fill($breadcrumbData);
    }

    /**
     * Get the actions for updating the form.
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
