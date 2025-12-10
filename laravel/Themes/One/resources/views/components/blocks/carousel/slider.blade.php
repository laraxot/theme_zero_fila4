@props([
    'autoplay' => true,
    'autoplaySpeed' => 5000,
    'showArrows' => true,
    'showDots' => true,
    'infinite' => true,
    'slidesToShow' => 1,
    'slidesToScroll' => 1,
    'centerMode' => false,
    'centerPadding' => '0px',
    'className' => '',
])

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <style>
        .swiper-slide {
            height: auto;
            display: flex;
        }
        .swiper-pagination-bullet {
            @apply bg-gray-300 opacity-100 w-3 h-3 mx-1;
        }
        .swiper-pagination-bullet-active {
            @apply bg-primary-600 w-8 rounded-full transition-all duration-300;
        }
        .swiper-button-prev,
        .swiper-button-next {
            @apply text-primary-600 hover:text-primary-800 transition-colors bg-white/80 backdrop-blur-sm rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:shadow-lg;
        }
        .swiper-button-prev:after,
        .swiper-button-next:after {
            @apply text-xl font-bold;
        }
        .swiper-button-prev {
            left: 1rem;
        }
        .swiper-button-next {
            right: 1rem;
        }
    </style>
@endpush

<div 
    x-data="{
        init() {
            new Swiper(this.$refs.slider, {
                loop: {{ $infinite ? 'true' : 'false' }},
                autoplay: {{ $autoplay ? '{ delay: ' . $autoplaySpeed . ', disableOnInteraction: false }' : 'false' }},
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: {{ $slidesToShow }},
                slidesPerGroup: {{ $slidesToScroll }},
                spaceBetween: 24,
                centeredSlides: {{ $centerMode ? 'true' : 'false' }},
                centerInsufficientSlides: true,
                breakpoints: {
                    640: {
                        slidesPerView: 1.2,
                        spaceBetween: 16,
                        centeredSlides: true,
                    },
                    768: {
                        slidesPerView: {{ min(2, $slidesToShow) }},
                        spaceBetween: 20,
                        centeredSlides: false,
                    },
                    1024: {
                        slidesPerView: {{ $slidesToShow }},
                        spaceBetween: 24,
                        centeredSlides: {{ $centerMode ? 'true' : 'false' }},
                    },
                    1280: {
                        slidesPerView: min({{ $slidesToShow + 1 }}, 5),
                        spaceBetween: 32,
                    },
                },
                on: {
                    init: function() {
                        this.el.classList.remove('invisible');
                    },
                },
            });
        }
    }"
    class="relative {{ $className }}"
>
    <div 
        class="swiper invisible transition-opacity duration-300" 
        x-ref="slider"
    >
        <div class="swiper-wrapper">
            {{ $slot }}
        </div>
        
        @if($showDots)
            <div class="swiper-pagination mt-6"></div>
        @endif
        
        @if($showArrows)
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        @endif
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
@endpush
