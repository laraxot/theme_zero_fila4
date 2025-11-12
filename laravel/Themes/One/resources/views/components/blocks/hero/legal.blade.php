{{--
/**
 * Legal Hero Component - SaluteOra
 *
 * Hero section specializzato per pagine legali (Privacy, Terms, Cookie Policy).
 * Design orientato alla FIDUCIA e TRASPARENZA con elementi visual che comunicano
 * sicurezza, compliance e protezione dati.
 *
 * Features:
 * - Animazioni progressive per build trust
 * - Badges compliance GDPR/ISO prominenti
 * - Visual indicators di sicurezza e certificazioni
 * - Color scheme orientato alla fiducia (blues, greens)
 * - Micro-interactions per engagement
 *
 * @param string $title Titolo principale della pagina legal
 * @param string $subtitle Sottotitolo esplicativo
 * @param string $background_color Background gradient CSS classes
 * @param string $text_color Colore del testo principale
 * @param string $icon Icona specifica per la pagina (shield-check, document-check, cookie)
 * @param string $icon_color Colore dell'icona
 */
--}}

@props([
    'title' => 'Privacy Policy',
    'subtitle' => 'La tua privacy è la nostra priorità assoluta. Scopri come proteggiamo i tuoi dati secondo gli standard più rigorosi.',
    'background_color' => 'bg-gradient-to-br from-blue-50 to-indigo-100',
    'text_color' => 'text-gray-900',
    'icon' => 'shield-check',
    'icon_color' => 'text-blue-600'
])

