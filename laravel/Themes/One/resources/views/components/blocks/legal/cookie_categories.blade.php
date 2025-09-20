@props([
    'title' => 'Categorie di Cookie',
    'content' => '',
    'categories' => [],
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="cookie-categories {{ $background_color }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-lg mx-auto {{ $text_color }}">
            <h2>{{ $title }}</h2>

            @if($content)
                <div class="content">
                    {!! $content !!}
                </div>
            @endif

            @if(!empty($categories))
                <div class="categories mt-8">
                    <div class="space-y-6">
                        @foreach($categories as $category)
                            <div class="border rounded-lg p-6 hover:shadow-md transition-shadow">
                                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                    {{ $category['name'] ?? '' }}
                                </h3>
                                <p class="text-gray-700 mb-4">{{ $category['description'] ?? '' }}</p>

                                @if(isset($category['cookies']) && !empty($category['cookies']))
                                    <div class="bg-gray-50 p-4 rounded">
                                        <h4 class="font-medium text-gray-800 mb-2">Cookie utilizzati:</h4>
                                        <ul class="list-disc list-inside text-sm text-gray-600">
                                            @foreach($category['cookies'] as $cookie)
                                                <li>{{ $cookie }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(isset($category['consent_required']))
                                    <div class="mt-3">
                                        <span class="inline-block px-3 py-1 text-xs font-medium rounded-full
                                            {{ $category['consent_required'] ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $category['consent_required'] ? 'Consenso Richiesto' : 'Sempre Attivi' }}
                                        </span>
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
