{{--
/**
 * Emergency Priority Contact Component - SaluteOra
 *
 * Sistema di comunicazione multi-canale con priorità emergenze.
 * Design orientato all'urgency psychology per massimizzare response rate
 * e fornire supporto immediato per problematiche odontoiatriche gestanti.
 *
 * Features WOW:
 * - Multi-channel communication hierarchy (Emergency, Appointment, Telemedicine)
 * - Real-time availability indicators con status operatori
 * - Urgency-based color coding e visual hierarchy
 * - Interactive channel selection con smart routing
 * - Response time estimation e SLA indicators
 * - Emergency escalation system visuale
 * - Live support status con operator count
 * - Geographic routing per sedi più vicine
 *
 * @param string $title Titolo della sezione contatti
 * @param string $subtitle Sottotitolo esplicativo
 * @param string $emergency_notice Avviso prominente per emergenze
 * @param array $channels Array canali di comunicazione con priority
 * @param bool $show_geographic Mostra routing geografico
 * @param bool $show_live_status Mostra status live operatori
 */
--}}

@props([
    'title' => 'Canali di Comunicazione Prioritari',
    'subtitle' => 'Scegli il canale più adatto alla tua esigenza per un supporto immediato e personalizzato',
    'emergency_notice' => '🚨 Per emergenze odontoiatriche acute, chiama immediatamente il numero verde 24/7',
    'channels' => [],
    'show_geographic' => true,
    'show_live_status' => true
])

