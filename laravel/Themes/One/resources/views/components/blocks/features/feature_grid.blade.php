@props([
    'title' => null,
    'description' => null,
    'columns' => 3, // 1-4
    'gap' => 'gap-8', // gap-4, gap-6, gap-8, gap-12
    'align' => 'start', // start, center, end
    'className' => ''
])

@php
    // Handle translations
    $title = is_array($title) ? $title[app()->getLocale()] ?? $title['en'] ?? '' : $title;
    $description = is_array($description) ? $description[app()->getLocale()] ?? $description['en'] ?? '' : $description;
    
    // Grid columns
    $gridColumns = [
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 md:grid-cols-2',
        3 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
        4 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4',
    ][$columns] ?? 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3';

    // Alignment
    $alignmentClasses = [
        'start' => 'items-start text-left',
        'center' => 'items-center text-center',
        'end' => 'items-end text-right',
    ][$align] ?? 'items-start text-left';
    
    // Container classes
    $containerClasses = 'container mx-auto px-4 sm:px-6 lg:px-8';
    $titleClasses = 'text-3xl font-bold text-gray-900 mb-4';
    $descriptionClasses = 'text-lg text-gray-600 max-w-3xl mx-auto';
    $gridClasses = 'mt-12 grid ' . $gridColumns . ' ' . $gap;
@endphp

<div class="{{ $containerClasses }} {{ $className }}">
    @if($title || $description)
        <div class="{{ $alignmentClasses }} mb-12">
            @if($title)
                <h2 class="{{ $titleClasses }}">{{ $title }}</h2>
            @endif
            @if($description)
                <p class="{{ $descriptionClasses }}">{{ $description }}</p>
            @endif
        </div>
    @endif
    
    <div class="{{ $gridClasses }}">
        {{ $slot }}
    </div>
</div>
