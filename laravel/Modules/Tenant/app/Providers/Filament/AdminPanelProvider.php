<?php

declare(strict_types=1);

namespace Modules\Tenant\Providers\Filament;

use Override;
use Filament\Panel;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Tenant';

    #[Override]
    public function panel(Panel $panel): Panel
    {
        return parent::panel($panel);
    }
}
