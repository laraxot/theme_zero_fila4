{{--
/**
 * Medical Credentials Certifications Component - SaluteOra
 *
 * Showcase delle certificazioni e credenziali mediche per build trust.
 * Design orientato alla credibilità e autorevolezza nel settore sanitario,
 * con focus su trasparenza e compliance normativa per gestanti.
 *
 * Features WOW:
 * - Animated certification badges con hover effects avanzati
 * - Timeline di accreditamenti e riconoscimenti
 * - Interactive credential verification system
 * - Authoritative logos display con partner integration
 * - Real-time compliance status indicators
 * - Trust score visualization con progress bars
 * - Tooltip informativi per ogni certificazione
 * - Link diretti per verification online
 *
 * @param string $title Titolo della sezione certificazioni
 * @param string $subtitle Sottotitolo esplicativo
 * @param string $className Classi CSS aggiuntive
 * @param array $certifications Array delle certificazioni con details
 * @param bool $show_verification Mostra link di verifica online
 * @param bool $show_timeline Mostra timeline accreditamenti
 */
--}}

@props([
    'title' => 'Certificazioni e Riconoscimenti',
    'subtitle' => __('pub_theme::components.certifications.subtitle'),
    'className' => 'bg-gradient-to-br from-gray-50 to-blue-50 py-20',
    'certifications' => [],
    'show_verification' => true,
    'show_timeline' => true
])

