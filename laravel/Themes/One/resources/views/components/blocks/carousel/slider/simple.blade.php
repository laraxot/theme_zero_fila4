@props([
    'slides',
    'autoplay' => false,
    'loop' => true,
    'pagination' => true,
    'navigation' => true,
])

<div {{ $attributes->merge(['class' => 'carousel-container relative']) }}>
    <div class="swiper-container" x-init="() => {
        const swiper = new Swiper($el, {
            loop: {{ $loop ? 'true' : 'false' }},
            autoplay: {{ $autoplay ? '{ delay: 5000 }' : 'false' }},
            pagination: {{ $pagination ? '{ el: ".swiper-pagination" }' : 'false' }},
            navigation: {{ $navigation ? '{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }' : 'false' }},
        });
    }">
        <div class="swiper-wrapper">
            @foreach($slides as $slide)
                <div class="swiper-slide">
                    {{ $slide }}
                </div>
            @endforeach
        </div>
        @if($pagination)
            <div class="swiper-pagination"></div>
        @endif
        @if($navigation)
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        @endif
    </div>
</div>
