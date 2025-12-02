@props([
    'title',
    'subtitle' => null,
    'image' => null,
    'cta' => null,
    'secondaryCta' => null,
    'overlay' => 'gradient', // none, solid, gradient
    'minHeight' => 'min-h-[80vh]',
    'contentPosition' => 'center', // start, center, end
    'animation' => 'fade-up',
    'textColor' => 'text-white',
    'containerClass' => 'container mx-auto px-4 sm:px-6 lg:px-8',
])

@php
    $contentPositionClasses = [
        'start' => 'items-start text-left',
        'center' => 'items-center text-center',
        'end' => 'items-end text-right',
    ][$contentPosition] ?? 'items-center text-center';

    $overlayClasses = match($overlay) {
        'gradient' => 'bg-gradient-to-b from-black/30 via-black/20 to-black/10',
        'solid' => 'bg-black/20',
        'dark' => 'bg-black/50',
        default => '',
    };

    $animationClasses = [
        'fade-up' => 'opacity-0 translate-y-8',
        'fade-in' => 'opacity-0',
        'zoom-in' => 'opacity-0 scale-95',
        'slide-left' => 'opacity-0 -translate-x-8',
        'slide-right' => 'opacity-0 translate-x-8',
    ][$animation] ?? 'opacity-0';
@endphp

<section 
    class="relative overflow-hidden {{ $minHeight }} flex items-center justify-center"
    x-data="{
        scrolled: false,
        init() {
            this.scrolled = window.scrollY > 50;
            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 50;
            });
        }
    }"
    :class="{ 'pt-16': scrolled }"
    x-intersect:leave="scrolled = true"
    x-intersect:enter="scrolled = false"
    style="transition: padding 0.3s ease-in-out;"
>
    @if($image)
        <div class="absolute inset-0 -z-10">
            <img 
                src="{{ $image }}" 
                alt="" 
                class="absolute inset-0 w-full h-full object-cover"
                loading="lazy"
                @if($overlay !== 'none')
                    x-intersect.once="
                        $el.classList.add('scale-110')
                        $el.style.transition = 'transform 8s cubic-bezier(0.16, 1, 0.3, 1)'
                    "
                @endif
            >
        </div>
    @endif

    @if($overlay !== 'none')
        <div class="absolute inset-0 -z-10 {{ $overlayClasses }}"></div>
    @endif

    <div class="{{ $containerClass }} relative z-10 w-full">
        <div class="max-w-4xl mx-auto {{ $contentPositionClasses }} flex flex-col gap-6">
            <div 
                class="space-y-4 {{ $textColor }}"
                x-data="{ 
                    show: false,
                    init() { 
                        this.$nextTick(() => {
                            setTimeout(() => this.show = true, 100);
                        });
                    } 
                }"
                x-intersect="show = true"
            >
                @if($subtitle)
                    <p 
                        class="text-lg md:text-xl font-medium tracking-wide uppercase"
                        x-show="show"
                        x-transition:enter="transition-all duration-700 ease-out"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                    >
                        {{ $subtitle }}
                    </p>
                @endif

                <h1 
                    class="text-4xl md:text-6xl font-bold leading-tight"
                    x-show="show"
                    x-transition:enter="transition-all duration-700 ease-out delay-150"
                    x-transition:enter-start="opacity-0 translate-y-6"
                    x-transition:enter-end="opacity-100 translate-y-0"
                >
                    {{ $title }}
                </h1>

                @if(isset($cta) && is_array($cta) && count($cta) === 2)
                    <div 
                        class="pt-2 flex flex-wrap gap-4"
                        x-show="show"
                        x-transition:enter="transition-all duration-700 ease-out delay-300"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                    >
                        <a 
                            href="{{ $cta[1] }}" 
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-300 transform hover:-translate-y-1"
                        >
                            {{ $cta[0] }}
                        </a>
                        
                        @if(isset($secondaryCta) && is_array($secondaryCta) && count($secondaryCta) === 2)
                            <a 
                                href="{{ $secondaryCta[1] }}" 
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-primary-700 bg-white/90 hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white/50 transition-all duration-300 transform hover:-translate-y-1"
                            >
                                {{ $secondaryCta[0] }}
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-0 right-0 flex justify-center">
        <button 
            @click="window.scrollTo({ top: window.innerHeight, behavior: 'smooth' })"
            class="text-white hover:text-primary-300 focus:outline-none transition-all duration-300 transform hover:translate-y-1"
            aria-label="Scroll down"
        >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </button>
    </div>
</section>
