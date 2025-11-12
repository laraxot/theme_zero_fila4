<?php

declare(strict_types=1);

use function Laravel\Folio\{middleware, name};

middleware(['guest']);
name('password.reset');

$token = $token ?? null;
$email = request()->query('email', '');

?>

<x-layouts.main>
    <div id="wave-container" class="flex flex-col items-stretch justify-center w-full min-h-screen py-10 sm:items-center relative overflow-hidden">
        <!-- Reactive subtle background waves -->
        <svg id="wave-svg" class="absolute inset-0 w-full h-full opacity-10 pointer-events-none" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#A5B4FC" fill-opacity="0.1" d="M0,224L60,213.3C120,203,240,181,360,176C480,171,600,181,720,181.3C840,181,960,171,1080,160C1200,149,1320,139,1380,133.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                <animate attributeName="d" dur="10s" repeatCount="indefinite" 
                    values="M0,224L60,213.3C120,203,240,181,360,176C480,171,600,181,720,181.3C840,181,960,171,1080,160C1200,149,1320,139,1380,133.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z;
                            M0,256L60,245.3C120,235,240,213,360,208C480,203,600,213,720,213.3C840,213,960,203,1080,192C1200,181,1320,171,1380,165.3L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z;
                            M0,224L60,213.3C120,203,240,181,360,176C480,171,600,181,720,181.3C840,181,960,171,1080,160C1200,149,1320,139,1380,133.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z" />
            </path>
            <path fill="#60A5FA" fill-opacity="0.05" d="M0,160L60,149.3C120,139,240,117,360,112C480,107,600,117,720,117.3C840,117,960,107,1080,96C1200,85,1320,75,1380,69.3L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                <animate attributeName="d" dur="15s" repeatCount="indefinite" 
                    values="M0,160L60,149.3C120,139,240,117,360,112C480,107,600,117,720,117.3C840,117,960,107,1080,96C1200,85,1320,75,1380,69.3L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z;
                            M0,192L60,181.3C120,171,240,149,360,144C480,139,600,149,720,149.3C840,149,960,139,1080,128C1200,117,1320,107,1380,101.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z;
                            M0,160L60,149.3C120,139,240,117,360,112C480,107,600,117,720,117.3C840,117,960,107,1080,96C1200,85,1320,75,1380,69.3L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z" />
            </path>
        </svg>

        <div class="relative z-10 w-full max-w-4xl mx-auto px-6">
            <!-- Header with logo and navigation -->
            <div class="text-center mb-8">
                <x-ui.link href="{{ route('home') }}" class="inline-block transform hover:scale-105 transition-transform duration-200">
                    <img src="/img/logo-v2.png" class="h-16"/>
                </x-ui.link>
                
                <!-- Process breadcrumb -->
                <nav class="mt-6 flex justify-center" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-sm text-gray-500">
                        <li class="flex items-center">
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs font-medium">1</span>
                            <span class="ml-2">{{ __('pub_theme::auth.password.reset.breadcrumb.request') }}</span>
                        </li>
                        <li class="flex items-center">
                            <x-filament::icon name="heroicon-o-chevron-right" class="w-4 h-4 mx-2 text-gray-400" />
                            <span class="bg-[#272C4D] text-white px-2 py-1 rounded-full text-xs font-medium">2</span>
                            <span class="ml-2 font-medium text-[#272C4D]">{{ __('pub_theme::auth.password.reset.breadcrumb.confirm') }}</span>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Main content grid -->
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                
                <!-- Information sidebar (hidden on mobile) -->
                <div class="hidden lg:block space-y-6">
                    <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <x-filament::icon name="heroicon-o-shield-check" class="w-5 h-5 text-blue-600" />
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-[#272C4D] mb-2">
                                    {{ __('pub_theme::auth.password.reset.info.security.title') }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ __('pub_theme::auth.password.reset.info.security.description') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <x-filament::icon name="heroicon-o-key" class="w-5 h-5 text-green-600" />
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-[#272C4D] mb-2">
                                    {{ __('pub_theme::auth.password.reset.info.password.title') }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ __('pub_theme::auth.password.reset.info.password.description') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                    <x-filament::icon name="heroicon-o-clock" class="w-5 h-5 text-purple-600" />
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-[#272C4D] mb-2">
                                    {{ __('pub_theme::auth.password.reset.info.expiry.title') }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ __('pub_theme::auth.password.reset.info.expiry.description') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reset form card -->
                <div class="w-full">
                    <div class="bg-white/70 backdrop-blur-md rounded-xl shadow-xl border border-white/20 overflow-hidden">
                        <!-- Card header -->
                        <div class="bg-gradient-to-r from-[#272C4D] to-[#1e40af] px-8 py-6">
                            <h2 class="text-2xl font-bold text-[#272C4D] mb-2">
                                {{ __('pub_theme::auth.password.reset.confirm.title') }}
                            </h2>
                            <p class="text-[#272C4D] text-sm">
                                {{ __('pub_theme::auth.password.reset.confirm.subtitle') }}
                            </p>
                        </div>

                        <!-- Card body with widget -->
                        <div class="p-8">
                            @livewire(\Modules\User\Filament\Widgets\Auth\PasswordResetConfirmWidget::class, [
                                'token' => $token
                                
                            ])
                        </div>

                        <!-- Card footer -->
                        <div class="bg-gray-50/50 px-8 py-4 border-t border-gray-200/50">
                            <div class="flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0">
                                <div class="flex items-center text-sm text-gray-600">
                                    <x-filament::icon name="heroicon-o-question-mark-circle" class="w-4 h-4 mr-2" />
                                    {{ __('pub_theme::auth.password.reset.help.having_trouble') }}
                                </div>
                                <x-ui.link href="{{ route('login') }}" class="inline-flex items-center text-sm font-medium text-[#272C4D] hover:text-blue-600 transition-colors duration-200">
                                    <x-filament::icon name="heroicon-o-arrow-left" class="w-4 h-4 mr-2" />
                                    {{ __('pub_theme::auth.password.reset.back_to_login') }}
                                </x-ui.link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for wave animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add subtle mouse move effect to waves
            document.addEventListener('mousemove', function(e) {
                const waves = document.querySelector('#wave-svg');
                if (waves) {
                    const mouseX = e.clientX / window.innerWidth;
                    const mouseY = e.clientY / window.innerHeight;
                    
                    waves.style.transform = `translate(${mouseX * 10}px, ${mouseY * 5}px)`;
                }
            });
        });
    </script>
</x-layouts.main>
