{{--
/**
 * Feature Grid Servizi Medici - SaluteOra
 *
 * Container per la griglia di servizi medici specialistici.
 * Questo componente serve come wrapper per le card dei servizi
 * e gestisce il layout responsivo e la presentazione generale.
 *
 * @param string $title - Titolo della sezione servizi
 * @param string $description - Descrizione introduttiva
 * @param string $className - Classi CSS per styling
 * @param int $columns - Numero di colonne per la griglia
 * @param string $gap - Spaziatura tra gli elementi
 */
--}}

@props([
    'title' => 'Servizi Specialistici per la Tua Gravidanza',
    'description' => 'Un ventaglio completo di cure odontoiatriche pensate specificamente per le esigenze delle gestanti',
    'className' => 'py-16 bg-white',
    'columns' => 3,
    'gap' => 'gap-8'
])

<section class="{{ $className }}" id="servizi-completi">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header sezione --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                {{ $title }}
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                {{ $description }}
            </p>

            {{-- Sottotitolo con enfasi sulla sicurezza --}}
            <div class="mt-6 inline-flex items-center gap-2 bg-blue-50 text-blue-800 px-4 py-2 rounded-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span class="text-sm font-medium">Tutti i trattamenti sono sicuri e adattati alla gravidanza</span>
            </div>
        </div>

        {{-- Griglia servizi responsiva --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ $columns }} {{ $gap }}">
            {{ $slot }}
        </div>

        {{-- Sezione informativa aggiuntiva --}}
        <div class="mt-16 bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    Protocolli Specifici per la Gravidanza
                </h3>
                <p class="text-gray-600 mb-8 max-w-3xl mx-auto">
                    Tutti i nostri trattamenti seguono protocolli medici specifici per le gestanti,
                    sviluppati in collaborazione con ginecologi e ostetriche per garantire
                    la massima sicurezza per mamma e bambino.
                </p>

                {{-- Grid con info sui trimestri --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Primo Trimestre --}}
                    <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-xl font-bold text-yellow-600">1°</span>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Primo Trimestre</h4>
                        <p class="text-sm text-gray-600">
                            Focus su prevenzione, igiene orale e trattamenti urgenti non rimandabili.
                            Evitati interventi elettivi.
                        </p>
                    </div>

                    {{-- Secondo Trimestre --}}
                    <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-xl font-bold text-green-600">2°</span>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Secondo Trimestre</h4>
                        <p class="text-sm text-gray-600">
                            Periodo ideale per la maggior parte dei trattamenti.
                            Finestra ottimale per cure conservative e terapie.
                        </p>
                    </div>

                    {{-- Terzo Trimestre --}}
                    <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-xl font-bold text-blue-600">3°</span>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Terzo Trimestre</h4>
                        <p class="text-sm text-gray-600">
                            Trattamenti brevi e posizioni comode.
                            Preparazione per il periodo post-parto.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Call to action finale --}}
        <div class="mt-12 text-center">
            <a
                href="{{ route('register') }}"
                class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 group"
            >
                <span>@lang('pub_theme::content.services.access_free_services.label')</span>
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>

            <p class="mt-4 text-sm text-gray-500">
                Verifica subito se hai i requisiti per accedere gratuitamente a tutti i servizi
            </p>
        </div>

    </div>
</section>
