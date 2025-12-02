<?php

declare(strict_types=1);

return [
    'title' => 'Inviaci un Messaggio',
    'subtitle' => 'Compila il form per ricevere supporto personalizzato. Risponderemo entro 2 ore lavorative',
    
    'form' => [
        'priority' => [
            'label' => 'Livello di Priorità',
            'low' => 'Bassa',
            'normal' => 'Normale',
            'high' => 'Alta',
        ],
        'service_type' => [
            'label' => 'Tipo di Richiesta',
            'general' => 'Informazioni Generali',
            'appointment' => 'Prenotazione Appuntamento',
            'billing' => 'Fatturazione',
            'other' => 'Altro',
        ],
        'fields' => [
            'full_name' => 'Nome e Cognome',
            'email' => 'Indirizzo Email',
            'phone' => 'Numero di Telefono',
            'message' => 'Il tuo Messaggio',
        ],
        'submit' => 'Invia Richiesta',
        'submitting' => 'Invio in corso...',
        'success' => [
            'title' => 'Richiesta Inviata!',
            'message' => 'Grazie per averci contattato. Abbiamo ricevuto la tua richiesta e ti risponderemo al più presto.',
            'button' => 'Invia un nuovo messaggio',
        ],
        'error' => [
            'title' => 'Errore',
            'message' => 'Si è verificato un errore durante l\'invio del messaggio. Riprova più tardi o contattaci telefonicamente.',
            'button' => 'Riprova',
        ],
    ],
    
    'benefits' => [
        'title' => 'Vantaggi del Nostro Supporto',
        'items' => [
            [
                'title' => 'Risposta Rapida',
                'description' => 'Il nostro team risponderà alla tua richiesta entro 2 ore lavorative.',
            ],
            [
                'title' => 'Supporto Specializzato',
                'description' => 'Il nostro personale qualificato è pronto ad assisterti con qualsiasi domanda.',
            ],
            [
                'title' => 'Sicurezza dei Dati',
                'description' => 'Le tue informazioni personali sono protette e gestite nel rispetto della privacy.',
            ],
        ],
    ],
    
    'methods' => [
        'title' => 'Altri Modi per Contattarci',
        'phone' => [
            'title' => 'Chiamaci',
            'description' => 'Lun-Sab 8:00-19:00',
        ],
        'emergency' => [
            'title' => 'Emergenze',
            'description' => '24/7 sempre attivo',
        ],
        'email' => [
            'title' => 'Email',
            'description' => 'Risposta entro 2 ore',
        ],
    ],
    
    'contact_info' => [
        'title' => 'Informazioni di Contatto',
        'email' => 'Email',
        'phone' => 'Telefono',
        'hours' => 'Orari di Apertura',
        'address' => 'Indirizzo',
    ],
];
