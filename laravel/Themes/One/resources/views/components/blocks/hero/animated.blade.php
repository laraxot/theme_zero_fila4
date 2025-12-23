<div class="relative overflow-hidden rounded-lg">
    <img src="{{ $image }}" alt="" class="w-full h-auto transform transition-transform duration-700 hover:scale-105" />
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6">
        <h2 class="text-4xl font-bold text-white mb-2 animate-fadeInDown">{{ $title }}</h2>
        <p class="text-lg text-gray-200 mb-4 animate-fadeInUp">{{ $subtitle }}</p>
        @if(!empty($cta_text) && !empty($cta_link))
            <a href="{!! $cta_link !!}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 animate-bounce">{{ $cta_text }}</a>
        @endif
    </div>
</div>
<!-- Requires TailwindCSS and AOS (Animate On Scroll) or custom animations -->
