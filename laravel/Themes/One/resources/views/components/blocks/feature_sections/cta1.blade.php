<div class="w-full flex flex-col justify-center items-center p-5">
    <div class="w-full lg:w-3/4 flex flex-col lg:flex-row items-center justify-center">
        @foreach ($sections as $section)
            <div class="bg-[#E6EBF7] flex flex-col items-center shadow-xl rounded-lg py-3 px-6 m-5 transform origin-center scale-100 hover:scale-110 transition-transform duration-100">
                <p class="pb-1 text-center">{{ $section['title'] }}</p>
                <a href="{{ $section['cta_link'] }}"><strong>{{ $section['cta_text'] }}</strong></a>
            </div>
        @endforeach
    </div>
</div>