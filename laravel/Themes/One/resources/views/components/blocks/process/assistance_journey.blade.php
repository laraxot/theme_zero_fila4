{{--
/**
 * Processo di Assistenza Journey - SaluteOra
 *
 * Componente che visualizza il percorso completo di assistenza
 * in modo chiaro, umano e rassicurante. Ogni step è dettagliato
 * con icone, tempistiche e informazioni pratiche.
 *
 * @param string $title - Titolo della sezione
 * @param string $subtitle - Sottotitolo esplicativo
 * @param string $className - Classi CSS per styling
 * @param array $steps - Array degli step del processo
 */
--}}

@props([
    'title' => 'Il Tuo Percorso di Cura - Semplice e Umano',
    'subtitle' => 'Dalla verifica dei requisiti alla cura completa, ti guidiamo in ogni passo',
    'className' => 'py-16 bg-gray-50',
    'steps' => []
])

<section class="{{ $className }}" id="percorso-cura">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header sezione --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                {{ $title }}
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                {{ $subtitle }}
            </p>

            {{-- Badge promessa --}}
            <div class="mt-6 inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <span class="font-medium">Ti accompagniamo in ogni momento</span>
            </div>
        </div>

        {{-- Timeline degli step --}}
        <div class="relative">
            {{-- Linea di connessione --}}
            <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 w-1 bg-blue-200 h-full"></div>

            @foreach($steps as $index => $step)
            <div class="relative mb-12 lg:mb-16">

                {{-- Layout desktop: alternato --}}
                <div class="lg:flex lg:items-center {{ $index % 2 === 0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }}">

                    {{-- Contenuto step --}}
                    <div class="lg:w-5/12 {{ $index % 2 === 0 ? 'lg:pr-8' : 'lg:pl-8' }}">
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">

                            {{-- Header step --}}
                            <div class="flex items-start gap-4 mb-6">
                                {{-- Numero step mobile --}}
                                <div class="lg:hidden w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-lg">
                                    {{ $step['number'] }}
                                </div>

                                <div class="flex-1">
                                    {{-- Timing e online indicator --}}
                                    <div class="flex items-center gap-4 mb-3">
                                        @if(isset($step['time']))
                                        <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $step['time'] }}
                                        </span>
                                        @endif

                                        @if(isset($step['online']) && $step['online'])
                                        <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            Online
                                        </span>
                                        @endif
                                    </div>

                                    {{-- Titolo step --}}
                                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                                        {{ $step['title'] }}
                                    </h3>
                                </div>
                            </div>

                            {{-- Descrizione --}}
                            <p class="text-gray-600 leading-relaxed mb-6">
                                {{ $step['description'] }}
                            </p>

                            {{-- Dettagli specifici --}}
                            @if(isset($step['requirements']) && !empty($step['requirements']))
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-900 mb-3">Requisiti Necessari:</h4>
                                <ul class="space-y-2">
                                    @foreach($step['requirements'] as $requirement)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $requirement }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if(isset($step['fields']) && !empty($step['fields']))
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-900 mb-3">Informazioni Richieste:</h4>
                                <ul class="space-y-2">
                                    @foreach($step['fields'] as $field)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $field }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if(isset($step['features']) && !empty($step['features']))
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-900 mb-3">Caratteristiche:</h4>
                                <ul class="space-y-2">
                                    @foreach($step['features'] as $feature)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-purple-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $feature }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- Info aggiuntive --}}
                            <div class="flex flex-wrap gap-4 text-xs">
                                @if(isset($step['network']))
                                <div class="flex items-center gap-1 text-blue-600">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    {{ $step['network'] }}
                                </div>
                                @endif

                                @if(isset($step['coverage']))
                                <div class="flex items-center gap-1 text-green-600">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $step['coverage'] }}
                                </div>
                                @endif

                                @if(isset($step['privacy']))
                                <div class="flex items-center gap-1 text-purple-600">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    {{ $step['privacy'] }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Icona e numero centrale (desktop) --}}
                    <div class="hidden lg:flex lg:w-2/12 justify-center">
                        <div class="relative">
                            {{-- Numero step --}}
                            <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg z-10 relative">
                                {{ $step['number'] }}
                            </div>

                            {{-- Icona sottostante --}}
                            <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-white border-2 border-blue-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @switch($step['icon'] ?? '')
                                        @case('heroicon-o-clipboard-document-check')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            @break
                                        @case('heroicon-o-user-plus')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            @break
                                        @case('heroicon-o-map-pin')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            @break
                                        @case('heroicon-o-calendar')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            @break
                                        @case('heroicon-o-heart')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            @break
                                        @case('heroicon-o-arrow-path')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            @break
                                        @default
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    @endswitch
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Spazio vuoto alternato (desktop) --}}
                    <div class="hidden lg:block lg:w-5/12"></div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA finale --}}
        <div class="mt-16 text-center">
            <div class="bg-white rounded-2xl shadow-lg p-8 max-w-3xl mx-auto border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    Pronta per Iniziare il Tuo Percorso?
                </h3>
                <p class="text-gray-600 mb-6">
                    Unisciti alle {{ number_format(1247) }} mamme che hanno già beneficiato dei nostri servizi gratuiti.
                    Il primo passo verso la tua salute orale inizia qui.
                </p>

                <a
                    href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 group"
                >
                    <span>Inizia Subito il Percorso</span>
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>

                <p class="mt-4 text-sm text-gray-500">
                    La verifica dei requisiti richiede solo 5 minuti
                </p>
            </div>
        </div>

    </div>
</section>
