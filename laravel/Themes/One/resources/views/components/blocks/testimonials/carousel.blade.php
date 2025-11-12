@props([
    'testimonials' => [],
    'showNavigation' => true,
    'showPagination' => true,
    'autoplay' => true,
    'autoplaySpeed' => 5000,
    'columns' => 3,
    'className' => '',
])

@php
    // Handle translations
    $testimonials = is_array($testimonials) ? $testimonials : [];
    
    // Responsive columns
    $responsive = [
        '640' => ['slidesToShow' => 1, 'spaceBetween' => 16],
        '768' => ['slidesToShow' => min(2, $columns), 'spaceBetween' => 20],
        '1024' => ['slidesToShow' => min(3, $columns), 'spaceBetween' => 24],
        '1280' => ['slidesToShow' => $columns, 'spaceBetween' => 32],
    ];
    
    // Card classes
    $cardClasses = [
        'h-full',
        'bg-white',
        'rounded-lg',
        'shadow-md',
        'overflow-hidden',
        'flex',
        'flex-col',
        'transition-all',
        'duration-300',
        'hover:shadow-lg',
        'hover:-translate-y-1'
    ];
    
    // Content classes
    $contentClasses = [
        'p-6',
        'flex-grow',
        'flex',
        'flex-col',
        'relative',
        'before:content-["\201C"]',
        'before:absolute',
        'before:top-4',
        'before:left-6',
        'before:text-6xl',
        'before:opacity-10',
        'before:font-serif',
        'before:leading-none',
        'before:pointer-events-none'
    ];
@endphp

<div class="relative {{ $className }}">
    @if(count($testimonials) > 0)
        <div 
            :autoplay="$autoplay"
            :autoplaySpeed="$autoplaySpeed"
            :showArrows="$showNavigation"
            :showDots="$showPagination"
            :slidesToShow="min($columns, count($testimonials))"
            :slidesToScroll="1"
            :centerMode="count($testimonials) > 1"
            class="py-8"
        >
            @foreach($testimonials as $testimonial)
                @php
                    $name = is_array($testimonial['name'] ?? '') ? ($testimonial['name'][app()->getLocale()] ?? $testimonial['name']['en'] ?? '') : $testimonial['name'] ?? '';
                    $role = is_array($testimonial['role'] ?? '') ? ($testimonial['role'][app()->getLocale()] ?? $testimonial['role']['en'] ?? '') : $testimonial['role'] ?? '';
                    $content = is_array($testimonial['content'] ?? '') ? ($testimonial['content'][app()->getLocale()] ?? $testimonial['content']['en'] ?? '') : $testimonial['content'] ?? '';
                    $rating = $testimonial['rating'] ?? 5;
                    $avatar = $testimonial['avatar'] ?? null;
                @endphp
                
                <div class="swiper-slide h-auto">
                    <div class="{{ implode(' ', $cardClasses) }}">
                        <div class="{{ implode(' ', $contentClasses) }}">
                            <p class="text-gray-700 mb-6 mt-8 relative z-10">{{ $content }}</p>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <div class="flex items-center">
                                    @if($avatar)
                                        <img src="{{ $avatar }}" alt="{{ $name }}" class="w-12 h-12 rounded-full object-cover mr-4">
                                    @else
                                        <div class="w-12 h-12 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-semibold text-lg mr-4">
                                            {{ substr($name, 0, 1) }}
                                        </div>
                                    @endif
                                    
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $name }}</div>
                                        @if($role)
                                            <div class="text-sm text-gray-500">{{ $role }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="ml-auto flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $rating)
                                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @else
                                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500">No testimonials available</p>
        </div>
    @endif
</div>
