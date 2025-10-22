<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Override;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class GroupWidget extends XotBaseWidget
{
    public array $widgets = [];

    protected static null|string $pollingInterval = null;

    #[Override]
    public function getFormSchema(): array
    {
        return [];
    }
}
