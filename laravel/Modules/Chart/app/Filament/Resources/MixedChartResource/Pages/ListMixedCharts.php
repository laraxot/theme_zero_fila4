<?php

declare(strict_types=1);

namespace Modules\Chart\Filament\Resources\MixedChartResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Chart\Filament\Resources\MixedChartResource;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Pagina di elenco per le risorse MixedChart.
 *
 */
class ListMixedCharts extends XotBaseListRecords
{
    /**
     * Layout della tabella.
     *
     * @var TableLayoutEnum
     */
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    /**
     * Risorsa associata a questa pagina.
     *
     * @var string
     */
    protected static string $resource = MixedChartResource::class;

    /**
     * Definisce le colonne della tabella.
     *
     * @return array<int, TextColumn>
     */
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->sortable()
                ->searchable(),
            TextColumn::make('name')
                ->sortable()
                ->searchable(),
            TextColumn::make('description')
                ->limit(50)
                ->searchable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
        ];
    }
}
