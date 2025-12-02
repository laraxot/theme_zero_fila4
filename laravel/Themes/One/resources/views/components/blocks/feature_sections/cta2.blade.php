<div class="w-full flex flex-col justify-center items-center">
<div class="w-full flex justify-start">
        {{-- DA AGGIORNARE URL --}}
        <a href="{{ route('home') }}">
            <div class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-9">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
            </div>
        </a>
    </div>
    <div class="w-full flex justify-center p-10">
        <h1 class="text-[#272C4D] text-center">{{ $title }}</h1>
    </div>

@foreach ($sections as $section)
    <div class="w-full lg:w-2/4 grid grid-cols-1 lg:grid-cols-2 gap-4 justify-center items-center p-10">
        <div class="flex justify-center">
            <a href="{{ $section['url'] }}" target="_blank">
                <img class="{{ $section['img_class'] }}" src="{{ $section['img'] }}" />
            </a>
        </div>
            <span class="ml-0 lg:ml-5 text-lg">
            {{ $section['description'] }}
            </span>
    </div>
@endforeach
</div>