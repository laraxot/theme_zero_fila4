<?php

declare(strict_types=1);

return [
    'headers' => [
        'day' => [
            'label' => 'Giorno',
            'tooltip' => 'Seleziona il giorno della settimana per configurare gli orari',
            'helper_text' => 'Giorno della settimana per cui impostare gli orari di apertura e chiusura',
        ],
        'morning' => [
            'label' => 'Mattina',
            'tooltip' => 'Configurazione orari di apertura mattutini',
            'helper_text' => 'Orari di apertura e chiusura per la sessione mattutina (es. 08:00-12:30)',
        ],
        'afternoon' => [
            'label' => 'Pomeriggio',
            'tooltip' => 'Configurazione orari di apertura pomeridiani',
            'helper_text' => 'Orari di apertura e chiusura per la sessione pomeridiana (es. 14:00-18:30)',
        ],
    ],
]; 