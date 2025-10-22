@php
    $heading = $this->getHeading();
    // $pollingInterval = $this->getPollingInterval();
    // $contentHeight = $this->getContentHeight();
    $filters = $this->getFilters();
    $indicatorsCount = $this->indicatorsCount();
    $filterForm = $this->form;
    // $readyToLoad = $this->readyToLoad;
    // $getCachedOptions = $this->getCachedOptions();
    $filterFormAccessible = $this->getFilterFormAccessible();
    // $loadingIndicator = $this->getLoadingIndicator();
    // $footer = $this->getFooter();
    // $deferLoading = $this->getDeferLoading();
    // $darkModeEnabled = $this->getDarkMode();
    $subheading = 'ciao';
@endphp

<x-filament::widget class="filament-widgets-chart-widget">
    <x-filament::card>


            {{ $this->form }}
            {{-- @if ($heading || $filters || ($filterForm && $filterFormAccessible))
                <x-filament-apex-charts::header :heading="$heading" :filters="$filters"
                    filterForm="{{ $filterFormAccessible ? $filterForm : null }}" :indicatorsCount="$indicatorsCount" />
            @endif --}}


    </x-filament::card>
</x-filament::widget>