{{--
/**
 * Blocco Evidenze Scientifiche - SaluteOra
 *
 * Componente che presenta evidenze scientifiche sui benefici
 * della cura odontoiatrica in gravidanza, con dati credibili
 * da fonti mediche autorevoli e design che ispira fiducia.
 *
 * @param string $title - Titolo del blocco
 * @param string $subtitle - Sottotitolo esplicativo
 * @param string $className - Classi CSS aggiuntive
 * @param array $benefits - Lista dei benefici scientifici
 * @param array $medical_sources - Fonti mediche autorevoli
 */
--}}

@props([
    'title' => 'Perché la Salute Orale in Gravidanza è Fondamentale',
    'subtitle' => 'Evidenze scientifiche sui benefici della cura odontoiatrica in gravidanza',
    'className' => 'py-16 bg-gradient-to-br from-blue-50 to-purple-50',
    'benefits' => [],
    'medical_sources' => []
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

            {{-- Badge credibilità scientifica --}}
            <div class="mt-8 inline-flex items-center gap-2 bg-white rounded-full px-6 py-3 shadow-md">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span class="text-sm font-medium text-gray-700">Evidenze Scientificamente Validate</span>
            </div>
        </div>

        {{-- Griglia benefici scientifici --}}
        @if(!empty($benefits))
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            @foreach($benefits as $benefit)
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">

                {{-- Header card --}}
                <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-6 text-white">

                    {{-- Percentuale prominente --}}
                    <div class="text-center mb-4">
                        <div class="text-4xl font-bold mb-2">{{ $benefit['percentage'] ?? 'N/A' }}</div>
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($benefit['icon'] === 'heroicon-o-shield-check')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                @elseif($benefit['icon'] === 'heroicon-o-bug-ant')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                @endif
                            </svg>
                            <span class="text-sm font-medium">{{ $benefit['title'] ?? 'Beneficio' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Contenuto card --}}
                <div class="p-6">
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ $benefit['description'] ?? 'Descrizione del beneficio scientifico.' }}
                    </p>

                    {{-- Fonte scientifica --}}
                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path>
                            </svg>
                            <span class="text-xs font-medium text-gray-700">Fonte Scientifica</span>
                        </div>
                        <p class="text-xs text-gray-600">{{ $benefit['scientific_source'] ?? 'Fonte non specificata' }}</p>
                    </div>

                    {{-- Livello evidenza --}}
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">Livello Evidenza:</span>
                        @php
                            $evidenceLevel = $benefit['evidence_level'] ?? 'Media';
                            $badgeColor = match($evidenceLevel) {
                                'Forte' => 'bg-green-100 text-green-800',
                                'Consolidata' => 'bg-blue-100 text-blue-800',
                                default => 'bg-yellow-100 text-yellow-800'
                            };
                        @endphp
                        <span class="text-xs font-medium px-2 py-1 rounded {{ $badgeColor }}">
                            {{ $evidenceLevel }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Sezione fonti mediche autorevoli --}}
        @if(!empty($medical_sources))
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">
                Fonti Mediche Autorevoli
            </h3>

            <div class="grid md:grid-cols-2 gap-6">
                @foreach($medical_sources as $source)
                <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <h4 class="font-semibold text-gray-900 mb-1">{{ $source['title'] ?? 'Fonte Medica' }}</h4>
                        <p class="text-sm text-gray-600 mb-2">{{ $source['description'] ?? 'Descrizione fonte' }}</p>
                        <div class="flex items-center gap-4 text-xs text-gray-500">
                            <span>Anno: {{ $source['year'] ?? '2023' }}</span>
                            @if(isset($source['link']) && $source['link'] !== '#')
                            <a href="{{ $source['link'] }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                Leggi di più →
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Call to action finale --}}
        <div class="text-center mt-12">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    La Scienza Conferma: La Prevenzione è la Migliore Cura
                </h3>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                    Le evidenze scientifiche sono chiare: prendersi cura della salute orale durante
                    la gravidanza porta benefici concreti sia per la mamma che per il bambino.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a
                        href="{{ route('register') }}"
                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200"
                    >
                        <span>Inizia il Tuo Percorso</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>

                    <button
                        type="button"
                        class="inline-flex items-center justify-center px-6 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition-colors duration-200"
                        onclick="window.open('#', '_blank')"
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Scarica gli Studi</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
</section>
