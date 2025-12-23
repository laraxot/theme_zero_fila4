@props([
    'title' => 'Servizi di Terze Parti',
    'content' => '',
    'services' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="third-party-services {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($services))
                <div class="services mt-8">
                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach($services as $service)
                            <div class="border rounded-lg p-6 hover:shadow-md transition-shadow">
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">
                                    {{ $service['name'] ?? '' }}
                                </h3>
                                <p class="text-gray-700 mb-4">{{ $service['description'] ?? '' }}</p>

                                @if(isset($service['purpose']))
                                    <div class="mb-3">
                                        <span class="text-sm font-medium text-gray-600">Finalità:</span>
                                        <p class="text-sm text-gray-800">{{ $service['purpose'] }}</p>
                                    </div>
                                @endif

                                @if(isset($service['privacy_policy']))
                                    <div class="mb-3">
                                        <a href="{{ $service['privacy_policy'] }}"
                                           target="_blank"
                                           class="text-blue-600 hover:text-blue-800 text-sm">
                                            📋 Privacy Policy →
                                        </a>
                                    </div>
                                @endif

                                @if(isset($service['opt_out']))
                                    <div class="mb-3">
                                        <a href="{{ $service['opt_out'] }}"
                                           target="_blank"
                                           class="text-red-600 hover:text-red-800 text-sm">
                                            ⚙️ Gestisci Preferenze →
                                        </a>
                                    </div>
                                @endif

                                @if(isset($service['cookies']) && !empty($service['cookies']))
                                    <div class="bg-gray-50 p-3 rounded">
                                        <h4 class="text-sm font-medium text-gray-800 mb-2">Cookie utilizzati:</h4>
                                        <ul class="list-disc list-inside text-xs text-gray-600">
                                            @foreach($service['cookies'] as $cookie)
                                                <li>{{ $cookie }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
