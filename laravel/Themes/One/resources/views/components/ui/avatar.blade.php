@props(['user' => null, 'size' => 'md'])

@php
    $sizes = [
        'sm' => 'sm',
        'md' => 'md',
        'lg' => 'lg',
        'xl' => 'xl',
        '2xl' => '2xl',
    ];

    $size = $sizes[$size] ?? $sizes['md'];
@endphp

<x-filament::avatar
    :src="$user?->profile_photo_url"
    :alt="$user?->name"
    :size="$size"
    {{ $attributes->class(['bg-gray-200 dark:bg-gray-700']) }}
/>
