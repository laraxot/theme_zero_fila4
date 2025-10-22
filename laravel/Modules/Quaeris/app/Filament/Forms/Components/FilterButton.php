<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Forms\Components;

use Filament\Schemas\Components\Component;

class FilterButton extends Component
{
    protected string $view = 'quaeris::filament.resources.forms.components.filter-button';

    public static function make(): self
    {
        return new self();
    }
}
