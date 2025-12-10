<?php

declare(strict_types=1);

namespace Modules\UI\Providers\Filament;

use Override;
use Filament\Panel;
use Filament\SpatieLaravelTranslatablePlugin;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

//use LaraZeus\Bolt\BoltPlugin;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'UI';

    #[Override]
    public function panel(Panel $panel): Panel
    {
        $panel = parent::panel($panel);
        // FilamentAsset::register(
        //     [
        //         Css::make('filament-navigation-styles', __DIR__.'/../../resources/dist/plugin.css'),
        //         Js::make('filament-navigation-scripts', __DIR__.'/../../resources/dist/plugin.js'),
        //     ],
        //     'filament-navigation'
        // );
        /*
         * $spatieLaravelTranslatablePlugin = SpatieLaravelTranslatablePlugin::make()
         * ->defaultLocales(['it', 'en']);
         *
         * $boltPlugin = BoltPlugin::make();
         *
         * $plugins = [
         * $spatieLaravelTranslatablePlugin,
         * $boltPlugin
         * ];
         *
         * $panel->plugins($plugins);
         */
        return $panel;
    }
}
