@props(['title' => '', 'subtitle' => '', 'image' => '', 'background_gradient' => 'from-blue-100 to-teal-50', 'text_color' => 'text-gray-900', 'cta_text' => '', 'cta_link' => '', 'cta_color' => 'bg-teal-600 hover:bg-teal-700 text-white'])

<section 
    class="relative py-16 sm:py-24 lg:py-32 overflow-hidden {{ $background_gradient }} {{ $text_color }}"
    x-data="{
        shown: false,
        init() {
            this.$nextTick(() => {
                this.shown = true;
            });
        }
    }"
>
    <!-- Decorative elements and patterns -->
    <div class="absolute inset-0 z-0 opacity-20">
        <div class="absolute top-0 left-0 w-40 h-40 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-40 h-40 bg-teal-500 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 w-40 h-40 bg-rose-300 rounded-full mix-blend-multiply filter blur-3xl"></div>

        <!-- Medical-themed SVG patterns -->
        <svg class="absolute top-0 right-0 w-32 h-32 text-blue-200 opacity-20" fill="currentColor" viewBox="0 0 100 100">
            <path d="M50 0A50 50 0 1 1 50 100A50 50 0 0 1 50 0zm0 10A40 40 0 1 0 50 90A40 40 0 0 0 50 10z"></path>
            <path d="M20 50H80M50 20V80"></path>
        </svg>
        <svg class="absolute bottom-0 left-0 w-32 h-32 text-teal-200 opacity-20" fill="currentColor" viewBox="0 0 100 100">
            <path d="M20 20H40V40H20z M60 20H80V40H60z M20 60H40V80H20z M60 60H80V80H60z"></path>
        </svg>
    </div>

    <div class="container relative z-10 mx-auto px-6 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left content area -->
            <div 
                x-cloak 
                x-show="shown"
                x-transition:enter="transition ease-out duration-700 transform"
                x-transition:enter-start="opacity-0 translate-y-12"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="flex flex-col space-y-8"
            >
                <!-- Medical icon with pulse animation -->
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-teal-500 to-blue-600 text-white mb-3">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span class="absolute w-full h-full rounded-full animate-ping bg-teal-400 opacity-30"></span>
                </div>

                <!-- Title with gradient -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight">
                    <span class="bg-gradient-to-r from-teal-600 to-blue-700 bg-clip-text text-transparent">
                        {{ $title }}
                    </span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-lg md:text-xl leading-relaxed opacity-90 max-w-2xl">
                    {{ $subtitle }}
                </p>

                <!-- Call to action button -->
                @if($cta_text && $cta_link)
                <div class="pt-4">
                    <a href="{{ $cta_link }}" 
                       class="{{ $cta_color }} px-6 py-3 rounded-lg shadow-md font-medium transition-all duration-300 ease-in-out transform hover:shadow-lg hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 inline-flex items-center">
                        {{ $cta_text }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                @endif

                <!-- Trust indicators -->
                <div class="flex flex-wrap items-center gap-6 pt-6 text-sm text-gray-600">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Staff certificato</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                        <span>Cure personalizzate</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                        </svg>
                        <span>Risposta rapida</span>
                    </div>
                </div>
            </div>

            <!-- Right image area with floating animation -->
            <div 
                x-cloak 
                x-show="shown"
                x-transition:enter="transition ease-out duration-700 delay-300 transform"
                x-transition:enter-start="opacity-0 translate-y-12"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="relative"
            >
                <div class="absolute inset-0 bg-gradient-to-tr from-teal-500/20 to-blue-500/20 rounded-3xl -rotate-1 scale-[1.03] z-0"></div>
                <div class="relative z-10 rounded-3xl overflow-hidden shadow-xl ring-1 ring-gray-900/10 transform hover:-translate-y-1 transition-transform duration-300 ease-in-out">
                    <img 
                        src="{{ $image ?: '/img/hero-team-medical.jpg' }}" 
                        alt="Team medico SaluteOra" 
                        class="w-full h-full object-cover"
                        loading="eager"
                    >
                </div>
                
                <!-- Floating medical elements with animations -->
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-white/90 rounded-xl shadow-xl flex items-center justify-center p-4 animate-float z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                
                <div class="absolute -top-4 left-6 w-20 h-20 bg-blue-600/90 text-white rounded-full shadow-xl flex items-center justify-center p-4 animate-pulse-slow z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alpine.js animation styles -->
<style>
    [x-cloak] { display: none !important; }
    
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
    
    .animate-pulse-slow {
        animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: .9; transform: scale(1); }
        50% { opacity: .8; transform: scale(0.95); }
    }
</style>
