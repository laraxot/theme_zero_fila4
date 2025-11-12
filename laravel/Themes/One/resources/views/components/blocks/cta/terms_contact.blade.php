@props([
    'title' => 'Hai domande sui nostri termini?',
    'subtitle' => 'Il nostro team legale è qui per chiarire ogni dubbio',
    'background_color' => 'bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100',
    'text_color' => 'text-gray-900',
    'primary_button' => [
        'text' => 'Contatta il team legale',
        'url' => '/contatti?dept=legal'
    ],
    'secondary_button' => [
        'text' => 'FAQ sui termini',
        'url' => '/faq-termini'
    ],
    'contact_info' => [
        'email' => 'legal@saluteora.it',
        'hours' => 'Lun-Ven 9:00-18:00'
    ]
])

<div class="relative overflow-hidden {{ $background_color }} py-16 sm:py-24"
     x-data="{
        isVisible: false,
        showContactModal: false
     }"
     x-intersect="isVisible = true">

    {{-- Background Pattern con Effetto Glassmorphism --}}
    <div class="absolute inset-0 bg-white/40 backdrop-blur-sm"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/5 via-transparent to-indigo-600/5"></div>

    {{-- Decorative Elements con Animazioni --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <div class="w-96 h-96 bg-gradient-to-br from-blue-400/20 to-indigo-500/20 rounded-full blur-3xl animate-pulse"></div>
    </div>

    {{-- Legal Icons Pattern --}}
    <div class="absolute inset-0 opacity-5">
        <div class="flex justify-center items-center h-full space-x-16 text-6xl">
            <div class="animate-float-slow">⚖️</div>
            <div class="animate-float-medium">📋</div>
            <div class="animate-float-fast">🛡️</div>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            {{-- Title Section con Slide-in Animation --}}
            <div class="space-y-6"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 transform translate-y-16"
                 x-transition:enter-end="opacity-100 transform translate-y-0">

                {{-- Legal Badge --}}
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 border border-blue-200/50 backdrop-blur-sm">
                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    <span class="text-sm font-medium text-blue-700">Supporto Legale Specializzato</span>
                </div>

                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold {{ $text_color }} leading-tight">
                    <span class="inline-block hover:scale-105 transition-transform duration-300">{{ $title }}</span>
                </h2>

                <p class="text-xl sm:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    {{ $subtitle }}
                </p>
            </div>

            {{-- Contact Options Grid --}}
            <div class="mt-16 grid md:grid-cols-2 gap-8 max-w-4xl mx-auto"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-300"
                 x-transition:enter-start="opacity-0 transform translate-y-16"
                 x-transition:enter-end="opacity-100 transform translate-y-0">

                {{-- Direct Contact Card --}}
                <div class="group relative p-8 bg-white/70 backdrop-blur-lg rounded-3xl border border-white/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/5 to-indigo-600/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Contatto Diretto</h3>
                        <p class="text-gray-600 mb-6">Scrivi direttamente al nostro team legale specializzato</p>

                        <div class="space-y-3 text-sm text-gray-500">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                                {{ $contact_info['email'] }}
                            </div>
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $contact_info['hours'] }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- FAQ Card --}}
                <div class="group relative p-8 bg-white/70 backdrop-blur-lg rounded-3xl border border-white/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/5 to-teal-600/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Domande Frequenti</h3>
                        <p class="text-gray-600 mb-6">Trova risposte immediate alle domande più comuni</p>

                        <div class="space-y-2 text-sm text-gray-500">
                            <div class="flex items-center justify-center">✓ Termini di utilizzo</div>
                            <div class="flex items-center justify-center">✓ Privacy e GDPR</div>
                            <div class="flex items-center justify-center">✓ Consensi sanitari</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action Buttons con Hover Effects --}}
            <div class="mt-12 flex flex-col sm:flex-row gap-4 justify-center items-center"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-500"
                 x-transition:enter-start="opacity-0 transform translate-y-16"
                 x-transition:enter-end="opacity-100 transform translate-y-0">

                {{-- Primary Button --}}
                <a href="{{ $primary_button['url'] }}"
                   class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-full hover:from-blue-700 hover:to-indigo-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span class="relative z-10">{{ $primary_button['text'] }}</span>
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>

                    {{-- Shine Effect --}}
                    <div class="absolute inset-0 rounded-full bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </a>

                {{-- Secondary Button --}}
                <a href="{{ $secondary_button['url'] }}"
                   class="group inline-flex items-center px-8 py-4 bg-white/80 backdrop-blur-sm text-gray-700 font-semibold rounded-full border-2 border-gray-200 hover:border-gray-300 hover:bg-white transition-all duration-300 hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                    {{ $secondary_button['text'] }}
                </a>
            </div>

            {{-- Trust Indicators --}}
            <div class="mt-16 flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-8 text-sm text-gray-500"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-700"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100">

                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Conformità GDPR
                </div>

                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    SSL Sicuro
                </div>

                <div class="flex items-center">
                    <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Privacy Garantita
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom CSS per Animazioni Avanzate --}}
<style>
@keyframes float-slow {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes float-medium {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

@keyframes float-fast {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.animate-float-slow {
    animation: float-slow 6s ease-in-out infinite;
}

.animate-float-medium {
    animation: float-medium 4s ease-in-out infinite;
}

.animate-float-fast {
    animation: float-fast 3s ease-in-out infinite;
}
</style>
