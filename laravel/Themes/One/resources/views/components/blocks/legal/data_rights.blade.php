<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $content;
}; ?>

{{--
/**
 * Data Rights Legal Section - SaluteOra
 *
 * Componente che visualizza i diritti degli utenti sui loro dati in una
 * sezione legale formattata in modo professionale e user-friendly.
 *
 * @param string $title - Titolo della sezione
 * @param string $content - Contenuto HTML della sezione (dettagli sui diritti degli utenti)
 */
--}}

@props([
    'title' => 'Diritti dell\'Interessato',
    'content' => '',
    'gdpr_rights' => [],
    'exercise_procedures' => [],
    'contact_info' => [],
    'response_timeframes' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="data-rights {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($gdpr_rights))
                <div class="gdpr-rights mt-8">
                    <h3>I Tuoi Diritti (Art. 12-22 GDPR)</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($gdpr_rights as $right)
                            <div class="border rounded-lg p-4 hover:bg-gray-50">
                                <h4 class="font-semibold text-blue-700 mb-2">{{ $right['name'] ?? '' }}</h4>
                                <p class="text-sm">{{ $right['description'] ?? '' }}</p>
                                @if(isset($right['article']))
                                    <span class="inline-block mt-2 text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                        Art. {{ $right['article'] }} GDPR
                                    </span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty($exercise_procedures))
                <div class="exercise-procedures mt-8">
                    <h3>Come Esercitare i Diritti</h3>
                    <ol class="list-decimal list-inside">
                        @foreach($exercise_procedures as $procedure)
                            <li class="mb-2">{{ $procedure }}</li>
                        @endforeach
                    </ol>
                </div>
            @endif

            @if(!empty($response_timeframes))
                <div class="response-timeframes mt-8">
                    <h3>Tempi di Risposta</h3>
                    <ul>
                        @foreach($response_timeframes as $timeframe)
                            <li class="mb-2">
                                <strong>{{ $timeframe['request_type'] ?? '' }}:</strong>
                                {{ $timeframe['response_time'] ?? '' }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($contact_info))
                <div class="contact-info mt-8">
                    <h3>Contatti per Esercitare i Diritti</h3>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        @foreach($contact_info as $contact)
                            <p class="mb-2">
                                <strong>{{ $contact['type'] ?? '' }}:</strong>
                                {{ $contact['value'] ?? '' }}
                            </p>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
