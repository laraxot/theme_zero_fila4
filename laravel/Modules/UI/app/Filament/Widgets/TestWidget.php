<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Filament\Widgets\Widget as BaseWidget;

class TestWidget extends BaseWidget
{
    public array $widgets = [];

    protected string $view = 'ui::filament.widgets.test-widget';
}
