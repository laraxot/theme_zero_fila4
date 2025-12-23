<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Pages;

use Modules\Quaeris\Filament\Widgets\ContactWidget;
use Filament\Forms\Components\Select;
use Modules\Quaeris\Filament\Widgets;

class ContactPage extends BasePageExport
{
    protected static ?string $navigationLabel = 'Contatti';
    protected static ?string $title = 'Contatti';
    protected static string $routePath = 'contact';

    public function getFiltersExtra(): array
    {
        $extra = [];
        return $extra;
    }


    public function getWidgets(): array
    {
        return [
            //Widgets\StatsOverviewWidget::class,
            ContactWidget::class,
        ];
    }
}
