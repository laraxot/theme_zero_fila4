<?php

declare(strict_types=1);

namespace Modules\Quaeris\Providers\Filament;

use Filament\Panel;
use Modules\Xot\Datas\XotData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Modules\Quaeris\Filament\Pages\DashboardV2;
use Modules\User\Filament\Pages\Tenancy\RegisterTenant;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;
use Modules\User\Filament\Pages\Tenancy\EditTenantProfile;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Quaeris';

    protected bool $topNavigation = true;

    public function panel(Panel $panel): Panel
    {
        $panel = parent::panel($panel);

        $panel->pages(
            [
                // Dashboard::class,
                DashboardV2::class,
            ]
        );

        $tenant_class = XotData::make()->getTenantClass();

        // $panel
        //     ->tenant($tenant_class, slugAttribute: 'slug')
        //     ->tenantRegistration(RegisterTenant::class)
        //     ->tenantProfile(EditTenantProfile::class);

        // Controlla se l'utente è superadmin
        $user = Auth::user();

        if (Gate::allows('superadmin', $user)) {
            // Configurazione completa per superadmin
            $panel
                ->tenant($tenant_class, slugAttribute: 'slug')
                ->tenantRegistration(RegisterTenant::class)
                ->tenantProfile(EditTenantProfile::class);
        } else {
            // Configurazione limitata per non-superadmin
            $panel->tenant($tenant_class, slugAttribute: 'slug');
        }

        return $panel;

        // -- registriamo globalmente i js dal modulo chart
        // ->assets([
        // Js::make('chart-js-plugins', Vite::asset('Resources/assets/js/filament-chart-js-plugins.js')),
        //    Js::make('chart-js-plugins', Vite::asset('Resources/assets/js/filament-chart-js-plugins.js', 'assets/quaeris'))->module(),
        // Js::make('chart-js-plugins', __DIR__.'/../../Resousrces/dist/assets/filament-chart-js-plugins.js'),
        // ]);
        /*
        FilamentAsset::register([
            Css::make('quaeris-styles', __DIR__.'/../../Resources/dist/assets/app.css'),
            Js::make('quaeris-scripts', __DIR__.'/../../Resources/dist/assets/app2.js'),
        ], 'quaeris');
        */
        /*
        FilamentAsset::register([
            Js::make('chart-js-plugins', Vite::asset('Resources/assets/js/filament-chart-js-plugins.js'))->module(),
        ]);
        */
    }
}
