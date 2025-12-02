<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $content;
}; ?>

{{--
/**
 * Data Retention Legal Section - SaluteOra
 *
 * Componente che visualizza informazioni sulla conservazione dei dati in una
 * sezione legale formattata in modo professionale e user-friendly.
 *
 * @param string $title - Titolo della sezione
 * @param string $content - Contenuto HTML della sezione (dettagli sulla conservazione dei dati)
 */
--}}

<section class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                <span class="text-blue-600 font-bold">{{ explode('. ', $title)[0] }}</span>
            </span>
            <span>{{ $title }}</span>
        </h2>

        <div class="prose prose-blue prose-lg max-w-none">
            {!! $content !!}
        </div>

        <div class="mt-8 flex items-center gap-3 text-sm text-gray-500 border-t pt-4 border-gray-200">
            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Periodi di conservazione definiti in conformità con il GDPR (Art. 5, par. 1, lett. e)</span>
        </div>
    </div>
</section>
