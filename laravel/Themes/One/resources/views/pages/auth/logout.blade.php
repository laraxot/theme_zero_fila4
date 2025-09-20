<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{mount};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

middleware(['auth']);
name('logout');
/*
layout('layouts.main', [
    'title' => __('auth.logout.title')
]);
*/
mount(function () {
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
    return redirect()->to(route('home'));
});
?>

<x-layouts.main>
@volt('logout')
<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 p-8 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <div class="text-center">
            <div class="flex justify-center">
                <svg class="animate-spin h-12 w-12 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
            <h2 class="mt-6 text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('auth.logout.title') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('auth.logout.success_message') }}
            </p>
        </div>
    </div>
</div>
@endvolt
</x-layouts.main>
