<?php
declare(strict_types=1);
use function Livewire\Volt\{state, mount};
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

state([
    'user' => null,
    'name' => '',
    'email' => '',
    'current_password' => '',
    'new_password' => '',
    'new_password_confirmation' => '',
]);

mount(function () {
    $this->user = Auth::user();
    $this->name = $this->user->name;
    $this->email = $this->user->email;
});

$updateProfile = function () {
    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
    ]);

    $this->user->update($validated);

    $this->dispatch('profile-updated');
};

$updatePassword = function () {
    $validated = $this->validate([
        'current_password' => ['required', 'current_password'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $this->user->update([
        'password' => Hash::make($validated['new_password']),
    ]);

    $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    $this->dispatch('password-updated');
};

?>

<x-layouts.main>
    <x-slot name="title">
        {{ __('Profile') }}
    </x-slot>
    @volt('profile.show')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Profile Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Update your account\'s profile information and email address.') }}
                            </p>
                        </header>

                        <form wire:submit="updateProfile" class="mt-6 space-y-6">
                            <div>
                                <x-ui.input
                                    wire:model="name"
                                    :label="__('Name')"
                                    :placeholder="__('Enter your name')"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                            </div>

                            <div>
                                <x-ui.input
                                    wire:model="email"
                                    type="email"
                                    :label="__('Email')"
                                    :placeholder="__('Enter your email')"
                                    required
                                    autocomplete="username"
                                />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-ui.button type="submit">
                                    {{ __('Save') }}
                                </x-ui.button>

                                <x-filament::loading-indicator wire:loading wire:target="updateProfile" />
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Update Password') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                            </p>
                        </header>

                        <form wire:submit="updatePassword" class="mt-6 space-y-6">
                            <div>
                                <x-ui.input
                                    wire:model="current_password"
                                    type="password"
                                    :label="__('Current Password')"
                                    :placeholder="__('Enter your current password')"
                                    required
                                    autocomplete="current-password"
                                />
                            </div>

                            <div>
                                <x-ui.input
                                    wire:model="new_password"
                                    type="password"
                                    :label="__('New Password')"
                                    :placeholder="__('Enter your new password')"
                                    required
                                    autocomplete="new-password"
                                />
                            </div>

                            <div>
                                <x-ui.input
                                    wire:model="new_password_confirmation"
                                    type="password"
                                    :label="__('Confirm Password')"
                                    :placeholder="__('Confirm your new password')"
                                    required
                                    autocomplete="new-password"
                                />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-ui.button type="submit">
                                    {{ __('Update Password') }}
                                </x-ui.button>

                                <x-filament::loading-indicator wire:loading wire:target="updatePassword" />
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @endvolt
</x-layouts.main>
