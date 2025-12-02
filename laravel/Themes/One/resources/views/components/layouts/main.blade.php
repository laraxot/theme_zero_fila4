@php
    $isLanding =Route::currentRouteName()=='home' && !Auth::check();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="SaluteOra - La piattaforma per la gestione della tua salute">
        <meta name="keywords" content="salute, medici, studi, appuntamenti, prenotazioni">
        <meta name="author" content="SaluteOra">
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        @filamentStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'],'themes/One')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <title>{{ $title ?? 'SaluteOra - La tua salute, ora' }}</title>
    </head>
    <body>
        <div>
            <!-- Contenuto principale -->
            <main>
                {{ $slot }}
            </main>
        </div>

        {{--
        @livewire('notifications')

        --}}
        @filamentScripts
        @vite(['resources/js/app.js'],'themes/One')
    </body>
</html>
