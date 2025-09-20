@props([
    'links' => [],
    'copyrightText' => null,
    'showSocial' => false,
    'socialLinks' => [],
    'containerClass' => 'max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8'
])

<footer {{ $attributes->class(['bg-white border-t border-gray-200']) }}>
    <div class="{{ $containerClass }}">
        <div class="flex flex-col items-center justify-between space-y-4 sm:flex-row sm:space-y-0">
            <div class="text-sm text-gray-500">
                {{ $copyrightText ?? '© ' . date('Y') . ' ' . config('app.name') . '. ' . __('theme::messages.all_rights_reserved') }}
            </div>

            @if($links)
                <nav class="flex space-x-4">
                    @foreach($links as $link)
                        <x-filament::button
                            :href="$link['url']"
                            :class="$link['class'] ?? ''"
                            :target="$link['target'] ?? '_self'"
                            tag="a"
                            color="gray"
                            size="sm"
                        >
                            {{ $link['title'] }}
                        </x-filament::button>
                    @endforeach
                </nav>
            @endif

            @if($showSocial && !empty($socialLinks))
                <div class="flex items-center space-x-4">
                    @foreach($socialLinks as $social)
                        <x-filament::icon-button
                            :icon="$social['icon']"
                            :href="$social['url']"
                            :target="'_blank'"
                            :rel="'noopener noreferrer'"
                            :aria-label="$social['title']"
                            color="gray"
                        />
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</footer>
