@props([
    'title' => 'Requisiti di Accesso',
    'content' => '',
    'eligibility_criteria' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="user-eligibility {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($eligibility_criteria))
                <div class="eligibility-list mt-8">
                    <h3>Criteri di Eligibilità</h3>
                    <ul>
                        @foreach($eligibility_criteria as $criterion)
                            <li class="mb-4">
                                <strong>{{ $criterion['title'] ?? '' }}</strong>
                                @if(isset($criterion['description']))
                                    <p class="mt-2">{{ $criterion['description'] }}</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
