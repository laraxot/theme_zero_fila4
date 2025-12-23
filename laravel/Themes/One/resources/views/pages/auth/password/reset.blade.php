<?php

declare(strict_types=1);

use function Laravel\Folio\{middleware, name};

middleware(['guest']);
name('password.request');

?>

<x-layouts.main>
    <div id="wave-container" class="flex flex-col items-stretch justify-center w-full min-h-screen py-10 sm:items-center relative overflow-hidden">
        <!-- Reactive subtle background waves -->
        <svg id="wave-svg" class="absolute inset-0 w-full h-full opacity-10 pointer-events-none" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#A5B4FC" fill-opacity="0.1" d="M0,224L60,213.3C120,203,240,181,360,176C480,171,600,181,720,181.3C840,181,960,171,1080,160C1200,149,1320,139,1380,133.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
        </svg>

        <!-- Logo -->
        <div class="flex justify-center">
            <img class="w-[300px] lg:w-[350px]" src="/img/logo-v2.png"/>
        </div>

        <div class="mt-8 mx-auto w-full max-w-md relative">
            <!-- Glassmorphism password reset card -->
            <div class="relative bg-white m-6 z-10 backdrop-blur-md rounded-2xl p-8 shadow-lg ring-1 ring-white/20">
                <div class="mx-auto w-full max-w-md">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <a href="{{ route('home') }}" class="block">
                            <x-filament::icon name="heroicon-o-home" class="w-auto h-10 mx-auto text-primary-600" />
                        </a>

                        <h2 class="mt-5 text-2xl font-extrabold leading-9 text-[#272C4D]">
                            {{ __('pub_theme::auth.password.reset.title') }}
                        </h2>
                        
                        <p class="mt-2 text-sm text-gray-600">
                            {{ __('pub_theme::auth.password.reset.subtitle') }}
                        </p>
                    </div>

                    <!-- Password Reset Widget -->
                    <div class="space-y-6">
                        @livewire(\Modules\User\Filament\Widgets\Auth\PasswordResetWidget::class)
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mousemove handler for wave effect -->
    <script>
        document.getElementById('wave-container').addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const dx = ((e.clientX - rect.left) / rect.width - 0.5) * 30;
            const dy = ((e.clientY - rect.top) / rect.height - 0.5) * 20;
            const svg = document.getElementById('wave-svg');
            svg.style.transform = `translate(${dx}px, ${dy}px)`;
        });

        // Handle form submissions with loading states
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitButtons = form.querySelectorAll('button[type="submit"]');
                    submitButtons.forEach(button => {
                        button.disabled = true;
                        const originalText = button.textContent;
                        button.innerHTML = '<span class="inline-flex items-center"><svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>{{ __("pub_theme::auth.actions.sending") }}</span>';
                        
                        // Re-enable after 5 seconds as fallback
                        setTimeout(() => {
                            button.disabled = false;
                            button.textContent = originalText;
                        }, 5000);
                    });
                });
            });
        });
    </script>
</x-layouts.main>
