<?php
    $backgroundImage = $isMobile
        ? "/img/landing-mobile-salute-orale.svg"
        : "/img/soluzione-unita-desktop-landing.svg";
    $flagCode = $lang === 'en' ? 'gb' : $lang;
?>

<div 
    style="background-repeat: no-repeat; background-position: top; background-size: cover;"
    class="bg-[url('/img/landing-mobile-salute-orale.svg')] ipad:bg-[url('/img/landing-mobile-salute-orale.svg')] lg:bg-[url('/img/soluzione-unita-per-desktop.svg')] min-h-screen m-0 p-0 bg-top ipad:bg-right-top">
      
    <!-- INIZIO HEADER -->
    <div x-data="{ mobileMenuOpen: false }" class="relative">
      <!-- Header Bar -->
      <div class="w-full h-18 p-2 lg:p-8 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex-shrink-0">
          <img src="/img/logo.png" class="h-7 lg:h-14" alt="Logo" />
        </div>

        <!-- Desktop Navigation - Hidden on Mobile -->
        <div class="hidden lg:flex flex-row items-center space-x-6">
          <a href="/{{ $lang }}/" class="text-white hover:text-gray-200 text-xl transition-colors duration-200">
            @lang('pub_theme::navigation.main_menu.home.label')
          </a>
          <a href="/{{ $lang }}/pages/progetto" class="text-white hover:text-gray-200 text-xl transition-colors duration-200">
            @lang('pub_theme::navigation.main_menu.project.label')
          </a>
          <a href="/{{ $lang }}/pages/partners" class="text-white hover:text-gray-200 text-xl transition-colors duration-200">
            @lang('pub_theme::navigation.main_menu.partners.label')
          </a>
        </div>

        <!-- Desktop Actions - Hidden on Mobile -->
        <div class="hidden lg:flex items-center space-x-4">
          <!-- Language Switcher Desktop ONLY -->
          <div class="hidden lg:block">
            <x-blocks.navigation.language-switcher alignment="right" />
          </div>
          
          <!-- Login/Register Buttons -->
          <div class="flex items-center space-x-4">
            <a href="/{{ $lang }}/auth/login" class="text-white hover:text-gray-200 text-xl transition-colors duration-200">
              @lang('pub_theme::navigation.main_menu.login.label')
            </a>
            <a href="/{{ $lang }}/auth/register">
              <button class="text-white text-xl bg-transparent border-2 border-white py-3 px-6 rounded-lg hover:bg-white/10 transition-colors duration-200">
                @lang('pub_theme::navigation.main_menu.register.label')
              </button>
            </a>
          </div>
        </div>

        <!-- Mobile Hamburger Button - Only visible on Mobile -->
        <button 
          @click="mobileMenuOpen = !mobileMenuOpen"
          class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white transition-colors duration-200"
          aria-label="@lang('pub_theme::navigation.language_switcher.choose_language.label')"
        >
          <!-- Hamburger Icon -->
          <svg x-show="!mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!-- Close Icon -->
          <svg x-show="mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu Dropdown - Only visible on Mobile when opened -->
      <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4"
        @click.away="mobileMenuOpen = false"
        class="lg:hidden absolute top-full left-0 right-0 bg-black backdrop-blur-md z-50 mx-2 mt-2 rounded-xl shadow-2xl border border-white/10"
        style="display: none;"
       >
        <div class="px-6 py-6 space-y-6">
          <!-- Navigation Links -->
          <div class="space-y-4">
            <a href="/{{ $lang }}/" 
               @click="mobileMenuOpen = false"
               class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
              @lang('pub_theme::navigation.main_menu.home.label')
            </a>
            <a href="/{{ $lang }}/pages/progetto" 
               @click="mobileMenuOpen = false"
               class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
              @lang('pub_theme::navigation.main_menu.project.label')
            </a>
            <a href="/{{ $lang }}/pages/partners" 
               @click="mobileMenuOpen = false"
               class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
              @lang('pub_theme::navigation.main_menu.partners.label')
            </a>
          </div>

          <!-- Divider -->
          <hr class="border-white/20">

          <!-- Language Switcher -->
          <div class="py-2">
            <div class="text-white text-sm font-medium mb-3 px-4">
              @lang('pub_theme::navigation.language_switcher.choose_language.label')
            </div>
            <x-blocks.navigation.language-switcher :mobileView="true" />
          </div>

          <!-- Divider -->
          <hr class="border-white/20">

          <!-- Login/Register Buttons -->
          <div class="space-y-4 pt-2">
            <a href="/{{ $lang }}/auth/login" 
               @click="mobileMenuOpen = false"
               class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
              @lang('pub_theme::navigation.main_menu.login.label')
            </a>
            <a href="/{{ $lang }}/auth/register" 
               @click="mobileMenuOpen = false"
               class="block">
              <button class="w-full text-white text-lg bg-transparent border-2 border-white py-3 px-6 rounded-lg hover:bg-white/10 transition-colors duration-200">
                @lang('pub_theme::navigation.main_menu.register.label')
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- FINE HEADER -->
  
    <!-- INIZIO PRIMA SECTION -->
     <div class="w-full p-8 ipad:h-[50vh] lg:h-dvh flex items-center">
       <div class="w-[60%] ipad:w-[40%] lg:text-4xl ipad:ml-5 lg:ml-32 lg:w-2/5 flex flex-col justify-start">
         <h1 class="text-[#FF5F7E] text-[40px] ipad:text-4xl lg:text-8xl leading-tight font-bold mb-2.5">
           @lang('pub_theme::navigation.hero.welcome_title.label')
         </h1>
         <span class="w-4/5 lg:w-auto text-white text-lg lg:text-2xl leading-slug mt-5">
           @lang('pub_theme::navigation.hero.welcome_subtitle.label')
         </span>
         <a href="/{{ $lang }}/auth/register">
           <button
             class="w-40 lg:w-44 bg-[#FF5F7E] text-white py-3 px-7 rounded-lg text-xl lg:text-2xl mt-5 transform origin-center scale-100 hover:scale-110 transition-transform duration-100"
           >
             @lang('pub_theme::navigation.hero.start_now.label')
           </button>
         </a>
       </div>
     </div>
    <!-- FINE PRIMA SECTION -->
    <!-- INIZIO SECONDA SECTION -->
    <div class="w-full flex flex-col justify-start items-center">
      <div class="flex justify-center lg:w-full p-6 mt-12 ipad:mt-28 lg:mt-24">
        <h1 class="md:w-3/4  ipad:w-3/4 text-[#FF5F7E] text-center">
          @lang('pub_theme::navigation.hero.importance_title.label')
        </h1>
      </div>
      <div class="w-5/6 flex flex-col lg:flex-row justify-around items-center lg:items-start mt-0 lg:mt-10">
        <div class="w-full lg:w-2/4 p-4 flex flex-col items-center">
          <h2 class="text-[#FF5F7E] text-center mb-3">
          @lang('pub_theme::navigation.hero.importance_title_1.label')
          </h2>
          <p class="text-white text-center text-lg lg:text-2xl leading-8">
          @lang('pub_theme::navigation.hero.importance_text_1.label')
          </p>
        </div>
        <div class="w-full lg:w-2/4 p-4 flex flex-col items-center">
          <h2 class="text-[#FF5F7E] text-center mb-3">
          @lang('pub_theme::navigation.hero.importance_title_2.label')
          </h2>
          <p class="text-white text-center text-lg lg:text-2xl leading-8">
          @lang('pub_theme::navigation.hero.importance_text_2.label')
          </p>
        </div>
        <div class="w-full lg:w-2/4 p-4 flex flex-col items-center">
          <h2 class="text-[#FF5F7E] text-center mb-3">
          @lang('pub_theme::navigation.hero.importance_title_3.label')
          </h2>
          <p class="text-white text-center text-lg lg:text-2xl leading-8">
          @lang('pub_theme::navigation.hero.importance_text_3.label')
          </p>
        </div>
      </div>
      <div class="w-full flex justify-center my-5">
        <a href="/{{ $lang }}/pages/progetto">
          <button class="bg-[#FF5F7E] text-white rounded-md py-3 px-6 text-xl transform origin-center scale-100 hover:scale-110 transition-transform duration-100">@lang('pub_theme::navigation.hero.discover_project.label')</button>
        </a>
      </div>
    </div>
    <!-- FINE SECONDA SECTION -->
    <!-- INIZIO TERZA SECTION -->
    <div class="relative bg-[#FCD5D0] bg-cover m-4 ipad:m-14 lg:m-20 rounded-[35px] p-6 lg:p-0">
      <img src="/img/inmp-trasparenza-5.svg" class="absolute inset-0 w-full h-full object-contain p-5 pointer-events-none"/>
      <div
        class="flex flex-col ipad:flex-col lg:flex-row items-center justify-around lg:justify-center h-[750px] bg-cover bg-inmp-filigrana"
      >
        <div>
          <img class="h-72 lg:h-[500px]" src="/img/dentist.png"/>
        </div>
        <div class="flex flex-col items-center">
          <h1 class="text-[#272C4D] text-center text-4xl ipad:text-5xl lg:text-6xl">@lang('pub_theme::landing.participation.title.label')</h1>
          <span class="text-[#272C4D] text-center text-xl mt-10">@lang('pub_theme::landing.participation.subtitle.label')</span>
          <a href="{{ route('register') }}">
          <button
            class="w-44 text-[#272C4D] text-xl lg:text-2xl mt-10 border-[#272C4D] border-2 py-2 px-5 lg:py-3 lg:px-7 rounded-lg"
          >
            @lang('pub_theme::navigation.main_menu.register.label')
          </button>
        </a>
        </div>
      </div>
    </div>
    <!-- FINE TERZA SECTION -->
    <!-- INIZIO QUARTA SECTION -->
     <div class="mt-5">
       <div class="w-full flex justify-center">
         <h1 class="text-[#FF5F7E] text-3xl">@lang('pub_theme::navigation.landing.additional_info.label')</h1>
       </div>
       <div class="h-auto pt-5 flex flex-col lg:flex-row justify-center items-center">
         <div class="w-3/5 lg:w-1/5 h-auto bg-cover bg-[#FCD5D0] rounded-[25px] m-5 transform origin-center scale-100 hover:scale-110 transition-transform duration-100">
           <div class="grid grid-cols-2">
             <div class="flex justify-center">
               <img class="h-44 px-2 pt-2" src="/img/woman-characterrr.png" />
             </div>
             <div class="flex flex-col items-center justify-center m-5">
               <span class="text-[#FF5F7E] text-xl lg:text-2xl text-center"
                 >@lang('pub_theme::navigation.landing.consult_guide.label')</span
               >
             </div>
           </div>
         </div>
         <div class="w-3/5 lg:w-1/5 h-auto bg-[#FCD5D0] rounded-[25px] m-5 transform origin-center scale-100 hover:scale-110 transition-transform duration-100">
           <div class="grid grid-cols-2 gap-2">
             <div class="flex justify-center">
               <img class="h-44 p-2" src="/img/dentist.png" />
             </div>
             <div class="flex flex-col items-center justify-center m-5">
               <span class="text-[#FF5F7E] text-xl lg:text-2xl text-center"
                 >@lang('pub_theme::navigation.landing.consult_guide.label')</span>
             </div>
           </div>
         </div>
       </div>
     </div>
    <!-- FINE QUARTA SECTION -->
    <!-- INIZIO QUINTA SECTION -->
    <div class="flex flex-col items-center  pt-7">
      <div>
        <h1 class="text-[#FF5F7E] text-3xl">@lang('pub_theme::navigation.landing.participation.label')</h1>
      </div>
      <div class="flex flex-col lg:flex-row items-center lg:items-baseline justify-center w-full">
        <div class="p-5">
          <a href="https://www.inmp.it/" target="_blank">
            <img class="h-48 lg:h-40 p-5" src="/img/logo-INMP-per-landing.svg" />
          </a>
        </div>
        <div class="p-5">
          <a href="https://fondazioneandi.org/" target="_blank">
            <img class="h-44 lg:h-[150px] p-5" src="/img/fondazione-andi-white.png" />
          </a>
        </div>
        <div class="p-5">
          <a href="https://www.cooperazioneodontoiatrica.eu/" target="_blank">
            <img class="h-28 lg:h-28 p-5" src="/img/coi-logo-updated.png" />
          </a>
        </div>
      </div>
    </div>
    <!-- FINE QUINTA SECTION -->
    <!-- INIZIO FOOTER -->
    <!-- <div class="mt-20">
      <hr class="text-[#FCD5D0]" />
     </div>
     <div class="h-64 flex flex-row items-center justify-evenly">
      <div class="flex flex-row items-center">
        <span class="text-white text-xl m-3">Privacy Policy</span>
        <span class="text-white text-xl m-3">Termini e Condizioni</span>
        <span class="text-white text-xl m-3">Cookie Policy</span>
      </div>
      <div class="m-5">
        <img src="/img/logo.png" class="h-14" />
      </div>
      <div class="flex flex-row items-center">
        <span class="text-white text-xl m-3">Home</span>
        <span class="text-white text-xl m-3">Progetto</span>
        <span class="text-white text-xl m-3">Partners</span>
        <span class="text-white text-xl m-3">FAQ'S</span>
      </div>
    </div> -->
    <!-- FINE FOOTER -->
</div>

