<?php
declare(strict_types=1);
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use function Laravel\Folio\{middleware, name};

name('registration.thank-you');

new class extends Component
{
    // Logica del componente se necessaria
};

?>

<x-layouts.app>
    @volt('thank-you')
    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-12">
        <!-- Logo e intestazione -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <x-ui.logo class="h-12 text-blue-900" />
            </div>
            <h1 class="text-3xl font-light text-blue-900">Grazie per la tua <span class="font-bold">Registrazione</span></h1>
        </div>

        <!-- Card contenente il messaggio di ringraziamento -->
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden p-8">
            <div class="text-center">
                <div class="mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                
                <h2 class="text-2xl font-bold text-blue-900 mb-4">Ti ringraziamo per esserti iscritta al portale Salute Ora</h2>
                <p class="text-gray-600 mb-6">Esamineremo i dati e i documenti che ci hai inviato e, se il tuo profilo risponde ai requisiti, riceverai una mail di conferma e potrai accedere al servizio.</p>
                
                <div class="mt-8">
                    <a href="/{{ app()->getLocale() }}" class="inline-block bg-blue-900 text-white text-lg font-medium py-3 px-6 rounded-full hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-opacity-50 shadow-sm hover:shadow-md transition-all duration-200">
                        TORNA ALLA HOME
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer con informazioni aggiuntive -->
        <div class="mt-8 text-center text-sm text-gray-500">
            <p>Hai bisogno di assistenza? <a href="#" class="text-blue-800 hover:underline">Contattaci</a></p>
        </div>
    </div>
    @endvolt
</x-layouts.app>
