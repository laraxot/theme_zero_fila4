<?php

declare(strict_types=1);

/**
 * @see https://github.com/awcodes/overlook/blob/2.x/src/Widgets/OverlookWidget.php
 */

namespace Modules\UI\Filament\Widgets;

use Filament\Widgets\Widget;

class RowWidget extends Widget
{
    public array $grid = [];

    public array $widgets = [];

    protected string $view = 'ui::filament.widgets.row';

    protected int|string|array $columnSpan = 'full';

    protected function getColumns(): int
    {
        return 3;
    }
}
