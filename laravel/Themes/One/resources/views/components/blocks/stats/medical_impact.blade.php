{{--
/**
 * Statistiche Impatto Medico - SaluteOra
 *
 * Componente che mostra l'impatto reale del progetto attraverso numeri significativi.
 * Comunica autorevolezza, risultati concreti e valore sociale.
 *
 * @param string $title - Titolo della sezione
 * @param string $subtitle - Sottotitolo esplicativo
 * @param string $className - Classi CSS per styling
 * @param array $stats - Array di statistiche con numero, label, descrizione, icona e colore
 */
--}}

@props([
    'title' => 'I Risultati del Nostro Impegno',
    'subtitle' => 'Numeri che parlano di vite cambiate',
    'className' => 'bg-gradient-to-r from-blue-50 to-green-50 py-16',
    'stats' => []
])

<section class="{{ $className }}" id="statistiche-impatto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header sezione --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $title }}
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        {{-- Griglia statistiche --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($stats as $stat)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 text-center border border-gray-100 hover:border-gray-200">

                {{-- Icona --}}
                @if(isset($stat['icon']))
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center"
                         style="background: linear-gradient(135deg, {{ getIconBackground($stat['color'] ?? 'text-blue-600') }})">
                        @if(str_contains($stat['icon'], 'heroicon'))
                            @switch($stat['icon'])
                                @case('heroicon-o-heart')
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    @break
                                @case('heroicon-o-star')
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                    @break
                                @case('heroicon-o-gift')
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                                    </svg>
                                    @break
                                @case('heroicon-o-clock')
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @break
                            @endswitch
                        @endif
                    </div>
                </div>
                @endif

                {{-- Numero principale --}}
                <div class="mb-3">
                    <span class="text-4xl md:text-5xl font-bold {{ $stat['color'] ?? 'text-blue-600' }} block">
                        {{ $stat['number'] }}
                    </span>
                </div>

                {{-- Label principale --}}
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    {{ $stat['label'] }}
                </h3>

                {{-- Descrizione --}}
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ $stat['description'] }}
                </p>

                {{-- Badge o indicator di tendenza --}}
                @if(is_numeric(str_replace(['%', '€', '+', ','], '', $stat['number'])))
                <div class="mt-3 inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    In crescita
                </div>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Sezione aggiuntiva con contesto temporale --}}
        <div class="mt-16 text-center">
            <div class="inline-flex items-center gap-2 bg-white/60 backdrop-blur-sm px-6 py-3 rounded-full border border-white/80">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <span class="text-sm font-medium text-gray-700">
                    Dati aggiornati in tempo reale - Progetto attivo dal 2023
                </span>
            </div>
        </div>

        {{-- Sezione certificazioni e riconoscimenti --}}
        <div class="mt-12 bg-white/50 backdrop-blur-sm rounded-2xl p-8 border border-white/80">
            <div class="text-center mb-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                    Riconoscimenti e Certificazioni
                </h3>
                <p class="text-gray-600">
                    Il nostro impegno è riconosciuto dalle principali istituzioni sanitarie
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Ministero della Salute --}}
                <div class="flex items-center gap-3 bg-white p-4 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">@lang('pub_theme::components.stats.medical_impact.patronage')</p>
                        <p class="text-sm text-gray-600">@lang('pub_theme::components.stats.medical_impact.ministry_of_health')</p>
                    </div>
                </div>

                {{-- SSN --}}
                <div class="flex items-center gap-3 bg-white p-4 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">@lang('pub_theme::components.stats.medical_impact.integrated_with')</p>
                        <p class="text-sm text-gray-600">@lang('pub_theme::components.stats.medical_impact.national_health_service')</p>
                    </div>
                </div>

                {{-- ISO Qualità --}}
                <div class="flex items-center gap-3 bg-white p-4 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">@lang('pub_theme::components.stats.medical_impact.certification')</p>
                        <p class="text-sm text-gray-600">@lang('pub_theme::components.stats.medical_impact.iso_9001_2015')</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@php
/**
 * Helper per determinare il background dell'icona in base al colore
 */
function getIconBackground($color) {
    return match($color) {
        'text-pink-600' => '#ec4899, #f472b6',
        'text-yellow-500' => '#eab308, #fbbf24',
        'text-green-600' => '#059669, #10b981',
        'text-blue-600' => '#2563eb, #3b82f6',
        default => '#3b82f6, #6366f1'
    };
}
@endphp
