@props(['block'])

@php
$title = $block->data['title'] ?? 'Newsletter';
$description = $block->data['description'] ?? '';
$action = $block->data['action'] ?? '#';
$placeholder = $block->data['placeholder'] ?? 'Inserisci la tua email';
$button_text = $block->data['button_text'] ?? 'Iscriviti';
@endphp

<div class="space-y-6">
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
    
    <form action="{{ $action }}" method="POST" class="mt-4">
        <div class="flex gap-x-4">
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" 
                   name="email" 
                   type="email" 
                   autocomplete="email" 
                   required 
                   class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6" 
                   placeholder="{{ $placeholder }}">
            
            <button type="submit" 
                    class="flex-none rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                {{ $button_text }}
            </button>
        </div>
    </form>
</div> 