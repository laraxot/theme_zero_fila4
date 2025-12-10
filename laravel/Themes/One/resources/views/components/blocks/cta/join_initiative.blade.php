<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $description;
    public string $button_text;
    public string $button_link;
    public string $background_image = '';
}; ?>

{{--
/**
 * Componente Call To Action - Unisciti all'Iniziativa
 *
 * Call to action accattivante per invitare professionisti e partner a unirsi all'iniziativa SaluteOra.
 * 
 * @param string $title - Titolo principale della CTA
 * @param string $description - Descrizione dell'iniziativa e dei benefici
 * @param string $button_text - Testo del bottone di azione
 * @param string $button_link - Link a cui indirizza il bottone
 * @param string $background_image - URL immagine di sfondo (opzionale)
 */
--}}

<section class="relative py-16">
    {{-- Background con overlay --}}
    @if($background_image)
    <div class="absolute inset-0 z-0">
        <img src="{{ $background_image }}" alt="Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-teal-900/90"></div>
    </div>
    @else
    <div class="absolute inset-0 z-0 bg-gradient-to-r from-blue-600 to-teal-600"></div>
    @endif
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h2 class="text-3xl font-extrabold sm:text-4xl mb-6">
                {{ $title }}
            </h2>
            <p class="text-lg mb-10">
                {{ $description }}
            </p>
            
            <div class="mt-4">
                <a href="{{ $button_link }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-gray-50 shadow-lg transform transition hover:-translate-y-1 hover:shadow-xl">
                    {{ $button_text }}
                    <svg class="ml-2 -mr-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            
            {{-- Badges --}}
            <div class="mt-12 flex flex-wrap justify-center gap-4">
                <div class="flex items-center bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                    <span>Oltre 100 professionisti</span>
                </div>
                <div class="flex items-center bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Assistenza a oltre 500 mamme</span>
                </div>
                <div class="flex items-center bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Riconosciuto dal Ministero della Salute</span>
                </div>
            </div>
        </div>
        
        {{-- Logos partner o sostenitori --}}
        <div class="mt-16">
            <p class="text-center text-white text-sm font-medium mb-6">
                In collaborazione con
            </p>
            <div class="flex justify-center space-x-8">
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg h-16 w-24 flex items-center justify-center">
                    <div class="text-white font-bold">Partner 1</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg h-16 w-24 flex items-center justify-center">
                    <div class="text-white font-bold">Partner 2</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg h-16 w-24 flex items-center justify-center">
                    <div class="text-white font-bold">Partner 3</div>
                </div>
            </div>
        </div>
    </div>
</section>
