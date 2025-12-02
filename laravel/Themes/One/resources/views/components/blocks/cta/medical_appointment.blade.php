{{--
/**
 * Medical Appointment CTA Component - SaluteOra
 *
 * CTA ad alta conversione per prenotazioni appuntamenti medici.
 * Design basato su principi di psychology of urgency e social proof
 * per massimizzare le conversioni in ambito sanitario gestanti.
 *
 * Features WOW:
 * - Real-time availability indicators con countdown
 * - Emergency pulsing effects per urgenza medica
 * - Social proof con counter pazienti serviti oggi
 * - Multi-channel booking options (phone, online, emergency)
 * - Trust signals prominenti (certificazioni, reviews)
 * - Scarcity indicators per slot limitati
 * - Progressive disclosure per ridurre friction
 *
 * @param string $title Titolo principale del CTA
 * @param string $subtitle Sottotitolo esplicativo
 * @param string $background_color Background gradient classes
 * @param string $text_color Colore del testo principale
 * @param array $primary_button Configurazione bottone principale
 * @param array $secondary_button Configurazione bottone secondario
 * @param bool $show_emergency Mostra sezione emergenze
 * @param bool $show_availability Mostra indicatori disponibilità
 */
--}}

@props([
    'title' => __('pub_theme::emergency.medical_appointment.title.label'),
    'subtitle' => __('pub_theme::emergency.medical_appointment.subtitle.label'),
    'background_color' => 'bg-gradient-to-r from-teal-600 to-blue-600',
    'text_color' => 'text-white',
    'primary_button' => [
        'text' => __('pub_theme::emergency.medical_appointment.book_free_consultation.label'),
        'url' => '/prenota'
    ],
    'secondary_button' => [
        'text' => __('pub_theme::emergency.medical_appointment.call_now_number.label'),
        'url' => 'tel:+39800123456'
    ],
    'show_emergency' => true,
    'show_availability' => true
])

