@props(['block'])

@php
$title = $block->data['title'] ?? 'Link Rapidi';
$items = $block->data['items'] ?? [];
@endphp

<div class="space-y-6">
    @if($title)
        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
            {{ $title }}
        </h3>
    @endif
    
    <ul class="space-y-4">
        @foreach($items as $item)
            <li>
                <a href="{{ $item['url'] }}" 
                   class="text-sm text-gray-600 hover:text-primary-600 dark:text-gray-400 dark:hover:text-primary-400">
                    {{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div> 