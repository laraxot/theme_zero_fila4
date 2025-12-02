@props(['currentLocale' => LaravelLocalization::getCurrentLocale()])
@php
    $userAgent = request()->header('User-Agent');
    $isMobile = preg_match('/Mobile|Android|iPhone|iPad|Opera Mini|IEMobile|WPDesktop/i', $userAgent);
    $backgroundImage = $isMobile
        ? "/img/landing-mobile-salute-orale.svg"
        : "/img/landing-desktop-salute-orale.svg";
        $flagCode = $currentLocale === 'en' ? 'gb' : $currentLocale;
@endphp

<div
style="background-image: url('{{ $backgroundImage }}'); background-repeat: no-repeat; background-position: top; background-size: cover;"
class="min-h-screen m-0 p-0"
>
<!-- INIZIO HEADER -->
<div>
  @if (!$isMobile)
  <div class="w-full h-18 p-2 lg:p-8 flex flex-row items-center justify-between">
    <div>
      <img src="/img/logo.png" class="h-7 lg:h-14" />
    </div>
    <div class="flex flex-row items-center">
      <a href="/{{ $lang }}/">
        <span class="text-white p-4 text-xl">@lang('pub_theme::navigation.main_menu.home.label')</span>
      </a>
      <a href="/{{ $lang }}/pages/progetto">
        <span class="text-white p-4 text-xl">@lang('pub_theme::navigation.main_menu.project.label')</span>
      </a>
      <a href="/{{ $lang }}/pages/partners">
        <span class="text-white p-4 text-xl">@lang('pub_theme::navigation.main_menu.partners.label')</span>
      </a>
    </div>
    <div>
      <a href="/{{ $lang }}/auth/login">
        <span class="text-white text-xl p-4">@lang('pub_theme::navigation.main_menu.login.label')</span>
      </a>
      <a href="/{{ $lang }}/auth/register">
        <button
          class="text-white text-xl bg-transparent border-2 border-white py-4 px-6 rounded-lg"
        >
          @lang('pub_theme::navigation.main_menu.register.label')
        </button>
      </a>
    </div>  
  </div>
  @endif
</div>
<!-- FINE HEADER -->
<!-- INIZIO PRIMA SECTION -->
<div class="w-[70%] p-6 lg:mt-60 lg:ml-32 lg:w-2/5 flex flex-col justify-start">
  <h1 class="text-[#FF5F7E] text-[40px] lg:text-8xl leading-tight font-bold mb-2.5">
    @lang('pub_theme::navigation.hero.welcome_title.label')
  </h1>
  <span class="w-4/5 lg:w-auto text-[#FCD5D0] text-lg lg:text-2xl leading-slug">
    @lang('pub_theme::navigation.hero.welcome_subtitle.label')
  </span>
  <a href="/{{ $lang }}/auth/register">
    <button
      class="w-40 lg:w-44 bg-[#FF5F7E] text-white py-3 px-7 rounded-lg text-xl lg:text-2xl mt-4"
    >
      @lang('pub_theme::navigation.hero.start_now.label')
    </button>
  </a>
</div>
<!-- FINE PRIMA SECTION -->
<!-- INIZIO SECONDA SECTION -->
<div>
  <div class="md:w-2/4 lg:w-full p-6 mt-12 lg:mt-52 flex justify-center">
    <h2 class="text-[#FF5F7E] text-3xl lg:text-4xl text-center">
      @lang('pub_theme::navigation.hero.importance_title.label')
    </h2>
  </div>
  <div class="flex flex-col justify-around items-center mt-0 lg:mt-10">
    <div class="w-3/4">
      <p class="text-[#F38B8B] text-center text-lg lg:text-2xl leading-7">
      @lang('pub_theme::navigation.hero.importance_text_1.label')
      </p>
    </div>
    <div class="w-3/4">
      <p class="text-[#F38B8B] text-center text-lg lg:text-2xl leading-7">
      @lang('pub_theme::navigation.hero.importance_text_2.label')
      </p>
    </div>
    <div class="mt-5">
      <a href="/{{ $lang }}/pages/progetto">
        <button class="bg-[#FF5F7E] text-white rounded-md py-3 px-6 text-xl">@lang('pub_theme::navigation.hero.discover_project.label')</button>
      </a>
    </div>
  </div>
</div>
<!-- FINE SECONDA SECTION -->
<!-- INIZIO TERZA SECTION -->
<div class="relative bg-[#FCD5D0] bg-cover m-4 lg:m-20 rounded-[35px] p-5 lg:p-0">
  <img src="/img/inmp-trasparenza-5.svg" class="absolute inset-0 w-full h-full object-contain p-5 pointer-events-none"/>
  <div
    class="flex flex-col lg:flex-row items-center justify-around lg:justify-center h-[750px] bg-cover bg-inmp-filigrana"
  >
    <div>
      <img class="h-72 lg:h-[500px]" src="/img/dentist.png"/>
    </div>
    <div class="flex flex-col items-center">
      <h1 class="text-[#272C4D] text-center text-4xl lg:text-6xl">@lang('pub_theme::landing.participation.title.label')</h1>
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
     <h1 class="text-[#FF5F7E] text-3xl">@lang('pub_theme::landing.additional_info.title.label')</h1>
   </div>
   <div class="h-auto pt-5 flex flex-col lg:flex-row justify-center items-center">
     <div class="w-3/5 lg:w-1/5 h-auto bg-cover bg-[#FCD5D0] rounded-[25px] m-5">
       <div class="grid grid-cols-2">
         <div class="flex justify-center">
           <img class="h-44 px-2 pt-2" src="/img/woman-characterrr.png" />
         </div>
         <div class="flex flex-col items-center justify-center">
           <span class="text-[#FF5F7E] text-xl lg:text-2xl text-center"
             >@lang('pub_theme::landing.additional_info.consult_guide.label')</span
           >
         </div>
       </div>
     </div>
     <div class="w-3/5 lg:w-1/5 h-auto bg-[#FCD5D0] rounded-[25px] m-5">
       <div class="grid grid-cols-2 gap-2">
         <div class="flex justify-center">
           <img class="h-44 p-2" src="/img/dentist.png" />
         </div>
         <div class="flex flex-col items-center justify-center">
           <span class="text-[#FF5F7E] text-xl lg:text-2xl text-center"
             >@lang('pub_theme::landing.additional_info.consult_guide.label')</span
           >
         </div>
       </div>
     </div>
   </div>
 </div>
<!-- FINE QUARTA SECTION -->
<!-- INIZIO QUINTA SECTION -->
<div class="flex flex-col items-center  pt-7">
  <div>
    <h1 class="text-[#FF5F7E] text-3xl">@lang('pub_theme::landing.partners.title.label')</h1>
  </div>
  <div class="flex flex-col lg:flex-row items-center lg:items-baseline justify-center w-full">
    <div class="p-5">
      <a href="https://www.inmp.it/">
        <img class="h-48 lg:h-40 p-5" src="/img/inmp-logo-piccolo-updated.png" />
      </a>
    </div>
    <div class="p-5">
      <a href="https://fondazioneandi.org/">
        <img class="h-44 lg:h-[150px] p-5" src="/img/fondazione-andi-white.png" />
      </a>
    </div>
    <div class="p-5">
      <a href="https://www.cooperazioneodontoiatrica.eu/">
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
