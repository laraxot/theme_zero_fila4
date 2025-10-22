@props([
    'items' => [],
    'alignment' => 'start',
    'orientation' => 'horizontal'
])

@php
    $alignmentClasses = [
        'start' => 'justify-start',
        'center' => 'justify-center',
        'end' => 'justify-end'
    ];

    $orientationClasses = [
        'horizontal' => 'flex-row space-x-8',
        'vertical' => 'flex-col space-y-4'
    ];
@endphp

<nav class="hidden md:flex {{ $alignmentClasses[$alignment] }} {{ $orientationClasses[$orientation] }} m-12">
    @foreach($items as $item)
        @if($item['type'] === 'link')
            <a href="{{ $item['url'] }}" 
               class="text-base font-medium !text-white">
                {{ $item['label'] }}
            </a>
        @elseif($item['type'] === 'dropdown')
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center text-base font-medium text-white hover:text-primary-600">
                    {{ $item['label'] }}
                    <svg class="ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" 
                     @click.away="open = false"
                     class="absolute z-10 mt-2 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5">
                    @foreach($item['children'] as $child)
                        <a href="{{ $child['url'] }}" 
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ $child['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        @elseif($item['type'] === 'button')
            <a href="{{ $item['url'] }}" 
               class="inline-flex items-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-primary-700">
                {{ $item['label'] }}
            </a>
        @endif
    @endforeach
</nav>

{{-- Menu Mobile --}}
<div x-show="mobileMenuOpen" 
     x-transition:enter="transition ease-out duration-100"
     x-transition:enter-start="transform opacity-0 scale-95"
     x-transition:enter-end="transform opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-75"
     x-transition:leave-start="transform opacity-100 scale-100"
     x-transition:leave-end="transform opacity-0 scale-95"
     class="absolute inset-x-0 top-16 z-50 origin-top-right transform p-2 md:hidden">
    <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
        <div class="space-y-1 px-2 py-3">
            @foreach($items as $item)
                @if($item['type'] === 'link')
                    <a href="{{ $item['url'] }}" 
                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50">
                        {{ $item['label'] }}
                    </a>
                @elseif($item['type'] === 'dropdown')
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" 
                                class="flex w-full items-center justify-between rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50">
                            {{ $item['label'] }}
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" 
                             class="mt-2 space-y-1 rounded-md bg-gray-50 px-3 py-2">
                            @foreach($item['children'] as $child)
                                <a href="{{ $child['url'] }}" 
                                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100">
                                    {{ $child['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @elseif($item['type'] === 'button')
                    <a href="{{ $item['url'] }}" 
                       class="block w-full rounded-md bg-primary-600 px-3 py-2 text-center text-base font-medium text-white hover:bg-primary-700">
                        {{ $item['label'] }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div> 
