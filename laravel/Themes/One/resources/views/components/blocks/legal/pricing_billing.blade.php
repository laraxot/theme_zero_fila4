@props([
    'title' => 'Tariffe e Fatturazione',
    'content' => '',
    'pricing_structure' => [],
    'payment_methods' => [],
    'billing_terms' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="pricing-billing {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($pricing_structure))
                <div class="pricing-structure mt-8">
                    <h3>Struttura Tariffaria</h3>
                    <ul>
                        @foreach($pricing_structure as $item)
                            <li class="mb-4">
                                <strong>{{ $item['service'] ?? '' }}</strong>
                                @if(isset($item['price']))
                                    <span class="ml-2 text-green-600 font-semibold">{{ $item['price'] }}</span>
                                @endif
                                @if(isset($item['description']))
                                    <p class="mt-2 text-sm">{{ $item['description'] }}</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($payment_methods))
                <div class="payment-methods mt-8">
                    <h3>Modalità di Pagamento</h3>
                    <ul>
                        @foreach($payment_methods as $method)
                            <li class="mb-2">{{ $method }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($billing_terms))
                <div class="billing-terms mt-8">
                    <h3>Condizioni di Fatturazione</h3>
                    <ul>
                        @foreach($billing_terms as $term)
                            <li class="mb-2">{{ $term }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
