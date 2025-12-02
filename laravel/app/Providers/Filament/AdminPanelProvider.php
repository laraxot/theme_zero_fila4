<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Illuminate\View\View;
use Modules\Xot\Providers\Filament\XotBaseMainPanelProvider;

class AdminPanelProvider extends XotBaseMainPanelProvider
{

    public function panel(Panel $panel): Panel
    {
        /*
        $panel->plugins([
        ]);
        FilamentView::registerRenderHook(
            'panels::body.end',
            static fn (): View => view('quaeris::matomo'),
        );
        */
        $panel->login();
        return parent::panel($panel);
    }

}
