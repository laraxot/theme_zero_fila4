@props([
    'title',
    'description' => null,
    'icon' => null,
    'link' => null,
    'linkText' => 'Learn more',
    'variant' => 'default', // default, elevated, outline, filled
    'iconVariant' => 'circle', // circle, square, none
    'iconSize' => 'medium', // small, medium, large
    'className' => '',
])

@php
    $cardClasses = [
        'default' => 'bg-white',
        'elevated' => 'bg-white shadow-lg hover:shadow-xl',
        'outline' => 'bg-white border-2 border-gray-200 hover:border-primary-500',
        'filled' => 'bg-gray-50 hover:bg-gray-100',
    ][$variant] ?? 'bg-white';

    $iconContainerClasses = [
        'circle' => 'rounded-full',
        'square' => 'rounded-lg',
        'none' => '',
    ][$iconVariant] ?? 'rounded-full';

    $iconSizes = [
        'small' => 'h-8 w-8',
        'medium' => 'h-10 w-10',
        'large' => 'h-12 w-12',
    ][$iconSize] ?? 'h-10 w-10';

    $iconContainerSizes = [
        'small' => 'p-2',
        'medium' => 'p-3',
        'large' => 'p-4',
    ][$iconSize] ?? 'p-3';
@endphp

<div 
    class="relative flex flex-col h-full p-6 rounded-xl transition-all duration-300 {{ $cardClasses }} {{ $className }}"
    x-data="{ 
        hover: false,
        show: false,
        init() { 
            this.$nextTick(() => {
                setTimeout(() => this.show = true, 100);
            });
        }
    }"
    x-intersect="show = true"
    x-bind:class="{ 'transform -translate-y-1': hover }"
    @mouseenter="hover = true"
    @mouseleave="hover = false"
    x-transition:enter="transition-all duration-500 ease-out"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
>
    @if($icon)
        <div class="mb-4">
            <div class="inline-flex items-center justify-center {{ $iconContainerClasses }} {{ $iconContainerSizes }} bg-primary-50 text-primary-600">
                <x-dynamic-component 
                    :component="'heroicon-o-' . $icon" 
                    class="{{ $iconSizes }}"
                />
            </div>
        </div>
    @endif

    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $title }}</h3>
    
    @if($description)
        <p class="text-gray-600 mb-4 flex-grow">{{ $description }}</p>
    @endif

    @if($link)
        <div class="mt-auto pt-2">
            <a 
                href="{{ $link }}" 
                class="inline-flex items-center text-primary-600 font-medium hover:text-primary-800 group transition-colors duration-200"
            >
                <span>{{ $linkText }}</span>
                <svg 
                    class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    @endif

    @if($variant === 'elevated')
        <div 
            class="absolute inset-0 rounded-xl border-2 border-transparent group-hover:border-primary-200 transition-colors duration-300 pointer-events-none"
            aria-hidden="true"
        ></div>
    @endif
</div>
