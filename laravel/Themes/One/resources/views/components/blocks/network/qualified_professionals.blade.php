{{--
/**
 * Blocco Rete Professionisti Qualificati - SaluteOra
 *
 * Componente che presenta la rete nazionale di odontoiatri
 * specializzati, con statistiche impressionanti, certificazioni
 * e copertura geografica per ispirare fiducia e professionalità.
 *
 * @param string $title - Titolo del blocco
 * @param string $subtitle - Sottotitolo esplicativo
 * @param string $className - Classi CSS aggiuntive
 * @param array $stats - Statistiche della rete
 * @param array $certifications - Certificazioni obbligatorie
 * @param array $coverage_map - Mappa copertura geografica
 * @param string $availability - Sistema di prenotazione
 */
--}}

@props([
    'title' => 'La Nostra Rete di Esperti',
    'subtitle' => 'Odontoiatri specializzati in salute orale materno-infantile su tutto il territorio nazionale',
    'className' => 'py-16 bg-white',
    'stats' => [],
    'certifications' => [],
    'coverage_map' => [],
    'availability' => 'Real-time booking system con disponibilità aggiornata in tempo reale'
])

<section class="{{ $className }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header sezione --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                {{ $title }}
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                {{ $subtitle }}
            </p>

            {{-- Badge qualità --}}
            <div class="mt-8 inline-flex items-center gap-2 bg-green-50 rounded-full px-6 py-3 border border-green-200">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium text-green-800">Professionisti Certificati e Specializzati</span>
            </div>
        </div>

        {{-- Statistiche impressionanti --}}
        @if(!empty($stats))
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
            <div class="text-center bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200">
                <div class="text-3xl font-bold text-blue-600 mb-2">{{ $stats['total_professionals'] ?? '50+' }}</div>
                <div class="text-sm text-blue-800 font-medium">Professionisti</div>
                <div class="text-xs text-blue-600 mt-1">Specializzati</div>
            </div>

            <div class="text-center bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border border-green-200">
                <div class="text-3xl font-bold text-green-600 mb-2">{{ $stats['cities_covered'] ?? '25+' }}</div>
                <div class="text-sm text-green-800 font-medium">Città Coperte</div>
                <div class="text-xs text-green-600 mt-1">Su tutto il territorio</div>
            </div>

            <div class="text-center bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200">
                <div class="text-3xl font-bold text-purple-600 mb-2">{{ $stats['average_experience'] ?? '10+' }}</div>
                <div class="text-sm text-purple-800 font-medium">Anni Esperienza</div>
                <div class="text-xs text-purple-600 mt-1">Media del network</div>
            </div>

            <div class="text-center bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 border border-orange-200">
                <div class="text-3xl font-bold text-orange-600 mb-2">{{ $stats['specializations'] ?? '5+' }}</div>
                <div class="text-sm text-orange-800 font-medium">Specializzazioni</div>
                <div class="text-xs text-orange-600 mt-1">Materno-infantile</div>
            </div>
        </div>
        @endif

        {{-- Grid principale contenuto --}}
        <div class="grid lg:grid-cols-2 gap-12 mb-16">

            {{-- Certificazioni e qualifiche --}}
            <div class="bg-gray-50 rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    <svg class="w-6 h-6 inline-block mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Certificazioni Obbligatorie
                </h3>

                @if(!empty($certifications))
                <div class="space-y-4">
                    @foreach($certifications as $certification)
                    <div class="flex items-start gap-3 bg-white rounded-lg p-4 shadow-sm">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mt-1">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">{{ $certification }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                {{-- Processo di selezione --}}
                <div class="mt-8 bg-blue-50 rounded-lg p-6 border border-blue-200">
                    <h4 class="font-semibold text-blue-900 mb-3">Il Nostro Processo di Selezione</h4>
                    <div class="space-y-2 text-sm text-blue-800">
                        <div class="flex items-center gap-2">
                            <span class="w-4 h-4 bg-blue-500 rounded-full text-white text-xs flex items-center justify-center font-bold">1</span>
                            <span>Verifica abilitazione e specializzazioni</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-4 h-4 bg-blue-500 rounded-full text-white text-xs flex items-center justify-center font-bold">2</span>
                            <span>Formazione specifica su protocolli gravidanza</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-4 h-4 bg-blue-500 rounded-full text-white text-xs flex items-center justify-center font-bold">3</span>
                            <span>Test pratico su casi clinici</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-4 h-4 bg-blue-500 rounded-full text-white text-xs flex items-center justify-center font-bold">4</span>
                            <span>Valutazione continua delle performance</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mappa copertura geografica --}}
            <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    <svg class="w-6 h-6 inline-block mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Copertura Nazionale
                </h3>

                {{-- Rappresentazione mappa Italia semplificata --}}
                <div class="relative bg-white rounded-xl p-6 shadow-sm border border-gray-200 mb-6">
                    <div class="text-center mb-4">
                        <div class="inline-block text-6xl text-green-600">🇮🇹</div>
                        <p class="text-sm text-gray-600 mt-2">Presenti su tutto il territorio nazionale</p>
                    </div>

                    {{-- Lista copertura per area --}}
                    @if(!empty($coverage_map))
                    <div class="space-y-4">
                        @foreach($coverage_map as $area => $cities)
                        @php
                            $areaColors = [
                                'nord' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-800', 'border' => 'border-blue-200'],
                                'centro' => ['bg' => 'bg-green-50', 'text' => 'text-green-800', 'border' => 'border-green-200'],
                                'sud' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-800', 'border' => 'border-orange-200']
                            ];
                            $colors = $areaColors[$area] ?? $areaColors['centro'];
                        @endphp
                        <div class="border {{ $colors['border'] }} {{ $colors['bg'] }} rounded-lg p-4">
                            <h4 class="font-semibold {{ $colors['text'] }} mb-2 capitalize">{{ ucfirst($area) }} Italia</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($cities as $city)
                                <span class="text-xs px-2 py-1 bg-white rounded {{ $colors['text'] }} border {{ $colors['border'] }}">{{ $city }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- Sistema prenotazioni --}}
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <h4 class="font-semibold text-gray-900 mb-2">Sistema di Prenotazione</h4>
                    <p class="text-sm text-gray-600 mb-3">{{ $availability }}</p>
                    <div class="flex items-center gap-2 text-xs text-green-600">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span>Disponibilità aggiornata in tempo reale</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Qualità e sicurezza --}}
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 text-white mb-12">
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="text-3xl font-bold mb-2">100%</div>
                    <div class="text-sm opacity-90">Professionisti Verificati</div>
                    <div class="text-xs opacity-75 mt-1">Abilitazione e specializzazioni</div>
                </div>
                <div>
                    <div class="text-3xl font-bold mb-2">24h</div>
                    <div class="text-sm opacity-90">Supporto Emergenze</div>
                    <div class="text-xs opacity-75 mt-1">Sempre disponibili</div>
                </div>
                <div>
                    <div class="text-3xl font-bold mb-2">98%</div>
                    <div class="text-sm opacity-90">Soddisfazione Pazienti</div>
                    <div class="text-xs opacity-75 mt-1">Valutazione continua</div>
                </div>
            </div>
        </div>

        {{-- Testimonianza professionale --}}
        <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200">
            <div class="flex items-start gap-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-grow">
                    <blockquote class="text-lg text-gray-700 italic mb-4">
                        "Far parte della rete SaluteOra significa condividere una missione: garantire
                        la migliore assistenza odontoiatrica per le gestanti. Ogni giorno vediamo
                        l'impatto positivo del nostro lavoro sulla salute di mamme e bambini."
                    </blockquote>
                    <div class="flex items-center gap-3">
                        <div>
                            <div class="font-semibold text-gray-900">Dr.ssa Maria Bianchi</div>
                            <div class="text-sm text-gray-600">Specialista in Odontoiatria Materno-Infantile, Milano</div>
                            <div class="text-xs text-gray-500 mt-1">15 anni di esperienza • Membro della rete dal 2019</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Call to action finale --}}
        <div class="text-center mt-12">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">
                Trova il Professionista Più Vicino a Te
            </h3>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                La nostra mappa interattiva ti permette di trovare l'odontoiatra specializzato
                più vicino e prenotare immediatamente la tua visita.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a
                    href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-lg"
                >
                    <span>Trova il Tuo Dentista</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </a>

                <button
                    type="button"
                    class="inline-flex items-center justify-center px-8 py-4 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition-colors duration-200 shadow-lg"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span>Vedi Statistiche</span>
                </button>
            </div>
        </div>

    </div>
</section>
