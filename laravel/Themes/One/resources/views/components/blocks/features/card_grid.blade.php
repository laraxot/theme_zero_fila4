@props([
    'columns' => 3, // 1-4
    'gap' => 'gap-8', // gap-4, gap-6, gap-8, gap-12
    'align' => 'start', // start, center, end
    'className' => '',
])

@php
    $gridColumns = [
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 md:grid-cols-2',
        3 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
        4 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4',
    ][$columns] ?? 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3';

    $alignmentClasses = [
        'start' => 'items-start text-left',
        'center' => 'items-center text-center',
        'end' => 'items-end text-right',
    ][$align] ?? 'items-start text-left';
@endphp

<div class="{{ $className }}">
    <div class="grid {{ $gridColumns }} {{ $gap }} {{ $alignmentClasses }}">
        {{ $slot }}
    </div>
</div>