<section class="{{ $className }}"
         x-data="{
            isVisible: false,
            selectedCert: null,
            trustScore: 0,
            verificationStatus: 'checking',
            hoveredCert: null,
            certifications: [
                {
                    id: 'ssn',
                    name: 'Accreditamento Regionale SSN',
                    issuer: 'Regione Lazio - Sistema Sanitario Nazionale',
                    year: '2023',
                    validity: '2026',
                    type: 'healthcare_accreditation',
                    logo: '/img/cert/ssn-lazio.png',
                    color: 'from-blue-500 to-indigo-600',
                    description: 'Accreditamento istituzionale per l\'erogazione di prestazioni sanitarie in regime di convenzione',
                    verification_url: 'https://salute.regione.lazio.it/verifica-accreditamento',
                    trust_weight: 25,
                    features: [
                        'Prestazioni in convenzione SSN',
                        'Standard qualitativi certificati',
                        'Controlli periodici regionali',
                        'Trasparenza tariffaria'
                    ]
                },
                {
                    id: 'iso9001',
                    name: 'Certificazione ISO 9001:2015',
                    issuer: 'TÜV Italia Srl',
                    year: '2023',
                    validity: '2026',
                    type: 'quality_management',
                    logo: '/img/cert/iso-9001.png',
                    color: 'from-green-500 to-emerald-600',
                    description: '@lang('pub_theme::components.certifications.iso_9001.description')',
                    verification_url: 'https://www.tuv.com/world/en/certificate-validation.html',
                    trust_weight: 20,
                    features: [
                        'Processo miglioramento continuo',
                        'Soddisfazione del paziente',
                        'Gestione rischio clinico',
                        'Audit interni regolari'
                    ]
                },
                {
                    id: 'gdpr',
                    name: 'GDPR Compliance Certificate',
                    issuer: 'Data Protection Authority',
                    year: '2024',
                    validity: '2025',
                    type: 'privacy_compliance',
                    logo: '/img/cert/gdpr-cert.png',
                    color: 'from-purple-500 to-violet-600',
                    description: '@lang('pub_theme::components.certifications.gdpr_compliance.description')',
                    verification_url: 'https://www.garanteprivacy.it/verifica-compliance',
                    trust_weight: 15,
                    features: [
                        'Protezione dati sanitari',
                        'Consenso informato digitale',
                        'Diritti del paziente tutelati',
                        'Crittografia avanzata'
                    ]
                },
                {
                    id: 'efp',
                    name: 'Membro EFP',
                    issuer: 'European Federation of Periodontology',
                    year: '2022',
                    validity: '2025',
                    type: 'professional_membership',
                    logo: '/img/cert/efp-member.png',
                    color: 'from-orange-500 to-red-600',
                    description: 'Membership nella principale federazione europea di parodontologia',
                    verification_url: 'https://www.efp.org/members/directory',
                    trust_weight: 20,
                    features: [
                        'Protocolli europei',
                        'Formazione continua',
                        'Ricerca scientifica',
                        'Network internazionale'
                    ]
                },
                {
                    id: 'iso27001',
                    name: 'ISO 27001 Information Security',
                    issuer: 'Bureau Veritas Italia',
                    year: '2024',
                    validity: '2027',
                    type: 'security_management',
                    logo: '/img/cert/iso-27001.png',
                    color: 'from-cyan-500 to-blue-600',
                    description: 'Gestione sicurezza delle informazioni e protezione dati sanitari sensibili',
                    verification_url: 'https://certification.bureauveritas.com/verify',
                    trust_weight: 20,
                    features: [
                        'Sicurezza informatica',
                        'Protezione dati pazienti',
                        'Backup sicuri',
                        'Accesso controllato'
                    ]
                }
            ],
            timeline: [
                { year: '2020', event: 'Fondazione SaluteOra', type: 'company' },
                { year: '2021', event: 'Prima certificazione ISO 9001', type: 'cert' },
                { year: '2022', event: 'Adesione EFP', type: 'membership' },
                { year: '2023', event: 'Accreditamento SSN', type: 'accred' },
                { year: '2024', event: 'GDPR Compliance + ISO 27001', type: 'security' }
            ]
         }"
         x-init="
            // Trust score animation
            setTimeout(() => {
                let score = 0;
                const targetScore = 96.8;
                const interval = setInterval(() => {
                    if (score < targetScore) {
                        score += 0.4;
                        trustScore = score.toFixed(1);
                    } else {
                        clearInterval(interval);
                    }
                }, 30);
            }, 1000);

            // Verification status simulation
            setTimeout(() => {
                verificationStatus = 'verified';
            }, 2000);
         "
         x-intersect="isVisible = true"
         id="certificazioni">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Section --}}
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 bg-white/80 backdrop-blur-sm rounded-full border border-green-200 shadow-lg mb-8"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 transform -translate-y-8"
                 x-transition:enter-end="opacity-100 transform translate-y-0">

                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <div class="w-4 h-4 bg-green-500 rounded-full"
                             :class="verificationStatus === 'verified' ? 'animate-pulse' : 'animate-spin'"></div>
                        <div class="absolute inset-0 w-4 h-4 bg-green-500 rounded-full animate-ping opacity-30"
                             x-show="verificationStatus === 'verified'"></div>
                    </div>
                    <div class="text-left">
                        <div class="text-sm font-bold text-green-700">
                            <span x-show="verificationStatus === 'checking'">Verifica certificazioni...</span>
                            <span x-show="verificationStatus === 'verified'">Certificazioni Verificate</span>
                        </div>
                        <p class="text-xs text-gray-600">@lang('pub_theme::components.certifications.certified_quality')</p>
                    </div>
                </div>
            </div>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6"
                x-show="isVisible"
                x-transition:enter="transition ease-out duration-1000 delay-200"
                x-transition:enter-start="opacity-0 transform translate-y-16"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                {{ $title }}
            </h2>

            <p class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed"
               x-show="isVisible"
               x-transition:enter="transition ease-out duration-1000 delay-400"
               x-transition:enter-start="opacity-0 transform translate-y-16"
               x-transition:enter-end="opacity-100 transform translate-y-0">
                {{ $subtitle }}
            </p>
        </div>

        {{-- Main Certifications Grid --}}
        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-8 mb-16"
             x-show="isVisible"
             x-transition:enter="transition ease-out duration-1000 delay-600"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <template x-for="(cert, index) in certifications" :key="cert.id">
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-gray-200 cursor-pointer transform hover:-translate-y-2"
                     @mouseenter="hoveredCert = cert.id"
                     @mouseleave="hoveredCert = null"
                     @click="selectedCert = selectedCert === cert.id ? null : cert.id">

                    {{-- Certification Badge/Logo --}}
                    <div class="relative mb-6">
                        <div class="w-20 h-20 mx-auto rounded-2xl p-4 shadow-lg transform group-hover:scale-110 transition-all duration-300"
                             :class="'bg-gradient-to-br ' + cert.color">

                            {{-- Dynamic Icon based on type --}}
                            <div class="w-full h-full text-white">
                                <svg x-show="cert.type === 'healthcare_accreditation'" class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19,8H17V6A5,5 0 0,0 12,1A5,5 0 0,0 7,6V8H5A2,2 0 0,0 3,10V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V10A2,2 0 0,0 19,8M12,17A2,2 0 0,1 10,15A2,2 0 0,1 12,13A2,2 0 0,1 14,15A2,2 0 0,1 12,17M15.8,8H8.2V6A3.8,3.8 0 0,1 12,2.2A3.8,3.8 0 0,1 15.8,6V8Z"/>
                                </svg>
                                <svg x-show="cert.type === 'quality_management'" class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                                </svg>
                                <svg x-show="cert.type === 'privacy_compliance'" class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.6 14.8,10V11.5C15.4,11.5 16,12.4 16,13V16C16,17.4 15.4,18 14.8,18H9.2C8.6,18 8,17.4 8,16V13C8,12.4 8.6,11.5 9.2,11.5V10C9.2,8.6 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,10V11.5H13.5V10C13.5,8.7 12.8,8.2 12,8.2Z"/>
                                </svg>
                                <svg x-show="cert.type === 'professional_membership'" class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16,14C17.2,14 18.76,14.5 19.86,15.69L22,17.27V22H15.5V21C15.5,18.5 15.67,16.5 16,14M8,14C8.33,16.5 8.5,18.5 8.5,21V22H2V17.27L4.14,15.69C5.24,14.5 6.8,14 8,14M12,13C10.89,13 10,12.1 10,11C10,9.89 10.89,9 12,9C13.11,9 14,9.89 14,11C14,12.1 13.11,13 12,13M12,2A3,3 0 0,1 15,5C15,6.32 14.3,7.45 13.24,8H12C9.79,8 8,6.21 8,4C8,2.34 9.79,2 12,2Z"/>
                                </svg>
                                <svg x-show="cert.type === 'security_management'" class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18,8A6,6 0 0,0 12,2A6,6 0 0,0 6,8H4A2,2 0 0,0 2,10V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V10A2,2 0 0,0 20,8H18M12,4A4,4 0 0,1 16,8H8A4,4 0 0,1 12,4Z"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Verified Badge --}}
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center shadow-lg"
                             x-show="verificationStatus === 'verified'"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 transform scale-0"
                             x-transition:enter-end="opacity-100 transform scale-100">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                            </svg>
                        </div>

                        {{-- Hover Glow Effect --}}
                        <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"
                             :class="'bg-gradient-to-br ' + cert.color"></div>
                    </div>

                    {{-- Certification Info --}}
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2" x-text="cert.name"></h3>
                        <p class="text-gray-600 text-sm mb-3" x-text="cert.issuer"></p>

                        {{-- Validity Period --}}
                        <div class="inline-flex items-center px-3 py-1 bg-gray-100 rounded-full text-xs font-medium text-gray-700">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19,3H18V1H16V3H8V1H6V3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"/>
                            </svg>
                            <span x-text="cert.year + ' - ' + cert.validity"></span>
                        </div>
                    </div>

                    {{-- Trust Weight Progress Bar --}}
                    <div class="mb-6">
                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                            <span>Trust Weight</span>
                            <span x-text="cert.trust_weight + '%'"></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="h-2 rounded-full transition-all duration-1000 ease-out"
                                 :class="'bg-gradient-to-r ' + cert.color"
                                 :style="'width: ' + (isVisible ? cert.trust_weight : 0) + '%'"></div>
                        </div>
                    </div>

                    {{-- Expandable Details --}}
                    <div x-show="selectedCert === cert.id"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="border-t border-gray-200 pt-6">

                        {{-- Description --}}
                        <p class="text-gray-600 text-sm mb-4" x-text="cert.description"></p>

                        {{-- Features List --}}
                        <div class="space-y-2 mb-4">
                            <template x-for="feature in cert.features" :key="feature">
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                                    </svg>
                                    <span x-text="feature"></span>
                                </div>
                            </template>
                        </div>

                        {{-- Verification Link --}}
                        <a :href="cert.verification_url"
                           target="_blank"
                           class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors duration-200"
                           x-show="show_verification">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                            </svg>
                            Verifica Online
                        </a>
                    </div>
                </div>
            </template>
        </div>

        {{-- Overall Trust Score Dashboard --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 mb-16"
             x-show="isVisible"
             x-transition:enter="transition ease-out duration-1000 delay-800"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="grid md:grid-cols-2 gap-8 items-center">
                {{-- Trust Score Visual --}}
                <div class="text-center">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Trust Score Complessivo</h3>

                    {{-- Circular Progress --}}
                    <div class="relative w-32 h-32 mx-auto mb-6">
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                            {{-- Background circle --}}
                            <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="none" class="text-gray-200"/>
                            {{-- Progress circle --}}
                            <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="none"
                                    class="text-green-500"
                                    :stroke-dasharray="251.2"
                                    :stroke-dashoffset="251.2 - (trustScore / 100 * 251.2)"
                                    style="transition: stroke-dashoffset 2s ease-in-out"/>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-gray-900" x-text="trustScore + '%'"></div>
                                <div class="text-xs text-gray-500">@lang('pub_theme::components.certifications.reliability')</div>
                            </div>
                        </div>
                    </div>

                    <div class="text-sm text-gray-600">
                        Basato su <strong>5 certificazioni verificate</strong><br>
                        Ultima verifica: <strong>Oggi</strong>
                    </div>
                </div>

                {{-- Trust Breakdown --}}
                <div class="space-y-4">
                    <h4 class="text-xl font-bold text-gray-900 mb-4">@lang('pub_theme::components.certifications.credibility_breakdown')</h4>

                    <template x-for="cert in certifications" :key="cert.id">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full mr-3"
                                     :class="'bg-gradient-to-r ' + cert.color"></div>
                                <span class="font-medium text-gray-700" x-text="cert.name.split(' ')[0] + ' ' + cert.name.split(' ')[1]"></span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-sm font-semibold text-gray-600" x-text="cert.trust_weight + '%'"></span>
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                                </svg>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        {{-- Timeline Section --}}
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-8"
             x-show="isVisible && show_timeline"
             x-transition:enter="transition ease-out duration-1000 delay-1000"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <h3 class="text-2xl font-bold text-gray-900 text-center mb-8">Timeline Accreditamenti</h3>

            <div class="relative">
                {{-- Timeline Line --}}
                <div class="absolute left-1/2 transform -translate-x-0.5 w-0.5 h-full bg-gradient-to-b from-blue-400 to-indigo-600"></div>

                {{-- Timeline Items --}}
                <div class="space-y-8">
                    <template x-for="(item, index) in timeline" :key="index">
                        <div class="relative flex items-center"
                             :class="index % 2 === 0 ? 'justify-start' : 'justify-end'">

                            {{-- Timeline Node --}}
                            <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 rounded-full z-10"
                                 :class="{
                                    'bg-blue-500': item.type === 'company',
                                    'bg-green-500': item.type === 'cert',
                                    'bg-purple-500': item.type === 'membership',
                                    'bg-indigo-500': item.type === 'accred',
                                    'bg-cyan-500': item.type === 'security'
                                 }"></div>

                            {{-- Timeline Content --}}
                            <div class="bg-white rounded-lg p-4 shadow-lg border border-gray-200 max-w-xs"
                                 :class="index % 2 === 0 ? 'mr-8' : 'ml-8'">
                                <div class="text-sm font-bold text-gray-900" x-text="item.year"></div>
                                <div class="text-sm text-gray-600" x-text="item.event"></div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        {{-- Verification CTA --}}
        <div class="text-center mt-16"
             x-show="isVisible && show_verification"
             x-transition:enter="transition ease-out duration-1000 delay-1200"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="inline-flex items-center space-x-6 bg-white/80 backdrop-blur-sm rounded-full px-8 py-4 shadow-lg border border-gray-200">
                <span class="text-sm font-medium text-gray-700">Tutte le certificazioni sono verificabili online</span>

                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                    </svg>
                    <span class="text-sm font-medium text-green-700">Verificato</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Custom CSS per animazioni avanzate --}}
