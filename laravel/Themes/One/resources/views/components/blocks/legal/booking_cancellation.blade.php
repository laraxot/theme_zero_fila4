@props([
    'title' => 'Prenotazioni e Cancellazioni',
    'content' => '',
    'booking_policy' => [],
    'cancellation_policy' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="booking-cancellation {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($booking_policy))
                <div class="booking-policy mt-8">
                    <h3>Politica di Prenotazione</h3>
                    <ul>
                        @foreach($booking_policy as $rule)
                            <li class="mb-2">{{ $rule }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($cancellation_policy))
                <div class="cancellation-policy mt-8">
                    <h3>Politica di Cancellazione</h3>
                    <ul>
                        @foreach($cancellation_policy as $rule)
                            <li class="mb-2">{{ $rule }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
