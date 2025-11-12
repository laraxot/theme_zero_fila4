@props(['block'])

@php
$title = $block->data['title'] ?? '';
$description = $block->data['description'] ?? '';
$logo = $block->data['logo'] ?? '';
$copyright = $block->data['copyright'] ?? '';
@endphp

<div class="space-y-8">
    @if($logo)
        <img src="{{ $logo }}" alt="{{ $title }}" class="h-8 w-auto">
    @endif
    
    @if($title)
        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
            {{ $title }}
        </h3>
    @endif
    
    @if($description)
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ $description }}
        </p>
    @endif
    
    @if($copyright)
        <p class="text-xs text-gray-500 dark:text-gray-500">
            {{ $copyright }}
        </p>
    @endif
</div> 