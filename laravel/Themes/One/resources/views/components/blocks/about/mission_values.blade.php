<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $subtitle;
    public string $mission_statement;
    public array $values = [];
    public string $background_color = '';
}; ?>

{{--
/**
 * Componente Missione e Valori - SaluteOra
 *
 * Visualizza la dichiarazione di missione dell'organizzazione e i suoi valori fondamentali
 * con icone, titoli e descrizioni in un layout moderno e accattivante.
 * 
 * @param string $title - Titolo della sezione
 * @param string $subtitle - Sottotitolo esplicativo
 * @param string $mission_statement - Dichiarazione di missione principale
 * @param array $values - Array di valori fondamentali con titolo, descrizione e icona
 * @param string $background_color - Classe CSS per il colore di sfondo personalizzato
 */
--}}

<section class="{{ $background_color ?: 'bg-white' }} py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header sezione --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $title }}
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        {{-- Mission statement principale --}}
        <div class="max-w-4xl mx-auto mb-16">
            <blockquote class="relative p-8 md:p-12 bg-white rounded-2xl shadow-lg border-l-4 border-blue-600">
                <svg class="absolute top-4 left-4 text-blue-200 w-12 h-12 opacity-30" fill="currentColor" viewBox="0 0 32 32">
                    <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"></path>
                </svg>
                <p class="relative text-xl md:text-2xl font-medium text-gray-800 leading-relaxed z-10">
                    {{ $mission_statement }}
                </p>
                <div class="mt-6 text-right">
                    <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        La Nostra Promessa
                    </div>
                </div>
            </blockquote>
        </div>

        {{-- Valori core --}}
        <h3 class="text-2xl font-bold text-center text-gray-900 mb-12">I Nostri Valori Fondamentali</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            @foreach($values as $value)
            <div class="flex flex-col items-start bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                <div class="mb-6 bg-blue-100 rounded-full p-3">
                    @if(str_contains($value['icon'], 'heroicon'))
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @switch($value['icon'])
                                @case('heroicon-o-heart')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    @break
                                @case('heroicon-o-shield-check')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    @break
                                @case('heroicon-o-light-bulb')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    @break
                                @case('heroicon-o-academic-cap')
                                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                    @break
                                @default
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            @endswitch
                        </svg>
                    @endif
                </div>
                <h4 class="text-lg font-bold text-gray-900 mb-3">{{ $value['title'] }}</h4>
                <p class="text-gray-600">{{ $value['description'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Principi guida --}}
        <div class="max-w-5xl mx-auto">
            <div class="bg-gradient-to-r from-blue-600 to-teal-600 rounded-2xl p-8 md:p-12 text-white">
                <h3 class="text-xl md:text-2xl font-bold mb-6 text-center">I Principi che Guidano il Nostro Lavoro</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="rounded-full w-16 h-16 bg-white/20 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-2">Sostenibilità</h4>
                        <p class="text-sm text-white/80">Operiamo in modo da garantire la sostenibilità del servizio nel lungo periodo</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="rounded-full w-16 h-16 bg-white/20 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-2">Collaborazione</h4>
                        <p class="text-sm text-white/80">Lavoriamo con istituzioni, professionisti e associazioni per migliorare l'impatto</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="rounded-full w-16 h-16 bg-white/20 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-2">Trasparenza</h4>
                        <p class="text-sm text-white/80">Condividiamo i nostri risultati, sfide e soluzioni con tutti gli stakeholder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
