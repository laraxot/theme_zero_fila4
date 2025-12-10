<?php
declare(strict_types=1);
use function Livewire\Volt\{state, mount};
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

state([
    'user' => null,
    'notifications_enabled' => false,
    'theme' => 'light',
    'language' => '',
    'available_languages' => [],
    'success' => false,
    'error' => false,
]);

mount(function () {
    $this->user = Auth::user();
    $this->notifications_enabled = $this->user->notifications_enabled ?? false;
    $this->theme = $this->user->theme ?? 'light';
    $this->language = LaravelLocalization::getCurrentLocale();
    $this->available_languages = LaravelLocalization::getSupportedLocales();
});

$updateSettings = function () {
    $validated = $this->validate([
        'notifications_enabled' => ['boolean'],
        'theme' => ['required', 'string', 'in:light,dark,system'],
        'language' => ['required', 'string', 'in:' . implode(',', array_keys($this->available_languages))],
    ]);

    try {
        $this->user->update([
            'notifications_enabled' => $validated['notifications_enabled'],
            'theme' => $validated['theme'],
        ]);

        // Se la lingua è cambiata, reindirizza alla stessa pagina ma con la nuova lingua
        if ($this->language !== LaravelLocalization::getCurrentLocale()) {
            return redirect()->to(LaravelLocalization::getLocalizedURL($this->language, url()->current()));
        }

        $this->success = true;
        $this->error = false;
    } catch (\Exception $e) {
        $this->success = false;
        $this->error = true;
    }
};

?>

<x-layouts.main>
    <x-slot name="title">
        {{ __('Settings') }}
    </x-slot>
    @volt('settings')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('User Settings') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Update your account preferences and settings.') }}
                            </p>
                        </header>

                        <form wire:submit="updateSettings" class="mt-6 space-y-6">
                            @if($success)
                                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-green-700">
                                                {{ __('Settings updated successfully.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($error)
                                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-red-700">
                                                {{ __('An error occurred while updating settings.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Theme -->
                            <div>
                                <x-input-label for="theme" :value="__('Theme')" />
                                <select id="theme" wire:model="theme" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary-500 dark:focus:border-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 rounded-md shadow-sm">
                                    <option value="light">{{ __('Light') }}</option>
                                    <option value="dark">{{ __('Dark') }}</option>
                                    <option value="system">{{ __('System') }}</option>
                                </select>
                                <x-input-error :messages="$errors->get('theme')" class="mt-2" />
                            </div>

                            <!-- Language -->
                            <div>
                                <x-input-label for="language" :value="__('Language')" />
                                <select id="language" wire:model="language" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary-500 dark:focus:border-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 rounded-md shadow-sm">
                                    @foreach($available_languages as $locale => $properties)
                                        <option value="{{ $locale }}">{{ $properties['native'] }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('language')" class="mt-2" />
                            </div>

                            <!-- Notifications -->
                            <div class="block mt-4">
                                <label for="notifications_enabled" class="inline-flex items-center">
                                    <input id="notifications_enabled" type="checkbox" wire:model="notifications_enabled" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary-600 shadow-sm focus:ring-primary-500 dark:focus:ring-primary-600 dark:focus:ring-offset-gray-800">
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Enable Notifications') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @endvolt
</x-layouts.main>
