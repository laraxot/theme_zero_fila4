{{--
/**
 * Medical Values Section - SaluteOra
 *
 * Sezione che presenta i valori fondamentali dell'azienda
 * con design medico professionale, iconografie SVG outline
 * e animazioni sottili per aumentare l'engagement.
 *
 * @param string $title - Titolo sezione
 * @param string $subtitle - Sottotitolo esplicativo
 * @param array $sections - Lista delle sezioni con valori
 */
--}}

@props([
    'title' => 'I nostri valori fondamentali',
    'subtitle' => 'Ogni decisione e ogni servizio riflette il nostro impegno verso l\'eccellenza sanitaria',
    'sections' => []
])

<section class="py-20 bg-white relative overflow-hidden">

    {{-- Elementi decorativi di sfondo --}}
    <div class="absolute inset-0 overflow-hidden">
        {{-- Pattern medico sottile --}}
        <div class="absolute top-0 left-0 w-full h-full opacity-3">
            <svg class="w-full h-full" viewBox="0 0 200 200" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <pattern id="medical-cross" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M18 16h4v8h-4zm-2-2h8v4h-8z" fill="currentColor" class="text-gray-300"/>
                    </pattern>
                </defs>
                <rect width="200" height="200" fill="url(#medical-cross)"/>
            </svg>
        </div>

        {{-- Onde decorative --}}
        <div class="absolute top-20 -right-32 w-96 h-96 bg-gradient-to-br from-blue-50 to-teal-50 rounded-full opacity-30 blur-3xl"></div>
        <div class="absolute bottom-20 -left-32 w-80 h-80 bg-gradient-to-tr from-teal-50 to-green-50 rounded-full opacity-30 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header sezione --}}
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {{ $title }}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        {{-- Griglia valori --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            @foreach($sections as $index => $section)
            <div class="group relative"
                 data-aos="fade-up"
                 data-aos-delay="{{ $index * 100 }}">

                {{-- Card valore --}}
                <div class="relative h-full">

                    {{-- Elemento decorativo di connessione --}}
                    @if(!$loop->last && $loop->iteration % 2 !== 0)
                    <div class="hidden lg:block absolute top-16 -right-6 w-12 h-0.5 bg-gradient-to-r from-gray-300 to-transparent z-10"></div>
                    @endif

                    {{-- Container principale --}}
                    <div class="relative bg-white rounded-2xl p-8 h-full border border-gray-100 group-hover:border-gray-200 group-hover:shadow-xl transition-all duration-500 group-hover:-translate-y-2">

                        {{-- Alone di sfondo per hover --}}
                        <div class="absolute inset-0 bg-gradient-to-br opacity-0 group-hover:opacity-5 transition-opacity duration-500 rounded-2xl
                                    @if(isset($section['color']))
                                        @if(str_contains($section['color'], 'blue'))
                                            from-blue-50 to-blue-100
                                        @elseif(str_contains($section['color'], 'rose'))
                                            from-rose-50 to-rose-100
                                        @elseif(str_contains($section['color'], 'teal'))
                                            from-teal-50 to-teal-100
                                        @elseif(str_contains($section['color'], 'green'))
                                            from-green-50 to-green-100
                                        @else
                                            from-gray-50 to-gray-100
                                        @endif
                                    @else
                                        from-gray-50 to-gray-100
                                    @endif
                                    "></div>

                        {{-- Icona --}}
                        <div class="relative mb-6">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br {{ $section['color'] ?? 'text-gray-600' }} bg-opacity-10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">

                                @if($section['icon'] === 'medical-certificate')
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443a55.381 55.381 0 015.25 2.882V15M15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm-1.5 0h-.008v.008H13.5V12.75z"/>
                                </svg>

                                @elseif($section['icon'] === 'heart-medical')
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m3-3H9"/>
                                </svg>

                                @elseif($section['icon'] === 'technology-health')
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.169.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c.353.353.546.83.546 1.328v.147c0 .827-.673 1.5-1.5 1.5E-16 0-.75-.75-.75-1.5v-.15c0-.312-.125-.611-.347-.833L15 15M5 14.5l-1.198-.303A12.05 12.05 0 002.05 13.05a12.05 12.05 0 001.752-1.247L5 14.5z"/>
                                </svg>

                                @elseif($section['icon'] === 'shield-check')
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                                </svg>

                                @else
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                @endif

                            </div>
                        </div>

                        {{-- Contenuto --}}
                        <div class="relative text-center">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:{{ $section['color'] ?? 'text-gray-600' }} transition-colors duration-300">
                                {{ $section['title'] }}
                            </h3>

                            <p class="text-gray-600 leading-relaxed text-sm">
                                {{ $section['description'] }}
                            </p>
                        </div>

                        {{-- Indicatore valore --}}
                        <div class="absolute top-4 right-4 w-3 h-3 rounded-full {{ $section['color'] ?? 'text-gray-600' }} bg-current opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Call to action bottom --}}
        <div class="mt-16 text-center">
            <div class="inline-flex items-center gap-4 bg-gradient-to-r from-teal-50 to-blue-50 rounded-2xl px-8 py-6 border border-teal-100">
                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-blue-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                </div>
                <div class="text-left">
                    <p class="text-lg font-semibold text-gray-900">I nostri valori guidano ogni decisione</p>
                    <p class="text-sm text-gray-600">Dalla ricerca alla cura, mettiamo sempre la paziente al centro</p>
                </div>
            </div>
        </div>

    </div>
</section>