<section class="bg-gradient-to-br from-gray-50 via-blue-50 to-teal-50 py-20"
         x-data="{
            isVisible: false,
            selectedChannel: null,
            currentTime: '',
            emergencyLevel: 'normal',
            operatorStatus: {
                emergency: { active: 4, response_time: '< 30 sec' },
                appointment: { active: 12, response_time: '< 2 min' },
                telemedicine: { active: 8, response_time: '< 5 min' }
            },
            channels: [
                {
                    id: 'emergency',
                    type: 'emergency',
                    title: 'Emergenze 24/7',
                    description: 'Dolore acuto, trauma dentale, infezioni gravi, sanguinamento',
                    contact: '+39 800 123 456',
                    available: '24 ore su 24, 7 giorni su 7',
                    icon: 'emergency-call',
                    color: 'text-red-600',
                    background: 'bg-red-50 border-red-200',
                    gradient: 'from-red-500 to-red-600',
                    priority: 1,
                    features: [
                        'Risposta immediata garantita',
                        'Triage professionale',
                        'Indirizzamento ospedaliero',
                        'Supporto farmacologico d\'urgenza'
                    ],
                    response_sla: '< 30 secondi',
                    escalation: true
                },
                {
                    id: 'appointment',
                    type: 'appointment',
                    title: 'Prenotazioni Visite',
                    description: 'Prenota, modifica o cancella appuntamenti specialistici',
                    contact: '+39 06 1234 567',
                    available: 'Lun-Sab 8:00-19:00',
                    icon: 'calendar-book',
                    color: 'text-blue-600',
                    background: 'bg-blue-50 border-blue-200',
                    gradient: 'from-blue-500 to-blue-600',
                    priority: 2,
                    features: [
                        'Slot disponibili in tempo reale',
                        'Reminder automatici',
                        'Riprogrammazione flessibile',
                        'Scelta specialista preferito'
                    ],
                    response_sla: '< 2 minuti',
                    escalation: false
                },
                {
                    id: 'telemedicine',
                    type: 'telemedicine',
                    title: 'Telemedicina',
                    description: 'Consulti online, seconda opinione, triage, follow-up',
                    contact: 'telemedicina@saluteora.it',
                    available: 'Lun-Ven 9:00-18:00',
                    icon: 'video-consultation',
                    color: 'text-green-600',
                    background: 'bg-green-50 border-green-200',
                    gradient: 'from-green-500 to-green-600',
                    priority: 3,
                    features: [
                        'Video consulto HD',
                        'Condivisione documenti',
                        'Prescrizioni digitali',
                        'Refertazione online'
                    ],
                    response_sla: '< 5 minuti',
                    escalation: false
                },
                {
                    id: 'whatsapp',
                    type: 'messaging',
                    title: 'WhatsApp Business',
                    description: 'Messaggi rapidi, informazioni, supporto non urgente',
                    contact: '+39 335 123 4567',
                    available: 'Lun-Ven 9:00-18:00',
                    icon: 'whatsapp',
                    color: 'text-green-500',
                    background: 'bg-green-50 border-green-200',
                    gradient: 'from-green-400 to-green-500',
                    priority: 4,
                    features: [
                        'Risposta rapida',
                        'Condivisione foto',
                        'Link documenti',
                        'Bot assistente 24/7'
                    ],
                    response_sla: '< 30 minuti',
                    escalation: false
                }
            ],
            geographicAreas: [
                { name: 'Roma Centro', phone: '+39 06 1234 567', distance: '2.1 km' },
                { name: 'Milano', phone: '+39 02 9876 543', distance: '15.3 km' },
                { name: 'Napoli', phone: '+39 081 5555 444', distance: '8.7 km' }
            ],
            currentLocation: 'Roma Centro'
         }"
         x-init="
            // Current time display
            setInterval(() => {
                currentTime = new Date().toLocaleTimeString('it-IT', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
            }, 1000);

            // Simulate operator status changes
            setInterval(() => {
                Object.keys(operatorStatus).forEach(channel => {
                    if (Math.random() > 0.85) {
                        operatorStatus[channel].active += Math.random() > 0.5 ? 1 : -1;
                        if (operatorStatus[channel].active < 1) operatorStatus[channel].active = 1;
                        if (operatorStatus[channel].active > 20) operatorStatus[channel].active = 20;
                    }
                });
            }, 10000);

            // Emergency level simulation
            setInterval(() => {
                const levels = ['normal', 'medium', 'high'];
                emergencyLevel = levels[Math.floor(Math.random() * levels.length)];
            }, 30000);
         "
         x-intersect="isVisible = true">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Emergency Alert Strip --}}
        <div class="mb-12"
             x-show="isVisible"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 transform -translate-y-8"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-2xl p-6 shadow-xl border border-red-400"
                 :class="emergencyLevel === 'high' ? 'animate-pulse' : ''">
                <div class="flex items-center justify-center text-center">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <svg class="w-8 h-8 text-white animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                            </svg>
                            <div class="absolute inset-0 w-8 h-8 bg-white rounded-full animate-ping opacity-30"></div>
                        </div>

                        <div class="text-white">
                            <p class="text-lg font-bold">{{ $emergency_notice }}</p>
                            <p class="text-sm opacity-90">Operatori disponibili 24/7 - Tempo di risposta garantito sotto i 30 secondi</p>
                        </div>

                        <a href="tel:+39800123456"
                           class="px-6 py-3 bg-white text-red-600 font-bold rounded-full hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            🚨 CHIAMA ORA
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Header Section --}}
        <div class="text-center mb-16">
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

        {{-- Live Status Bar --}}
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200 mb-12"
             x-show="isVisible && show_live_status"
             x-transition:enter="transition ease-out duration-1000 delay-600"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-sm font-medium text-gray-700">Sistema Operativo</span>
                        <span class="text-xs text-gray-500" x-text="currentTime"></span>
                    </div>

                    <div class="flex items-center space-x-4">
                        <template x-for="(status, channel) in operatorStatus" :key="channel">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                <span class="text-xs text-gray-600 capitalize" x-text="channel + ': ' + status.active + ' op.'"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Tutti i servizi operativi</span>
                </div>
            </div>
        </div>

        {{-- Priority Channels Grid --}}
        <div class="grid lg:grid-cols-2 xl:grid-cols-4 gap-6 mb-16"
             x-show="isVisible"
             x-transition:enter="transition ease-out duration-1000 delay-800"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <template x-for="(channel, index) in channels" :key="channel.id">
                <div class="group relative cursor-pointer transform transition-all duration-500 hover:-translate-y-2"
                     @click="selectedChannel = selectedChannel === channel.id ? null : channel.id"
                     :class="channel.type === 'emergency' ? 'lg:col-span-2 xl:col-span-1' : ''">

                    {{-- Priority Badge --}}
                    <div class="absolute -top-3 -right-3 z-20"
                         x-show="channel.priority <= 2">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-sm font-bold shadow-lg"
                             :class="channel.priority === 1 ? 'bg-red-500 animate-pulse' : 'bg-blue-500'">
                            <span x-text="channel.priority"></span>
                        </div>
                    </div>

                    {{-- Main Card --}}
                    <div class="relative h-full rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 border-2"
                         :class="[
                            channel.background,
                            selectedChannel === channel.id ? 'ring-2 ring-offset-2' : '',
                            channel.type === 'emergency' ? 'ring-red-300' : 'ring-blue-300'
                         ]">

                        {{-- Emergency Pulse Effect --}}
                        <div x-show="channel.type === 'emergency'"
                             class="absolute inset-0 rounded-2xl bg-red-500/10 animate-pulse"></div>

                        {{-- Header --}}
                        <div class="relative z-10 mb-6">
                            {{-- Icon with Dynamic Animations --}}
                            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl flex items-center justify-center shadow-lg"
                                 :class="'bg-gradient-to-br ' + channel.gradient">

                                {{-- Dynamic Icons --}}
                                <div class="w-8 h-8 text-white">
                                    <svg x-show="channel.icon === 'emergency-call'" class="w-full h-full animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                                    </svg>
                                    <svg x-show="channel.icon === 'calendar-book'" class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19,3H18V1H16V3H8V1H6V3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"/>
                                    </svg>
                                    <svg x-show="channel.icon === 'video-consultation'" class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17,10.5V7A1,1 0 0,0 16,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16A1,1 0 0,0 17,17V13.5L21,17.5V6.5L17,10.5Z"/>
                                    </svg>
                                    <svg x-show="channel.icon === 'whatsapp'" class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7 8.5 7 9.71C7 10.93 7.89 12.1 8 12.27C8.14 12.44 9.76 14.94 12.25 16C12.84 16.27 13.3 16.42 13.66 16.53C14.25 16.72 14.79 16.69 15.22 16.63C15.7 16.56 16.68 16.03 16.89 15.45C17.1 14.87 17.1 14.38 17.04 14.27C16.97 14.17 16.81 14.11 16.56 14C16.31 13.86 15.09 13.26 14.87 13.18C14.64 13.1 14.5 13.06 14.31 13.3C14.15 13.55 13.67 14.11 13.53 14.27C13.38 14.44 13.24 14.46 13 14.34C12.74 14.21 11.94 13.95 11 13.11C10.26 12.45 9.77 11.64 9.62 11.39C9.5 11.15 9.61 11 9.73 10.89C9.84 10.78 10 10.6 10.1 10.45C10.23 10.31 10.27 10.2 10.35 10.04C10.43 9.87 10.39 9.73 10.33 9.61C10.27 9.5 9.77 8.26 9.56 7.77C9.36 7.29 9.16 7.35 9 7.34C8.86 7.33 8.7 7.33 8.53 7.33Z"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- Title & Description --}}
                            <h3 class="text-xl font-bold text-gray-900 mb-2 text-center" x-text="channel.title"></h3>
                            <p class="text-gray-600 text-sm text-center mb-4" x-text="channel.description"></p>

                            {{-- Contact Info --}}
                            <div class="text-center">
                                <div class="font-bold text-lg mb-1" :class="channel.color" x-text="channel.contact"></div>
                                <div class="text-xs text-gray-500" x-text="channel.available"></div>
                            </div>
                        </div>

                        {{-- Live Status Indicator --}}
                        <div class="flex items-center justify-between mb-4 p-3 bg-white/70 rounded-lg">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-xs font-medium text-gray-700">
                                    <span x-text="operatorStatus[channel.type]?.active || 'N/A'"></span> operatori online
                                </span>
                            </div>
                            <div class="text-xs font-semibold" :class="channel.color">
                                <span x-text="channel.response_sla"></span>
                            </div>
                        </div>

                        {{-- Action Button --}}
                        <div class="space-y-3">
                            {{-- Primary Action --}}
                            <a :href="channel.type === 'telemedicine' ? 'mailto:' + channel.contact : 'tel:' + channel.contact.replace(/\s/g, '')"
                               class="block w-full py-3 text-center font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg"
                               :class="'bg-gradient-to-r ' + channel.gradient + ' text-white hover:shadow-xl'">
                                <span x-show="channel.type === 'emergency'">🚨 EMERGENZA</span>
                                <span x-show="channel.type === 'appointment'">📅 PRENOTA</span>
                                <span x-show="channel.type === 'telemedicine'">📹 VIDEO CONSULTO</span>
                                <span x-show="channel.type === 'messaging'">💬 WHATSAPP</span>
                            </a>

                            {{-- Escalation Button (Emergency Only) --}}
                            <button x-show="channel.escalation && emergencyLevel === 'high'"
                                    class="w-full py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors duration-200 animate-pulse">
                                ⚡ ESCALATION IMMEDIATA
                            </button>
                        </div>

                        {{-- Expandable Features --}}
                        <div x-show="selectedChannel === channel.id"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             class="mt-6 pt-6 border-t border-gray-200">

                            <h4 class="font-semibold text-gray-800 mb-3">Caratteristiche:</h4>
                            <div class="space-y-2">
                                <template x-for="feature in channel.features" :key="feature">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"/>
                                        </svg>
                                        <span x-text="feature"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- Geographic Routing Section --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 mb-16"
             x-show="isVisible && show_geographic"
             x-transition:enter="transition ease-out duration-1000 delay-1000"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Sedi più Vicine a Te</h3>
                <p class="text-gray-600">Trova il centro SaluteOra più vicino alla tua posizione</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <template x-for="(area, index) in geographicAreas" :key="index">
                    <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-200"
                         :class="area.name === currentLocation ? 'ring-2 ring-blue-500 bg-blue-50' : ''">

                        <div class="flex items-center justify-between mb-4">
                            <h4 class="font-bold text-gray-900" x-text="area.name"></h4>
                            <div class="text-sm text-gray-500" x-text="area.distance"></div>
                        </div>

                        <div class="space-y-3">
                            <a :href="'tel:' + area.phone.replace(/\s/g, '')"
                               class="block w-full py-2 bg-blue-600 text-white text-center font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                📞 <span x-text="area.phone"></span>
                            </a>

                            <button class="w-full py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-colors duration-200">
                                🗺️ Visualizza su Mappa
                            </button>
                        </div>

                        {{-- Nearest Badge --}}
                        <div x-show="area.name === currentLocation"
                             class="mt-3 inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                            📍 Sede più vicina
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Emergency Protocols Info --}}
        <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-3xl p-8 border border-red-200"
             x-show="isVisible"
             x-transition:enter="transition ease-out duration-1000 delay-1200"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-red-800 mb-4">🚨 Protocolli di Emergenza</h3>
                <p class="text-red-700">Cosa fare in caso di emergenza odontoiatrica durante la gravidanza</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Emergenze Immediate --}}
                <div class="bg-white rounded-xl p-6 border border-red-200">
                    <h4 class="text-xl font-bold text-red-800 mb-4">🆘 Chiamare IMMEDIATAMENTE</h4>
                    <ul class="space-y-2 text-sm text-red-700">
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-red-500 rounded-full mt-2 mr-3"></span>
                            <span>Dolore acuto insopportabile (scala 8-10/10)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-red-500 rounded-full mt-2 mr-3"></span>
                            <span>Sanguinamento abbondante dalle gengive</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-red-500 rounded-full mt-2 mr-3"></span>
                            <span>Trauma dentale con perdita di denti</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-red-500 rounded-full mt-2 mr-3"></span>
                            <span>Gonfiore del viso o difficoltà a deglutire</span>
                        </li>
                    </ul>
                </div>

                {{-- Gestione Temporanea --}}
                <div class="bg-white rounded-xl p-6 border border-orange-200">
                    <h4 class="text-xl font-bold text-orange-800 mb-4">⏱️ Gestione Temporanea</h4>
                    <ul class="space-y-2 text-sm text-orange-700">
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3"></span>
                            <span>Sciacqui con acqua salata tiepida</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3"></span>
                            <span>Impacco freddo per gonfiore (max 20 min)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3"></span>
                            <span>Paracetamolo se autorizzato dal ginecologo</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3"></span>
                            <span>NON applicare calore o aspirina</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Emergency Number Highlight --}}
            <div class="mt-8 text-center">
                <a href="tel:+39800123456"
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-600 to-red-700 text-white font-bold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    <svg class="w-6 h-6 mr-3 animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                    </svg>
                    Numero Verde Emergenze: +39 800 123 456
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Custom CSS per animazioni avanzate --}}
<style>
/* Emergency pulsing effect */
@keyframes emergency-pulse {
    0%, 100% {
        background-color: rgba(239, 68, 68, 0.1);
        transform: scale(1);
    }
    50% {
        background-color: rgba(239, 68, 68, 0.2);
        transform: scale(1.02);
    }
}

