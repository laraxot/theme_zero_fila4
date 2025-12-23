{{--
/**
 * Privacy Contact CTA - SaluteOra
 *
 * Call-to-action per contattare l'azienda riguardo
 * questioni di privacy con design che ispira fiducia
 * e canali di comunicazione chiari e accessibili.
 *
 * @param string $title - Titolo CTA
 * @param string $subtitle - Sottotitolo esplicativo
 * @param string $type - Tipo (privacy|terms|legal)
 */
--}}

@props([
    'title' => 'Hai domande sulla privacy?',
    'subtitle' => __('pub_theme::components.cta.privacy_contact.subtitle'),
    'type' => 'privacy'
])

<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50 relative overflow-hidden">

    {{-- Elementi decorativi di sfondo --}}
    <div class="absolute inset-0 overflow-hidden">
        {{-- Pattern sicurezza --}}
        <div class="absolute top-0 left-0 w-full h-full opacity-5">
            <svg class="w-full h-full" viewBox="0 0 60 60" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <pattern id="privacy-pattern" width="30" height="30" patternUnits="userSpaceOnUse">
                        <circle cx="15" cy="15" r="2" fill="currentColor" class="text-blue-300"/>
                        <path d="M10 10l10 10M20 10l-10 10" stroke="currentColor" stroke-width="0.5" class="text-blue-300"/>
                    </pattern>
                </defs>
                <rect width="60" height="60" fill="url(#privacy-pattern)"/>
            </svg>
        </div>

        {{-- Shield decorativi --}}
        <div class="absolute top-10 right-10 w-24 h-24 text-blue-200 opacity-30">
            <svg viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M50 15 L25 25 L25 50 Q25 75 50 85 Q75 75 75 50 L75 25 Z"/>
                <path d="M40 45 L47 52 L60 39"/>
            </svg>
        </div>

        <div class="absolute bottom-10 left-10 w-20 h-20 text-green-200 opacity-30">
            <svg viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1">
                <rect x="30" y="45" width="40" height="30" rx="3"/>
                <path d="M40 45 V35 Q40 25 50 25 Q60 25 60 35 V45"/>
                <circle cx="50" cy="60" r="2"/>
            </svg>
        </div>
    </div>

    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header CTA --}}
        <div class="text-center mb-12">

            {{-- Badge informativo --}}
            <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm rounded-full px-6 py-2 mb-6 border border-white/50">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    @if($type === 'privacy')
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                    @elseif($type === 'terms')
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    @else
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12V15.75z"/>
                    @endif
                </svg>
                <span class="text-sm font-medium text-blue-700">
                    @if($type === 'privacy')
                        Privacy & GDPR
                    @elseif($type === 'terms')
                        Termini & Condizioni
                    @else
                        Supporto Legale
                    @endif
                </span>
            </div>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {{ $title }}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        {{-- Container principale --}}
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 md:p-12 border border-white/50 shadow-xl">

            {{-- Griglia contatti --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

                {{-- Data Protection Officer --}}
                <div class="group">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 group-hover:border-gray-200 group-hover:shadow-lg transition-all duration-300 h-full">

                        {{-- Icona --}}
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>

                        {{-- Contenuto --}}
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Data Protection Officer</h3>
                        <p class="text-gray-600 text-sm mb-4">Esperto in protezione dei dati personali e GDPR</p>

                        {{-- Contatti --}}
                        <div class="space-y-2">
                            <a href="mailto:dpo@saluteora.it"
                               class="flex items-center gap-2 text-blue-600 hover:text-blue-800 transition-colors text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                                </svg>
                                dpo@saluteora.it
                            </a>
                            <div class="text-xs text-gray-500">Risposta entro 48h</div>
                        </div>
                    </div>
                </div>

                {{-- Supporto Privacy --}}
                <div class="group">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 group-hover:border-gray-200 group-hover:shadow-lg transition-all duration-300 h-full">

                        {{-- Icona --}}
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                            </svg>
                        </div>

                        {{-- Contenuto --}}
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Supporto Telefonico</h3>
                        <p class="text-gray-600 text-sm mb-4">Assistenza immediata per urgenze privacy</p>

                        {{-- Contatti --}}
                        <div class="space-y-2">
                            <a href="tel:+390612345678"
                               class="flex items-center gap-2 text-green-600 hover:text-green-800 transition-colors text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                </svg>
                                +39 06 1234567
                            </a>
                            <div class="text-xs text-gray-500">Lun-Ven 9:00-18:00</div>
                        </div>
                    </div>
                </div>

                {{-- PEC Certificata --}}
                <div class="group">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 group-hover:border-gray-200 group-hover:shadow-lg transition-all duration-300 h-full">

                        {{-- Icona --}}
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                            </svg>
                        </div>

                        {{-- Contenuto --}}
                        <h3 class="text-lg font-bold text-gray-900 mb-2">PEC Certificata</h3>
                        <p class="text-gray-600 text-sm mb-4">Comunicazioni formali con valore legale</p>

                        {{-- Contatti --}}
                        <div class="space-y-2">
                            <a href="mailto:privacy@pec.saluteora.it"
                               class="flex items-center gap-2 text-purple-600 hover:text-purple-800 transition-colors text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443a55.381 55.381 0 015.25 2.882V15M15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm-1.5 0h-.008v.008H13.5V12.75z"/>
                                </svg>
                                privacy@pec.saluteora.it
                            </a>
                            <div class="text-xs text-gray-500">Ricevuta certificata</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CTA principale --}}
            <div class="text-center">
                <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-2xl p-8 border border-blue-100">

                    {{-- Icona principale --}}
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-teal-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/>
                        </svg>
                    </div>

                    {{-- Contenuto CTA --}}
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        @if($type === 'privacy')
                            Ancora dubbi sulla privacy?
                        @elseif($type === 'terms')
                            Chiarimenti sui termini?
                        @else
                            Serve assistenza legale?
                        @endif
                    </h3>

                    <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                        @if($type === 'privacy')
                            Il nostro team di esperti in protezione dati è disponibile per rispondere a tutte le tue domande sui tuoi diritti e sul trattamento dei dati sanitari.
                        @elseif($type === 'terms')
                            Se hai bisogno di chiarimenti sui nostri termini e condizioni di servizio, il nostro team legale è qui per aiutarti.
                        @else
                            Per qualsiasi questione legale relativa ai nostri servizi, contatta il nostro ufficio legale specializzato in diritto sanitario.
                        @endif
                    </p>

                    {{-- Bottoni CTA --}}
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="mailto:dpo@saluteora.it"
                           class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-8 py-3 rounded-xl transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                            Scrivi al DPO
                        </a>

                        <a href="tel:+390612345678"
                           class="inline-flex items-center justify-center gap-2 bg-white border border-gray-300 hover:border-gray-400 text-gray-700 font-medium px-8 py-3 rounded-xl transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                            </svg>
                            Chiama ora
                        </a>
                    </div>

                    {{-- Disclaimer temporistiche --}}
                    <p class="text-xs text-gray-500 mt-4">
                        Risposte garantite entro 48h lavorative per email, assistenza telefonica immediata negli orari di ufficio.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>
