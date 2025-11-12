<?php

declare(strict_types=1);

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

use function Laravel\Folio\{middleware, name};

middleware(['guest']);
name('login');

?>

<x-layouts.main>
    @volt('login')
    <div id="wave-container" class="flex flex-col items-stretch justify-center w-full min-h-screen py-10 sm:items-center relative overflow-hidden">
        <!-- Reactive subtle background waves -->
        <svg id="wave-svg" class="absolute inset-0 w-full h-full opacity-10 pointer-events-none" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#A5B4FC" fill-opacity="0.1" d="M0,224L60,213.3C120,203,240,181,360,176C480,171,600,181,720,181.3C840,181,960,171,1080,160C1200,149,1320,139,1380,133.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
        </svg>

        <div class="flex justify-center">
            <img class="w-[300px] lg:w-[350px]" src="/img/logo-v2.png"/>
        </div>

        <div class="mt-8 mx-auto w-full max-w-md relative">
            <!-- Glassmorphism login card -->
            <div class="relative bg-white m-6 z-10 backdrop-blur-md rounded-2xl p-8 shadow-lg ring-1 ring-white/20">
                <div class="mx-auto w-full max-w-md">
                    <a href="{{ route('home') }}" class="block text-center">
                        <x-filament::icon name="heroicon-o-home" class="w-auto h-10 mx-auto text-primary-600" />
                    </a>

                    <h2 class="mt-5 text-2xl font-extrabold leading-9 text-center text-[#272C4D]">
                        {{ __('pub_theme::auth.login.title') }}
                    </h2>
                    <div class="text-sm leading-5 text-center text-gray-600 dark:text-gray-400 space-x-0.5">
                        <span>{{ __('pub_theme::auth.login.or') }}</span>
                        <a href="{{ route('register') }}" class="text-[#FF5F7E] font-medium">
                            {{ __('pub_theme::auth.login.create_account') }}
                        </a>
                    </div>
                </div>
                <!-- Livewire Login Form -->
                <div class="space-y-6 flex flex-col justify-center">
                    @livewire(\Modules\User\Filament\Widgets\LoginWidget::class)
                    <a href="/{{ $lang }}/auth/password/reset" class="text-[#FF5F7E] text-center text-sm !mt-0">{{ __('pub_theme::auth.login.forgot_password') }}</a>
                </div>
            </div>
        </div>
    </div>
    @endvolt
    <!-- Mousemove handler for wave effect -->
    <script>
        document.getElementById('wave-container').addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const dx = ((e.clientX - rect.left) / rect.width - 0.5) * 30;
            const dy = ((e.clientY - rect.top) / rect.height - 0.5) * 20;
            const svg = document.getElementById('wave-svg');
            svg.style.transform = `translate(${dx}px, ${dy}px)`;
        });
    </script>
</x-layouts.main>
