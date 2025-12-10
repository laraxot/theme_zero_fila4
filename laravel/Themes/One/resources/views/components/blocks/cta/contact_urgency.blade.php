@props([
    'title' => __('pub_theme::emergency.urgency_support.title.label'),
    'subtitle' => __('pub_theme::emergency.urgency_support.subtitle.label'),
    'background_color' => 'bg-gradient-to-r from-teal-600 to-cyan-600',
    'text_color' => 'text-white',
    'primary_button' => [
        'text' => __('pub_theme::emergency.urgency_support.emergency_phone.label'),
        'link' => 'tel:+39800123456',
        'style' => 'bg-red-600 text-white hover:bg-red-700 ring-2 ring-red-300'
    ],
    'secondary_button' => [
        'text' => __('pub_theme::emergency.urgency_support.book_online.label'),
        'link' => '/prenota-visita',
        'style' => 'border-2 border-white text-white hover:bg-white hover:text-teal-600'
    ]
])

<div class="relative {{ $background_color }} py-16 sm:py-24 overflow-hidden"
     x-data="{
        isVisible: false,
        urgencyLevel: 5,
        pulsing: true,
        currentTime: ''
     }"
     x-init="
        setInterval(() => {
            currentTime = new Date().toLocaleTimeString('it-IT', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
        }, 1000);
        currentTime = new Date().toLocaleTimeString('it-IT', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
        setInterval(() => {
            urgencyLevel = Math.floor(Math.random() * 3) + 3; // 3-5 range
        }, 5000);
     "
     x-intersect="isVisible = true">

    {{-- Animated Emergency Background --}}
    <div class="absolute inset-0">
        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-transparent to-orange-600/20"></div>

        {{-- Emergency Pulse Waves --}}
        <div class="absolute inset-0">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 border-4 border-red-400/30 rounded-full animate-ping"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 border-4 border-yellow-400/30 rounded-full animate-ping animation-delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 border-4 border-orange-400/30 rounded-full animate-ping animation-delay-2000"></div>
        </div>

        {{-- Floating Emergency Icons --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 text-8xl animate-bounce">🚨</div>
            <div class="absolute top-40 right-20 text-6xl animate-pulse">⚡</div>
            <div class="absolute bottom-20 left-1/4 text-7xl animate-bounce delay-500">📞</div>
            <div class="absolute bottom-40 right-1/4 text-5xl animate-pulse delay-1000">🏥</div>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Alert Status Bar --}}
        <div class="flex items-center justify-center mb-8"
             x-show="isVisible"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 transform -translate-y-8"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="inline-flex items-center px-6 py-3 bg-red-500/20 backdrop-blur-sm border border-red-300/50 rounded-full {{ $text_color }}">
                <div class="flex items-center mr-4" :class="pulsing ? 'animate-pulse' : ''">
                    <div class="w-3 h-3 bg-red-400 rounded-full mr-2"></div>
                    <span class="text-sm font-bold">STATO: SERVIZIO ATTIVO</span>
                </div>
                <div class="border-l border-white/30 pl-4">
                    <span class="text-xs" x-text="'Ore ' + currentTime"></span>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            {{-- Left Column: Urgent Content --}}
            <div class="text-center lg:text-left">

                {{-- Urgency Indicator --}}
                <div class="flex items-center justify-center lg:justify-start mb-6"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-200"
                     x-transition:enter-start="opacity-0 transform -translate-x-8"
                     x-transition:enter-end="opacity-100 transform translate-x-0">

                    <div class="flex items-center px-4 py-2 bg-red-500/30 backdrop-blur-sm border border-red-300/50 rounded-full {{ $text_color }}">
                        <svg class="w-5 h-5 text-red-300 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-bold">PRIORITÀ MASSIMA</span>
                        <div class="ml-3 flex space-x-1">
                            <template x-for="i in urgencyLevel" :key="i">
                                <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse"></div>
                            </template>
                        </div>
                    </div>
                </div>

                {{-- Main Title with Dramatic Effect --}}
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black {{ $text_color }} leading-tight mb-6"
                    x-show="isVisible"
                    x-transition:enter="transition ease-out duration-1000 delay-400"
                    x-transition:enter-start="opacity-0 transform translate-y-16"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    <div class="relative">
                        {{ $title }}
                        {{-- Text shadow effect --}}
                        <div class="absolute inset-0 blur-sm opacity-50">{{ $title }}</div>
                    </div>
                </h2>

                {{-- Subtitle with Urgency Tone --}}
                <p class="text-xl sm:text-2xl text-white/90 mb-8 leading-relaxed font-medium"
                   x-show="isVisible"
                   x-transition:enter="transition ease-out duration-1000 delay-600"
                   x-transition:enter-start="opacity-0 transform translate-y-16"
                   x-transition:enter-end="opacity-100 transform translate-y-0">
                    {{ $subtitle }}
                </p>

                {{-- Emergency Statistics --}}
                <div class="grid grid-cols-3 gap-4 mb-8"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-700"
                     x-transition:enter-start="opacity-0 transform translate-y-16"
                     x-transition:enter-end="opacity-100 transform translate-y-0">

                    <div class="text-center">
                        <div class="text-3xl font-black text-yellow-300 mb-1 animate-pulse">30sec</div>
                        <div class="text-xs text-white/80">Tempo risposta</div>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-black text-green-300 mb-1">24/7</div>
                        <div class="text-xs text-white/80">Sempre disponibili</div>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-black text-red-300 mb-1 animate-bounce">95%</div>
                        <div class="text-xs text-white/80">Emergenze risolte</div>
                    </div>
                </div>

                {{-- Action Buttons with Emergency Priority --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-800"
                     x-transition:enter-start="opacity-0 transform translate-y-16"
                     x-transition:enter-end="opacity-100 transform translate-y-0">

                    {{-- Emergency Call Button --}}
                    <a href="{{ $primary_button['link'] }}"
                       class="group relative inline-flex items-center px-8 py-4 {{ $primary_button['style'] }} font-black rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-110 transition-all duration-300 animate-pulse hover:animate-none">

                        {{-- Emergency icon --}}
                        <div class="w-6 h-6 mr-3 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>

                        <span class="relative z-10 text-lg">{{ $primary_button['text'] }}</span>

                        {{-- Lightning effect --}}
                        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-yellow-400/20 to-red-400/20 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </a>

                    {{-- Secondary Button --}}
                    <a href="{{ $secondary_button['link'] }}"
                       class="group inline-flex items-center px-8 py-4 {{ $secondary_button['style'] }} font-bold rounded-full transition-all duration-300 hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        {{ $secondary_button['text'] }}
                    </a>
                </div>

                {{-- Trust & Safety Indicators --}}
                <div class="mt-12 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-sm text-white/80"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-1000"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100">

                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                        Chiamata gratuita
                    </div>

                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Sicurezza garantita
                    </div>

                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Risposta immediata
                    </div>
                </div>
            </div>

            {{-- Right Column: Emergency Contact Widget --}}
            <div class="relative"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-500"
                 x-transition:enter-start="opacity-0 transform translate-x-16"
                 x-transition:enter-end="opacity-100 transform translate-x-0">

                {{-- Floating Emergency Dashboard --}}
                <div class="relative bg-white/95 backdrop-blur-lg rounded-3xl p-8 shadow-2xl border border-red-200">

                    {{-- Emergency Header --}}
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4 animate-pulse">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.996-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Centro Emergenze</h3>
                        <p class="text-gray-600">Supporto medico immediato</p>
                    </div>

                    {{-- Live Status --}}
                    <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-green-700 font-semibold">Operatori disponibili</span>
                            </div>
                            <span class="text-green-600 font-bold">5/5</span>
                        </div>
                    </div>

                    {{-- Emergency Actions --}}
                    <div class="space-y-3">
                        <a href="tel:+39800123456"
                           class="block w-full py-4 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl font-bold hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 text-center shadow-lg">
                            🚨 Emergenza Immediata
                        </a>

                        <a href="/urgenza-medium"
                           class="block w-full py-3 bg-orange-100 text-orange-700 rounded-xl font-semibold hover:bg-orange-200 transition-all duration-300 text-center">
                            ⚠️ Urgenza Media
                        </a>

                        <a href="/consulto-rapido"
                           class="block w-full py-3 bg-blue-100 text-blue-700 rounded-xl font-semibold hover:bg-blue-200 transition-all duration-300 text-center">
                            💬 Consulto Rapido
                        </a>
                    </div>

                    {{-- Emergency Info --}}
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-2 gap-4 text-center text-sm">
                            <div>
                                <div class="text-2xl font-bold text-red-600">< 1min</div>
                                <div class="text-gray-500">Risposta media</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-green-600">365</div>
                                <div class="text-gray-500">Giorni l'anno</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Floating Emergency Indicators --}}
                <div class="absolute -top-4 -right-4 w-12 h-12 bg-red-500 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                    <span class="text-white text-xl">🚨</span>
                </div>

                <div class="absolute -bottom-4 -left-4 w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                    <span class="text-white text-sm">⚡</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom CSS for Emergency Animations --}}
<style>
.animation-delay-1000 {
    animation-delay: 1s;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

@keyframes urgency-pulse {
    0%, 100% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05);
        opacity: 0.8;
    }
}

.hover\:shadow-3xl:hover {
    box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}
</style>
