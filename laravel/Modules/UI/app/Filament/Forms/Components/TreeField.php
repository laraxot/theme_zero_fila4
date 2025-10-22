<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Forms\Components;

use Filament\Forms\Components\Field;

class TreeField extends Field
{
    /**
     * Summary of view.
     *
     * @phpstan-var view-string
     *
     * @phpstan-ignore property.defaultValue
     */
    protected string $view = 'ui::filament.forms.components.tree';
}
