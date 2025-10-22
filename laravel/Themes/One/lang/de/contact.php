<?php

declare(strict_types=1);

return [
    'title' => 'Senden Sie uns eine Nachricht',
    'subtitle' => 'Füllen Sie das Formular aus, um persönliche Unterstützung zu erhalten. Wir antworten innerhalb von 2 Werktagen.',
    
    'form' => [
        'priority' => [
            'label' => 'Prioritätsstufe',
            'low' => 'Niedrig',
            'normal' => 'Normal',
            'high' => 'Hoch',
        ],
        'service_type' => [
            'label' => 'Art der Anfrage',
            'general' => 'Allgemeine Informationen',
            'appointment' => 'Terminvereinbarung',
            'billing' => 'Abrechnung',
            'other' => 'Andere',
        ],
        'fields' => [
            'full_name' => 'Vor- und Nachname',
            'email' => 'E-Mail-Adresse',
            'phone' => 'Telefonnummer',
            'message' => 'Ihre Nachricht',
        ],
        'submit' => 'Anfrage senden',
        'submitting' => 'Wird gesendet...',
        'success' => [
            'title' => 'Nachricht gesendet!',
            'message' => 'Vielen Dank für Ihre Nachricht. Wir haben Ihre Anfrage erhalten und werden uns so schnell wie möglich bei Ihnen melden.',
            'button' => 'Neue Nachricht senden',
        ],
        'error' => [
            'title' => 'Fehler',
            'message' => 'Beim Senden Ihrer Nachricht ist ein Fehler aufgetreten. Bitte versuchen Sie es später noch einmal oder rufen Sie uns an.',
            'button' => 'Erneut versuchen',
        ],
    ],
    
    'benefits' => [
        'title' => 'Vorteile unseres Supports',
        'items' => [
            [
                'title' => 'Schnelle Antwort',
                'description' => 'Unser Team antwortet auf Ihre Anfrage innerhalb von 2 Werktagen.',
            ],
            [
                'title' => 'Fachkundige Unterstützung',
                'description' => 'Unser qualifiziertes Personal steht Ihnen bei allen Fragen zur Seite.',
            ],
            [
                'title' => 'Datensicherheit',
                'description' => 'Ihre persönlichen Daten werden geschützt und gemäß den Datenschutzbestimmungen verarbeitet.',
            ],
        ],
    ],
    
    'methods' => [
        'title' => 'Weitere Kontaktmöglichkeiten',
        'phone' => [
            'title' => 'Rufen Sie uns an',
            'description' => 'Mo-Sa 8:00-19:00 Uhr',
        ],
        'emergency' => [
            'title' => 'Notfall',
            'description' => '24/7 erreichbar',
        ],
        'email' => [
            'title' => 'E-Mail',
            'description' => 'Antwort innerhalb von 2 Stunden',
        ],
    ],
    
    'contact_info' => [
        'title' => 'Kontaktinformationen',
        'email' => 'E-Mail',
        'phone' => 'Telefon',
        'hours' => 'Öffnungszeiten',
        'address' => 'Adresse',
    ],
];
