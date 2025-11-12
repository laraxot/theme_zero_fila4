<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Pages;

use Modules\Quaeris\Filament\Widgets\StatsOverviewWidget;
use Modules\Quaeris\Filament\Widgets\AlertWidget;
use Filament\Forms\Components\Select;
use Modules\Quaeris\Filament\Widgets;

class AlertPage extends BasePageExport
{
    protected static ?string $navigationLabel = 'Alert';
    protected static ?string $title = 'Alert';
    protected static string $routePath = 'alert';

    public function getFiltersExtra(): array
    {
        $extra = [];
        $extra['min_value'] = Select::make('min_value')
                ->options(
                    array_combine(
                        range(1, 10), // Crea i valori da 1 a 10
                        array_map(fn ($n) => "$n", range(1, 10)) // Crea etichette corrispondenti
                    )
                );

        $extra['max_value'] = Select::make('max_value')
                ->options(
                    array_combine(
                        range(1, 10), // Crea i valori da 1 a 10
                        array_map(fn ($n) => "$n", range(1, 10)) // Crea etichette corrispondenti
                    )
                );
        return $extra;
    }


    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
            AlertWidget::class,
        ];
    }
}
