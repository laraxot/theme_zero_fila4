<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $subtitle;
    public string $description;
    public array $team_members = [];
}; ?>

{{--
/**
 * Componente Team - SaluteOra
 *
 * Visualizza il team di professionisti con foto, nome, ruolo e biografia.
 * Layout responsive con griglia adattiva.
 * 
 * @param string $title - Titolo della sezione
 * @param string $subtitle - Sottotitolo esplicativo
 * @param string $description - Descrizione del team
 * @param array $team_members - Array di membri del team con nome, ruolo, bio e immagine
 */
--}}

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header sezione --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $title }}
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                {{ $subtitle }}
            </p>
            
            @if($description)
            <div class="max-w-4xl mx-auto text-gray-600 mb-12">
                <p>{{ $description }}</p>
            </div>
            @endif
        </div>

        {{-- Griglia team members --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">
            @foreach($team_members as $member)
            <div class="flex flex-col items-center">
                {{-- Foto con bordo --}}
                <div class="relative mb-5 w-40 h-40 rounded-full overflow-hidden border-4 border-white shadow-md">
                    <img 
                        src="{{ $member['image'] }}" 
                        alt="{{ $member['name'] }}"
                        class="w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-4">
                        <div class="flex space-x-3">
                            <a href="#" class="text-white hover:text-blue-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.04 10.04 0 01-3.127 1.195 4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                {{-- Informazioni --}}
                <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $member['name'] }}</h3>
                <p class="text-blue-600 font-medium text-sm mb-3">{{ $member['role'] }}</p>
                <p class="text-sm text-gray-600 text-center">{{ $member['bio'] }}</p>
                
                {{-- Badge certificazioni/specializzazioni --}}
                @if(isset($member['certifications']) && is_array($member['certifications']) && count($member['certifications']) > 0)
                <div class="mt-3 flex flex-wrap justify-center gap-2">
                    @foreach($member['certifications'] as $cert)
                    <span class="text-xs px-2 py-1 bg-blue-50 text-blue-700 rounded-full border border-blue-100">
                        {{ $cert }}
                    </span>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
        
        {{-- CTA unisciti al team --}}
        <div class="mt-16 text-center">
            <div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Unisciti al Nostro Team</h3>
                <p class="text-gray-600 mb-6">
                    Siamo sempre alla ricerca di professionisti motivati che condividono la nostra missione di migliorare la salute orale delle donne in gravidanza.
                </p>
                <a
                    href="/carriere"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                    Scopri le Opportunità
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
