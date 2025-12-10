@props(['block'])

@php
$title = $block->data['title'] ?? 'Seguici';
$items = $block->data['items'] ?? [];
@endphp

<div class="space-y-6">
    @if($title)
        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
            {{ $title }}
        </h3>
    @endif
    
    <ul class="flex space-x-6">
        @foreach($items as $item)
            <li>
                <a href="{{ $item['url'] }}" 
                   class="text-gray-400 hover:text-primary-500 dark:text-gray-500 dark:hover:text-primary-400">
                    <span class="sr-only">{{ $item['label'] }}</span>
                    @if(isset($item['icon']))
                        {!! $item['icon'] !!}
                    @else
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="{{ $item['path'] ?? '' }}"/>
                        </svg>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</div> 