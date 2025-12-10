@props([
    'title' => 'Informazioni Legali',
    'content' => [
        'it' => [
            'privacy' => [
                'label' => 'Informativa sulla Privacy',
                'tooltip' => 'Scopri come gestiamo i tuoi dati personali',
                'icon' => 'heroicon-o-shield-check',
                'color' => 'primary',
            ],
            'terms' => [
                'label' => 'Termini e Condizioni',
                'tooltip' => 'Leggi i termini di utilizzo del servizio',
                'icon' => 'heroicon-o-document-text',
                'color' => 'primary',
            ],
            'cookies' => [
                'label' => 'Cookie Policy',
                'tooltip' => 'Informazioni sull\'uso dei cookie',
                'icon' => 'heroicon-o-cookie',
                'color' => 'primary',
            ],
        ],
        'en' => [
            'privacy' => [
                'label' => 'Privacy Policy',
                'tooltip' => 'Learn how we handle your personal data',
                'icon' => 'heroicon-o-shield-check',
                'color' => 'primary',
            ],
            'terms' => [
                'label' => 'Terms and Conditions',
                'tooltip' => 'Read the terms of service',
                'icon' => 'heroicon-o-document-text',
                'color' => 'primary',
            ],
            'cookies' => [
                'label' => 'Cookie Policy',
                'tooltip' => 'Information about cookie usage',
                'icon' => 'heroicon-o-cookie',
                'color' => 'primary',
            ],
        ],
    ],
])

<div class="space-y-4">
    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
    <ul class="space-y-2">
        @foreach($content[app()->getLocale()] as $key => $item)
            <li>
                <a href="{{ route($key) }}" 
                   class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary-500 dark:hover:text-primary-400"
                   title="{{ $item['tooltip'] }}">
                    <x-filament::icon
                        :icon="$item['icon']"
                        class="h-4 w-4"
                        :color="$item['color']"
                    />
                    {{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div> 