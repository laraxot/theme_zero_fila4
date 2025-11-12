@props([
    'title' => 'Definizione del Servizio',
    'content' => '',
    'services' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="service-definition {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($services))
                <div class="services-list mt-8">
                    <h3>Servizi Offerti</h3>
                    <ul>
                        @foreach($services as $service)
                            <li class="mb-4">
                                <strong>{{ $service['name'] ?? '' }}</strong>
                                @if(isset($service['description']))
                                    <p class="mt-2">{{ $service['description'] }}</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
