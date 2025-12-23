@props([
    'title' => 'Gestione del Consenso',
    'content' => '',
    'consent_options' => [],
    'withdrawal_procedures' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="consent-management {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($consent_options))
                <div class="consent-options mt-8">
                    <h3>Opzioni di Consenso</h3>
                    <div class="space-y-4">
                        @foreach($consent_options as $option)
                            <div class="border-l-4 border-blue-500 pl-4 py-2">
                                <h4 class="font-semibold text-blue-700">{{ $option['name'] ?? '' }}</h4>
                                <p class="text-sm mt-1">{{ $option['description'] ?? '' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty($withdrawal_procedures))
                <div class="withdrawal-procedures mt-8">
                    <h3>Come Revocare il Consenso</h3>
                    <ol class="list-decimal list-inside">
                        @foreach($withdrawal_procedures as $procedure)
                            <li class="mb-2">{{ $procedure }}</li>
                        @endforeach
                    </ol>
                </div>
            @endif
        </div>
    </div>
</div>
