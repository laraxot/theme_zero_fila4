@props([
    'title' => 'I Tuoi Diritti sui Cookie',
    'content' => '',
    'user_rights' => [],
    'management_tools' => [],
    'browser_controls' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="cookie-rights {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($user_rights))
                <div class="user-rights mt-8">
                    <h3>Diritti dell'Utente</h3>
                    <div class="space-y-4">
                        @foreach($user_rights as $right)
                            <div class="border-l-4 border-blue-500 pl-4 py-2">
                                <h4 class="font-semibold text-blue-700">⚖️ {{ $right['name'] ?? '' }}</h4>
                                <p class="text-sm mt-1">{{ $right['description'] ?? '' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty($management_tools))
                <div class="management-tools mt-8">
                    <h3>Strumenti di Gestione</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($management_tools as $tool)
                            <div class="border rounded-lg p-4 hover:bg-gray-50">
                                <h4 class="font-semibold text-green-700 mb-2">🛠️ {{ $tool['name'] ?? '' }}</h4>
                                <p class="text-sm mb-3">{{ $tool['description'] ?? '' }}</p>
                                @if(isset($tool['action_url']))
                                    <a href="{{ $tool['action_url'] }}"
                                       class="inline-block bg-green-600 text-white px-3 py-2 rounded text-sm hover:bg-green-700">
                                        {{ $tool['action_text'] ?? 'Accedi' }}
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty($browser_controls))
                <div class="browser-controls mt-8">
                    <h3>Controlli del Browser</h3>
                    <div class="bg-orange-50 p-6 rounded-lg">
                        <p class="text-orange-800 mb-4">
                            Puoi gestire i cookie direttamente dal tuo browser:
                        </p>
                        <ul class="space-y-2">
                            @foreach($browser_controls as $browser)
                                <li class="flex items-center text-sm">
                                    <span class="font-medium text-orange-700 w-20">{{ $browser['name'] ?? '' }}:</span>
                                    @if(isset($browser['help_url']))
                                        <a href="{{ $browser['help_url'] }}"
                                           target="_blank"
                                           class="text-blue-600 hover:text-blue-800 ml-2">
                                            {{ $browser['instructions'] ?? 'Guida' }} →
                                        </a>
                                    @else
                                        <span class="text-gray-600 ml-2">{{ $browser['instructions'] ?? '' }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
