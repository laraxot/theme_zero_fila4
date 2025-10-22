@props([
    'section' => null,
    'blocks' => [],
    'class' => ''
])

@php
    $locale = app()->getLocale();
    $componentsBlocks = is_array($blocks) && isset($blocks[$locale]) ? $blocks[$locale] : $blocks;
@endphp

<footer {{ $attributes->merge([
    'class' => 'bg-[#272C4D] h-32 lg:min-h-36 text-white flex justify-center items-center' . ($section['attributes']['class'] ?? '') . ' ' . $class,
    'id' => ($section['attributes']['id'] ?? '')
]) }}>
    <div class="flex flex-row justify-center md:flex-col">
        <div class="flex flex-col md:flex-row justify-center items-center">
            <!-- Colonna Logo e Descrizione -->
            <div class="flex justify-center">
                <div class="text-center m-1 lg:m-6 md:text-right space-x-4">
                <a href="{{ route('home') }}" class="text-white text-md m-1">@lang('pub_theme::navigation.main_menu.home.label')</a>
                <a href="/{{ $lang }}/pages/progetto" class="text-white text-md m-1">@lang('pub_theme::navigation.main_menu.project.label')</a>
                </div>
            </div>
            <a href="{{ route('home') }}">
                <div class="flex justify-center">
                    <img src="/img/saluteOra-new-logo.png" alt="{{ config('app.name') }}" class="h-16 lg:h-24 w-auto">
                </div>
            </a>
            <div class="flex justify-center">
                <div class="text-center m-1 lg:m-6 md:text-right space-x-4">
                    <a href="/{{ $lang }}/pages/partners" class="text-white text-md m-1">@lang('pub_theme::navigation.main_menu.partners.label')</a>
                    <a href="/{{ $lang }}/pages/faqs" class="text-white text-md">@lang('pub_theme::navigation.main_menu.faqs.label')</a>
                    <a href="/img/trattamento-dati-odonoiatra.pdf" target="_blank" class="text-white text-md">Trattamento Dati</a>
                </div>
            </div>          
            </div>
        </div>

        <!-- Copyright e Link Legali -->

    </div>
</footer>
