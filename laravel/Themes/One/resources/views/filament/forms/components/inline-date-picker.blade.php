{{--
/**
 * InlineDatePicker View - KISS Principle
 * 
 * La logica è nella classe PHP InlineDatePicker.php
 * Questa vista si limita a renderizzare i dati ricevuti
 */
--}}

@php
    $statePath = $getStatePath();
    $calendarData = $calendarData ?? [];
    $currentValue = $currentValue ?? null;
    $enabledDates = $enabledDates ?? collect();
    $currentViewMonth = $currentViewMonth ?? now()->format('Y-m');
    $monthName = $monthName ?? 'Loading...';
    $weekdays = $weekdays ?? ['L', 'M', 'M', 'G', 'V', 'S', 'D'];
@endphp

<x-dynamic-component 
    :component="$getFieldWrapperView()" 
    :field="$field"
>
    <div 
        x-data="{
            selectedDate: @js($currentValue),
            
            
            selectDate(dateString) {
                this.selectedDate = dateString;
                $wire.set('{{ $statePath }}', dateString);

            },
            deSelectDate(){
                this.selectedDate = null;
                $wire.set('{{ $statePath }}', null);
            },
            // ✅ Metodi per navigazione mese - chiamata diretta al widget parent
            previousMonth() {
                $wire.call('previousMonth');
            },
            nextMonth() {
                $wire.call('nextMonth');
            }
        }"
        class="space-y-4"
    >
        <!-- Container calendario -->
        <div class="relative">
            <!-- Navigazione -->
            <button 
                type="button" 
                wire:click="previousMonth()"
                class="absolute -left-1.5 -top-1 flex items-center justify-center h-8 w-8 bg-white border border-gray-300 rounded-full shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 z-10"
            >
                <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            
            <button 
                type="button" 
                wire:click="nextMonth()"
                class="absolute -right-1.5 -top-1 flex items-center justify-center h-8 w-8 bg-white border border-gray-300 rounded-full shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 z-10"
            >
                <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Calendario -->
            <section class="text-center">
                <!-- Titolo mese -->
                <h2 class="text-sm font-semibold text-gray-900">{{ $monthName }}</h2>
                
                <!-- Intestazioni giorni -->
                <div class="mt-6 grid grid-cols-7 text-xs/6 text-gray-500">
                    @foreach($weekdays as $weekday)
                        <div class="uppercase">{{ $weekday }}</div>
                    @endforeach
                </div>
                
                <!-- Griglia calendario -->
                <div class="isolate mt-2 grid grid-cols-7 gap-px rounded-lg bg-gray-200 text-sm shadow ring-1 ring-gray-200">
                    @if(isset($calendarData['weeks']) && is_array($calendarData['weeks']))
                        @foreach($calendarData['weeks'] as $week)
                            @foreach($week as $day)
                                @php
                                    $isEnabled = $enabledDates->contains($day['dateString']);
                                    $isSelected = $currentValue === $day['dateString'];
                                    $isCurrentMonth = $day['isCurrentMonth'];
                                    
                                    // ✅ Pre-calcolo classi CSS per performance
                                    if ($isSelected) {
                                        $classes = 'relative py-2 px-1 text-sm font-semibold bg-[#FF5F7E] text-white ring-2 ring-[#FF5F7E] shadow-lg z-10';
                                        $onclick = "deSelectDate()";
                                    } elseif ($isEnabled && $isCurrentMonth) {
                                        $classes = 'relative py-2 px-1 text-sm font-semibold bg-blue-100 text-[#272C4D] border-2 border-blue-300 cursor-pointer hover:scale-105 transform transition-all duration-200';
                                        $onclick = "selectDate('".$day['dateString']."')";
                                    } elseif ($isCurrentMonth) {
                                        $classes = 'relative py-2 px-1 text-sm font-medium bg-gray-50 text-gray-400 border border-gray-200 cursor-not-allowed opacity-60';
                                        $onclick = "deSelectDate()";
                                    } else {
                                        $classes = 'relative py-2 px-1 text-sm font-medium bg-gray-50/30 text-gray-300 cursor-not-allowed opacity-40';
                                        $onclick = "deSelectDate()";
                                    }
                                @endphp
                                
                                <button 
                                    type="button" 
                                    x-on:click="{{ $onclick }}"
                                    class="{{ $classes }}"
                                >
                                    {{ $day['day'] }}
                                    
                                    {{-- ✨ INDICATORI ELEGANTI PER DATE DISPONIBILI --}}
                                    @if($isEnabled && $isCurrentMonth && !$isSelected)
                                        {{-- Barra sottile verde sotto la data disponibile --}}
                                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-0.5 bg-[#272C4D] rounded-full"></div>
                                    @endif
                                    
                                    {{-- ✨ INDICATORI ELEGANTI PER DATA SELEZIONATA --}}
                                    @if($isSelected)
                                        {{-- Barra pulsante blu sotto la data selezionata --}}
                                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-white"></div>
                                    @endif
                                </button>
                            @endforeach
                        @endforeach
                    @else
                        <x-filament::loading-indicator class="h-5 w-5" />
                    @endif
                </div>

               
            </section>
        </div>
    </div>
</x-dynamic-component>

{{-- ✨ CSS ELEGANTE MIGLIORATO --}}
<style>
.inline-date-picker button {
    transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
}

/* Effetto hover per date disponibili */
.inline-date-picker button:hover:not([disabled]) {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Animazione per gli indicatori */
@keyframes slideInFromBottom {
    from {
        transform: translateY(100%) translateX(-50%);
        opacity: 0;
    }
    to {
        transform: translateY(0) translateX(-50%);
        opacity: 1;
    }
}

@keyframes fadeInScale {
    from {
        transform: scale(0) translate(-50%, -50%);
        opacity: 0;
    }
    to {
        transform: scale(1) translate(-50%, -50%);
        opacity: 1;
    }
}

/* Applicazione animazioni */
.inline-date-picker .absolute.bottom-0 {
    animation: slideInFromBottom 0.3s ease-out;
}

.inline-date-picker .absolute.-top-1 {
    animation: fadeInScale 0.4s ease-out;
}
</style> 