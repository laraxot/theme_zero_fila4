<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Pages;

use Modules\Geo\Filament\Widgets\LatLngWidget;
use Modules\Geo\Filament\Widgets;
use Modules\Xot\Filament\Pages\XotBasePage;

class LatLng extends XotBasePage
{
    protected function getHeaderWidgets(): array
    {
        return [
            LatLngWidget::class,
        ];
    }

    public function getHeaderWidgetsColumns(): int|array
    {
        return 1;
    }
}