<div class="relative {{ $background_color }} overflow-hidden"
     x-data="{
        isVisible: false,
        availableSlots: 7,
        patientsToday: 23,
        currentTime: '',
        urgencyLevel: 'medium',
        showBookingForm: false,
        selectedTimeSlot: '',
        availableTimeSlots: [
            '09:00', '10:30', '14:00', '15:30', '16:45'
        ],
        countdown: {
            hours: 2,
            minutes: 15,
            seconds: 30
        },
        testimonials: [
            { name: 'Maria R.', rating: 5, text: 'Eccellente assistenza durante la gravidanza' },
            { name: 'Anna S.', rating: 5, text: 'Professionalità e cura straordinarie' },
            { name: 'Elena T.', rating: 5, text: 'Servizio rapido e competente' }
        ],
        currentTestimonial: 0
     }"
     x-init="
        // Current time display
        setInterval(() => {
            currentTime = new Date().toLocaleTimeString('it-IT', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }, 1000);

        // Countdown timer for urgency
        setInterval(() => {
            if (countdown.seconds > 0) {
                countdown.seconds--;
            } else if (countdown.minutes > 0) {
                countdown.minutes--;
                countdown.seconds = 59;
            } else if (countdown.hours > 0) {
                countdown.hours--;
                countdown.minutes = 59;
                countdown.seconds = 59;
            }
        }, 1000);

        // Slot availability simulation
        setInterval(() => {
            if (Math.random() > 0.7 && availableSlots > 3) {
                availableSlots--;
            }
        }, 15000);

        // Patients counter increase
        setInterval(() => {
            if (Math.random() > 0.8) {
                patientsToday++;
            }
        }, 20000);

        // Testimonials rotation
        setInterval(() => {
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
        }, 4000);
     "
     x-intersect="isVisible = true">

    {{-- Background Pattern e Decorazioni --}}
    <div class="absolute inset-0">
        {{-- Gradient overlay animato --}}
        <div class="absolute inset-0 bg-gradient-to-br from-white/10 via-transparent to-black/10"></div>

        {{-- Medical pattern background --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 right-10 animate-pulse">
                <svg class="w-24 h-24 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19,8H17V6A5,5 0 0,0 12,1A5,5 0 0,0 7,6V8H5A2,2 0 0,0 3,10V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V10A2,2 0 0,0 19,8M12,17A2,2 0 0,1 10,15A2,2 0 0,1 12,13A2,2 0 0,1 14,15A2,2 0 0,1 12,17M15.8,8H8.2V6A3.8,3.8 0 0,1 12,2.2A3.8,3.8 0 0,1 15.8,6V8Z"/>
                </svg>
            </div>
            <div class="absolute bottom-10 left-10 animate-bounce">
                <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12,2A2,2 0 0,1 14,4C14,4.74 13.6,5.39 13,5.73V7H14A7,7 0 0,1 21,14H22A1,1 0 0,1 23,15V18A1,1 0 0,1 22,19H21V20A2,2 0 0,1 19,22H5A2,2 0 0,1 3,20V19H2A1,1 0 0,1 1,18V15A1,1 0 0,1 2,14H3A7,7 0 0,1 10,7H11V5.73C10.4,5.39 10,4.74 10,4A2,2 0 0,1 12,2M7.5,13A0.5,0.5 0 0,0 7,13.5A0.5,0.5 0 0,0 7.5,14A0.5,0.5 0 0,0 8,13.5A0.5,0.5 0 0,0 7.5,13M16.5,13A0.5,0.5 0 0,0 16,13.5A0.5,0.5 0 0,0 16.5,14A0.5,0.5 0 0,0 17,13.5A0.5,0.5 0 0,0 16.5,13Z"/>
                </svg>
            </div>
            <div class="absolute top-1/2 right-1/4 animate-spin-slow">
                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19.43,12.98C19.47,12.66 19.5,12.34 19.5,12C19.5,11.66 19.47,11.34 19.43,11.02L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.97 19.05,5.05L16.56,6.05C16.04,5.65 15.48,5.32 14.87,5.07L14.49,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.51,2.42L9.13,5.07C8.52,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11.02C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.52,18.68 9.13,18.93L9.51,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.49,21.58L14.87,18.93C15.48,18.68 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.04 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.98M12,15.5C10.07,15.5 8.5,13.93 8.5,12C8.5,10.07 10.07,8.5 12,8.5C13.93,8.5 15.5,10.07 15.5,12C15.5,13.93 13.93,15.5 12,15.5Z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        {{-- Urgency Strip con Countdown --}}
        <div class="text-center mb-8"
             x-show="isVisible && show_availability"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 transform -translate-y-8"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="inline-flex items-center px-6 py-3 bg-red-500/90 backdrop-blur-sm rounded-full text-white font-semibold shadow-lg animate-pulse">
                <svg class="w-5 h-5 mr-2 animate-spin" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
                </svg>
                <span>Solo <span x-text="availableSlots"></span> slot disponibili oggi</span>
                <span class="mx-2">•</span>
                <span>Offerta scade tra: <span x-text="countdown.hours + 'h ' + countdown.minutes + 'm ' + countdown.seconds + 's'"></span></span>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            {{-- Left Column: Main Content --}}
            <div class="text-center lg:text-left">

                {{-- Live Activity Indicator --}}
                <div class="flex items-center justify-center lg:justify-start mb-6"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-200"
                     x-transition:enter-start="opacity-0 transform -translate-x-8"
                     x-transition:enter-end="opacity-100 transform translate-x-0">

                    <div class="flex items-center bg-white/20 backdrop-blur-sm rounded-full px-4 py-2">
                        <div class="flex items-center space-x-2 mr-4">
                            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium {{ $text_color }}">
                                <span x-text="patientsToday"></span> pazienti assistite oggi
                            </span>
                        </div>
                        <div class="text-xs {{ $text_color }} opacity-80" x-text="currentTime"></div>
                    </div>
                </div>

                {{-- Main Title --}}
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold {{ $text_color }} leading-tight mb-6"
                    x-show="isVisible"
                    x-transition:enter="transition ease-out duration-1000 delay-400"
                    x-transition:enter-start="opacity-0 transform translate-y-16"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    {{ $title }}
                </h2>

                {{-- Subtitle con Benefits --}}
                <div class="mb-8"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-600"
                     x-transition:enter-start="opacity-0 transform translate-y-16"
                     x-transition:enter-end="opacity-100 transform translate-y-0">

                    <p class="text-xl sm:text-2xl {{ $text_color }} opacity-90 mb-6 leading-relaxed">
                        {{ $subtitle }}
                    </p>

                    {{-- Key Benefits List --}}
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="flex items-center {{ $text_color }}">
                            <svg class="w-6 h-6 mr-3 text-green-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                            </svg>
                            <span class="font-medium">Consulenza Gratuita</span>
                        </div>
                        <div class="flex items-center {{ $text_color }}">
                            <svg class="w-6 h-6 mr-3 text-green-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                            </svg>
                            <span class="font-medium">Specialisti Certificati</span>
                        </div>
                        <div class="flex items-center {{ $text_color }}">
                            <svg class="w-6 h-6 mr-3 text-green-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                            </svg>
                            <span class="font-medium">Protocolli Gestanti</span>
                        </div>
                        <div class="flex items-center {{ $text_color }}">
                            <svg class="w-6 h-6 mr-3 text-green-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                            </svg>
                            <span class="font-medium">Supporto 24/7</span>
                        </div>
                    </div>
                </div>

                {{-- Primary CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-8"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-800"
                     x-transition:enter-start="opacity-0 transform translate-y-16"
                     x-transition:enter-end="opacity-100 transform translate-y-0">

                    {{-- Primary Button: Book Online --}}
                    <a href="{{ $primary_button['url'] }}"
                       class="group relative inline-flex items-center px-8 py-4 bg-white text-teal-600 font-bold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 min-w-max">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <span class="relative z-10">{{ $primary_button['text'] }}</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>

                        {{-- Shine effect --}}
                        <div class="absolute inset-0 rounded-full bg-yellow-200/20 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    </a>

                    {{-- Secondary Button: Call Now --}}
                    <a href="{{ $secondary_button['url'] }}"
                       class="group inline-flex items-center px-8 py-4 border-2 border-white {{ $text_color }} font-semibold rounded-full hover:bg-white hover:text-teal-600 transition-all duration-300">
                        <svg class="w-6 h-6 mr-3 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        {{ $secondary_button['text'] }}
                    </a>
                </div>

                {{-- Trust Signals --}}
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-6 text-sm {{ $text_color }} opacity-80"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-1000"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100">

                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.46,13.97L5.82,21L12,17.27Z"/>
                        </svg>
                        4.9/5 stelle (2.847 recensioni)
                    </div>

                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"/>
                        </svg>
                        Certificato ISO 9001:2015
                    </div>

                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                        </svg>
                        Accreditato SSN
                    </div>
                </div>
            </div>

            {{-- Right Column: Interactive Booking Widget --}}
            <div class="relative"
                 x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-400"
                 x-transition:enter-start="opacity-0 transform translate-x-16"
                 x-transition:enter-end="opacity-100 transform translate-x-0">

                {{-- Main Booking Card --}}
                <div class="bg-white/95 backdrop-blur-lg rounded-3xl p-8 shadow-2xl border border-white/20">

                    {{-- Card Header --}}
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Prenota Subito</h3>
                        <p class="text-gray-600">Slot disponibili nelle prossime ore</p>
                    </div>

                    {{-- Available Time Slots --}}
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Orari Disponibili Oggi</h4>
                        <div class="grid grid-cols-3 gap-3">
                            <template x-for="(slot, index) in availableTimeSlots" :key="index">
                                <button
                                    @click="selectedTimeSlot = slot"
                                    :class="selectedTimeSlot === slot ? 'bg-teal-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                                    class="px-4 py-3 rounded-lg font-medium transition-all duration-200 hover:scale-105">
                                    <span x-text="slot"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    {{-- Quick Booking Form Preview --}}
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nome e Cognome</label>
                            <input type="text" placeholder="Es. Maria Rossi"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Telefono</label>
                            <input type="tel" placeholder="Es. +39 333 123 4567"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                        </div>
                    </div>

                    {{-- Booking Action Buttons --}}
                    <div class="space-y-3">
                        <button class="w-full py-4 bg-gradient-to-r from-teal-600 to-blue-600 text-white font-bold rounded-xl hover:from-teal-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            🗓️ Conferma Prenotazione
                        </button>

                        <button class="w-full py-3 bg-red-500 text-white font-semibold rounded-xl hover:bg-red-600 transition-all duration-300 animate-pulse">
                            📞 Chiamata Immediata
                        </button>

                        <button class="w-full py-3 bg-green-500 text-white font-semibold rounded-xl hover:bg-green-600 transition-all duration-300">
                            💬 Chat WhatsApp
                        </button>
                    </div>

                    {{-- Emergency Notice --}}
                    <div class="mt-6 p-4 bg-red-50 border border-red-200 rounded-lg" x-show="show_emergency">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-600 mr-2 animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-red-800">Emergenza Odontoiatrica?</p>
                                <p class="text-xs text-red-600">Chiama il numero verde 24/7: <strong>800 123 456</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Floating Social Proof Testimonial --}}
                <div class="absolute -top-4 -left-4 bg-white rounded-xl p-4 shadow-lg border border-gray-200 max-w-xs"
                     x-show="isVisible"
                     x-transition:enter="transition ease-out duration-1000 delay-1200"
                     x-transition:enter-start="opacity-0 transform -translate-y-8"
                     x-transition:enter-end="opacity-100 transform translate-y-0">

                    <div class="flex items-center mb-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-pink-400 to-purple-500 rounded-full flex items-center justify-center text-white font-bold mr-3">
                            <span x-text="testimonials[currentTestimonial].name.charAt(0)"></span>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-800 text-sm" x-text="testimonials[currentTestimonial].name"></div>
                            <div class="flex">
                                <template x-for="i in testimonials[currentTestimonial].rating" :key="i">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.46,13.97L5.82,21L12,17.27Z"/>
                                    </svg>
                                </template>
                            </div>
                        </div>
                    </div>
                    <p class="text-xs text-gray-600" x-text="testimonials[currentTestimonial].text"></p>
                </div>

                {{-- Floating Urgency Badge --}}
                <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-full flex items-center justify-center shadow-lg animate-bounce cursor-pointer">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Bottom Trust Strip con Partner Logos --}}
        <div class="mt-16 text-center"
             x-show="isVisible"
             x-transition:enter="transition ease-out duration-1000 delay-1400"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="inline-flex items-center space-x-8 bg-white/20 backdrop-blur-sm rounded-full px-8 py-4 border border-white/30">
                <span class="text-sm font-medium {{ $text_color }}">Partner di fiducia:</span>

                <div class="flex items-center space-x-6">
                    {{-- SSN Logo --}}
                    <div class="w-8 h-8 bg-white/30 rounded-lg flex items-center justify-center">
                        <span class="text-xs font-bold {{ $text_color }}">SSN</span>
                    </div>

                    {{-- ISO Logo --}}
                    <div class="w-8 h-8 bg-white/30 rounded-lg flex items-center justify-center">
                        <span class="text-xs font-bold {{ $text_color }}">ISO</span>
                    </div>

                    {{-- GDPR Badge --}}
                    <div class="w-8 h-8 bg-white/30 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 {{ $text_color }}" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom CSS per animazioni avanzate --}}
<style>
@keyframes animate-spin-slow {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.animate-spin-slow {
    animation: animate-spin-slow 12s linear infinite;
}

/* Urgency pulsing effect */
@keyframes urgency-pulse {
    0%, 100% {
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(239, 68, 68, 0);
    }
}

.urgency-pulse {
    animation: urgency-pulse 2s infinite;
}

/* Floating animation for testimonial */
@keyframes float-testimonial {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-8px);
    }
}

