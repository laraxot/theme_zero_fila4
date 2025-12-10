@props([
    'autoplay' => false,
    'autoplaySpeed' => 5000,
    'dots' => true,
    'arrows' => true,
    'infinite' => true,
    'slidesToShow' => 1,
    'slidesToScroll' => 1,
    'responsive' => [],
    'className' => '',
])

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .swiper-pagination-bullet {
            @apply bg-gray-400 opacity-100;
        }
        .swiper-pagination-bullet-active {
            @apply bg-primary-600;
        }
        .swiper-button-prev,
        .swiper-button-next {
            @apply text-primary-600 hover:text-primary-800 transition-colors;
        }
    </style>
@endpush

<div 
    x-data="{
        init() {
            new Swiper(this.$refs.carousel, {
                loop: {{ $infinite ? 'true' : 'false' }},
                autoplay: {{ $autoplay ? '{ delay: ' . $autoplaySpeed . ' }' : 'false' }},
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: {{ $slidesToShow }},
                spaceBetween: 24,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                    },
                    1024: {
                        slidesPerView: {{ $slidesToShow }},
                        spaceBetween: 32,
                    },
                },
                @if(!empty($responsive))
                @foreach($responsive as $breakpoint => $settings)
                {{ $breakpoint }}: {
                    slidesPerView: {{ $settings['slidesToShow'] ?? $slidesToShow }},
                    spaceBetween: {{ $settings['spaceBetween'] ?? 24 }},
                },
                @endforeach
                @endif
            });
        }
    }"
    class="relative {{ $className }}"
>
    <div class="swiper" x-ref="carousel">
        <div class="swiper-wrapper">
            {{ $slot }}
        </div>
        
        @if($dots)
            <div class="swiper-pagination mt-4"></div>
        @endif
        
        @if($arrows)
            <div class="swiper-button-prev left-0"></div>
            <div class="swiper-button-next right-0"></div>
        @endif
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
@endpush
