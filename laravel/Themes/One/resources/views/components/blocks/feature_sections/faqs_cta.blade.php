<div class="flex flex-col justify-center items-center">
<!-- Call to Action Box -->
        <div class="mt-5">
            <h3 class="text-[#FF5F7E]">
                {!! $title !!}
            </h3>

            <div class="pt-5 flex flex-col lg:flex-row justify-center items-center">
                @foreach ($sections as $section)
                <!-- Card 1 -->
                <div class="w-64 h-44 bg-cover bg-[#FCD5D0] rounded-[25px] shadow-2xl m-5 transform origin-center scale-100 hover:scale-110 transition-transform duration-100">
                    <div class="grid grid-cols-2">
                        <div class="flex justify-center">
                            <img class="h-44 px-2 pt-2" src="{{ $section['img'] }}" />
                        </div>
                        <a href="{{ $section['url'] }}">
                        <div class="w-full h-full flex flex-col items-center justify-center">
                            <span class="text-[#FF5F7E] text-xl text-center lg:text-2xl">
                               {!! $section['title'] !!}
                            </span>
                        </div>
                        </a>
                    </div>
                </div>
                @endforeach
                {{--  
                <!-- Card 2 -->
                <div class="w-64 h-44 bg-[#FCD5D0] rounded-[25px] shadow-2xl m-5">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex justify-center">
                            <img class="h-44 p-2" src="/img/dentist.png" />
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-[#FF5F7E] text-xl lg:text-2xl">
                                Vai alla guida
                            </span>
                        </div>
                    </div>
                </div>
                --}}
            </div>
        </div>
    </div>