@props(['block'])

@switch($block['type'])
    @case('hero')
        <x-blocks.hero
            :title="$block['data']['title']"
            :subtitle="$block['data']['subtitle']"
            :image="$block['data']['image']"
            :cta-text="$block['data']['cta_text']"
            :cta-link="$block['data']['cta_link']"
            :background-color="$block['data']['background_color'] ?? 'bg-white'"
            :text-color="$block['data']['text_color'] ?? 'text-gray-900'"
            :cta-color="$block['data']['cta_color'] ?? 'bg-primary-600 hover:bg-primary-700'"
        />
        @break
    @case('feature_sections')
        <x-blocks.feature-sections
            :title="$block['data']['title']"
            :description="$block['data']['description']"
            :sections="$block['data']['sections']"
        />
        @break
    @case('team')
        <x-blocks.team
            :title="$block['data']['title']"
            :description="$block['data']['description']"
            :members="$block['data']['members']"
        />
        @break
    @case('stats')
        <x-blocks.stats
            :title="$block['data']['title']"
            :stats="$block['data']['stats']"
        />
        @break
    @case('cta')
        <x-blocks.cta
            :title="$block['data']['title']"
            :description="$block['data']['description']"
            :button-text="$block['data']['button_text']"
            :button-link="$block['data']['button_link']"
        />
        @break
    @case('paragraph')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="prose prose-lg mx-auto">
                {!! $block['data']['content'] !!}
            </div>
        </div>
        @break
    @default
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Errore!</strong>
            <span class="block sm:inline">Tipo di blocco non supportato: {{ $block['type'] }}</span>
        </div>
@endswitch
