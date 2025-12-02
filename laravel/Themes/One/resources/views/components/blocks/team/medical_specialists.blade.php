{{--
/**
 * Medical Specialists Team - SaluteOra
 *
 * Sezione team specialisti con layout professionale
 * che ispira fiducia attraverso credenziali, foto
 * e anni di esperienza chiaramente visibili.
 *
 * @param string $title - Titolo sezione
 * @param string $subtitle - Sottotitolo esplicativo
 * @param array $team_members - Lista membri del team
 */
--}}

@props([
    'title' => 'Il nostro team di specialisti',
    'subtitle' => 'Professionisti qualificati e certificati al servizio della tua salute',
    'team_members' => []
])

<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">

    {{-- Elementi decorativi di sfondo --}}
    <div class="absolute inset-0 overflow-hidden">
        {{-- Pattern heartbeat --}}
        <div class="absolute top-10 left-10 w-full h-32 opacity-5">
            <svg class="w-full h-full" viewBox="0 0 200 50" preserveAspectRatio="none">
                <path d="M0 25 L40 25 L45 10 L50 40 L55 25 L95 25 L100 10 L105 40 L110 25 L150 25 L155 10 L160 40 L165 25 L200 25"
                      stroke="currentColor" stroke-width="2" fill="none" class="text-blue-300"/>
            </svg>
        </div>

        {{-- Forme mediche decorative --}}
        <div class="absolute top-20 right-10 w-20 h-20 text-teal-200 opacity-20">
            <svg viewBox="0 0 100 100" fill="currentColor">
                <circle cx="50" cy="20" r="15"/>
                <ellipse cx="50" cy="65" rx="25" ry="35"/>
                <circle cx="42" cy="45" r="3"/>
                <circle cx="58" cy="45" r="3"/>
                <path d="M45 55 Q50 60 55 55" stroke="currentColor" stroke-width="2" fill="none"/>
            </svg>
        </div>

        <div class="absolute bottom-20 left-20 w-16 h-16 text-green-200 opacity-20">
            <svg viewBox="0 0 100 100" fill="currentColor">
                <path d="M46 30h8v16h16v8H54v16h-8V54H30v-8h16V30z"/>
            </svg>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header sezione --}}
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm rounded-full px-6 py-2 mb-6 border border-white/50">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="text-sm font-medium text-gray-700">Team Medico Certificato</span>
            </div>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {{ $title }}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        {{-- Griglia team --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
            @foreach($team_members as $index => $member)
            <div class="group relative"
                 data-aos="fade-up"
                 data-aos-delay="{{ $index * 150 }}">

                <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-500 group-hover:-translate-y-3">

                    {{-- Container foto --}}
                    <div class="relative overflow-hidden">

                        {{-- Foto specialista --}}
                        <div class="aspect-w-3 aspect-h-4 bg-gradient-to-br from-gray-100 to-gray-200">
                            @if(isset($member['image']) && $member['image'])
                            <img src="{{ $member['image'] }}"
                                 alt="{{ $member['name'] }}"
                                 class="w-full h-64 object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            @else
                            {{-- Placeholder professionale --}}
                            <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-teal-100 flex items-center justify-center">
                                <svg class="w-20 h-20 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            @endif
                        </div>

                        {{-- Badge esperienza --}}
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1 border border-white/50">
                            <span class="text-xs font-bold text-blue-600">{{ $member['experience_years'] ?? '10+' }} anni</span>
                        </div>

                        {{-- Overlay gradiente per testo --}}
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/20 to-transparent h-20"></div>
                    </div>

                    {{-- Informazioni specialista --}}
                    <div class="p-6">

                        {{-- Nome e ruolo --}}
                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-1">
                                {{ $member['name'] }}
                            </h3>
                            <p class="text-blue-600 font-semibold text-sm">
                                {{ $member['role'] }}
                            </p>
                        </div>

                        {{-- Specializzazione --}}
                        <div class="mb-4">
                            <div class="inline-flex items-center gap-2 bg-blue-50 rounded-lg px-3 py-1">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443a55.381 55.381 0 015.25 2.882V15M15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm-1.5 0h-.008v.008H13.5V12.75z"/>
                                </svg>
                                <span class="text-xs font-medium text-blue-700">{{ $member['specialization'] }}</span>
                            </div>
                        </div>

                        {{-- Credenziali --}}
                        <div class="mb-6">
                            <p class="text-sm text-gray-600 leading-relaxed">
                                {{ $member['credentials'] }}
                            </p>
                        </div>

                        {{-- Indicatori competenza --}}
                        <div class="flex flex-wrap gap-2">
                            <div class="flex items-center gap-1 text-xs text-gray-500">
                                <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>Certificato</span>
                            </div>

                            <div class="flex items-center gap-1 text-xs text-gray-500">
                                <svg class="w-3 h-3 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Specialista</span>
                            </div>

                            <div class="flex items-center gap-1 text-xs text-gray-500">
                                <svg class="w-3 h-3 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Aggiornato</span>
                            </div>
                        </div>

                    </div>

                    {{-- Border decorativo --}}
                    <div class="absolute bottom-0 left-6 right-6 h-1 bg-gradient-to-r from-blue-500 to-teal-500 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>

                </div>
            </div>
            @endforeach
        </div>

        {{-- Footer sezione --}}
        <div class="mt-16 text-center">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 border border-white/50 max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row items-center justify-center gap-6">

                    {{-- Statistiche team --}}
                    <div class="flex items-center gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-1">{{ count($team_members) }}+</div>
                            <div class="text-sm text-gray-600">Specialisti</div>
                        </div>

                        <div class="text-center">
                            <div class="text-3xl font-bold text-green-600 mb-1">15+</div>
                            <div class="text-sm text-gray-600">Anni esperienza media</div>
                        </div>

                        <div class="text-center">
                            <div class="text-3xl font-bold text-teal-600 mb-1">100%</div>
                            <div class="text-sm text-gray-600">Certificati</div>
                        </div>
                    </div>

                    {{-- CTA --}}
                    <div class="text-center md:text-left">
                        <p class="text-gray-700 font-medium mb-2">Prenota una consulenza</p>
                        <p class="text-sm text-gray-600">Parla direttamente con i nostri specialisti</p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
