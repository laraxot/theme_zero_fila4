<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Process as LaravelProcess;

class Dashboard extends Page
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'setting::filament.pages.dashboard';

    public function upgrade(): void
    {
        $command = 'php artisan filament:upgrade';

        LaravelProcess::run($command);
    }

    protected function getViewData(): array
    {
        return ['a' => 'b'];
    }

    // public function mount(): void {
    //     $user = auth()->user();
    //     if(!$user->hasRole('super-admin')){
    //         redirect('/admin');
    //     }
    // }
}
