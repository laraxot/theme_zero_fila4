{{--
    Componente Calendar Dynamic per Tema One

    Versione dinamica del calendario che richiama i widget FullCalendar
    esistenti del modulo SaluteOra con aggiornamenti real-time.

    Principio: I temi devono richiamare widget esistenti, non duplicare logica.
--}}

@props([
    'title' => null,
    'subtitle' => null,
    'height' => '600px',
    'show-toolbar' => true,
    'show-legend' => true,
    'enable-realtime' => false,
    'refresh-interval' => 300000,
    'studio-id' => null,
    'patient-id' => null,
])

@php
    use Modules\SaluteOra\Enums\UserTypeEnum;
    use Modules\SaluteOra\Filament\Widgets\PatientCalendarWidget;
    use Modules\SaluteOra\Filament\Widgets\DoctorCalendarWidget;
    use Modules\SaluteOra\Filament\Widgets\AdminCalendarWidget;
    use Filament\Facades\Filament;

    // Determina il widget appropriato basato su utente autenticato
    $widgetClass = null;
    $canView = false;
    $userType = null;

    if (auth()->check()) {
        $user = auth()->user();
        $userType = $user->type ?? null;

        // Determina widget basato su tipo utente
        $widgetClass = match ($userType) {
            UserTypeEnum::PATIENT => PatientCalendarWidget::class,
            UserTypeEnum::DOCTOR => DoctorCalendarWidget::class,
            UserTypeEnum::ADMIN => AdminCalendarWidget::class,
            default => null
        };

        // Verifica permessi di visualizzazione
        if ($widgetClass) {
            $canView = $widgetClass::canView();

            // Verifica aggiuntiva per dottori (tenancy)
            if ($userType === UserTypeEnum::DOCTOR) {
                $canView = $canView && Filament::getTenant() !== null;
            }
        }
    }

    // Prepara props per il widget
    $widgetProps = array_filter([
        'height' => $height,
        'studio_id' => $studioId,
        'patient_id' => $patientId,
        'enable_realtime' => $enableRealtime,
        'refresh_interval' => $refreshInterval,
    ]);

    // Classi CSS specifiche del tema One Dynamic
    $themeClasses = 'calendar-dynamic-container theme-one-calendar-dynamic bg-white rounded-xl shadow-lg overflow-hidden';

    // Titolo dinamico basato su tipo utente
    $dynamicTitle = $title ?? match ($userType) {
        UserTypeEnum::PATIENT => 'I Miei Appuntamenti',
        UserTypeEnum::DOCTOR => 'Calendario Studio - Live',
        UserTypeEnum::ADMIN => 'Dashboard Appuntamenti',
        default => 'Calendario Appuntamenti'
    };

    $dynamicSubtitle = $subtitle ?? match ($userType) {
        UserTypeEnum::PATIENT => 'Visualizza i tuoi appuntamenti in tempo reale',
        UserTypeEnum::DOCTOR => 'Gestisci gli appuntamenti con aggiornamenti automatici',
        UserTypeEnum::ADMIN => 'Monitora tutti gli appuntamenti del sistema',
        default => 'Calendario degli appuntamenti con aggiornamenti automatici'
    };

    // ID univoco per il calendario
    $calendarId = 'calendar-dynamic-' . ($userType?->value ?? 'guest') . '-' . uniqid();
@endphp

