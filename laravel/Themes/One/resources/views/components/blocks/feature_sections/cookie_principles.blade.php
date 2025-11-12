<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $subtitle;
    public array $sections = [];
}; ?>

{{--
/**
 * Cookie Principles - SaluteOra
 *
 * Componente che visualizza i principi fondamentali di utilizzo dei cookie
 * con icone, titoli e descrizioni in un layout moderno e user-friendly.
 * 
 * @param string $title - Titolo della sezione
 * @param string $subtitle - Sottotitolo esplicativo
 * @param array $sections - Array di sezioni con titolo, descrizione, icona e colore
 */
--}}

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header sezione --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ $title }}
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        {{-- Grid dei principi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($sections as $section)
            <div class="flex flex-col items-start bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                {{-- Icona --}}
                <div class="mb-5">
                    @switch($section['icon'])
                        @case('cookie-essential')
                            <div class="w-14 h-14 rounded-full flex items-center justify-center {{ $section['color'] ? $section['color'] . '/10' : 'bg-green-100' }}">
                                <svg class="w-6 h-6 {{ $section['color'] ?: 'text-green-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            @break
                            
                        @case('cookie-functional')
                            <div class="w-14 h-14 rounded-full flex items-center justify-center {{ $section['color'] ? $section['color'] . '/10' : 'bg-blue-100' }}">
                                <svg class="w-6 h-6 {{ $section['color'] ?: 'text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            @break
                            
                        @case('cookie-analytics')
                            <div class="w-14 h-14 rounded-full flex items-center justify-center {{ $section['color'] ? $section['color'] . '/10' : 'bg-purple-100' }}">
                                <svg class="w-6 h-6 {{ $section['color'] ?: 'text-purple-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            @break
                            
                        @case('cookie-targeting')
                            <div class="w-14 h-14 rounded-full flex items-center justify-center {{ $section['color'] ? $section['color'] . '/10' : 'bg-red-100' }}">
                                <svg class="w-6 h-6 {{ $section['color'] ?: 'text-red-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            @break
                            
                        @default
                            <div class="w-14 h-14 rounded-full flex items-center justify-center bg-gray-100">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                            </div>
                    @endswitch
                </div>
                
                {{-- Titolo e descrizione --}}
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $section['title'] }}</h3>
                <p class="text-gray-600">{{ $section['description'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Box informativo cookie manager --}}
        <div class="mt-12 bg-cyan-50 border border-cyan-100 rounded-xl p-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex-1">
                    <h4 class="font-semibold text-cyan-800 mb-2">Cookie Manager</h4>
                    <p class="text-cyan-700 text-sm">
                        Utilizzando il nostro Cookie Manager puoi gestire le tue preferenze in qualsiasi momento.
                        Clicca sul pulsante qui sotto per personalizzare le tue impostazioni dei cookie.
                    </p>
                </div>
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500" onclick="window.cookieManager.openPanel()">
                    Gestisci Preferenze Cookie
                </button>
            </div>
        </div>

        {{-- Tabella riassuntiva cookie --}}
        <div class="mt-12">
            <h3 class="text-xl font-bold text-gray-900 mb-6 text-center">Panoramica Cookie Utilizzati</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr class="bg-gray-50">
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrizione</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durata</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cookie di terze parti</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Essenziali</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Permettono le funzionalità base del sito</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sessione/1 anno</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Funzionali</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Migliorano l'esperienza utente e memorizzano preferenze</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 anno</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Analitici</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Raccolgono dati anonimi sull'utilizzo del sito</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 anni</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sì (Google Analytics)</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Marketing</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Usati per mostrare annunci rilevanti</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">90 giorni</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sì (vari)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
