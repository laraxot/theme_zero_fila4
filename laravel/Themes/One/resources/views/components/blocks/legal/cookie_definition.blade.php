@props([
    'title' => 'Definizione dei Cookie',
    'content' => '',
    'cookie_types' => [],
    'cookie_purposes' => [],
    'technical_info' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="cookie-definition {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($cookie_types))
                <div class="cookie-types mt-8">
                    <h3>Tipologie di Cookie</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($cookie_types as $type)
                            <div class="border rounded-lg p-4 hover:bg-gray-50">
                                <h4 class="font-semibold text-orange-700 mb-2">🍪 {{ $type['name'] ?? '' }}</h4>
                                <p class="text-sm">{{ $type['description'] ?? '' }}</p>
                                @if(isset($type['duration']))
                                    <span class="inline-block mt-2 text-xs bg-orange-100 text-orange-800 px-2 py-1 rounded">
                                        Durata: {{ $type['duration'] }}
                                    </span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty($cookie_purposes))
                <div class="cookie-purposes mt-8">
                    <h3>Finalità dei Cookie</h3>
                    <ul>
                        @foreach($cookie_purposes as $purpose)
                            <li class="mb-2">
                                <strong>{{ $purpose['category'] ?? '' }}:</strong>
                                {{ $purpose['description'] ?? '' }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($technical_info))
                <div class="technical-info mt-8">
                    <h3>Informazioni Tecniche</h3>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        @foreach($technical_info as $info)
                            <p class="mb-2">
                                <strong>{{ $info['key'] ?? '' }}:</strong>
                                {{ $info['value'] ?? '' }}
                            </p>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
