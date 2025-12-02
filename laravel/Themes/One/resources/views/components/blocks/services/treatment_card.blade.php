{{--
/**
 * Card Servizio Trattamenti - SaluteOra
 *
 * Card specializzata per i trattamenti odontoiatrici in gravidanza.
 * Enfatizza l'importanza del timing (preferibilmente II trimestre)
 * e la sicurezza dei trattamenti conservative per gestanti.
 *
 * @param string $title - Titolo del servizio
 * @param string $description - Descrizione dettagliata
 * @param string $icon - Icona heroicon
 * @param string $color - Colore del tema (purple)
 * @param array $services - Lista dei servizi inclusi
 * @param string $badge - Badge descrittivo
 * @param string $timing - Timing ottimale per i trattamenti
 */
--}}

@props([
    'title' => 'Trattamenti Specialistici',
    'description' => 'Cure conservative, trattamento delle carie, terapie gengivali.',
    'icon' => 'heroicon-o-wrench-screwdriver',
    'color' => 'purple',
    'services' => [],
    'badge' => 'Trattamenti sicuri',
    'timing' => 'Preferibilmente II trimestre'
])

<div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-purple-200 overflow-hidden">

    {{-- Header card con icona e badge --}}
    <div class="relative bg-gradient-to-br from-purple-50 to-violet-50 p-6 border-b border-purple-100">

        {{-- Badge sicurezza --}}
        @if($badge)
        <div class="absolute top-4 right-4">
            <span class="inline-flex items-center gap-1 bg-purple-600 text-white text-xs font-medium px-3 py-1 rounded-full">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                {{ $badge }}
            </span>
        </div>
        @endif

        {{-- Icona principale --}}
        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655-5.653a2.548 2.548 0 010-3.586l.837-.836c.41-.41.947-.628 1.524-.628s1.114.218 1.524.628l1.094 1.094M11.42 15.17l3.248-.993m-3.248.993l-2.91 2.91m-2.91-2.91L5.32 17.99a2.651 2.651 0 01-3.25-3.25l2.835-2.835M12.668 12.174L15.89 8.95a1.02 1.02 0 000-1.442L14.448 6.06a1.02 1.02 0 00-1.442 0L9.774 9.282"></path>
            </svg>
        </div>

        {{-- Titolo servizio --}}
        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-700 transition-colors">
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
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Trattamenti Disponibili:</h4>
            <ul class="space-y-2">
                @foreach($services as $service)
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-purple-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-600">{{ $service }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Timing ottimale --}}
        @if($timing)
        <div class="bg-purple-50 rounded-lg p-4 mb-6">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="text-sm font-medium text-purple-800">Timing Ottimale: {{ $timing }}</span>
            </div>
        </div>
        @endif

        {{-- Trattamenti per trimestre --}}
        <div class="space-y-4 mb-6">
            <h5 class="text-sm font-semibold text-gray-900">Trattamenti per Trimestre:</h5>

            {{-- Primo trimestre --}}
            <div class="bg-yellow-50 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-6 h-6 bg-yellow-500 text-white rounded-full flex items-center justify-center text-xs font-bold">1°</span>
                    <span class="text-sm font-medium text-yellow-900">Primo Trimestre</span>
                </div>
                <p class="text-xs text-yellow-800">Solo trattamenti urgenti e non rimandabili</p>
            </div>

            {{-- Secondo trimestre --}}
            <div class="bg-green-50 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold">2°</span>
                    <span class="text-sm font-medium text-green-900">Secondo Trimestre</span>
                </div>
                <p class="text-xs text-green-800">Periodo ideale per tutti i trattamenti conservative</p>
            </div>

            {{-- Terzo trimestre --}}
            <div class="bg-blue-50 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold">3°</span>
                    <span class="text-sm font-medium text-blue-900">Terzo Trimestre</span>
                </div>
                <p class="text-xs text-blue-800">Trattamenti brevi e posizioni confortevoli</p>
            </div>
        </div>

        {{-- Protocolli di sicurezza --}}
        <div class="bg-green-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-green-900 mb-2">Protocolli di Sicurezza:</h5>
            <ul class="text-sm text-green-800 space-y-1">
                <li>• Anestesia locale sicura per gestanti</li>
                <li>• Monitoraggio costante del benessere</li>
                <li>• Trattamenti conservative preferiti</li>
                <li>• Collaborazione con ginecologo</li>
            </ul>
        </div>

        {{-- Testimonianza veloce --}}
        <div class="border-l-4 border-purple-500 bg-gray-50 p-4 mb-6">
            <p class="text-sm italic text-gray-600 mb-2">
                "Avevo paura dei trattamenti in gravidanza, ma il team mi ha seguita
                con protocolli sicuri. Ora i miei denti stanno bene e il bambino è nato perfetto."
            </p>
            <p class="text-xs text-gray-500">- Maria R., mamma di Luca</p>
        </div>

        {{-- Call to action --}}
        <div class="text-center">
            <a
                href="{{ route('register') }}"
                class="inline-flex items-center justify-center w-full px-4 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-200 group/btn"
            >
                <span>Pianifica Trattamento</span>
                <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>

            <p class="mt-2 text-xs text-gray-500">
                Consulenza personalizzata per il tuo trimestre
            </p>
        </div>

    </div>

    {{-- Decorazione bottom --}}
    <div class="h-1 bg-gradient-to-r from-purple-500 to-violet-500 group-hover:from-purple-400 group-hover:to-violet-400 transition-colors"></div>
</div>
