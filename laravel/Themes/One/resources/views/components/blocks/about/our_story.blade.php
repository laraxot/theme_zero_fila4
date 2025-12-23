<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $subtitle;
    public string $content;
    public string $image;
    public string $image_position = 'right';
    public ?string $id = null;
}; ?>

{{--
/**
 * Componente Storia - SaluteOra
 *
 * Visualizza la storia dell'organizzazione con testo formattato e immagine.
 * Supporta posizionamento flessibile dell'immagine (destra o sinistra).
 * 
 * @param string $title - Titolo della sezione
 * @param string $subtitle - Sottotitolo esplicativo
 * @param string $content - Contenuto HTML con la storia dell'organizzazione
 * @param string $image - URL dell'immagine illustrativa
 * @param string $image_position - Posizione dell'immagine ('right' o 'left')
 * @param string|null $id - ID opzionale per ancoraggio nella pagina
 */
--}}

<section class="py-16 bg-white" {{ $id ? "id=\"$id\"" : '' }}>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header sezione --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $title }}
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        {{-- Contenuto principale --}}
        <div class="flex flex-col {{ $image_position === 'right' ? 'lg:flex-row' : 'lg:flex-row-reverse' }} items-center gap-12">
            {{-- Contenuto testuale --}}
            <div class="lg:w-1/2">
                <div class="prose prose-lg max-w-none">
                    {!! $content !!}
                </div>
            </div>

            {{-- Immagine --}}
            <div class="lg:w-1/2">
                <div class="relative rounded-2xl overflow-hidden shadow-xl">
                    <img 
                        src="{{ $image }}" 
                        alt="{{ $title }}" 
                        class="w-full h-auto object-cover"
                    />
                    
                    {{-- Badge anni di attività --}}
                    <div class="absolute top-4 {{ $image_position === 'right' ? 'left-4' : 'right-4' }} bg-white/90 backdrop-blur-sm rounded-lg px-4 py-2 shadow-md">
                        <span class="text-xs text-gray-600 font-medium">Attivi dal</span>
                        <span class="block text-xl font-bold text-blue-600">2019</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Timeline semplificata --}}
        <div class="mt-16 max-w-4xl mx-auto">
            <div class="flex justify-center mb-8">
                <h3 class="inline-flex items-center gap-2 text-xl font-bold text-gray-900 bg-gray-100 px-6 py-2 rounded-full">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    La Nostra Crescita
                </h3>
            </div>

            <div class="relative">
                {{-- Linea timeline --}}
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-blue-100"></div>
                
                {{-- Eventi timeline --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    {{-- 2019 --}}
                    <div class="md:col-start-1 relative">
                        <div class="flex items-center">
                            <div class="flex-grow h-0.5 bg-blue-100"></div>
                            <div class="absolute right-0 transform translate-x-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xs md:translate-x-full md:translate-y-0 md:top-0">
                                <span>2019</span>
                            </div>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-lg shadow-sm mt-6">
                            <h4 class="font-semibold text-blue-900 mb-1">Fondazione</h4>
                            <p class="text-sm text-gray-600">Nasce il progetto con i primi 10 studi dentistici a Milano</p>
                        </div>
                    </div>

                    {{-- 2021 --}}
                    <div class="md:col-start-2 relative">
                        <div class="flex items-center">
                            <div class="flex-grow h-0.5 bg-blue-100"></div>
                            <div class="absolute left-0 transform -translate-x-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-xs md:-translate-x-full md:translate-y-0 md:top-0">
                                <span>2021</span>
                            </div>
                        </div>
                        <div class="bg-green-50 p-6 rounded-lg shadow-sm mt-6">
                            <h4 class="font-semibold text-green-900 mb-1">Espansione Nazionale</h4>
                            <p class="text-sm text-gray-600">Il progetto si espande a 10 regioni con 50+ professionisti</p>
                        </div>
                    </div>

                    {{-- 2023 --}}
                    <div class="md:col-start-1 relative">
                        <div class="flex items-center">
                            <div class="flex-grow h-0.5 bg-blue-100"></div>
                            <div class="absolute right-0 transform translate-x-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xs md:translate-x-full md:translate-y-0 md:top-0">
                                <span>2023</span>
                            </div>
                        </div>
                        <div class="bg-purple-50 p-6 rounded-lg shadow-sm mt-6">
                            <h4 class="font-semibold text-purple-900 mb-1">Riconoscimento Ministeriale</h4>
                            <p class="text-sm text-gray-600">Patrocinio del Ministero della Salute e inserimento nelle linee guida nazionali</p>
                        </div>
                    </div>

                    {{-- 2025 --}}
                    <div class="md:col-start-2 relative">
                        <div class="flex items-center">
                            <div class="flex-grow h-0.5 bg-blue-100"></div>
                            <div class="absolute left-0 transform -translate-x-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-teal-600 rounded-full flex items-center justify-center text-white font-bold text-xs md:-translate-x-full md:translate-y-0 md:top-0">
                                <span>2025</span>
                            </div>
                        </div>
                        <div class="bg-teal-50 p-6 rounded-lg shadow-sm mt-6">
                            <h4 class="font-semibold text-teal-900 mb-1">Oggi</h4>
                            <p class="text-sm text-gray-600">15 regioni, 100+ dentisti, 5000+ pazienti assistite, e in continua crescita</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
