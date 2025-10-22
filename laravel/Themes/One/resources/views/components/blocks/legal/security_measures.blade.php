@props([
    'title' => 'Misure di Sicurezza',
    'content' => '',
    'technical_measures' => [],
    'organizational_measures' => [],
    'data_protection' => [],
    'incident_response' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="security-measures {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($technical_measures))
                <div class="technical-measures mt-8">
                    <h3>Misure Tecniche</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($technical_measures as $measure)
                            <div class="border-l-4 border-green-500 pl-4 py-2">
                                <h4 class="font-semibold text-green-700">🔧 {{ $measure['name'] ?? '' }}</h4>
                                @if(isset($measure['description']))
                                    <p class="text-sm mt-1">{{ $measure['description'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty($organizational_measures))
                <div class="organizational-measures mt-8">
                    <h3>Misure Organizzative</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($organizational_measures as $measure)
                            <div class="border-l-4 border-blue-500 pl-4 py-2">
                                <h4 class="font-semibold text-blue-700">👥 {{ $measure['name'] ?? '' }}</h4>
                                @if(isset($measure['description']))
                                    <p class="text-sm mt-1">{{ $measure['description'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty($data_protection))
                <div class="data-protection mt-8">
                    <h3>Protezione dei Dati</h3>
                    <ul>
                        @foreach($data_protection as $protection)
                            <li class="mb-2">🔒 {{ $protection }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($incident_response))
                <div class="incident-response mt-8">
                    <h3>Gestione degli Incidenti</h3>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <ol class="list-decimal list-inside">
                            @foreach($incident_response as $step)
                                <li class="mb-2 text-red-800">{{ $step }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
