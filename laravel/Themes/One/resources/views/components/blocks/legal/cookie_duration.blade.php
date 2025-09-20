@props([
    'title' => 'Durata dei Cookie',
    'content' => '',
    'duration_types' => [],
    'cookie_durations' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="cookie-duration {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($duration_types))
                <div class="duration-types mt-8">
                    <h3>Tipologie di Durata</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($duration_types as $type)
                            <div class="border-l-4 border-yellow-500 pl-4 py-2">
                                <h4 class="font-semibold text-yellow-700">⏰ {{ $type['name'] ?? '' }}</h4>
                                <p class="text-sm mt-1">{{ $type['description'] ?? '' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty($cookie_durations))
                <div class="cookie-durations mt-8">
                    <h3>Durata Specifica dei Cookie</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cookie
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Categoria
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Durata
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($cookie_durations as $cookie)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $cookie['name'] ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $cookie['category'] ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $cookie['duration'] ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
