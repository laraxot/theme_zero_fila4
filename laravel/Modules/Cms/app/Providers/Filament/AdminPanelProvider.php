<?php

declare(strict_types=1);

namespace Modules\Cms\Providers\Filament;

use Override;
// use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;
use Filament\Panel;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Cms';

    #[Override]
    public function panel(Panel $panel): Panel
    {
        $panel->plugins([
            // SpatieTranslatablePlugin::make(), // Temporaneamente commentato per compatibilità Filament 4.x
        ]);

        return parent::panel($panel);
    }
}
