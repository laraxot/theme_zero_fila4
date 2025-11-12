<x-filament-widgets::widget>
        <x-filament::card>
                <div class="flex items-center justify-center">
                        <p>{{ $this->title }}: {{ $this->tot }}</p>
                </div>
                {{-- <div class="grid grid-cols-3 gap-4">
                        <div class="flex items-center justify-center">Sms: {{ $this->sms }}</div>
                        <div class="flex items-center justify-center"></div>
                        <div class="flex items-center justify-center">Email: {{ $this->emails }}</div>
                </div> --}}
                <div class="grid grid-rows-3 grid-flow-col gap-4">
                        <div class="flex items-center justify-center">Sms: {{ $this->sms }}</div>
                        <div class="flex items-center justify-center"></div>
                        <div class="flex items-center justify-center">Email: {{ $this->emails }}</div>
                </div>
        </x-filament::card>
</x-filament-widgets::widget>