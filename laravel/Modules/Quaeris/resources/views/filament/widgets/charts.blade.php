<x-filament::widget class="grid grid-cols-2 gap-6">
    {{--
    <x-filament::card :heading="$this->survey_title">
    --}}

        @foreach ($this->getQuestionCharts() as $questionChart)
            <livewire:question-charts :questionChartId="$questionChart" />
        @endforeach

    {{--
    </x-filament::card>
    --}}
</x-filament::widget>
