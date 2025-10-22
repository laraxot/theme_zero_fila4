{{--
/**
 * Card Servizio Educazione - SaluteOra
 *
 * Card specializzata per l'educazione materno-infantile.
 * Focus sulla formazione della famiglia per la salute orale
 * del neonato e l'importanza della prevenzione.
 *
 * @param string $title - Titolo del servizio
 * @param string $description - Descrizione dettagliata
 * @param string $icon - Icona heroicon
 * @param string $color - Colore del tema (yellow)
 * @param array $services - Lista dei servizi inclusi
 * @param string $badge - Badge descrittivo
 * @param string $format - Formato dei corsi
 */
--}}

@props([
    'title' => 'Educazione Materno-Infantile',
    'description' => 'Corsi di igiene orale, preparazione per il neonato, educazione alimentare.',
    'icon' => 'heroicon-o-academic-cap',
    'color' => 'yellow',
    'services' => [],
    'badge' => 'Formazione gratuita',
    'format' => 'Online e in presenza'
])

<div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-yellow-200 overflow-hidden">

    {{-- Header card con icona e badge --}}
    <div class="relative bg-gradient-to-br from-yellow-50 to-orange-50 p-6 border-b border-yellow-100">

        {{-- Badge formazione --}}
        @if($badge)
        <div class="absolute top-4 right-4">
            <span class="inline-flex items-center gap-1 bg-yellow-600 text-white text-xs font-medium px-3 py-1 rounded-full">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path>
                </svg>
                {{ $badge }}
            </span>
        </div>
        @endif

        {{-- Icona principale --}}
        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
            </svg>
        </div>

        {{-- Titolo servizio --}}
        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-yellow-700 transition-colors">
            {{ $title }}
        </h3>

        {{-- Descrizione --}}
        <p class="text-gray-600 leading-relaxed">
            {{ $description }}
        </p>
    </div>

    {{-- Contenuto card --}}
    <div class="p-6">

        {{-- Lista servizi educativi --}}
        @if(!empty($services))
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Programmi Educativi:</h4>
            <ul class="space-y-2">
                @foreach($services as $service)
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-yellow-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-600">{{ $service }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Formato corsi --}}
        @if($format)
        <div class="bg-yellow-50 rounded-lg p-4 mb-6">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span class="text-sm font-medium text-yellow-800">Modalità: {{ $format }}</span>
            </div>
        </div>
        @endif

        {{-- Corsi disponibili --}}
        <div class="space-y-4 mb-6">
            <h5 class="text-sm font-semibold text-gray-900">Corsi Disponibili:</h5>

            {{-- Corso pre-parto --}}
            <div class="bg-blue-50 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                    <span class="text-sm font-medium text-blue-900">Igiene Orale in Gravidanza</span>
                </div>
                <p class="text-xs text-blue-800 mb-2">Tecniche corrette, prodotti sicuri, abitudini salutari</p>
                <span class="text-xs bg-blue-200 text-blue-800 px-2 py-1 rounded">Durata: 2 ore</span>
            </div>

            {{-- Corso post-parto --}}
            <div class="bg-green-50 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold">2</span>
                    <span class="text-sm font-medium text-green-900">Preparazione per il Neonato</span>
                </div>
                <p class="text-xs text-green-800 mb-2">Igiene del neonato, primi dentini, prevenzione carie</p>
                <span class="text-xs bg-green-200 text-green-800 px-2 py-1 rounded">Durata: 1.5 ore</span>
            </div>

            {{-- Corso alimentazione --}}
            <div class="bg-purple-50 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-6 h-6 bg-purple-500 text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
                    <span class="text-sm font-medium text-purple-900">Alimentazione e Salute Orale</span>
                </div>
                <p class="text-xs text-purple-800 mb-2">Cibi che fanno bene ai denti, ricette sane per famiglia</p>
                <span class="text-xs bg-purple-200 text-purple-800 px-2 py-1 rounded">Durata: 1 ora</span>
            </div>

            {{-- Corso famiglia --}}
            <div class="bg-pink-50 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-6 h-6 bg-pink-500 text-white rounded-full flex items-center justify-center text-xs font-bold">4</span>
                    <span class="text-sm font-medium text-pink-900">Workshop Famiglia</span>
                </div>
                <p class="text-xs text-pink-800 mb-2">Coinvolgimento del partner, educazione fratellini</p>
                <span class="text-xs bg-pink-200 text-pink-800 px-2 py-1 rounded">Durata: 3 ore</span>
            </div>
        </div>

        {{-- Materiali inclusi --}}
        <div class="bg-orange-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-orange-900 mb-2">Materiali Inclusi:</h5>
            <ul class="text-sm text-orange-800 space-y-1">
                <li>• Kit igiene orale personalizzato</li>
                <li>• Guida illustrata per neonati</li>
                <li>• Video tutorial scaricabili</li>
                <li>• Calendario sviluppo dentale</li>
            </ul>
        </div>

        {{-- Certificazione --}}
        <div class="bg-green-50 rounded-lg p-4 mb-6">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium text-green-800">Certificato di Partecipazione Incluso</span>
            </div>
        </div>

        {{-- Testimonianza veloce --}}
        <div class="border-l-4 border-yellow-500 bg-gray-50 p-4 mb-6">
            <p class="text-sm italic text-gray-600 mb-2">
                "I corsi mi hanno preparata meglio di qualsiasi libro. Ora so esattamente
                come prendermi cura dei denti di Luca fin dal primo giorno."
            </p>
            <p class="text-xs text-gray-500">- Maria R., mamma di Luca</p>
        </div>

        {{-- Call to action --}}
        <div class="text-center">
            <a
                href="{{ route('register') }}"
                class="inline-flex items-center justify-center w-full px-4 py-3 bg-yellow-600 hover:bg-yellow-700 text-white font-medium rounded-lg transition-colors duration-200 group/btn"
            >
                <span>Iscriviti ai Corsi</span>
                <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>

            <p class="mt-2 text-xs text-gray-500">
                Formazione completa per tutta la famiglia
            </p>
        </div>

    </div>

    {{-- Decorazione bottom --}}
    <div class="h-1 bg-gradient-to-r from-yellow-500 to-orange-500 group-hover:from-yellow-400 group-hover:to-orange-400 transition-colors"></div>
</div>
