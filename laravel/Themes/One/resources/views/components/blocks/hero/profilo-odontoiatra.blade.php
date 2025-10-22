@php
 /*
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    use Modules\SaluteOra\Enums\UserTypeEnum;
    
    // Inizializzazione delle variabili con valori di default
    $user = $user ?? auth()->user();
    $locale = LaravelLocalization::getCurrentLocale();
    $isLoggedIn = auth()->check(); 
    */
@endphp


<div class="p-5">
    <div>
        {{-- Pulsante Indietro --}}
        <div class="w-full flex justify-start">
            <a href="{{ route('home') }}">
                <div class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-9">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>
                </div>
            </a>
        </div>

        <div class="w-full flex flex-col lg:flex-row p-3 lg:p-10">
            <div class="w-full flex flex-col justify-center items-center">
            {{-- Avatar e Nome Utente --}}
                <div class="w-48 h-48 !bg-[#E6EBF7] rounded-full flex items-center justify-center overflow-hidden shadow-lg">
                    <img class="h-40 object-contain" src="/img/dentist.png" />
                </div>
                <h1 class="text-center mt-5 text-3xl lg:text-4xl">{{$user?->name}}</h1>
               

            </div>
        </div>
    </div>
    {{--  --}}
</div>
