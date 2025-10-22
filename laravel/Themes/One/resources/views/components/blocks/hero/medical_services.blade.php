{{--
/**
 * Hero Component per Servizi Medici SaluteOra
 *
 * Componente hero specializzato che comunica:
 * - Missione sociale del progetto
 * - Umanità e professionalità medica
 * - Accessibilità dei servizi
 * - Trust istituzionale
 *
 * @param string $title - Titolo principale emotivo
 * @param string $subtitle - Sottotitolo esplicativo con requisiti
 * @param string $background_image - Immagine di sfondo (gestante sorridente)
 * @param string $cta_text - Testo CTA primaria (azione)
 * @param string $cta_link - Link CTA primaria
 * @param string $secondary_cta_text - Testo CTA secondaria (scoperta)
 * @param string $secondary_cta_link - Link CTA secondaria
 * @param string $overlay - Tipo di overlay per leggibilità
 * @param array $medical_badge - Badge di certificazione medica
 */
--}}

@props([
    'title' => 'I Nostri Servizi per Te e il Tuo Bambino',
    'subtitle' => 'Cure odontoiatriche gratuite e di qualità per gestanti con ISEE fino a 20.000€',
    'background_image' => '/images/pregnant-woman-dental-care.jpg',
    'cta_text' => 'Verifica se hai diritto',
    'cta_link' => 'register',
    'secondary_cta_text' => 'Scopri tutti i servizi',
    'secondary_cta_link' => '#servizi-completi',
    'overlay' => 'gradient-medical',
    'medical_badge' => []
])

<section class="relative min-h-screen lg:min-h-[80vh] flex items-center overflow-hidden">
    {{-- Background Image con overlay medico --}}
    <div class="absolute inset-0 z-0">
        <img
            src="{{ $background_image }}"
            alt="Gestante sorridente durante visita odontoiatrica"
            class="w-full h-full object-cover object-center"
            loading="eager"
        >

        {{-- Overlay gradiente per leggibilità --}}
        @if($overlay === 'gradient-medical')
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 via-blue-800/70 to-blue-600/60"></div>
        @else
            <div class="absolute inset-0 bg-black/50"></div>
        @endif
    </div>

    {{-- Contenuto principale --}}
    <div class="relative z-10 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="max-w-4xl">

                {{-- Badge Certificazione Medica --}}
                @if(!empty($medical_badge))
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full mb-6 border border-white/30">
                    @if(isset($medical_badge['icon']))
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    @endif
                    <span class="text-sm font-medium">{{ $medical_badge['text'] ?? 'Servizi Certificati' }}</span>
                </div>
                @endif

                {{-- Titolo principale con impatto emotivo --}}
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    <span class="block">{{ $title }}</span>
                </h1>

                {{-- Sottotitolo esplicativo --}}
                <p class="text-xl md:text-2xl text-blue-100 leading-relaxed mb-8 max-w-3xl">
                    {{ $subtitle }}
                </p>

                {{-- Punti chiave visivi --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
                    <div class="flex items-center gap-3 text-white">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="font-medium">Completamente Gratuito</span>
                    </div>

                    <div class="flex items-center gap-3 text-white">
                        <div class="w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <span class="font-medium">Sicuro per Mamma e Bambino</span>
                    </div>

                    <div class="flex items-center gap-3 text-white">
                        <div class="w-8 h-8 bg-blue-400 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="font-medium">Rete Nazionale</span>
                    </div>
                </div>

                {{-- Call to Action Doppie --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    {{-- CTA Primaria - Azione diretta --}}
                    <a
                        href="{{ $cta_link === 'register' ? route('register') : $cta_link }}"
                        class="inline-flex items-center justify-center px-8 py-4 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 group"
                        aria-label="Verifica se hai diritto ai servizi gratuiti"
                    >
                        <span>{{ $cta_text }}</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>

                    {{-- CTA Secondaria - Esplorazione --}}
                    <a
                        href="{{ $secondary_cta_link }}"
                        class="inline-flex items-center justify-center px-8 py-4 bg-white/20 hover:bg-white/30 text-white font-semibold rounded-lg border-2 border-white/50 hover:border-white backdrop-blur-sm transition-all duration-200"
                        aria-label="Scopri tutti i servizi disponibili"
                    >
                        <span>{{ $secondary_cta_text }}</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>

                {{-- Informazioni di contatto urgenze --}}
                <div class="mt-8 p-4 bg-red-600/90 backdrop-blur-sm rounded-lg border border-red-400/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="text-white">
                            <p class="font-semibold">Urgenza Dentale?</p>
                            <p class="text-sm text-red-100">Chiama subito: <a href="tel:800123456" class="font-bold hover:underline">800-123-456</a> (24/7)</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
        <div class="flex flex-col items-center text-white animate-bounce">
            <span class="text-sm mb-2 hidden md:block">Scopri i servizi</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

{{-- Schema.org structured data per SEO --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "MedicalOrganization",
    "name": "SaluteOra",
    "description": "Servizi odontoiatrici gratuiti per gestanti con ISEE fino a 20.000€",
    "medicalSpecialty": "Odontoiatria Materno-Infantile",
    "availableService": {
        "@type": "MedicalService",
        "name": "Cure Odontoiatriche per Gestanti",
        "description": "Servizi odontoiatrici completi e gratuiti per donne in gravidanza",
        "provider": {
            "@type": "MedicalOrganization",
            "name": "SaluteOra"
        }
    },
    "areaServed": {
        "@type": "Country",
        "name": "Italia"
    }
}
</script>