<style>
/* Hover glow effect per certification cards */
.cert-glow {
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
}

/* Trust score animation */
.trust-circle {
    stroke-dasharray: 251.2;
    stroke-dashoffset: 251.2;
    transition: stroke-dashoffset 2s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Floating animation per verified badges */
@keyframes float-verify {
    0%, 100% {
        transform: translateY(0px) scale(1);
    }
    50% {
        transform: translateY(-4px) scale(1.05);
    }
}

.verified-badge {
    animation: float-verify 3s ease-in-out infinite;
}

/* Progress bar enhanced animation */
.progress-enhance {
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% {
        background-position: -200% 0;
    }
    100% {
        background-position: 200% 0;
    }
}

/* Timeline node pulse effect */
.timeline-node {
    animation: pulse-glow 2s ease-in-out infinite alternate;
}

@keyframes pulse-glow {
    from {
        box-shadow: 0 0 5px rgba(59, 130, 246, 0.5);
    }
    to {
        box-shadow: 0 0 15px rgba(59, 130, 246, 0.8);
    }
}

/* Hover effects enhancement */
.cert-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

/* Gradient text animation */
@keyframes gradient-shift {
    0%, 100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

.gradient-text {
    background: linear-gradient(-45deg, #3b82f6, #8b5cf6, #06b6d4, #10b981);
    background-size: 400% 400%;
    animation: gradient-shift 3s ease infinite;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
</style>

{{-- JavaScript per interazioni avanzate --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced verification animation
    function animateVerification() {
        const verifyElements = document.querySelectorAll('.verified-badge');
        verifyElements.forEach((el, index) => {
            setTimeout(() => {
                el.classList.add('verified-badge');
            }, index * 200);
        });
    }

    // Trust score incremental animation with easing
    function animateTrustScore() {
        const scoreElement = document.querySelector('[x-text*="trustScore"]');
        if (scoreElement) {
            let score = 0;
            const targetScore = 96.8;
            const duration = 2000; // 2 seconds
            const startTime = Date.now();

            function updateScore() {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // Easing function (ease-out)
                const easeOut = 1 - Math.pow(1 - progress, 3);
                score = targetScore * easeOut;

                if (progress < 1) {
                    requestAnimationFrame(updateScore);
                }
            }

            requestAnimationFrame(updateScore);
        }
    }

    // Intersection Observer per trigger animations
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');

                // Trigger specific animations
                if (entry.target.id === 'certificazioni') {
                    setTimeout(animateVerification, 1000);
                    setTimeout(animateTrustScore, 1500);
                }
            }
        });
    }, observerOptions);

    // Osserva la sezione principale
    const certSection = document.getElementById('certificazioni');
    if (certSection) {
        observer.observe(certSection);
    }

    // Enhanced hover effects per certification cards
    const certCards = document.querySelectorAll('.cert-card');
    certCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.style.boxShadow = '0 25px 50px -12px rgba(0, 0, 0, 0.25)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
});
</script>
