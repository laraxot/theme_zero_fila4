<x-filament::card :heading="$title" >

    @if (count($charts)==3)
    <x-filament::widget class="grid grid-cols-2 gap-1">
        <livewire:question-chart :chart="$charts[0]" :wire:key="'chart-0'" :k="0" :questionChartId="$questionChartId" />
            <div>
                <livewire:question-chart :chart="$charts[1]" :wire:key="'chart-1'" :k="1" :questionChartId="$questionChartId" />
                <livewire:question-chart :chart="$charts[2]" :wire:key="'chart-2'" :k="2" :questionChartId="$questionChartId" />
            </div>
    </x-filament::widget>
    @else
        @foreach ($charts as $k => $chart)
            <livewire:question-chart :chart="$chart" :wire:key="'chart-'.$k" :k="$k" :questionChartId="$questionChartId" />
        @endforeach
    @endif
</x-filament::card>


