<?php

declare(strict_types=1);

namespace Themes\One\Providers;

use Filament\Support\Facades\FilamentIcon;
use Illuminate\Support\ServiceProvider;
use Modules\Xot\Providers\XotBaseThemeServiceProvider;

class ThemeServiceProvider extends XotBaseThemeServiceProvider
{
    public string $name = 'One';
    public string $nameLower = 'one';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;

    public function register(): void
    {
        FilamentIcon::register([
            'logo' => asset('themes/One/svg/logo.svg'),
        ]);
    }

    public function boot(): void
    {
        parent::boot();
        // Aggiungi qui solo logica specifica del tema
    }
} 