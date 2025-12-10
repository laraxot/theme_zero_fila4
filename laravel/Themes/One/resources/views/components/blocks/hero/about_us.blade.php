<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $subtitle;
    public string $background_image;
    public string $cta_text;
    public string $cta_link;
    public bool $overlay = false;
    public float $overlay_opacity = 0.6;
}; ?>

{{--
/**
 * Hero Chi Siamo - SaluteOra
 *
 * Componente hero per la pagina "Chi Siamo" che mostra il titolo principale,
 * sottotitolo, immagine di sfondo con overlay personalizzabile e un CTA.
 * 
 * @param string $title - Titolo principale
 * @param string $subtitle - Sottotitolo descrittivo
 * @param string $background_image - URL dell'immagine di sfondo
 * @param string $cta_text - Testo del pulsante call-to-action
 * @param string $cta_link - Link del pulsante call-to-action
 * @param bool $overlay - Se mostrare un overlay scuro sull'immagine
 * @param float $overlay_opacity - Opacità dell'overlay (0.0-1.0)
 */
--}}

<div class="relative isolate overflow-hidden bg-gray-900">
    {{-- Immagine di sfondo --}}
    <img
        src="{{ $background_image }}"
        alt="{{ $title }}"
        class="absolute inset-0 -z-10 h-full w-full object-cover"
    />

    {{-- Overlay opzionale --}}
    @if($overlay)
    <div 
        class="absolute inset-0 -z-10 bg-black"
        style="opacity: {{ $overlay_opacity }}"
    ></div>
    @endif

    {{-- Gradient overlay --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>

    {{-- Contenuto hero --}}
    <div class="relative py-24 sm:py-32 lg:pb-40 xl:pb-48">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                    {{ $title }}
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    {{ $subtitle }}
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a
                        href="{{ $cta_link }}"
                        class="rounded-md bg-teal-600 px-5 py-3 text-base font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-400"
                    >
                        {{ $cta_text }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