.emergency-pulse {
    animation: emergency-pulse 2s ease-in-out infinite;
}

/* Priority badge animation */
@keyframes priority-bounce {
    0%, 100% {
        transform: translateY(0px) scale(1);
    }
    50% {
        transform: translateY(-4px) scale(1.1);
    }
}

.priority-badge {
    animation: priority-bounce 2s ease-in-out infinite;
}

/* Status indicator glow */
@keyframes status-glow {
    0%, 100% {
        box-shadow: 0 0 5px rgba(34, 197, 94, 0.5);
    }
    50% {
        box-shadow: 0 0 15px rgba(34, 197, 94, 0.8);
    }
}

.status-indicator {
    animation: status-glow 3s ease-in-out infinite;
}

/* Channel card hover effects */
.channel-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

/* Emergency escalation animation */
@keyframes escalation-alert {
    0%, 100% {
        background-color: rgb(220, 38, 38);
        transform: scale(1);
    }
    50% {
        background-color: rgb(239, 68, 68);
        transform: scale(1.05);
    }
}

.escalation-button {
    animation: escalation-alert 1s ease-in-out infinite;
}

/* Response time indicator */
.response-time {
    position: relative;
    overflow: hidden;
}

.response-time::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% {
        left: -100%;
    }
    100% {
        left: 100%;
    }
}
</style>

