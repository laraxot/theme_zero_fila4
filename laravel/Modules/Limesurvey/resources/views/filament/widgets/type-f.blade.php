<x-filament-widgets::widget>
    <x-filament::section>
        <!-- Titolo del Widget -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-700">
                {{ strip_tags($this->title) }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- <pre>{{ json_encode($this->getChartWidgets(), JSON_PRETTY_PRINT) }}</pre> --}}
            {{-- Colonna sinistra: Primo grafico (Pie Chart) --}}
            @foreach ($this->getChartWidgets() as $chartWidget)
            {{-- dddx($chartWidget) --}}
                @if ($loop->first)
                    <div class="col-span-1">
                        {{-- Primo grafico (Pie Chart) --}}
                        @livewire($chartWidget['class'], $chartWidget['properties'])
                    </div>
                @else
                    @if ($loop->index === 1)
                        {{-- Apertura della colonna destra per i grafici successivi --}}
                        <div class="col-span-1 flex flex-col gap-4">
                    @endif

                    {{-- Grafici successivi (Bar Charts) --}}
                    <div>
                        @livewire($chartWidget['class'], $chartWidget['properties'])
                    </div>

                    @if ($loop->last)
                        {{-- Chiusura della colonna destra --}}
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
