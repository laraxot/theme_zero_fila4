@props([
    'title' => 'Modifiche ai Termini',
    'content' => '',
    'modification_reasons' => [],
    'notification_methods' => [],
    'acceptance_terms' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="modifications {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($modification_reasons))
                <div class="modification-reasons mt-8">
                    <h3>Motivi delle Modifiche</h3>
                    <ul>
                        @foreach($modification_reasons as $reason)
                            <li class="mb-2">{{ $reason }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($notification_methods))
                <div class="notification-methods mt-8">
                    <h3>Modalità di Notifica</h3>
                    <ul>
                        @foreach($notification_methods as $method)
                            <li class="mb-2">{{ $method }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($acceptance_terms))
                <div class="acceptance-terms mt-8">
                    <h3>Condizioni di Accettazione</h3>
                    <ul>
                        @foreach($acceptance_terms as $term)
                            <li class="mb-2">{{ $term }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
