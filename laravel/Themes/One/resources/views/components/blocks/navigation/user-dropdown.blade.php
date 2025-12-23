@props([
    'alignment' => 'right',
    'width' => '48',
    'contentClasses' => 'py-1 bg-white dark:bg-gray-800',
    'menu_items' => [],
    'guest_view' => 'pub_theme::components.blocks.navigation.login-buttons'
])

@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    use Modules\SaluteOra\Enums\UserTypeEnum;

    // Inizializzazione delle variabili con valori di default
    $user = $user ?? auth()->user();
    $locale = LaravelLocalization::getCurrentLocale();
    $isLoggedIn = auth()->check();

    // Definizione delle classi CSS per il menu
    $menuClasses = [
        'base' => 'py-1',
        'light' => 'bg-white',
        'dark' => 'dark:bg-gray-800'
    ];

    $contentClasses = implode(' ', $menuClasses);

    // Funzione per gestire il click sugli elementi del menu
    $handleMenuItemClick = function($item) {
        if (isset($item['action']) && $item['action'] === 'logout') {
            return "event.preventDefault(); document.getElementById('logout-form').submit();";
        }
        return '';
    };
$isDoctor  = $user && $user->type == UserTypeEnum::DOCTOR ? true:false;

    $profiloUrl = isset($user) ? $user->type === 'doctor'
        ? '/{{ $lang }}/pages/profilo-odontoiatra'
        : '/{{ $lang }}/pages/profilo-paziente':'';

        

@endphp

@if($isLoggedIn)
    {{-- Dropdown Menu per utenti autenticati --}}
    <x-filament::dropdown
        {{--
        :alignment="$alignment"
        :width="$width"
        :content-classes="$contentClasses"
        --}}
    >
        {{-- Trigger Button --}}
        <x-slot name="trigger">
            <x-filament::button
                color="white"
                style="border-radius: 70px; background-color: transparent !important; border: 1px solid white"
                icon="heroicon-o-user"
                :label="$user?->name"
                aria-label="{{ __('ui::navigation.user_menu') }}">
                <span class="hidden sm:inline">{{$user?->name}}</span>
        </x-filament::button>
        </x-slot>
        <x-filament::dropdown.list>
        {{-- Menu Items --}}
        @foreach($menu_items as $item)
            @if(isset($item['type']) && $item['type'] === 'divider')
                <div class="border-t border-gray-200 dark:border-gray-700 my-1" role="separator"></div>
            @else
                <x-filament::dropdown.list.item :icon="$item['icon']" tag="a" :href="$item['url'] ?? '#'">
                    {{  $item['label'] ?? '' }}
                </x-filament::dropdown.list.item>
            @endif
        @endforeach
        </x-filament::dropdown.list>
    </x-filament::dropdown>

    {{-- Form di Logout nascosto --}}
    <form
        id="logout-form"
        action="{{ route('logout', ['locale' => $locale]) }}"
        method="POST"
        class="hidden"
    >
        @csrf
    </form>
@else
    {{-- Vista per utenti non autenticati --}}
    @include($guest_view)
@endif

