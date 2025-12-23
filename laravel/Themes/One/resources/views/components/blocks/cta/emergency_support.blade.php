{{--
/**
 * CTA Emergenze Odontoiatriche - SaluteOra
 *
 * Componente per gestire le urgenze dentali in gravidanza.
 * Design che bilancia urgenza e rassicurazione, con informazioni
 * chiare su tempi di risposta e supporto multilingue.
 *
 * @param string $title - Titolo principale dell'emergenza
 * @param string $subtitle - Sottotitolo rassicurante
 * @param string $description - Descrizione dettagliata
 * @param array $primary_cta - CTA principale per emergenze
 * @param array $secondary_cta - CTA secondaria per visite normali
 * @param array $emergency_info - Informazioni sul servizio di emergenza
 * @param string $background_color - Colore di sfondo
 * @param string $text_color - Colore del testo
 */
--}}

@props([
    'title' => __('pub_theme::emergency.dental_emergency.title.label'),
    'subtitle' => __('pub_theme::emergency.dental_emergency.subtitle.label'),
    'description' => __('pub_theme::emergency.dental_emergency.description.label'),
    'primary_cta' => [],
    'secondary_cta' => [],
    'emergency_info' => [],
    'background_color' => 'bg-gradient-to-r from-red-600 to-red-800',
    'text_color' => 'text-white'
])

<section class="{{ $background_color }} {{ $text_color }} relative overflow-hidden" id="emergenze-dentali">

    {{-- Pattern di sfondo --}}
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="emergency-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <circle cx="10" cy="10" r="1" fill="white" opacity="0.3"/>
                    <path d="M10 3 L13 9 L20 9 L15 14 L17 20 L10 16 L3 20 L5 14 L0 9 L7 9 Z" fill="white" opacity="0.2"/>
                </pattern>
            </defs>
            <rect width="100" height="100" fill="url(#emergency-pattern)"/>
        </svg>
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        {{-- Header emergenza --}}
        <div class="text-center mb-12">

            {{-- Icona di emergenza animata --}}
            <div class="flex justify-center mb-6">
                <div class="relative">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm animate-pulse">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>

                    {{-- Cerchi di allarme --}}
                    <div class="absolute inset-0 rounded-full border-2 border-white/50 animate-ping"></div>
                    <div class="absolute inset-0 rounded-full border border-white/30 animate-ping" style="animation-delay: 0.5s;"></div>
                </div>
            </div>

            {{-- Titolo urgenza --}}
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {{ $title }}
            </h2>

            {{-- Sottotitolo rassicurante --}}
            <p class="text-xl md:text-2xl font-medium text-red-100 mb-6">
                {{ $subtitle }}
            </p>

            {{-- Descrizione --}}
            <p class="text-lg text-red-100 max-w-3xl mx-auto leading-relaxed">
                {{ $description }}
            </p>
        </div>

        {{-- Sezione principale con CTA --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">

            {{-- Colonna sinistra: CTA emergenza --}}
            <div class="text-center lg:text-left">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">

                    <h3 class="text-2xl font-bold mb-4">@lang('pub_theme::emergency.dental_emergency.call_now.label')</h3>

                    {{-- Numero di emergenza grande --}}
                    <div class="mb-6">
                        <a href="{{ $primary_cta['link'] ?? 'tel:800123456' }}"
                           class="block text-4xl md:text-5xl font-bold text-white hover:text-red-100 transition-colors">
                            @lang('pub_theme::emergency.dental_emergency.emergency_number.label')
                        </a>
                        <p class="text-red-100 text-sm mt-2">@lang('pub_theme::emergency.dental_emergency.free_call.label')</p>
                    </div>

                    {{-- CTA primaria --}}
                    <a href="{{ $primary_cta['link'] ?? 'tel:800123456' }}"
                       class="inline-flex items-center justify-center w-full px-8 py-4 bg-white text-red-600 font-bold rounded-lg hover:bg-red-50 transition-colors duration-200 group mb-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>{{ $primary_cta['text'] ?? __('pub_theme::emergency.dental_emergency.call_now_action.label') }}</span>
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>

                    {{-- CTA secondaria --}}
                    <a href="{{ $secondary_cta['link'] === 'register' ? route('register') : $secondary_cta['link'] ?? '#' }}"
                       class="inline-flex items-center justify-center w-full px-6 py-3 border-2 border-white/50 text-white font-medium rounded-lg hover:border-white hover:bg-white/10 transition-all duration-200">
                        <span>{{ $secondary_cta['text'] ?? 'Prenota Visita Normale' }}</span>
                    </a>
                </div>
            </div>

            {{-- Colonna destra: Informazioni emergenza --}}
            <div class="space-y-6">

                {{-- Tempi di risposta --}}
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="flex items-center gap-3 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h4 class="text-lg font-semibold">Tempi di Risposta</h4>
                    </div>
                    <ul class="space-y-2 text-red-100">
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                            <span>{{ $emergency_info['response_time'] ?? 'Entro 30 minuti' }} per consulenza telefonica</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>
                            <span>{{ $emergency_info['hours'] ?? '24/7' }} Servizio attivo</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <span>{{ $emergency_info['coverage'] ?? 'Nazionale' }} Copertura territorio</span>
                        </li>
                    </ul>
                </div>

                {{-- Supporto multilingue --}}
                @if(isset($emergency_info['languages']) && !empty($emergency_info['languages']))
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="flex items-center gap-3 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                        </svg>
                        <h4 class="text-lg font-semibold">Supporto Multilingue</h4>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($emergency_info['languages'] as $language)
                        <span class="text-sm bg-white/20 rounded-full px-3 py-1 text-center">{{ $language }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Cosa aspettarsi --}}
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="flex items-center gap-3 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <h4 class="text-lg font-semibold">Cosa Aspettarsi</h4>
                    </div>
                    <ul class="space-y-2 text-red-100 text-sm">
                        <li>• Valutazione immediata del dolore</li>
                        <li>• Consigli per gestione temporanea</li>
                        <li>• Direzione al centro più vicino</li>
                        <li>• Protocolli sicuri per la gravidanza</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Sezione rassicurante --}}
        <div class="text-center bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
            <h3 class="text-xl font-bold mb-4">@lang('pub_theme::emergency.dental_emergency.good_hands.label')</h3>
            <p class="text-red-100 mb-6 max-w-3xl mx-auto">
                @lang('pub_theme::emergency.dental_emergency.team_description.label')
            </p>

            {{-- Certificazioni emergency --}}
            <div class="flex justify-center gap-6 flex-wrap">
                <div class="flex items-center gap-2 bg-white/20 rounded-full px-4 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span class="text-sm font-medium">@lang('pub_theme::emergency.dental_emergency.safe_protocols.label')</span>
                </div>

                <div class="flex items-center gap-2 bg-white/20 rounded-full px-4 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                    <span class="text-sm font-medium">@lang('pub_theme::emergency.dental_emergency.specialized_team.label')</span>
                </div>

                <div class="flex items-center gap-2 bg-white/20 rounded-full px-4 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-medium">Servizio 24/7</span>
                </div>
            </div>
        </div>

    </div>

    {{-- Decorazione bottom --}}
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-400 to-pink-400"></div>
</section>
