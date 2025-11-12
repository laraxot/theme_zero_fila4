@props([
    'title',
    'description',
    'button_text',
    'button_link'
])

<div class="bg-[#E6EBF7]">
    <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-[#272C4D] sm:text-4xl">{{ $title }}</h2>
            <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-600">
                {{ $description }}
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ $button_link }}" class="rounded-md bg-[#FF5F7E] px-3.5 py-2.5 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    {{ $button_text }}
                </a>
                @if(isset($secondary_button_text) && isset($secondary_button_link))
                    <a href="{{ $secondary_button_link }}" class="text-sm font-semibold leading-6 text-gray-900">
                        {{ $secondary_button_text }} <span aria-hidden="true">→</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
