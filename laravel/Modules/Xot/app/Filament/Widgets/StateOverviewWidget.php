<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Override;
use Error;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Modules\SaluteOra\Models\Appointment;
use Modules\Xot\Contracts\StateContract;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

/**
 * Widget per la panoramica degli appuntamenti per stato.
 * Mostra statistiche compatte degli appuntamenti raggruppati per stato.
 */
class StateOverviewWidget extends XotBaseWidget
{
    /**
     * Vista del widget.
     */
    protected string $view = 'xot::filament.widgets.state-overview';

    /**
     * Titolo del widget.
     */
    public string $title = '';

    /**
     * Occupa tutta la larghezza disponibile.
     */
    protected int|string|array $columnSpan = 'full';

    /**
     * Intervallo di polling disabilitato per performance.
     */
    protected static null|string $pollingInterval = null;

    public string $stateClass;
    public string $model;

    public string $cacheKey = '';

    /**
     * Schema del form (vuoto per questo widget).
     *
     * @return array<int|string, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [];
    }

    /**
     * Dati da passare alla vista.
     *
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'states' => $this->getStates(),
            //'title' => $this->getWidgetTitle(),
        ];
    }

    protected function getCacheKey(): string
    {
        try {
            $cacheKey = 'states-' . class_basename($this->model) . '-' . class_basename($this->stateClass);
            $cacheKey = Str::slug($cacheKey);
            $this->cacheKey = $cacheKey;
            return $cacheKey;
        } catch (Error $e) {
            if ($this->cacheKey === '') {
                $this->cacheKey = Str::uuid()->toString();
            }
            return $this->cacheKey;
        }
    }

    /**
     * Ottiene gli stati degli appuntamenti con statistiche.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getStates(): array
    {
        $res = Cache::remember($this->getCacheKey(), now()->addMinutes(5), $this->calculateStates(...));

        Assert::isArray($res);
        return $res;
    }

    /**
     * Calcola le statistiche degli stati degli appuntamenti.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function calculateStates(): array
    {
        $states = [];

        $modelInstance = app($this->model);

        $stateMapping = $this->stateClass::getStateMapping()->toArray();

        foreach ($stateMapping as $name => $stateClass) {
            $state = new $stateClass($modelInstance);
            Assert::isInstanceOf($state, StateContract::class);
            $states[] = [
                'name' => $name,
                'label' => $state->label(),
                'icon' => $this->cleanIconName($state->icon()),
                'color' => $state->bgColor(),
                'count' => $this->getCountForState($name),
            ];
        }

        return $states;
    }

    /**
     * Ottiene il conteggio degli appuntamenti per uno stato specifico.
     * IMPORTANTE: Mostra TUTTI gli appuntamenti, non filtrati per utente.
     * Questo è un widget di panoramica generale per dashboard amministrativa.
     */
    protected function getCountForState(string $stateName): int
    {
        return $this->model::where('state', $stateName)->count();
    }

    /**
     * Pulisce il nome dell'icona rimuovendo prefissi non necessari.
     */
    protected function cleanIconName(string $iconName): string
    {
        // Rimuove prefissi comuni come 'heroicon-o-' se presenti
        return str_replace(['heroicon-o-', 'heroicon-s-'], '', $iconName);
    }
}
