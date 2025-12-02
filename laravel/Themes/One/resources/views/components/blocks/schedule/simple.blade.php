{{-- Orari Disponibilità --}}
<div class="schedule-display bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
           
            
    @if($hasSchedule)
        {{-- Header Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-3 pb-2 border-b border-gray-200 dark:border-gray-700">
            <div class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide">
                @lang('pub_theme::opening_hours.headers.day.label')
            </div>
            <div class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide text-center">
                @lang('pub_theme::opening_hours.headers.morning.label') 
            </div>
            <div class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide text-center">
                @lang('pub_theme::opening_hours.headers.afternoon.label')
            </div>
        </div>
        
        {{-- Giorni della Settimana --}}
        @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'] as $dayKey)
            @php
                $dayIndex = $loop->index;
                $isEvenRow = $dayIndex % 2 === 0;
                $dayLabel = __('saluteora::opening_hours.days.' . $dayKey);
                $daySchedule = $schedule[$dayKey] ?? [];
                
                $morningFrom = $daySchedule['morning_from'] ?? null;
                $morningTo = $daySchedule['morning_to'] ?? null;
                $afternoonFrom = $daySchedule['afternoon_from'] ?? null;
                $afternoonTo = $daySchedule['afternoon_to'] ?? null;
                
                $hasMorning = !empty($morningFrom) && !empty($morningTo);
                $hasAfternoon = !empty($afternoonFrom) && !empty($afternoonTo);
                $isDayActive = $hasMorning || $hasAfternoon;
                
                $rowClass = $isEvenRow 
                    ? 'bg-white dark:bg-gray-900/50' 
                    : 'bg-gray-50 dark:bg-gray-800/50';
            @endphp
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-2 px-3 rounded {{ $rowClass }} {{ $isDayActive ? 'border-l-4 border-green-400' : 'border-l-4 border-gray-200 dark:border-gray-600' }}">
                {{-- Nome Giorno --}}
                <div class="flex items-center">
                    <span class="text-sm font-medium {{ $isDayActive ? 'text-gray-900 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }}">
                        {{ $dayLabel }}
                    </span>
                    @if($isDayActive)
                        <svg class="w-3 h-3 ml-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    @endif
                </div>
                
                {{-- Orario Mattina --}}
                <div class="text-center">
                    @if($hasMorning)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 font-mono">
                            {{ $morningFrom }} - {{ $morningTo }}
                        </span>
                    @else
                        <span class="text-xs text-gray-400 dark:text-gray-500 italic">
                            <span class="inline-flex items-center justify-center text-gray-400 dark:text-gray-500" title="{{ __('saluteora::opening_hours.closed') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v2h8z" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </div>
                
                {{-- Orario Pomeriggio --}}
                <div class="text-center">
                    @if($hasAfternoon)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 font-mono">
                            {{ $afternoonFrom }} - {{ $afternoonTo }}
                        </span>
                    @else
                        <span class="text-xs text-gray-400 dark:text-gray-500 italic">
                            <span class="inline-flex items-center justify-center text-gray-400 dark:text-gray-500" title="{{ __('saluteora::opening_hours.closed') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v2h8z" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
        
        {{-- Domenica separata (se necessaria) --}}
        @if(isset($schedule['sunday']))
            @php
                $sundaySchedule = $schedule['sunday'];
                $sundayMorningFrom = $sundaySchedule['morning_from'] ?? null;
                $sundayMorningTo = $sundaySchedule['morning_to'] ?? null;
                $sundayAfternoonFrom = $sundaySchedule['afternoon_from'] ?? null;
                $sundayAfternoonTo = $sundaySchedule['afternoon_to'] ?? null;
                
                $sundayHasMorning = !empty($sundayMorningFrom) && !empty($sundayMorningTo);
                $sundayHasAfternoon = !empty($sundayAfternoonFrom) && !empty($sundayAfternoonTo);
                $isSundayActive = $sundayHasMorning || $sundayHasAfternoon;
            @endphp
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 py-2 px-3 rounded bg-amber-50 dark:bg-amber-900/20 border-l-4 {{ $isSundayActive ? 'border-amber-400' : 'border-gray-200 dark:border-gray-600' }} mt-2">
                <div class="flex items-center">
                    <span class="text-sm font-medium {{ $isSundayActive ? 'text-amber-800 dark:text-amber-200' : 'text-gray-500 dark:text-gray-400' }}">
                        {{ __('saluteora::opening_hours.days.sunday') }}
                    </span>
                </div>
                
                <div class="text-center">
                    @if($sundayHasMorning)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300 font-mono">
                            {{ $sundayMorningFrom }} - {{ $sundayMorningTo }}
                        </span>
                    @else
                        <span class="text-xs text-gray-400 dark:text-gray-500 italic">
                            {{ __('saluteora::widgets.doctor_availabilities.schedule.closed') }}
                        </span>
                    @endif
                </div>
                
                <div class="text-center">
                    @if($sundayHasAfternoon)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300 font-mono">
                            {{ $sundayAfternoonFrom }} - {{ $sundayAfternoonTo }}
                        </span>
                    @else
                        <span class="text-xs text-gray-400 dark:text-gray-500 italic">
                            {{ __('saluteora::widgets.doctor_availabilities.schedule.closed') }}
                        </span>
                    @endif
                </div>
            </div>
        @endif
        
    @else
        {{-- Empty State --}}
        <div class="text-center py-8">
            <svg class="w-12 h-12 mx-auto text-gray-400 dark:text-gray-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                {{ __('saluteora::widgets.doctor_availabilities.schedule.no_schedule') }}
            </p>
            <p class="text-xs text-gray-400 dark:text-gray-500">
                {{ __('saluteora::widgets.doctor_availabilities.schedule.click_edit_to_configure') }}
            </p>
        </div>
    @endif
</div>