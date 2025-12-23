@props([
    'title' => 'Responsabilità e Limitazioni',
    'content' => '',
    'service_responsibilities' => [],
    'user_responsibilities' => [],
    'limitations' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="responsibilities {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($service_responsibilities))
                <div class="service-responsibilities mt-8">
                    <h3>Responsabilità del Servizio</h3>
                    <ul>
                        @foreach($service_responsibilities as $responsibility)
                            <li class="mb-2">{{ $responsibility }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($user_responsibilities))
                <div class="user-responsibilities mt-8">
                    <h3>Responsabilità dell'Utente</h3>
                    <ul>
                        @foreach($user_responsibilities as $responsibility)
                            <li class="mb-2">{{ $responsibility }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($limitations))
                <div class="limitations mt-8">
                    <h3>Limitazioni di Responsabilità</h3>
                    <ul>
                        @foreach($limitations as $limitation)
                            <li class="mb-2">{{ $limitation }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>