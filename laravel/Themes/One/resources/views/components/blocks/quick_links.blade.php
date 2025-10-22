@props([
    'title' => 'Azioni Rapide',
    'columns' => 4,
    'links' => [],
])

@php
    // Mappatura delle classi per la griglia in base al numero di colonne
    $gridClasses = [
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 md:grid-cols-2',
        3 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
        4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
    ][$columns] ?? 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4';
    
    // Assicuriamoci che links sia sempre un array
    $links = is_array($links) ? $links : [];
@endphp


