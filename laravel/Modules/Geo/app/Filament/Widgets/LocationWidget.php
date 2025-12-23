<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Override;
use Modules\Geo\Filament\Forms\LocationForm;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Widget per la selezione della località.
 *
 * Questo widget fornisce un form per la selezione della località utilizzando
 * il form LocationForm.
 *
 * @see \Modules\Geo\docs\json-database.md
 */
class LocationWidget extends XotBaseWidget
{
    /**
     * Ordine di visualizzazione del widget.
     */
    protected static null|int $sort = 1;

    /**
     * Numero di colonne occupate dal widget.
     */
    protected int|string|array $columnSpan = 'full';

    /**
     * Dati del widget.
     */
    public null|array $data = [];

    /**
     * Titolo del widget.
     */
    public string $title = 'geo::widgets.location.title';

    /**
     * Vista del widget.
     */
    protected string $view = 'geo::filament.widgets.location';

    /**
     * Icona del widget.
     */
    public string $icon = 'heroicon-o-map-pin';

    /**
     * Form per la selezione della località.
     */
    private LocationForm $locationForm;

    /**
     * Costruttore.
     */
    public function __construct()
    {
        $this->locationForm = new LocationForm();
    }

    /**
     * Inizializza il widget.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Ottiene lo schema del form.
     *
     * @return array<int, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return $this->locationForm->getSchema();
    }

    /**
     * Gestisce l'invio del form.
     *
     * @return void
     */
    public function submit(): void
    {
        $data = $this->form->getState();

        $this->dispatch('location-selected', $data);

        // Utilizzo metodo Livewire per notifiche
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => __('geo::widgets.location.messages.success'),
        ]);
    }

    /**
     * Verifica se il widget può essere visualizzato.
     *
     * @return bool
     */
    public static function canView(): bool
    {
        return true;
    }
}
