@props([
    'icon' => null,
    'title' => '',
    'description' => '',
    'link' => null,
    'linkText' => '',
    'variant' => 'default', // default, elevated, outlined
    'className' => ''
])

@php
    // Handle translations
    $title = is_array($title) ? $title[app()->getLocale()] ?? $title['en'] ?? '' : $title;
    $description = is_array($description) ? $description[app()->getLocale()] ?? $description['en'] ?? '' : $description;
    $linkText = is_array($linkText) ? $linkText[app()->getLocale()] ?? $linkText['en'] ?? '' : $linkText;
    
    // Variant classes
    $variantClasses = [
        'default' => 'bg-white',
        'elevated' => 'bg-white shadow-lg hover:shadow-xl',
        'outlined' => 'bg-white border border-gray-200 hover:border-primary-300',
    ][$variant] ?? 'bg-white';
    
    // Animation classes
    $animationClasses = 'transition-all duration-300 hover:-translate-y-1';
@endphp

<div class="rounded-lg p-6 h-full flex flex-col {{ $variantClasses }} {{ $animationClasses }} {{ $className }}">
    @if($icon)
        <div class="w-12 h-12 rounded-full bg-primary-50 text-primary-600 flex items-center justify-center mb-4">
            @if(str_contains($icon, '/'))
                <img src="{{ $icon }}" alt="" class="w-6 h-6">
            @else
                <x-dynamic-component :component="'heroicon-o-' . $icon" class="w-6 h-6" />
            @endif
        </div>
    @endif
    
    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $title }}</h3>
    
    @if($description)
        <p class="text-gray-600 mb-4 flex-grow">{{ $description }}</p>
    @endif
    
    @if($link && $linkText)
        <div class="mt-auto">
            <a href="{{ $link }}" class="inline-flex items-center text-primary-600 hover:text-primary-800 font-medium">
                {{ $linkText }}
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    @endif
</div>
