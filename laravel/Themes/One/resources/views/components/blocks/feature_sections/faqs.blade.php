<div class="flex flex-col justify-center items-center">
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
<!-- Page title -->
    <div class="p-10 w-full flex justify-center">
        <h1 class="text-center">{{ $title }}</h1>
    </div>

    <!-- FAQ Content -->
    <div class="w-full lg:w-2/4 flex flex-col justify-center p-5">

        <!-- FAQ Item -->
        @foreach ($sections as $section)
        <div class="mt-5">
            <h3 class="text-[#272C4D]">{{ $section['title'] }}</h3>
            <p class="text-[#272C4D] pt-2 text-lg">
                {!! $section['description'] !!}
            </p>
        </div>
        @endforeach
    </div>
</div>