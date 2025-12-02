{{--
/**
 * Card Servizio Prevenzione - SaluteOra
 *
 * Card specializzata per i servizi di prevenzione odontoiatrica.
 * Enfatizza l'importanza della prevenzione durante la gravidanza
 * con un design che ispira fiducia e sicurezza.
 *
 * @param string $title - Titolo del servizio
 * @param string $description - Descrizione dettagliata
 * @param string $icon - Icona heroicon
 * @param string $color - Colore del tema
 * @param array $services - Lista dei servizi inclusi
 * @param string $badge - Badge descrittivo
 * @param string $frequency - Frequenza consigliata
 */
--}}

@props([
    'title' => 'Prevenzione e Controlli',
    'description' => 'Visite preventive, pulizia professionale, educazione all\'igiene orale.',
    'icon' => 'heroicon-o-shield-check',
    'color' => 'green',
    'services' => [],
    'badge' => 'Raccomandato',
    'frequency' => 'Ogni 3 mesi'
])

<div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-green-200 overflow-hidden">

    {{-- Header card con icona e badge --}}
    <div class="relative bg-gradient-to-br from-green-50 to-emerald-50 p-6 border-b border-green-100">

        {{-- Badge raccomandato --}}
        @if($badge)
        <div class="absolute top-4 right-4">
            <span class="inline-flex items-center gap-1 bg-green-600 text-white text-xs font-medium px-3 py-1 rounded-full">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ $badge }}
            </span>
        </div>
        @endif

        {{-- Icona principale --}}
        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
        </div>

        {{-- Titolo servizio --}}
        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors">
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
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Servizi Inclusi:</h4>
            <ul class="space-y-2">
                @foreach($services as $service)
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-600">{{ $service }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Informazioni frequenza --}}
        @if($frequency)
        <div class="bg-green-50 rounded-lg p-4 mb-6">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium text-green-800">Frequenza consigliata: {{ $frequency }}</span>
            </div>
        </div>
        @endif

        {{-- Perché è importante --}}
        <div class="bg-blue-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-blue-900 mb-2">Perché è Importante in Gravidanza:</h5>
            <ul class="text-sm text-blue-800 space-y-1">
                <li>• Previene complicazioni gengivali</li>
                <li>• Riduce il rischio di parto prematuro</li>
                <li>• Migliora l'igiene orale generale</li>
                <li>• Prepara a una maternità serena</li>
            </ul>
        </div>

        {{-- Testimonianza veloce --}}
        <div class="border-l-4 border-green-500 bg-gray-50 p-4 mb-6">
            <p class="text-sm italic text-gray-600 mb-2">
                "La prevenzione mi ha dato tranquillità durante tutta la gravidanza.
                I controlli regolari hanno fatto la differenza."
            </p>
            <p class="text-xs text-gray-500">- Maria R., mamma di Sofia</p>
        </div>

        {{-- Call to action --}}
        <div class="text-center">
            <a
                href="{{ route('register') }}"
                class="inline-flex items-center justify-center w-full px-4 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200 group/btn"
            >
                <span>Inizia la Prevenzione</span>
                <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>

            <p class="mt-2 text-xs text-gray-500">
                Programma subito il tuo controllo preventivo
            </p>
        </div>

    </div>

    {{-- Decorazione bottom --}}
    <div class="h-1 bg-gradient-to-r from-green-500 to-emerald-500 group-hover:from-green-400 group-hover:to-emerald-400 transition-colors"></div>
</div>
