@props([
    'title' => 'Titolo Hero',
    'subtitle' => 'Sottotitolo della hero section',
    'image' => null,
    'cta_text' => null,
    'cta_link' => '#',
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900',
    'cta_color' => 'bg-primary-600 hover:bg-primary-700'
])

<section 
    class="relative overflow-hidden {{ $background_color }}"
    aria-labelledby="hero-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                <h1 
                    id="hero-heading"
                    class="text-4xl tracking-tight font-extrabold {{ $text_color }} sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                    {{ $title }}
                </h1>
                
                <p class="mt-3 text-base {{ $text_color }} sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                    {{ $subtitle }}
                </p>

                @if($cta_text)
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a 
                                href="{{ $cta_link }}"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white {{ $cta_color }} md:py-4 md:text-lg md:px-10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors duration-200"
                                role="button"
                                aria-label="{{ $cta_text }}"
                            >
                                {{ $cta_text }}
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            @if($image)
                <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                    <div class="relative mx-auto w-full rounded-lg shadow-lg lg:max-w-md">
                        <img
                            class="w-full h-auto rounded-lg"
                            src="{{ $image }}"
                            alt=""
                            aria-hidden="true"
                            loading="lazy"
                        >
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
