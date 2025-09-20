@props([
    'alignment' => 'right',
])

@php
    $userAgent = request()->header('User-Agent');
    $isMobile = preg_match('/Mobile|Android|iPhone|iPad|Opera Mini|IEMobile|WPDesktop/i', $userAgent);
@endphp

@if (!$isMobile)
<div class="flex items-center space-x-4 !m-1">
    <a href="{{ route('login') }}" class="text-sm font-medium text-[#E2E8F0] hover:text-[#E2E8F0]">
        {{ __('pub_theme::auth.login.title') }}
    </a>

    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md !text-white bg-[#FF5F7E]">
        {{ __('pub_theme::auth.register.title') }}
    </a>
</div>
@endif
