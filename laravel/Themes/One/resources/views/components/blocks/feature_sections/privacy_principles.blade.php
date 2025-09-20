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
 * Privacy Principles Section - SaluteOra
 *
 * Sezione che presenta i principi di protezione dati
 * con design che ispira fiducia e sicurezza, usando
 * iconografie appropriate e colori professionali.
 *
 * @param string $title - Titolo sezione
 * @param string $subtitle - Sottotitolo esplicativo
 * @param array $sections - Lista dei principi privacy
 */
--}}

@props([
    'title' => 'I nostri principi di protezione dati',
    'subtitle' => __('pub_theme::components.privacy_principles.subtitle'),
    'sections' => []
])

<section class="py-20 bg-white relative overflow-hidden">

    {{-- Elementi decorativi di sfondo --}}
    <div class="absolute inset-0 overflow-hidden">
        {{-- Pattern security --}}
        <div class="absolute top-0 left-0 w-full h-full opacity-3">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <pattern id="security-pattern" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect width="20" height="20" fill="none"/>
                        <circle cx="10" cy="10" r="2" fill="currentColor" class="text-blue-200"/>
                        <path d="M8 8l4 4M12 8l-4 4" stroke="currentColor" stroke-width="0.5" class="text-blue-200"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#security-pattern)"/>
            </svg>
        </div>

        {{-- Shield decorativo --}}
        <div class="absolute top-20 right-20 w-32 h-32 text-blue-100 opacity-30">
            <svg viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M50 10 L20 25 L20 50 Q20 80 50 90 Q80 80 80 50 L80 25 Z"/>
                <path d="M35 45 L45 55 L65 35"/>
            </svg>
        </div>

        <div class="absolute bottom-20 left-20 w-24 h-24 text-green-100 opacity-30">
            <svg viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1">
                <rect x="25" y="40" width="50" height="35" rx="5"/>
                <path d="M35 40 V30 Q35 20 50 20 Q65 20 65 30 V40"/>
                <circle cx="50" cy="57" r="3"/>
            </svg>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header sezione --}}
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 bg-blue-50 rounded-full px-6 py-2 mb-6 border border-blue-100">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                </svg>
                <span class="text-sm font-medium text-blue-700">GDPR Compliant</span>
            </div>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {{ $title }}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        {{-- Griglia principi --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($sections as $index => $section)
            <div class="group relative"
                 data-aos="fade-up"
                 data-aos-delay="{{ $index * 100 }}">

                <div class="relative h-full">

                    {{-- Container principale --}}
                    <div class="relative bg-white rounded-2xl p-8 h-full border border-gray-100 group-hover:border-gray-200 group-hover:shadow-xl transition-all duration-500 group-hover:-translate-y-2">

                        {{-- Icona --}}
                        <div class="relative mb-6">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br {{ $section['color'] ?? 'text-gray-600' }} bg-opacity-10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">

                                @if($section['icon'] === 'data-minimize')
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"/>
                                </svg>

                                @elseif($section['icon'] === 'lock-shield')
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75"/>
                                </svg>

                                @elseif($section['icon'] === 'user-shield')
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75"/>
                                </svg>

                                @elseif($section['icon'] === 'transparency')
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>

                                @else
                                <svg class="w-8 h-8 {{ $section['color'] ?? 'text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                                </svg>
                                @endif

                            </div>
                        </div>

                        {{-- Contenuto --}}
                        <div class="relative text-center">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:{{ $section['color'] ?? 'text-gray-600' }} transition-colors duration-300">
                                {{ $section['title'] }}
                            </h3>

                            <p class="text-gray-600 leading-relaxed text-sm">
                                {{ $section['description'] }}
                            </p>
                        </div>

                        {{-- Security badge --}}
                        <div class="absolute top-4 right-4 w-3 h-3 rounded-full {{ $section['color'] ?? 'text-gray-600' }} bg-current opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Security certifications footer --}}
        <div class="mt-16 text-center">
            <div class="inline-flex items-center gap-6 bg-gradient-to-r from-blue-50 to-green-50 rounded-2xl px-8 py-6 border border-blue-100">

                {{-- SSL Badge --}}
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="text-sm font-semibold text-gray-900">SSL Certificato</p>
                        <p class="text-xs text-gray-600">256-bit encryption</p>
                    </div>
                </div>

                {{-- GDPR Badge --}}
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="text-sm font-semibold text-gray-900">GDPR Compliant</p>
                        <p class="text-xs text-gray-600">EU Regulation 2016/679</p>
                    </div>
                </div>

                {{-- ISO Badge --}}
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443a55.381 55.381 0 015.25 2.882V15M15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm-1.5 0h-.008v.008H13.5V12.75z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="text-sm font-semibold text-gray-900">ISO 9001:2015</p>
                        <p class="text-xs text-gray-600">Qualità certificata</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
