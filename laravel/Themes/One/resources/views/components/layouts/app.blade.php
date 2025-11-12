@php
    $isLanding =Route::currentRouteName()=='home' && !Auth::check();
    $margin = $isLanding ? "margin: 0px" : "margin: 20px";
@endphp

@if($isLanding)
<x-layouts.main :is-landing="$isLanding ?? false">
    
    <div class="flex flex-col min-h-screen">
    <div class="flex-1 {{ $margin }}">
        {{ $slot }}
    </div>
    <x-section slug="footer" />
</div>
</x-layouts.main>
@else
<x-layouts.main :is-landing="$isLanding ?? false">
    <x-section slug="header" tpl="v1" />
    <div class="bg-[#E6EBF7] flex flex-col min-h-screen">
    <div style="background-image: url(/img/inmp-trasparenza-5.svg); background-size: contain; background-repeat: no-repeat; background-position: center" class="flex-1 m-5">
        {{ $slot }}
    </div>
    <x-section slug="footer" />
</div>
</x-layouts.main>
@endif
