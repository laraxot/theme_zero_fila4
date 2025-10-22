@props([
    'testimonials' => [],
    'showNavigation' => true,
    'showPagination' => true,
    'autoplay' => true,
    'delay' => 5000,
    'className' => '',
])

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <style>
        .swiper-pagination-bullet {
            @apply bg-gray-300 opacity-100 w-3 h-3 transition-all duration-300;
        }
        .swiper-pagination-bullet-active {
            @apply bg-primary-600 w-8 rounded-full;
        }
        .testimonial-card {
            @apply bg-white p-8 rounded-xl shadow-lg h-full flex flex-col transition-all duration-300 hover:shadow-xl;
        }
        .testimonial-avatar {
            @apply w-16 h-16 rounded-full object-cover border-4 border-white shadow-md;
        }
    </style>
@endpush

<div x-data="{
    init() {
        const swiper = new Swiper(this.$refs.testimonialSlider, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {{ $autoplay ? '{\"delay\": ' . $delay . ', \"disableOnInteraction\": false}' : 'false' }},
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    }
}" class="relative {{ $className }}">
    <div class="swiper" x-ref="testimonialSlider">
        <div class="swiper-wrapper">
            @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="flex items-center mb-6">
                            @if(isset($testimonial['avatar']))
                                <img 
                                    src="{{ $testimonial['avatar'] }}" 
                                    alt="{{ $testimonial['name'] ?? 'Testimonial' }}"
                                    class="testimonial-avatar mr-4"
                                    loading="lazy"
                                >
                            @endif
                            <div>
                                <h4 class="font-semibold text-lg text-gray-900">{{ $testimonial['name'] ?? 'Anonymous' }}</h4>
                                @if(isset($testimonial['role']))
                                    <p class="text-sm text-gray-600">{{ $testimonial['role'] }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="flex-grow">
                            <div class="text-gray-700 mb-4">
                                {{ $testimonial['content'] ?? '' }}
                            </div>
                            
                            @if(isset($testimonial['rating']) && is_numeric($testimonial['rating']))
                                <div class="flex items-center mt-auto">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg 
                                            class="w-5 h-5 {{ $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300' }}" 
                                            fill="currentColor" 
                                            viewBox="0 0 20 20"
                                        >
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($showPagination)
            <div class="swiper-pagination mt-8"></div>
        @endif

        @if($showNavigation)
            <div class="swiper-button-prev text-primary-600"></div>
            <div class="swiper-button-next text-primary-600"></div>
        @endif
    </div>

    @push('scripts')
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    @endpush
</div>
