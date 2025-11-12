<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Widgets;

use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Modules\Geo\Models\Location;

/**
 * Widget tabella location migrato per Filament v4.
 * Funzionalità mappa temporaneamente rimosse in attesa di pacchetti compatibili.
 */
class LocationMapTableWidget extends BaseWidget
{
    protected static ?string $heading = 'Location Map';

    protected static ?int $sort = 1;

    protected static ?string $pollingInterval = null;

    protected static bool $collapsible = true;

    /**
     * @return Builder<Location>
     */
    protected function getTableQuery(): Builder
    {
        return Location::query()->latest();
    }

    /**
     * @return array<Tables\Columns\Column>
     */
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->searchable()
                ->sortable(),
            TextColumn::make('street')
                ->searchable()
                ->sortable(),
            TextColumn::make('city')
                ->searchable()
                ->sortable(),
            TextColumn::make('state')
                ->searchable()
                ->sortable(),
            TextColumn::make('zip')
                ->sortable(),
            TextColumn::make('latitude')
                ->numeric(decimalPlaces: 6)
                ->sortable(),
            TextColumn::make('longitude')
                ->numeric(decimalPlaces: 6)
                ->sortable(),
        ];
    }

    /**
     * Configurazione della tabella.
     */
    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns($this->getTableColumns());
    }
}
