@props(['currentLocale' => LaravelLocalization::getCurrentLocale()])

@php
    $userAgent = request()->header('User-Agent');
    $isMobile = preg_match('/Mobile|Android|iPhone|iPad|Opera Mini|IEMobile|WPDesktop/i', $userAgent);
    $flagCode = $currentLocale === 'en' ? 'gb' : $currentLocale;
@endphp

<x-layouts.main :isLanding="true">
<!-- class="min-h-screen m-0 p-0 bg-[url('/img/landing-mobile-salute-orale.svg')] bg-center bg-cover bg-no-repeat" -->
    <body class="min-h-screen m-0 p-0 bg-[url('/img/landing-mobile-salute-orale.svg')] lg:bg-[url('/img/soluzione-unita-desktop-landing.svg')] bg-top bg-cover bg-no-repeat">
        <!-- INIZIO HEADER -->
         <div>
           <div class="hidden lg:flex w-full p-2 lg:p-8 flex-row items-center justify-between">
                  <div>
                      <img src="/img/logo.png" class="h-7 lg:h-14" />
                  </div>
                  <div class="flex flex-row items-center">
                      <a href="/{{ $lang }}/">
                          <span class="text-white p-4 text-xl">Home</span>
                      </a>
                      <a href="{{ route('pages.view', ['slug' => 'progetto']) }}">
                          <span class="text-white p-4 text-xl">{{ __('pub_theme::txt.Project') }}</span>
                      </a>
                      <a href="/{{ $lang }}/pages/partners">
                          <span class="text-white p-4 text-xl">Partecipanti</span>
                      </a>
                  </div>
                  <div>
                      <a href="/{{ $lang }}/auth/login">
                          <span class="text-white text-xl p-4">Accedi</span>
                      </a>
                      <a href="/{{ $lang }}/auth/register">
                          <button class="text-white text-xl bg-transparent border-2 border-white py-4 px-6 rounded-lg">
                              Registrati
                          </button>
                      </a>
                  </div>  
              </div>
              <!-- FINE HEADER -->
      
              <!-- INIZIO PRIMA SECTION -->
              <div class="lg:h-dvh w-full flex items-center px-6 lg:p-10">
                  <div class="w-[70%] lg:w-3/6 p-6 flex flex-col justify-start">
                      <h1 class="text-[#FF5F7E] text-[40px] lg:text-8xl leading-tight font-bold mb-2.5">
                          Benvenuta su <br />
                          Salute Orale
                      </h1>
                      <span class="w-4/5 lg:w-auto text-[#FCD5D0] text-lg lg:text-2xl leading-slug">
                          Il portale che vuole garantire alle pazienti vulnerabili in stato di
                          gravidanza la possibilità di accedere a servizi odonoiatrici di
                          prevenzione a titolo completamente gratuito
                      </span>
                      <a href="/{{ $lang }}/auth/register">
                          <button class="w-40 lg:w-44 bg-[#FF5F7E] text-white py-3 px-7 rounded-lg text-xl lg:text-2xl mt-4">
                              Inizia Ora
                          </button>
                      </a>
                  </div>
              </div>
              <!-- FINE PRIMA SECTION -->
          </div>
         </div>

     <div>
        <!-- INIZIO SECONDA SECTION -->
        <div class="md:w-2/4 lg:w-full p-6 flex justify-center">
            <h2 class="text-[#FF5F7E] text-3xl lg:text-4xl text-center">
                Perché é importante la salute orale in gravidanza?
            </h2>
        </div>
        <div class="flex flex-col justify-around items-center mt-0 lg:mt-10">
            <div class="w-3/4">
                <p class="text-[#F38B8B] text-center text-lg lg:text-2xl leading-7">
                    Numerosi studi scientifici riportano l’importanza di una corretta salute orale sin dai primi mesi della gravidanza. Malattie dentali molto comuni, come la carie, possono causare malformazioni o infezioni nel feto già a partire dal primo trimestre di gravidanza. Per mantenere la salute di madre e bambino è fondamentale, oltre ad una dieta sana e una corretta pulizia dei denti, affidarsi alle cure e all’esame di un odontoiatra a partire dal terzo trimestre di gravidanza.
                </p>
            </div>
            <div class="w-3/4 mt-4">
                <p class="text-[#F38B8B] text-center text-lg lg:text-2xl leading-7">
                    Con questo in mente, il progetto Salute Orale si propone di garantire, a titolo completamente gratuito, una prima visita odontoiatrica completa a pazienti in stato di gravidanza con ISEE uguale o inferiore ai 20.000 euro. Le Pazienti potranno prenotare a titolo totalmente gratuito una visita di controllo e igiene presso i dentisti aderenti. I Dentisti gestiranno questi appuntamenti da piattaforma e potranno chiedere rimborso per la prestazione al personale Salute Orale.
                </p>
            </div>
            <div class="mt-5">
                <a href="/{{ $lang }}/pages/progetto">
                    <button class="bg-[#FF5F7E] text-white rounded-md py-3 px-6 text-xl">Scopri il progetto</button>
                </a>
            </div>
        </div>
        <!-- FINE SECONDA SECTION -->

        <!-- INIZIO TERZA SECTION -->
        <div class="relative bg-[#FCD5D0] bg-cover m-4 lg:m-20 rounded-[35px] p-5 lg:p-0">
            <img src="/img/inmp-trasparenza-5.svg" class="absolute inset-0 w-full h-full object-contain p-5 pointer-events-none"/>
            <div class="flex flex-col lg:flex-row items-center justify-around lg:justify-center h-[750px] bg-cover bg-inmp-filigrana">
                <div>
                    <img class="h-72 lg:h-[500px]" src="/img/dentist.png" />
                </div>
                <div class="flex flex-col items-center">
                    <h1 class="text-[#272C4D] text-center text-4xl lg:text-6xl">Vuoi partecipare al progetto?</h1>
                    <span class="text-[#272C4D] text-center text-xl mt-10">
                        Entra a far parte del progetto Salute Orale
                    </span>
                    <a href="{{ route('register') }}">
                        <button class="w-44 text-[#272C4D] text-xl lg:text-2xl mt-10 border-[#272C4D] border-2 py-2 px-5 lg:py-3 lg:px-7 rounded-lg">
                            Registrati
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- FINE TERZA SECTION -->

        <!-- INIZIO QUARTA SECTION -->
        <div class="mt-5">
            <div class="w-full flex justify-center">
                <h1 class="text-[#FF5F7E] text-3xl">Per informazioni aggiuntive</h1>
            </div>
            <div class="h-auto pt-5 flex flex-col lg:flex-row justify-center items-center">
                <div class="w-3/5 lg:w-1/5 h-auto bg-cover bg-[#FCD5D0] rounded-[25px] m-5">
                    <div class="grid grid-cols-2">
                        <div class="flex justify-center">
                            <img class="h-44 px-2 pt-2" src="/img/woman-characterrr.png" />
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-[#FF5F7E] text-xl lg:text-2xl text-center">Consulta la guida</span>
                        </div>
                    </div>
                </div>
                <div class="w-3/5 lg:w-1/5 h-auto bg-[#FCD5D0] rounded-[25px] m-5">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex justify-center">
                            <img class="h-44 p-2" src="/img/dentist.png" />
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-[#FF5F7E] text-xl lg:text-2xl text-center">Consulta la guida</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FINE QUARTA SECTION -->

        <!-- INIZIO QUINTA SECTION -->
        <div class="flex flex-col items-center pt-7">
            <div>
                <h1 class="text-[#FF5F7E] text-3xl">Con la partecipazione di</h1>
            </div>
            <div class="flex flex-col lg:flex-row items-center lg:items-baseline justify-center w-full">
                <div class="p-5">
                    <a href="https://www.inmp.it/" target="_blank">
                        <img class="h-48 lg:h-40 p-5" src="/img/inmp-logo-piccolo-updated.png" />
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
</body>
</x-layouts.main>
