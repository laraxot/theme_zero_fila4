<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $subtitle;
    public string $className = "";
    public array $testimonials = [];
    public ?string $privacy_note = null;
}; ?>

<div class="{{ $className }}">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $title }}</h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">{{ $subtitle }}</p>
        </div>
        
        <div class="mx-auto mt-16 flow-root max-w-2xl sm:mt-20 lg:mx-0 lg:max-w-none">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($testimonials as $testimonial)
                    <div class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                        <div class="flex items-center gap-x-4 pb-4 border-b border-gray-100">
                            <div class="h-14 w-14 flex items-center justify-center rounded-full bg-blue-50 text-blue-600">
                                <x-filament::icon icon="heroicon-o-user-circle" class="h-8 w-8" />
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $testimonial['name'] }}</h3>
                                <p class="text-sm text-gray-500">{{ $testimonial['age'] }}, {{ $testimonial['location'] }}</p>
                                <div class="mt-1 flex">
                                    @for ($i = 0; $i < $testimonial['rating']; $i++)
                                        <x-filament::icon icon="heroicon-s-star" class="h-4 w-4 text-yellow-500" />
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <blockquote class="mt-4">
                            <div class="relative">
                                <x-filament::icon icon="heroicon-o-chat-bubble-left" class="absolute top-0 left-0 h-8 w-8 text-gray-100 -z-10" />
                                <div class="relative z-10">
                                    <p class="text-gray-600 text-sm leading-relaxed">{{ $testimonial['story'] }}</p>
                                    <p class="mt-3 text-base font-medium text-blue-600">"{{ $testimonial['quote'] }}"</p>
                                </div>
                            </div>
                        </blockquote>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-500">Trattamento: {{ $testimonial['treatment'] }}</span>
                                <span class="text-xs text-gray-500">Risultato: {{ $testimonial['outcome'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            @if($privacy_note)
                <div class="mt-10 text-center">
                    <p class="text-xs text-gray-500">{{ $privacy_note }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
