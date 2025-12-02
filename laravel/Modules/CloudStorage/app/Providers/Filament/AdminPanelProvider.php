<?php

declare(strict_types=1);

namespace Modules\CloudStorage\Providers\Filament;

use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Vite;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'CloudStorage';

    public function panel(Panel $panel): Panel
    {
        $panel = parent::panel($panel);
        // $panel->assets([
        //    Js::make('chart-js-plugins', Vite::asset('Resources/js/filament-chart-js-plugins.js', 'assets/chart'))->module(),
        // ]);
        // FilamentAsset::register([
        //    Js::make('chart-js-plugins', Vite::asset('Resources/js/filament-chart-js-plugins.js', 'assets/chart'))->module(),
        //    Css::make('chart-js-plugins', Vite::asset('Resources/css/app.css', 'assets/chart')),
        // ]);

        return $panel;
    }
}