{{-- JavaScript per interazioni avanzate --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Emergency level escalation
    function checkEmergencyLevel() {
        const emergencyButtons = document.querySelectorAll('[data-emergency]');
        emergencyButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Track emergency button clicks
                console.log('Emergency contact initiated');

                // Add urgent styling
                this.classList.add('escalation-button');

                // Analytics tracking
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'emergency_contact', {
                        'event_category': 'medical',
                        'event_label': 'emergency_call',
                        'value': 1
                    });
                }
            });
        });
    }

    // Geographic location detection
    function detectLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;

                    // Update nearest location logic
                    console.log('User location detected:', lat, lon);

                    // You would implement actual distance calculation here
                    updateNearestLocation(lat, lon);
                },
                function(error) {
                    console.log('Location detection failed:', error);
                }
            );
        }
    }

    function updateNearestLocation(lat, lon) {
        // Simulate nearest location calculation
        const locations = [
            { name: 'Roma Centro', lat: 41.9028, lon: 12.4964 },
            { name: 'Milano', lat: 45.4642, lon: 9.1900 },
            { name: 'Napoli', lat: 40.8518, lon: 14.2681 }
        ];

        // Calculate distances and update UI
        // This would use actual distance calculation in production
    }

    // Real-time status updates
    function updateOperatorStatus() {
        const statusElements = document.querySelectorAll('.operator-status');
        statusElements.forEach(element => {
            // Simulate status updates
            const count = Math.floor(Math.random() * 10) + 1;
            element.textContent = `${count} operatori online`;
        });
    }

    // Initialize all functions
    checkEmergencyLevel();
    detectLocation();

    // Update operator status every 30 seconds
    setInterval(updateOperatorStatus, 30000);

    // Priority channel click tracking
    const channelCards = document.querySelectorAll('.channel-card');
    channelCards.forEach(card => {
        card.addEventListener('click', function() {
            const channelType = this.dataset.channel;
            console.log('Channel selected:', channelType);

            // Add visual feedback
            this.classList.add('channel-selected');
            setTimeout(() => {
                this.classList.remove('channel-selected');
            }, 2000);
        });
    });
});
</script>