<div class="relative min-h-screen flex items-center justify-center overflow-hidden {{ $background_color }}"
     x-data="{
        isVisible: false,
        currentTime: '',
        trustScore: 0,
        complianceItems: [
            { name: 'GDPR', status: 'verified', delay: 100 },
            { name: 'ISO 27001', status: 'verified', delay: 200 },
            { name: 'SSL/TLS', status: 'active', delay: 300 },
            { name: 'PCI DSS', status: 'certified', delay: 400 }
        ]
     }"
     x-init="
        // Current time display
        setInterval(() => {
            currentTime = new Date().toLocaleTimeString('it-IT', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
        }, 1000);

        // Trust score animation
        setTimeout(() => {
            let score = 0;
            const interval = setInterval(() => {
                if (score < 99.7) {
                    score += 0.1;
                    trustScore = score.toFixed(1);
                } else {
                    clearInterval(interval);
                }
            }, 20);
        }, 1000);
     "
     x-intersect="isVisible = true">

    {{-- Animated Background Pattern --}}
    <div class="absolute inset-0">
        {{-- Gradient overlay --}}
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-indigo-600/5 to-purple-600/10"></div>

        {{-- Legal/Security Pattern Background --}}
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-1/4 left-1/4 transform rotate-12">
                <svg class="w-32 h-32 text-blue-600 animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.6 14.8,10V11.5C15.4,11.5 16,12.4 16,13V16C16,17.4 15.4,18 14.8,18H9.2C8.6,18 8,17.4 8,16V13C8,12.4 8.6,11.5 9.2,11.5V10C9.2,8.6 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,10V11.5H13.5V10C13.5,8.7 12.8,8.2 12,8.2Z"/>
                </svg>
            </div>
            <div class="absolute bottom-1/4 right-1/4 transform -rotate-12">
                <svg class="w-24 h-24 text-green-600 animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"/>
                </svg>
            </div>
            <div class="absolute top-1/2 left-1/3 transform rotate-45">
                <svg class="w-20 h-20 text-purple-600 animate-spin-slow" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Main Content Container --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- Left Column: Content --}}
            <div class="text-center lg:text-left">

                {{-- Trust Badge with Live Security Status --}}
                <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/90 backdrop-blur-lg border border-green-200 shadow-lg mb-8"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000"
                     x-transition:enter-start="opacity-0 transform -translate-y-8"
                     x-transition:enter-end="opacity-100 transform translate-y-0">
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-4 h-4 bg-green-500 rounded-full animate-pulse"></div>
                            <div class="absolute inset-0 w-4 h-4 bg-green-500 rounded-full animate-ping opacity-30"></div>
                        </div>
                        <div class="text-left">
                            <div class="text-sm font-bold text-green-700">Sistema Sicuro Attivo</div>
                            <div class="text-xs text-green-600">Trust Score: <span x-text="trustScore + '%'"></span></div>
                        </div>
                        <div class="text-xs text-gray-500 ml-4" x-text="currentTime"></div>
                    </div>
                </div>

                {{-- Main Icon with Pulsing Effect --}}
                <div class="flex justify-center lg:justify-start mb-8"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-200"
                     x-transition:enter-start="opacity-0 transform scale-50"
                     x-transition:enter-end="opacity-100 transform scale-100">
                    <div class="relative">
                        <div class="w-24 h-24 {{ $icon_color }} p-6 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/50 transform hover:scale-110 transition-all duration-500">
                            @if($icon === 'shield-check')
                                <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"/>
                                </svg>
                            @elseif($icon === 'document-check')
                                <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                    <path d="M10.5,16.5L16.5,10.5L15.08,9.08L10.5,13.67L8.92,12.08L7.5,13.5L10.5,16.5Z"/>
                                </svg>
                            @elseif($icon === 'cookie')
                                <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12,3A9,9 0 0,0 3,12A9,9 0 0,0 12,21A9,9 0 0,0 21,12C21,11.5 20.95,11 20.87,10.5C20.85,10.36 20.71,10.26 20.56,10.26C20.18,10.26 19.88,9.95 19.88,9.58C19.88,9.21 20.18,8.91 20.56,8.91C20.71,8.91 20.85,8.81 20.87,8.67C20.95,8.12 21,7.56 21,7A9,9 0 0,0 12,3M9,8A1,1 0 0,1 10,9A1,1 0 0,1 9,10A1,1 0 0,1 8,9A1,1 0 0,1 9,8M16,10A1,1 0 0,1 17,11A1,1 0 0,1 16,12A1,1 0 0,1 15,11A1,1 0 0,1 16,10M11,12A1,1 0 0,1 12,13A1,1 0 0,1 11,14A1,1 0 0,1 10,13A1,1 0 0,1 11,12M14,15A1,1 0 0,1 15,16A1,1 0 0,1 14,17A1,1 0 0,1 13,16A1,1 0 0,1 14,15M8,16A1,1 0 0,1 9,17A1,1 0 0,1 8,18A1,1 0 0,1 7,17A1,1 0 0,1 8,16Z"/>
                                </svg>
                            @else
                                <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1Z"/>
                                </svg>
                            @endif
                        </div>

                        {{-- Pulsing Ring Effect --}}
                        <div class="absolute inset-0 w-24 h-24 rounded-3xl bg-gradient-to-r {{ $icon_color === 'text-blue-600' ? 'from-blue-400/20 to-indigo-400/20' : 'from-green-400/20 to-blue-400/20' }} animate-ping"></div>
                    </div>
                </div>

                {{-- Title with Staggered Animation --}}
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold {{ $text_color }} leading-tight mb-6">
                    <div x-show="isVisible"
                         x-transition:enter="transition ease-out duration-1000 delay-400"
                         x-transition:enter-start="opacity-0 transform translate-y-16"
                         x-transition:enter-end="opacity-100 transform translate-y-0">
                        <span class="block bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                            {{ $title }}
                        </span>
                    </div>
                </h1>

                {{-- Subtitle with Trust Language --}}
                <p class="text-xl sm:text-2xl text-gray-600 mb-12 leading-relaxed max-w-2xl"
                   x-show="isVisible"
                   x-transition:enter="transition ease-out duration-1000 delay-600"
                   x-transition:enter-start="opacity-0 transform translate-y-16"
                   x-transition:enter-end="opacity-100 transform translate-y-0">
                    {{ $subtitle }}
                </p>

                {{-- Legal Compliance Badges --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-800"
                     x-transition:enter-start="opacity-0 transform translate-y-16"
                     x-transition:enter-end="opacity-100 transform translate-y-0">
                    <template x-for="(item, index) in complianceItems" :key="index">
                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 text-center border border-white/30 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1"
                             x-show="isVisible"
                             :x-transition:enter-delay="item.delay + 'ms'">
                            <div class="w-8 h-8 mx-auto mb-2 text-green-600">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                                </svg>
                            </div>
                            <div class="text-sm font-semibold text-gray-800" x-text="item.name"></div>
                            <div class="text-xs text-green-600 font-medium" x-text="item.status"></div>
                        </div>
                    </template>
                </div>

                {{-- CTA Buttons with Legal Actions --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-1000"
                     x-transition:enter-start="opacity-0 transform translate-y-16"
                     x-transition:enter-end="opacity-100 transform translate-y-0">

                    {{-- Primary CTA: Read Document --}}
                    <a href="#legal-content"
                       class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                        <span class="relative z-10">Leggi il documento</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>

                        {{-- Shine effect --}}
                        <div class="absolute inset-0 rounded-full bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    </a>

                    {{-- Secondary CTA: Download PDF --}}
                    <a href="/downloads/legal-docs.pdf"
                       class="group inline-flex items-center px-8 py-4 bg-white/80 backdrop-blur-sm text-gray-700 font-semibold rounded-full border-2 border-gray-200 hover:border-gray-300 hover:bg-white transition-all duration-300 hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Scarica PDF
                    </a>
                </div>
            </div>

            {{-- Right Column: Interactive Security Dashboard --}}
            <div class="relative"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-600"
                 x-transition:enter-start="opacity-0 transform translate-x-16"
                 x-transition:enter-end="opacity-100 transform translate-x-0">

                {{-- Security Status Dashboard --}}
                <div class="relative">
                    {{-- Main Dashboard Card --}}
                    <div class="bg-white/80 backdrop-blur-lg rounded-3xl p-8 shadow-2xl border border-white/20">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Stato Sicurezza</h3>
                            <p class="text-gray-600">Monitoraggio in tempo reale</p>
                        </div>

                        {{-- Trust Score Circle --}}
                        <div class="relative w-32 h-32 mx-auto mb-8">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                {{-- Background circle --}}
                                <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="none" class="text-gray-200"/>
                                {{-- Progress circle --}}
                                <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="none"
                                        class="text-green-500"
                                        :stroke-dasharray="251.2"
                                        :stroke-dashoffset="251.2 - (trustScore / 100 * 251.2)"
                                        style="transition: stroke-dashoffset 0.5s ease-in-out"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900" x-text="trustScore + '%'"></div>
                                    <div class="text-xs text-gray-500">Trust Score</div>
                                </div>
                            </div>
                        </div>

                        {{-- Security Features Grid --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-green-50 rounded-lg p-4 text-center border border-green-200">
                                <div class="w-8 h-8 text-green-600 mx-auto mb-2">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18,8A6,6 0 0,0 12,2A6,6 0 0,0 6,8H4A2,2 0 0,0 2,10V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V10A2,2 0 0,0 20,8H18M12,4A4,4 0 0,1 16,8H8A4,4 0 0,1 12,4Z"/>
                                    </svg>
                                </div>
                                <div class="text-sm font-semibold text-green-800">SSL Sicuro</div>
                                <div class="text-xs text-green-600">256-bit</div>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-4 text-center border border-blue-200">
                                <div class="w-8 h-8 text-blue-600 mx-auto mb-2">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.6 14.8,10V11.5C15.4,11.5 16,12.4 16,13V16C16,17.4 15.4,18 14.8,18H9.2C8.6,18 8,17.4 8,16V13C8,12.4 8.6,11.5 9.2,11.5V10C9.2,8.6 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,10V11.5H13.5V10C13.5,8.7 12.8,8.2 12,8.2Z"/>
                                    </svg>
                                </div>
                                <div class="text-sm font-semibold text-blue-800">GDPR Ready</div>
                                <div class="text-xs text-blue-600">Compliant</div>
                            </div>

                            <div class="bg-purple-50 rounded-lg p-4 text-center border border-purple-200">
                                <div class="w-8 h-8 text-purple-600 mx-auto mb-2">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                                    </svg>
                                </div>
                                <div class="text-sm font-semibold text-purple-800">ISO 27001</div>
                                <div class="text-xs text-purple-600">Certified</div>
                            </div>

                            <div class="bg-orange-50 rounded-lg p-4 text-center border border-orange-200">
                                <div class="w-8 h-8 text-orange-600 mx-auto mb-2">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17,9H7V7A5,5 0 0,1 12,2A5,5 0 0,1 17,7V9M14,17V15H10V17H14M12,13A2,2 0 0,1 14,15A2,2 0 0,1 12,17A2,2 0 0,1 10,15A2,2 0 0,1 12,13M6,20V10H18V20H6Z"/>
                                    </svg>
                                </div>
                                <div class="text-sm font-semibold text-orange-800">Backup</div>
                                <div class="text-xs text-orange-600">Daily</div>
                            </div>
                        </div>

                        {{-- Real-time Status Indicator --}}
                        <div class="mt-6 text-center">
                            <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                Sistema monitorato 24/7
                            </div>
                        </div>
                    </div>

                    {{-- Floating Security Badges --}}
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg animate-bounce cursor-pointer z-10">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"/>
                        </svg>
                    </div>

                    <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full flex items-center justify-center shadow-lg animate-pulse cursor-pointer z-10">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18,8A6,6 0 0,0 12,2A6,6 0 0,0 6,8H4A2,2 0 0,0 2,10V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V10A2,2 0 0,0 20,8H18M12,4A4,4 0 0,1 16,8H8A4,4 0 0,1 12,4Z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Trust Indicators Strip --}}
        <div class="mt-16 text-center"
             x-show="isVisible"
             x-transition:enter="transition ease-out duration-1000 delay-1200"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="inline-flex items-center space-x-8 bg-white/60 backdrop-blur-sm rounded-full px-8 py-4 border border-white/30">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Dati Criptati</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Privacy Protetta</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Audit Completo</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom CSS per animazioni avanzate --}}
<style>
@keyframes spin-slow {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.animate-spin-slow {
    animation: spin-slow 8s linear infinite;
}

/* Trust score circle animation */
.trust-circle {
    stroke-dasharray: 251.2;
    stroke-dashoffset: 251.2;
    transition: stroke-dashoffset 2s ease-in-out;
}

/* Hover effects for compliance badges */
.compliance-badge:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Security dashboard floating animation */
@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

.security-dashboard {
    animation: float 6s ease-in-out infinite;
}
</style>

{{-- JavaScript per interazioni avanzate --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer per animazioni scroll-triggered
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Osserva tutti gli elementi da animare
    document.querySelectorAll('[x-transition]').forEach(el => {
        observer.observe(el);
    });

    // Trust score incrementale animation
    function animateTrustScore() {
        const scoreElements = document.querySelectorAll('[x-text*="trustScore"]');
        scoreElements.forEach(el => {
            let score = 0;
            const targetScore = 99.7;
            const interval = setInterval(() => {
                if (score < targetScore) {
                    score += 0.3;
                    el.textContent = score.toFixed(1) + '%';
                } else {
                    clearInterval(interval);
                }
            }, 30);
        });
    }

    // Avvia animazione trust score dopo 1 secondo
    setTimeout(animateTrustScore, 1000);
});
</script>
