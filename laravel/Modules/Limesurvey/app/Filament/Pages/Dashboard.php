<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';

    protected string $view = 'limesurvey::filament.pages.dashboard';

    /*
    public function mount(): void {
        $user = auth()->user();
        if(!$user->hasRole('super-admin')){
            redirect('/admin');
        }
    }
    */
}
