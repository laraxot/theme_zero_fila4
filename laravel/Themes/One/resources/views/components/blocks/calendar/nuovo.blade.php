@php
    use Carbon\Carbon;

    // Se $date non è valorizzato, usa oggi
    $date = $date ?? Carbon::today();
    $date = $date instanceof \DateTimeInterface ? Carbon::instance($date) : Carbon::parse($date);
    $startOfMonth = $date->copy()->startOfMonth();
    $endOfMonth = $date->copy()->endOfMonth();
    $selectedDay = $date->day;
    $daysInMonth = $date->daysInMonth;
    $startDayOfWeek = $startOfMonth->dayOfWeekIso; // 1 (Mon) - 7 (Sun)
    $today = Carbon::today();
    $isCurrentMonth = $date->isSameMonth($today);

    // Nomi localizzati dei giorni della settimana (ISO: 1=Lunedì, 7=Domenica)
    $weekDays = [];
    for ($i = 1; $i <= 7; $i++) {
        $weekDays[] = Carbon::now()->startOfWeek(Carbon::MONDAY)->addDays($i - 1)->locale(app()->getLocale())->isoFormat('dd');
    }

    // Costruisci la griglia: giorni vuoti prima, poi i giorni del mese
    $days = [];
    for ($i = 1; $i < $startDayOfWeek; $i++) {
        $days[] = null;
    }
    for ($d = 1; $d <= $daysInMonth; $d++) {
        $days[] = $d;
    }
    // Completa la griglia per avere multipli di 7
    while (count($days) % 7 !== 0) {
        $days[] = null;
    }

    $monthName = $date->locale(app()->getLocale())->isoFormat('MMMM YYYY');
@endphp

<div>
    <div class="relative grid grid-cols-1 gap-x-14 md:grid-cols-2">
        <!-- Bottoni navigazione mese (da implementare se serve) -->
        <button type="button" class="absolute -left-1.5 -top-1 flex items-center justify-center p-1.5 text-gray-400 hover:text-gray-500" disabled>
            <span class="sr-only">@lang('Precedente')</span>
            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg>
        </button>
        <button type="button" class="absolute -right-1.5 -top-1 flex items-center justify-center p-1.5 text-gray-400 hover:text-gray-500" disabled>
            <span class="sr-only">@lang('Successivo')</span>
            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
        <section class="text-center w-full">
            <h2 class="text-sm font-semibold text-gray-900">{{ ucfirst($monthName) }}</h2>
            <div class="mt-6 grid grid-cols-7 text-xs/6 text-gray-500">
                @foreach ($weekDays as $day)
                    <div>{{ $day }}</div>
                @endforeach
            </div>
            <div class="isolate mt-2 grid grid-cols-7 gap-px rounded-lg bg-gray-200 text-sm shadow ring-1 ring-gray-200">
                @foreach ($days as $idx => $d)
                    @php
                        // Calcola classi per i bordi arrotondati
                        $row = intdiv($idx, 7);
                        $col = $idx % 7;
                        $isFirstRow = $row === 0;
                        $isLastRow = $row === (int) (count($days) / 7) - 1;
                        $isFirstCol = $col === 0;
                        $isLastCol = $col === 6;
                        $rounded = '';
                        if ($isFirstRow && $isFirstCol) $rounded .= ' rounded-tl-lg';
                        if ($isFirstRow && $isLastCol) $rounded .= ' rounded-tr-lg';
                        if ($isLastRow && $isFirstCol) $rounded .= ' rounded-bl-lg';
                        if ($isLastRow && $isLastCol) $rounded .= ' rounded-br-lg';

                        // Giorno del mese corrente
                        $isCurrentMonthDay = !is_null($d);
                        // Oggi
                        $isToday = $isCurrentMonthDay && $date->copy()->day($d)->isToday();
                        // Giorno selezionato
                        $isSelected = $isCurrentMonthDay && $d == $selectedDay;
                    @endphp
                    <button type="button"
                        class="relative py-1.5 hover:bg-gray-100 focus:z-10{{
                            $isCurrentMonthDay ? ' bg-white text-gray-900' : ' bg-gray-50 text-gray-400'
                        }}{{ $rounded }}"
                        @if(!$isCurrentMonthDay) disabled @endif
                    >
                        <time class="mx-auto flex size-7 items-center justify-center rounded-full{{
                            $isToday ? ' bg-indigo-600 font-semibold text-white' : ($isSelected ? ' border-2 border-indigo-500 font-bold' : '')
                        }}"
                            @if($isCurrentMonthDay)
                                datetime="{{ $date->copy()->day($d)->toDateString() }}"
                            @endif
                        >
                            {{ $isCurrentMonthDay ? $d : '' }}
                        </time>
                    </button>
                @endforeach
            </div>
        </section>
    </div>
</div>
  