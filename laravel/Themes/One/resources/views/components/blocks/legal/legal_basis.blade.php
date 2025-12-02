<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $content;
    public array $legal_bases;
    public array $consent_purposes;
    public array $legitimate_interests;
    public string $background_color;
    public string $text_color;
}; ?>

{{--
/**
 * Legal Basis Section - SaluteOra
 *
 * Componente che visualizza le basi giuridiche del trattamento dati in una
 * sezione legale formattata in modo professionale e user-friendly.
 *
 * @param string $title - Titolo della sezione
 * @param string $content - Contenuto HTML della sezione (dettagli sulle basi giuridiche)
 */
--}}

@props([
    'title' => 'Basi Legali del Trattamento',
    'content' => '',
    'legal_bases' => [],
    'consent_purposes' => [],
    'legitimate_interests' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="legal-basis {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($legal_bases))
                <div class="legal-bases mt-8">
                    <h3>Basi Giuridiche (Art. 6 GDPR)</h3>
                    <ul>
                        @foreach($legal_bases as $basis)
                            <li class="mb-3">
                                <strong>{{ $basis['type'] ?? '' }}</strong>
                                @if(isset($basis['description']))
                                    <p class="mt-1 text-sm">{{ $basis['description'] }}</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($consent_purposes))
                <div class="consent-purposes mt-8">
                    <h3>Trattamenti basati su Consenso</h3>
                    <ul>
                        @foreach($consent_purposes as $purpose)
                            <li class="mb-2 text-green-700">✓ {{ $purpose }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($legitimate_interests))
                <div class="legitimate-interests mt-8">
                    <h3>Legittimo Interesse</h3>
                    <ul>
                        @foreach($legitimate_interests as $interest)
                            <li class="mb-2 text-blue-700">⚖️ {{ $interest }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
