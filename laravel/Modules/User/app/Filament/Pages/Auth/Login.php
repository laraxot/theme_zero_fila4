<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

use Filament\Pages\Concerns\HasRoutes;

class Login extends \Filament\Auth\Pages\Login
{
    use HasRoutes;

    protected static string $routePath = 'newlogin';

    /* var view-string */
    // protected static string $view = 'filament-panels::pages.auth.register';
    // Any customizations will go here
}