<div class="{{ $themeClasses }}"
     style="min-height: {{ $height }};"
     x-data="calendarDynamic({
         enableRealtime: {{ $enableRealtime ? 'true' : 'false' }},
         refreshInterval: {{ $refreshInterval }},
         calendarId: '{{ $calendarId }}'
     })"
     x-init="initDynamicCalendar()">

    @if($canView && $widgetClass)
        {{-- Header dinamico del tema --}}
        @if($showToolbar)
        <div class="calendar-header bg-gradient-to-br from-blue-600 to-purple-700 text-white p-6">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h2 class="text-2xl font-bold mb-1">{{ $dynamicTitle }}</h2>
                    <p class="text-blue-100 text-sm">{{ $dynamicSubtitle }}</p>
                </div>

                {{-- Status e controlli --}}
                <div class="flex items-center gap-4">
                    {{-- Badge tipo utente --}}
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/20 text-white">
                        {{ $userType?->getLabel() ?? 'Ospite' }}
                    </div>

                    {{-- Indicatore stato connessione --}}
                    @if($enableRealtime)
                    <div class="flex items-center gap-2">
                        <div class="status-indicator"
                             :class="{
                                 'status-online': connectionStatus === 'online',
                                 'status-offline': connectionStatus === 'offline',
                                 'status-loading': connectionStatus === 'connecting'
                             }"></div>
                        <span class="text-xs text-white/80" x-text="connectionText"></span>
                    </div>
                    @endif

                    {{-- Controlli refresh --}}
                    <button @click="refreshCalendar()"
                            :disabled="isRefreshing"
                            class="p-2 rounded-lg bg-white/20 hover:bg-white/30 transition-colors">
                        <svg class="w-4 h-4"
                             :class="isRefreshing ? 'animate-spin' : ''"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @endif

        {{-- Widget FullCalendar con wrapper dinamico --}}
        <div class="calendar-widget-wrapper relative p-4" id="{{ $calendarId }}">
            {{-- Loading overlay --}}
            <div class="calendar-loading" :class="{ 'active': isLoading }">
                <div class="loading-spinner"></div>
            </div>

            {{-- Widget Filament --}}
            @livewire($widgetClass, $widgetProps, key($calendarId))
        </div>

        {{-- Legenda stati appuntamenti --}}
        @if($showLegend)
        <div class="calendar-legend bg-gray-50 p-4 border-t border-gray-200">
            <h4 class="text-sm font-medium text-gray-900 mb-3">Legenda Stati</h4>
            <div class="flex flex-wrap gap-4">
                <div class="legend-item">
                    <div class="legend-color bg-blue-500"></div>
                    <span class="text-gray-700">Programmato</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color bg-green-500"></div>
                    <span class="text-gray-700">Confermato</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color bg-yellow-500"></div>
                    <span class="text-gray-700">In corso</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color bg-emerald-600"></div>
                    <span class="text-gray-700">Completato</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color bg-red-500"></div>
                    <span class="text-gray-700">Emergenza</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color bg-gray-500"></div>
                    <span class="text-gray-700">Annullato</span>
                </div>
            </div>
        </div>
        @endif

    @elseif(auth()->check() && !$canView)
        {{-- Utente autenticato ma senza permessi --}}
        <div class="calendar-access-denied flex flex-col items-center justify-center p-12 text-center">
            <div class="mb-4">
                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Accesso Limitato</h3>
            <p class="text-gray-500 mb-4">
                Non hai i permessi necessari per visualizzare questo calendario dinamico.
            </p>
            @if($userType === UserTypeEnum::DOCTOR && !Filament::getTenant())
                <div class="bg-yellow-50 border border-yellow-200 rounded-md p-4">
                    <p class="text-sm text-yellow-800">
                        <strong>Nota:</strong> Seleziona uno studio per accedere al calendario degli appuntamenti.
                    </p>
                </div>
            @endif
        </div>

    @else
        {{-- Utente non autenticato --}}
        <div class="calendar-login-required flex flex-col items-center justify-center p-12 text-center">
            <div class="mb-4">
                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3a4 4 0 118 0v4m-4 6v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Accesso Richiesto</h3>
            <p class="text-gray-500 mb-6">
                Effettua l'accesso per visualizzare il calendario dinamico degli appuntamenti.
            </p>
            <div class="flex gap-4">
                <a href="{{ route('login') }}"
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    @lang('pub_theme::navigation.main_menu.login.label')
                </a>
                @if(Route::has('register'))
                <a href="{{ route('register') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    @lang('pub_theme::navigation.main_menu.register.label')
                </a>
                @endif
            </div>
        </div>
    @endif

</div>

