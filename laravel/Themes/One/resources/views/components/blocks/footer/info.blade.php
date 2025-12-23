@props([
    'title' => 'Informazioni Aggiuntive',
    'content' => [
        'it' => [
            'privacy' => 'Informativa sulla Privacy',
            'terms' => 'Termini e Condizioni',
            'cookies' => 'Cookie Policy',
        ],
        'en' => [
            'privacy' => 'Privacy Policy',
            'terms' => 'Terms and Conditions',
            'cookies' => 'Cookie Policy',
        ],
    ],
])

<div class="space-y-4">
    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
    <ul class="space-y-2">
        @foreach($content[app()->getLocale()] as $key => $label)
            <li>
                <a href="{{ route($key) }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary-500 dark:hover:text-primary-400">
                    {{ $label }}
                </a>
            </li>
        @endforeach
    </ul>
</div> 