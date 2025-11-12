@props([
    'title',
    'sections' => [],
])

<div class="bg-[#E6EBF7] py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-3xl font-bold leading-7 text-[#272C4D]">{{ $title }}</h2>
            @if(isset($subtitle))
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $subtitle }}</p>
            @endif
            @if(isset($description))
                <p class="mt-6 text-lg leading-8 text-gray-600">{{ $description }}</p>
            @endif
        </div>
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                @foreach($sections as $section)
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-lg text-[#FF5F7E]">
                            @if(isset($section['icon']))
                                {{--
                                <x-dynamic-component
                                    :component="'heroicon-o-'.$section['icon']"
                                    class="h-5 w-5 flex-none text-[#FF5F7E]"
                                />
                                --}}
                                <x-filament::icon
                                    :icon="$section['icon']"
                                    class="h-5 w-5 flex-none text-[#FF5F7E]"
                                />
                            @endif
                            {{ $section['title'] }}
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto text-lg text-[#FF5F7E]">{{ $section['description'] }}</p>
                            @if(isset($section['link']))
                                <p class="mt-6">
                                    <a href="{{ $section['link'] }}" class="text-sm font-semibold leading-6 text-indigo-600">
                                        {{ $section['link_text'] ?? __('pub_theme::components.feature_sections.discover_more') }} <span aria-hidden="true">→</span>
                                    </a>
                                </p>
                            @endif
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</div>
