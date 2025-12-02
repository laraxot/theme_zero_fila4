@php
 /*
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    use Modules\SaluteOra\Enums\UserTypeEnum;
    
    // Inizializzazione delle variabili con valori di default
    $user = $user ?? auth()->user();
    $locale = LaravelLocalization::getCurrentLocale();
    $isLoggedIn = auth()->check(); 
    */
    $appointments=$user->appointments;
@endphp
<div class="p-5">
    <div>
        <!-- Back button -->
        <div class="w-full flex justify-start">
            <!-- DA AGGIORNARE URL -->
            <a href="{{ route('home') }}">
                <div class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>
                </div>
            </a>
        </div>

        <!-- Avatar e nome -->
        <div class="p-10">
            <div class="w-full flex flex-col justify-center items-center">
                <div class="w-48 h-48 bg-[#E6EBF7] rounded-full flex items-center justify-center overflow-hidden shadow-lg">
                    <img class="h-40 object-contain" src="/img/donna-personaggio.png" alt="Avatar" />
                </div>
                <h1 class="text-center mt-5">{{$user?->name}}</h1>
            </div>
        </div>

        <!-- Sezione principale -->
        <div class="w-full flex flex-col-reverse justify-center">
            <!-- Colonna sinistra: Dati -->
            {{--  
            <div class="w-full flex justify-center">
                <div class="w-full lg:w-4/12 bg-[#E6EBF7] shadow-2xl rounded-[15px] mt-5 lg:mt-0">
                    <div class="flex flex-row items-center justify-between bg-[#E6EBF7] m-5 px-2">
                        <h2>I miei dati</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </div>

                    <div class="flex flex-col lg:flex-row justify-center items-center">
                        <div class="w-full lg:w-3/6 p-5">
                            <input class="bg-transparent" placeholder="Nome" type="text" id="name" />
                        </div>
                        <div class="w-full lg:w-3/6 p-5">
                            <input class="bg-transparent" placeholder="Cognome" type="text" id="surname" />
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row justify-center items-center">
                        <div class="w-full lg:w-3/6 p-5">
                            <input class="bg-transparent" placeholder="Email" type="email" id="email" />
                        </div>
                        <div class="w-full lg:w-3/6 p-5">
                            <input class="bg-transparent" placeholder="Cellulare" type="number" id="phone" />
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row justify-center items-center">
                        <div class="w-full lg:w-3/6 p-5">
                            <input class="bg-transparent" placeholder="Domicilio" type="text" id="domicilio" />
                        </div>
                    </div>
                </div>
            </div>
             --}}
        @each('pub_theme::appointment.item', $appointments, 'appointment','pub_theme::appointment.vodo')
        </div>
    </div>  
</div>
