{{--
/**
 * Card Servizio Diagnosi - SaluteOra
 *
 * Card specializzata per i servizi diagnostici in gravidanza.
 * Enfatizza la sicurezza delle radiografie digitali e l'importanza
 * della diagnosi precoce con tecnologie safe per mamma e bambino.
 *
 * @param string $title - Titolo del servizio
 * @param string $description - Descrizione dettagliata
 * @param string $icon - Icona heroicon
 * @param string $color - Colore del tema (blue)
 * @param array $services - Lista dei servizi inclusi
 * @param string $badge - Badge descrittivo
 * @param string $technology - Tecnologia utilizzata
 */
--}}

@props([
    'title' => 'Diagnosi e Valutazioni',
    'description' => 'Esami diagnostici sicuri in gravidanza, radiografie a basso dosaggio.',
    'icon' => 'heroicon-o-magnifying-glass',
    'color' => 'blue',
    'services' => [],
    'badge' => 'Sicuro in gravidanza',
    'technology' => 'Radiografie digitali a basso dosaggio'
])

<div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-200 overflow-hidden">

    {{-- Header card con icona e badge --}}
    <div class="relative bg-gradient-to-br from-blue-50 to-sky-50 p-6 border-b border-blue-100">

        {{-- Badge sicurezza --}}
        @if($badge)
        <div class="absolute top-4 right-4">
            <span class="inline-flex items-center gap-1 bg-blue-600 text-white text-xs font-medium px-3 py-1 rounded-full">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                {{ $badge }}
            </span>
        </div>
        @endif

        {{-- Icona principale --}}
        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
            </svg>
        </div>

        {{-- Titolo servizio --}}
        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors">
            {{ $title }}
        </h3>

        {{-- Descrizione --}}
        <p class="text-gray-600 leading-relaxed">
            {{ $description }}
        </p>
    </div>

    {{-- Contenuto card --}}
    <div class="p-6">

        {{-- Lista servizi inclusi --}}
        @if(!empty($services))
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Servizi Diagnostici:</h4>
            <ul class="space-y-2">
                @foreach($services as $service)
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-600">{{ $service }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Tecnologia utilizzata --}}
        @if($technology)
        <div class="bg-blue-50 rounded-lg p-4 mb-6">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span class="text-sm font-medium text-blue-800">Tecnologia: {{ $technology }}</span>
            </div>
        </div>
        @endif

        {{-- Sicurezza in gravidanza --}}
        <div class="bg-green-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-green-900 mb-2">Sicurezza in Gravidanza:</h5>
            <ul class="text-sm text-green-800 space-y-1">
                <li>• Radiografie digitali a basso dosaggio</li>
                <li>• Protezione schermata per l'addome</li>
                <li>• Solo se strettamente necessarie</li>
                <li>• Tecnologie non invasive preferite</li>
            </ul>
        </div>

        {{-- Quando è consigliato --}}
        <div class="bg-yellow-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-yellow-900 mb-2">Quando è Consigliato:</h5>
            <ul class="text-sm text-yellow-800 space-y-1">
                <li>• Primo controllo della gravidanza</li>
                <li>• In caso di dolore o fastidio</li>
                <li>• Prima di iniziare trattamenti</li>
                <li>• Su indicazione del ginecologo</li>
            </ul>
        </div>

        {{-- Testimonianza veloce --}}
        <div class="border-l-4 border-blue-500 bg-gray-50 p-4 mb-6">
            <p class="text-sm italic text-gray-600 mb-2">
                "Le radiografie digitali mi hanno permesso di scoprire un problema prima
                che diventasse grave. Tutto fatto in sicurezza per me e il bambino."
            </p>
            <p class="text-xs text-gray-500">- Elena T., mamma di Sofia</p>
        </div>

        {{-- Call to action --}}
        <div class="text-center">
            <a
                href="{{ route('register') }}"
                class="inline-flex items-center justify-center w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 group/btn"
            >
                <span>Prenota Diagnosi</span>
                <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>

            <p class="mt-2 text-xs text-gray-500">
                Valutazione completa con tecnologie sicure
            </p>
        </div>

    </div>

    {{-- Decorazione bottom --}}
    <div class="h-1 bg-gradient-to-r from-blue-500 to-sky-500 group-hover:from-blue-400 group-hover:to-sky-400 transition-colors"></div>
</div>
