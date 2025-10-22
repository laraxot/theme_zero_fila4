<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Closure;
use Filament\Widgets\Widget as BaseWidget;
use Illuminate\Contracts\Support\Htmlable;

class StatWithIconWidget extends BaseWidget
{
    protected string $view = 'ui::filament.widgets.stat-with-icon';

    protected string|Htmlable $label;

    /**
     * @var scalar|Htmlable|Closure
     */
    protected $value;

    protected function getData(): array
    {
        dddx($this->label);

        return [];
    }
}
