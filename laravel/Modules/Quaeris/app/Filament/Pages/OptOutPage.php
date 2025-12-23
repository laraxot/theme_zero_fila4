<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Pages;

use Modules\Quaeris\Filament\Widgets\StatsOverviewWidget;
use Modules\Quaeris\Filament\Widgets\OptOutWidget;
use Modules\Quaeris\Filament\Widgets;

class OptOutPage extends BasePageExport
{
    protected static ?string $navigationLabel = 'OptOut';
    protected static ?string $title = 'OptOut';
    protected static string $routePath = 'opt-out';

    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
            OptOutWidget::class,
        ];
    }
}
