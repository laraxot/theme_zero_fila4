{{--
/**
 * Card Servizio Emergenze - SaluteOra
 *
 * Card specializzata per le emergenze odontoiatriche in gravidanza.
 * Design che comunica urgenza ma rassicurazione, con enfasi
 * sulla disponibilità 24/7 e il numero di emergenza.
 *
 * @param string $title - Titolo del servizio
 * @param string $description - Descrizione dettagliata
 * @param string $icon - Icona heroicon
 * @param string $color - Colore del tema (red)
 * @param array $services - Lista dei servizi inclusi
 * @param string $badge - Badge descrittivo
 * @param string $phone - Numero di telefono emergenze
 */
--}}

@props([
    'title' => 'Pronto Soccorso Odontoiatrico',
    'description' => 'Urgenze dentali 24/7, gestione del dolore, interventi d\'emergenza.',
    'icon' => 'heroicon-o-exclamation-triangle',
    'color' => 'red',
    'services' => [],
    'badge' => '24/7 Disponibile',
    'phone' => '800-123-456'
])

<div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-200 overflow-hidden">

    {{-- Header card con icona e badge --}}
    <div class="relative bg-gradient-to-br from-red-50 to-rose-50 p-6 border-b border-red-100">

        {{-- Badge disponibilità --}}
        @if($badge)
        <div class="absolute top-4 right-4">
            <span class="inline-flex items-center gap-1 bg-red-600 text-white text-xs font-medium px-3 py-1 rounded-full animate-pulse">
                <span class="w-2 h-2 bg-white rounded-full"></span>
                {{ $badge }}
            </span>
        </div>
        @endif

        {{-- Icona principale --}}
        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>

        {{-- Titolo servizio --}}
        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-red-700 transition-colors">
            {{ $title }}
        </h3>

        {{-- Descrizione --}}
        <p class="text-gray-600 leading-relaxed">
            {{ $description }}
        </p>
    </div>

    {{-- Contenuto card --}}
    <div class="p-6">

        {{-- Numero di emergenza prominente --}}
        <div class="bg-red-600 text-white rounded-lg p-4 mb-6 text-center">
            <div class="flex items-center justify-center gap-2 mb-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span class="text-sm font-medium">Emergenze</span>
            </div>
            <a href="tel:{{ str_replace([' ', '-'], '', $phone) }}" class="text-2xl font-bold hover:text-red-100 transition-colors">
                {{ $phone }}
            </a>
            <p class="text-xs text-red-200 mt-1">Chiamata gratuita 24/7</p>
        </div>

        {{-- Lista servizi emergenza --}}
        @if(!empty($services))
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Servizi di Emergenza:</h4>
            <ul class="space-y-2">
                @foreach($services as $service)
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-red-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-600">{{ $service }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Quando chiamare --}}
        <div class="bg-yellow-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-yellow-900 mb-2">Quando Chiamare Subito:</h5>
            <ul class="text-sm text-yellow-800 space-y-1">
                <li>• Forte dolore dentale che non si allevia</li>
                <li>• Sanguinamento gengivale abbondante</li>
                <li>• Trauma o rottura dentale</li>
                <li>• Gonfiore del viso o ascessi</li>
                <li>• Dolore che impedisce di dormire/mangiare</li>
            </ul>
        </div>

        {{-- Gestione del dolore in gravidanza --}}
        <div class="bg-blue-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-blue-900 mb-2">Gestione Dolore in Gravidanza:</h5>
            <ul class="text-sm text-blue-800 space-y-1">
                <li>• Farmaci sicuri per gestanti</li>
                <li>• Tecniche non farmacologiche</li>
                <li>• Coordinamento con ginecologo</li>
                <li>• Monitoraggio fetale quando necessario</li>
            </ul>
        </div>

        {{-- Tempi di risposta --}}
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-green-50 rounded-lg p-3 text-center">
                <div class="text-lg font-bold text-green-600">< 30 min</div>
                <div class="text-xs text-green-700">Consulenza telefonica</div>
            </div>
            <div class="bg-orange-50 rounded-lg p-3 text-center">
                <div class="text-lg font-bold text-orange-600">< 2 ore</div>
                <div class="text-xs text-orange-700">Visita in studio</div>
            </div>
        </div>

        {{-- Cosa NON fare --}}
        <div class="bg-red-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-red-900 mb-2">❌ Cosa NON Fare:</h5>
            <ul class="text-sm text-red-800 space-y-1">
                <li>• Non assumere farmaci non prescritti</li>
                <li>• Non applicare aspirina sui denti</li>
                <li>• Non rimandare se il dolore è forte</li>
                <li>• Non usare rimedi "fai da te"</li>
            </ul>
        </div>

        {{-- Call to action urgente --}}
        <div class="text-center">
            <a
                href="tel:{{ str_replace([' ', '-'], '', $phone) }}"
                class="inline-flex items-center justify-center w-full px-4 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-colors duration-200 group/btn animate-pulse"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>CHIAMA ORA</span>
            </a>

            <p class="mt-2 text-xs text-gray-500">
                Operatori specializzati sempre disponibili
            </p>
        </div>

    </div>

    {{-- Decorazione bottom --}}
    <div class="h-1 bg-gradient-to-r from-red-500 to-rose-500 group-hover:from-red-400 group-hover:to-rose-400 transition-colors"></div>
</div>
