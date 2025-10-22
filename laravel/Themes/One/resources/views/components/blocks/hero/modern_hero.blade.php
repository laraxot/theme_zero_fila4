@props([
    'title' => '',
    'subtitle' => '',
    'image' => '',
    'cta' => null,
    'secondaryCta' => null,
    'overlay' => 'gradient', // none, dark, light, gradient
    'minHeight' => 'min-h-20 md:min-h-20',
    'contentPosition' => 'center', // start, center, end
    'className' => ''
])

@php
    // Handle translations
    $title = is_array($title) ? $title[app()->getLocale()] ?? $title['en'] ?? '' : $title;
    $subtitle = is_array($subtitle) ? $subtitle[app()->getLocale()] ?? $subtitle['en'] ?? '' : $subtitle;
    $image = is_array($image) ? $image[app()->getLocale()] ?? $image['en'] ?? '' : $image;
    
    // Position classes
    $contentPositionClasses = [
        'start' => 'items-start text-left',
        'center' => 'items-center text-center',
        'end' => 'items-end text-right',
    ][$contentPosition] ?? 'items-center text-center';

    // Overlay classes
    $overlayClasses = [
        'gradient' => 'bg-gradient-to-b from-black/60 to-black/20',
        'dark' => 'bg-black/50',
        'light' => 'bg-white/20',
        'none' => '',
    ][$overlay] ?? 'bg-gradient-to-b from-black/60 to-black/20';

    // Process CTA buttons
    $primaryCta = [];
    if (is_array($cta) && count($cta) >= 2) {
        $primaryCta = [
            'text' => is_array($cta[0]) ? ($cta[0][app()->getLocale()] ?? $cta[0]['en'] ?? '') : $cta[0],
            'url' => $cta[1]
        ];
    }

    $secondaryCtaData = [];
    if (is_array($secondaryCta) && count($secondaryCta) >= 2) {
        $secondaryCtaData = [
            'text' => is_array($secondaryCta[0]) ? ($secondaryCta[0][app()->getLocale()] ?? $secondaryCta[0]['en'] ?? '') : $secondaryCta[0],
            'url' => $secondaryCta[1]
        ];
    }
@endphp

<section class="relative min-h-[700px] flex items-center justify-center overflow-hidden {{ $className }}" 
         x-data="{ 
            scrolled: false,
            mounted: false,
            init() {
                this.mounted = true;
                window.addEventListener('scroll', () => {
                    this.scrolled = window.scrollY > 50;
                });
            }
         }">

    <!-- Overlay -->
    @if($overlay !== 'none')
        <div class="inset-0 -z-10 bg-[#E6EBF7]"></div>
    @endif

    <!-- Content -->
    <div class="container mx-auto px-4 sm:px-6 py-1 lg:py-8 lg:px-8 w-full">
        <div class="max-w-4xl mx-auto flex flex-col gap-6 items-center text-center {{ $contentPositionClasses }}">
            <div class="space-y-6 text-[#272C4D]"
                 x-data="{ 
                    show: false,
                    mounted() { 
                        this.$nextTick(() => {
                            setTimeout(() => this.show = true, 100);
                        });
                    } 
                 }"
                 x-init="mounted()"
                 x-intersect="show = true">

                <h1 class="text-4xl md:text-5xl lg:text-3xl font-bold leading-tight">
                    {{ $title }}
                </h1>

                <div class="text-xl">
                    {{ $subtitle }}
                </div>

                @if(!empty($primaryCta) || !empty($secondaryCtaData))
                    <div class="flex flex-row justify-center gap-4 pt-4">
                        @if(!empty($primaryCta))
                            <a href="{{ route('home') }}" 
                               class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md !text-white bg-[#FF5F7E] md:py-4 md:text-lg md:px-10">
                                {{ $primaryCta['text'] }}
                            </a>
                        @endif
                    </div>
                @endif

                <!-- Immagine centrata sotto il bottone -->
                <div class="pt-6">
                    <img class="mx-auto h-64 w-auto" src="/img/sala-attesa-2.svg" alt="@lang('pub_theme::content.hero.modern.room_image_alt.label')" />
                </div>

            </div>
        </div>
    </div>

</section>