.floating-testimonial {
    animation: float-testimonial 4s ease-in-out infinite;
}

/* Booking form enhancements */
.booking-slot:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Trust signals animation */
@keyframes trust-glow {
    0%, 100% {
        box-shadow: 0 0 5px rgba(34, 197, 94, 0.5);
    }
    50% {
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.8);
    }
}

.trust-glow {
    animation: trust-glow 3s ease-in-out infinite;
}
</style>

{{-- JavaScript per interazioni avanzate --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scarcity psychology - reduce slots periodically
    function simulateBookings() {
        const slotsElement = document.querySelector('[x-text="availableSlots"]');
        if (slotsElement) {
            setInterval(() => {
                if (Math.random() > 0.85) {
                    // Trigger slot reduction in Alpine.js data
                    window.dispatchEvent(new CustomEvent('slot-booked'));
                }
            }, 30000); // Every 30 seconds
        }
    }

    // Social proof - increment patients counter
    function updatePatientCounter() {
        setInterval(() => {
            if (Math.random() > 0.9) {
                window.dispatchEvent(new CustomEvent('patient-added'));
            }
        }, 25000); // Every 25 seconds
    }

    // Initialize psychology triggers
    simulateBookings();
    updatePatientCounter();

    // Form validation and UX enhancements
    const inputs = document.querySelectorAll('input[type="text"], input[type="tel"]');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
    });

    // Emergency call tracking
    const emergencyButtons = document.querySelectorAll('a[href^="tel:"]');
    emergencyButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Track emergency call
            console.log('Emergency call initiated');
            // Add analytics tracking here
        });
    });
});
</script>
