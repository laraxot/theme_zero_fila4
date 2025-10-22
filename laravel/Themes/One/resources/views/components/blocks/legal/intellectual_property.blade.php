@props([
    'title' => 'Proprietà Intellettuale',
    'content' => '',
    'intellectual_rights' => [],
    'permitted_uses' => [],
    'prohibited_uses' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="intellectual-property {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($intellectual_rights))
                <div class="intellectual-rights mt-8">
                    <h3>Diritti di Proprietà</h3>
                    <ul>
                        @foreach($intellectual_rights as $right)
                            <li class="mb-2">{{ $right }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($permitted_uses))
                <div class="permitted-uses mt-8">
                    <h3>Usi Consentiti</h3>
                    <ul>
                        @foreach($permitted_uses as $use)
                            <li class="mb-2 text-green-700">✓ {{ $use }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($prohibited_uses))
                <div class="prohibited-uses mt-8">
                    <h3>Usi Vietati</h3>
                    <ul>
                        @foreach($prohibited_uses as $use)
                            <li class="mb-2 text-red-700">✗ {{ $use }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
