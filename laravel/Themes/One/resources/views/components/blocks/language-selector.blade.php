@props(['currentLocale' => LaravelLocalization::getCurrentLocale()])

@php
    $flagCode = $currentLocale === 'en' ? 'gb' : $currentLocale;
@endphp

<x-filament::dropdown>
    <x-slot name="trigger">
        <x-filament::icon-button
            :icon="'ui-flags.' . $flagCode"
            class="inline-flex items-center justify-center gap-2 px-2 py-2 rounded-lg bg-white shadow-sm border border-gray-200 text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-primary-500"
            :label="$flagCode"
            aria-hidden="true"
        />
    </x-slot>

    <x-filament::dropdown.list>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @php
                $flagCode = $localeCode === 'en' ? 'gb' : $localeCode;
            @endphp
            <x-filament::dropdown.list.item
                :icon="'ui-flags.' . $flagCode"
                tag="a"
                :href="LaravelLocalization::getLocalizedURL($localeCode)"
                :color="$currentLocale === $localeCode ? 'primary' : null"
            >
                <span class="font-medium">{{ $properties['native'] }}</span>
            </x-filament::dropdown.list.item>
        @endforeach
    </x-filament::dropdown.list>
</x-filament::dropdown>
