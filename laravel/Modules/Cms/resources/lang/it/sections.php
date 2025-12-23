<?php

declare(strict_types=1);


return [
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome della sezione',
        ],
        'slug' => [
            'label' => 'Slug',
            'placeholder' => 'Inserisci lo slug della sezione',
        ],
        'description' => [
            'label' => 'Descrizione',
            'placeholder' => 'Inserisci una descrizione',
        ],
        'image' => [
            'label' => 'Immagine',
            'placeholder' => 'Seleziona un\'immagine',
        ],
        'blocks' => [
            'label' => 'Blocchi',
            'placeholder' => 'Aggiungi blocchi',
        ],
    ],
    'actions' => [
        'create' => 'Crea Sezione',
        'edit' => 'Modifica Sezione',
        'delete' => 'Elimina Sezione',
        'save' => 'Salva Sezione',
        'cancel' => 'Annulla',
    ],
    'messages' => [
        'created' => 'Sezione creata con successo',
        'updated' => 'Sezione aggiornata con successo',
        'deleted' => 'Sezione eliminata con successo',
        'error' => 'Si è verificato un errore',
    ],
];
