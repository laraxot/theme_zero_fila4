<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{mount};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

middleware(['auth']);
name('logout');

mount(function() {
    if (Auth::check()) {
        // Dispatch dell'evento prima del logout
        Event::dispatch('auth.logout.attempting', [Auth::user()]);

        // Esegui il logout
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        // Dispatch dell'evento dopo il logout
        Event::dispatch('auth.logout.successful');
    }

    // Reindirizza l'utente alla home page localizzata
    return redirect()->to(LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('home')));
});
?>

<div class="bg-white dark:bg-gray-800 shadow rounded-xl">
    <div class="p-6">
        @volt('auth.logout')
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-md w-full space-y-8 p-8">
                <div class="text-center">
                    <x-filament::loading-indicator class="h-12 w-12 mx-auto" />
                    <h2 class="mt-6 text-2xl font-bold text-gray-900 dark:text-white">
                        {{ __('auth.logout.title') }}
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('auth.logout.message') }}
                    </p>
                </div>
            </div>
        </div>
        @endvolt
    </div>
</div>
