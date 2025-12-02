<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $content;
    public array $personal_data;
    public array $sensitive_data;
    public array $usage_data;
    public string $background_color;
    public string $text_color;
}; ?>

{{--
/**
 * Data Types Legal Section - SaluteOra
 *
 * Componente che visualizza le tipologie di dati trattati in una
 * sezione legale formattata in modo professionale e user-friendly.
 *
 * @param string $title - Titolo della sezione
 * @param string $content - Contenuto HTML della sezione (dettagli sui tipi di dati)
 */
--}}

@props([
    'title' => 'Tipologie di Dati Trattati',
    'content' => '',
    'personal_data' => [],
    'sensitive_data' => [],
    'usage_data' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="data-types {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($personal_data))
                <div class="personal-data mt-8">
                    <h3>Dati Personali Comuni</h3>
                    <ul>
                        @foreach($personal_data as $data)
                            <li class="mb-2">{{ $data }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($sensitive_data))
                <div class="sensitive-data mt-8">
                    <h3>Dati Sanitari (Particolari)</h3>
                    <ul>
                        @foreach($sensitive_data as $data)
                            <li class="mb-2 text-red-700">🔒 {{ $data }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($usage_data))
                <div class="usage-data mt-8">
                    <h3>Dati di Utilizzo</h3>
                    <ul>
                        @foreach($usage_data as $data)
                            <li class="mb-2 text-blue-700">📊 {{ $data }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