{{-- Stili CSS specifici del tema One Dynamic --}}
@push('styles')
<style>
    .theme-one-calendar-dynamic {
        /* Variabili per calendario dinamico */
        --calendar-primary: #3b82f6;
        --calendar-primary-hover: #2563eb;
        --calendar-border: #e5e7eb;
        --calendar-bg: #ffffff;
        --calendar-text: #111827;
        --calendar-text-muted: #6b7280;
        --calendar-gradient-start: #667eea;
        --calendar-gradient-end: #764ba2;
    }

    /* Container principale */
    .calendar-dynamic-container {
        position: relative;
        border-radius: 0.75rem;
        overflow: hidden;
    }

    /* Header con gradiente */
    .calendar-header {
        background: linear-gradient(135deg, var(--calendar-gradient-start) 0%, var(--calendar-gradient-end) 100%);
        position: relative;
    }

    .calendar-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    /* Status indicators */
    .status-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .status-online {
        background-color: #10b981;
        box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.3);
    }

    .status-offline {
        background-color: #ef4444;
        box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.3);
    }

    .status-loading {
        background-color: #f59e0b;
        animation: pulse 2s infinite;
    }

    /* Loading overlay */
    .calendar-loading {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.3s ease;
        backdrop-filter: blur(2px);
    }

    .calendar-loading.active {
        opacity: 1;
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f4f6;
        border-top: 4px solid var(--calendar-primary);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Legenda */
    .calendar-legend {
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: #374151;
    }

    .legend-color {
        width: 16px;
        height: 16px;
        border-radius: 4px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
    }

    /* Integrazione con widget Filament */
    .theme-one-calendar-dynamic .fi-wi-calendar {
        border: none;
        box-shadow: none;
        background: transparent;
    }

    /* Stili eventi dinamici */
    .theme-one-calendar-dynamic .fc-event {
        border-radius: 0.375rem;
        border: none;
        font-weight: 500;
        transition: all 0.2s ease;
        cursor: pointer;
        position: relative;
    }

    .theme-one-calendar-dynamic .fc-event:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 10;
    }

    /* Animazioni per eventi real-time */
    .theme-one-calendar-dynamic .fc-event.event-new {
        animation: eventAppear 0.5s ease-out;
    }

    .theme-one-calendar-dynamic .fc-event.event-updated {
        animation: eventUpdate 0.3s ease-out;
    }

    @keyframes eventAppear {
        0% {
            opacity: 0;
            transform: scale(0.8);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes eventUpdate {
        0% {
            background-color: #fbbf24;
        }
        100% {
            background-color: var(--event-color);
        }
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .calendar-header {
            padding: 1rem;
        }

        .calendar-header .flex {
            flex-direction: column;
            gap: 1rem;
        }

        .calendar-legend {
            padding: 1rem;
        }

        .calendar-legend .flex {
            flex-direction: column;
            gap: 0.75rem;
        }
    }

    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        .theme-one-calendar-dynamic {
            --calendar-bg: #1f2937;
            --calendar-text: #f9fafb;
            --calendar-text-muted: #9ca3af;
        }

        .calendar-legend {
            background: #374151;
            border-color: #4b5563;
        }

        .legend-item {
            color: #d1d5db;
        }
    }
</style>
@endpush

{{-- Script Alpine.js per funzionalità dinamiche --}}
@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('calendarDynamic', (config) => ({
        enableRealtime: config.enableRealtime,
        refreshInterval: config.refreshInterval,
        calendarId: config.calendarId,
        connectionStatus: 'offline',
        connectionText: 'Disconnesso',
        isLoading: false,
        isRefreshing: false,
        refreshTimer: null,

        init() {
            this.initDynamicCalendar();
        },

        initDynamicCalendar() {
            if (this.enableRealtime) {
                this.startRealtime();
            }
            this.startPeriodicRefresh();
        },

        startRealtime() {
            // Implementazione WebSocket/SSE per aggiornamenti real-time
            this.connectionStatus = 'connecting';
            this.connectionText = 'Connessione...';

            // Simula connessione (da implementare con WebSocket reale)
            setTimeout(() => {
                this.connectionStatus = 'online';
                this.connectionText = 'In tempo reale';
            }, 1000);
        },

        startPeriodicRefresh() {
            if (this.refreshInterval > 0) {
                this.refreshTimer = setInterval(() => {
                    this.refreshCalendar(true);
                }, this.refreshInterval);
            }
        },

        refreshCalendar(silent = false) {
            if (!silent) {
                this.isRefreshing = true;
            }
            this.isLoading = true;

            // Trigger refresh del widget Livewire
            Livewire.dispatch('refreshCalendar');

            setTimeout(() => {
                this.isLoading = false;
                this.isRefreshing = false;
            }, 1000);
        },

        destroy() {
            if (this.refreshTimer) {
                clearInterval(this.refreshTimer);
            }
        }
    }));
});
</script>
@endpush
