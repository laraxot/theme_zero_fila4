@props(['block'])

@php
$title = $block->data['title'] ?? 'Contatti';
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
            <li class="flex items-start">
                @if(isset($item['icon']))
                    <span class="flex-shrink-0 text-gray-400 dark:text-gray-500">
                        {!! $item['icon'] !!}
                    </span>
                @endif
                
                <div class="ml-3">
                    @if(isset($item['label']))
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                            {{ $item['label'] }}
                        </p>
                    @endif
                    
                    @if(isset($item['value']))
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $item['value'] }}
                        </p>
                    @endif
                    
                    @if(isset($item['url']))
                        <a href="{{ $item['url'] }}" 
                           class="text-sm text-primary-600 hover:text-primary-500">
                            {{ $item['url_text'] ?? $item['url'] }}
                        </a>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div> 