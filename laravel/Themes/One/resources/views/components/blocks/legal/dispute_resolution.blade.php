@props([
    'title' => 'Risoluzione delle Controversie',
    'content' => '',
    'mediation_steps' => [],
    'legal_jurisdiction' => '',
    'contact_info' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="dispute-resolution {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($mediation_steps))
                <div class="mediation-steps mt-8">
                    <h3>Procedura di Conciliazione</h3>
                    <ol class="list-decimal list-inside">
                        @foreach($mediation_steps as $step)
                            <li class="mb-2">{{ $step }}</li>
                        @endforeach
                    </ol>
                </div>
            @endif

            @if($legal_jurisdiction)
                <div class="legal-jurisdiction mt-8">
                    <h3>Foro Competente</h3>
                    <p>{{ $legal_jurisdiction }}</p>
                </div>
            @endif

            @if(!empty($contact_info))
                <div class="contact-info mt-8">
                    <h3>Contatti per Controversie</h3>
                    <ul>
                        @foreach($contact_info as $contact)
                            <li class="mb-2">
                                <strong>{{ $contact['type'] ?? '' }}:</strong> {{ $contact['value'] ?? '' }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
