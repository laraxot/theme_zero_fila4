@props([
    'alignment' => 'right',
    'mobileView' => false,
])

@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $supportedLocales = LaravelLocalization::getSupportedLocales();
    
    // Converti 'en' in 'gb' per la bandiera
    $flagCode = $currentLocale === 'en' ? 'gb' : $currentLocale;
    
    // Stili per desktop e mobile
    $buttonClasses = $mobileView 
        ? 'flex items-center w-full px-3 py-2 text-base font-medium text-white hover:bg-white/10 transition-colors duration-200'
        : 'flex items-center space-x-2 px-3 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition-colors duration-200';
        
    $dropdownClasses = $mobileView
        ? 'mt-2 space-y-1 rounded-md bg-white/10 px-3 py-2'
        : 'absolute ' . ($alignment === 'right' ? 'right-0' : 'left-0') . ' mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50';
@endphp

<div x-data="{ open: false }" class="relative">
    <!-- Language Switcher Button -->
    <button
        @click="open = !open"
        @click.away="open = false"
        class="{{ $buttonClasses }}"
        aria-label="@lang('pub_theme::navigation.language_switcher.choose_language.tooltip')"
    >
        @if(!$mobileView)
            <!-- Desktop: Flag + Code + Arrow -->
            <x-filament::icon icon="ui-flags.{{ $flagCode }}" class="w-6 h-4" />
            <span class="text-sm font-medium text-white">{{ strtoupper($currentLocale) }}</span>
            <svg class="w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        @else
            <!-- Mobile: Flag + Language Name -->
            <x-filament::icon icon="ui-flags.{{ $flagCode }}" class="w-6 h-4" />
            <span class="ml-3 text-white">@lang('pub_theme::navigation.language_switcher.languages.' . $currentLocale . '.label')</span>
            <svg class="ml-auto w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        @endif
    </button>

    <!-- Dropdown Menu -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="{{ $dropdownClasses }}"
        style="display: none;"
    >
        @if(!$mobileView)
            <!-- Desktop Dropdown -->
            <div class="py-1">
                @foreach($supportedLocales as $localeCode => $properties)
                    @if($localeCode !== $currentLocale)
                        @php
                            $displayFlagCode = $localeCode === 'en' ? 'gb' : $localeCode;
                        @endphp
                        <a
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150"
                            hreflang="{{ $localeCode }}"
                            title="@lang('pub_theme::navigation.language_switcher.languages.' . $localeCode . '.tooltip')"
                        >
                            <x-filament::icon icon="ui-flags.{{ $displayFlagCode }}" class="w-6 h-4 mr-3" />
                            <span>@lang('pub_theme::navigation.language_switcher.languages.' . $localeCode . '.label')</span>
                        </a>
                    @endif
                @endforeach
            </div>
        @else
            <!-- Mobile Dropdown -->
            @foreach($supportedLocales as $localeCode => $properties)
                @if($localeCode !== $currentLocale)
                    @php
                        $displayFlagCode = $localeCode === 'en' ? 'gb' : $localeCode;
                    @endphp
                    <a
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                        class="flex items-center px-3 py-2 text-base font-medium text-white hover:bg-white/10 transition-colors duration-150"
                        hreflang="{{ $localeCode }}"
                        title="@lang('pub_theme::navigation.language_switcher.languages.' . $localeCode . '.tooltip')"
                    >
                        <x-filament::icon icon="ui-flags.{{ $displayFlagCode }}" class="w-6 h-4 mr-3" />
                        <span>@lang('pub_theme::navigation.language_switcher.languages.' . $localeCode . '.label')</span>
                    </a>
                @endif
            @endforeach
        @endif
    </div>
</div>
