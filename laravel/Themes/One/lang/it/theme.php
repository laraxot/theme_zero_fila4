<?php
declare(strict_types=1);
return [
    /*
    |--------------------------------------------------------------------------
    | Navigazione
    |--------------------------------------------------------------------------
    */
    'nav' => [
        'menu' => 'Menu',
        'close' => 'Chiudi',
        'home' => 'Home',
        'about' => 'Chi Siamo',
        'services' => 'Servizi',
        'contact' => 'Contatti',
        'login' => 'Accedi',
        'register' => 'Registrati',
        'profile' => 'Profilo',
        'logout' => 'Esci',
        'search' => 'Cerca',
        'toggle_menu' => 'Apri/Chiudi Menu',
        'toggle_search' => 'Apri/Chiudi Ricerca',
        'toggle_theme' => 'Cambia Tema',
        'back_to_top' => 'Torna su',
    ],

    /*
    |--------------------------------------------------------------------------
    | Form
    |--------------------------------------------------------------------------
    */
    'form' => [
        'required' => 'Campo obbligatorio',
        'email' => 'Inserisci un indirizzo email valido',
        'min' => 'Il campo deve contenere almeno :min caratteri',
        'max' => 'Il campo non può superare :max caratteri',
        'submit' => 'Invia',
        'cancel' => 'Annulla',
        'save' => 'Salva',
        'delete' => 'Elimina',
        'edit' => 'Modifica',
        'view' => 'Visualizza',
        'search' => 'Cerca...',
        'filter' => 'Filtra',
        'reset' => 'Reimposta',
        'select' => 'Seleziona',
        'choose' => 'Scegli...',
    ],

    /*
    |--------------------------------------------------------------------------
    | Messaggi
    |--------------------------------------------------------------------------
    */
    'messages' => [
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore',
        'warning' => 'Attenzione',
        'info' => 'Informazione',
        'loading' => 'Caricamento in corso...',
        'no_results' => 'Nessun risultato trovato',
        'confirm_delete' => 'Sei sicuro di voler eliminare questo elemento?',
        'yes' => 'Sì',
        'no' => 'No',
        'cookie_consent' => 'Questo sito utilizza i cookie per migliorare la tua esperienza',
        'accept' => 'Accetta',
        'decline' => 'Rifiuta',
    ],

    /*
    |--------------------------------------------------------------------------
    | Footer
    |--------------------------------------------------------------------------
    */
    'footer' => [
        'copyright' => 'Tutti i diritti riservati',
        'privacy' => 'Privacy',
        'terms' => 'Termini e Condizioni',
        'cookies' => 'Cookie Policy',
        'social' => [
            'follow' => 'Seguici su',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Errori
    |--------------------------------------------------------------------------
    */
    'errors' => [
        '404' => [
            'title' => 'Pagina non trovata',
            'message' => 'La pagina che stai cercando non esiste',
        ],
        '500' => [
            'title' => 'Errore del server',
            'message' => 'Si è verificato un errore interno del server',
        ],
        '403' => [
            'title' => 'Accesso negato',
            'message' => 'Non hai i permessi per accedere a questa pagina',
        ],
        'offline' => [
            'title' => 'Offline',
            'message' => 'Non sei connesso a Internet',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Componenti Hero
    |--------------------------------------------------------------------------
    */
    'hero' => [
        'patient_profile' => [
            'my_data' => [
                'label' => 'I miei dati',
                'tooltip' => 'Visualizza e modifica le tue informazioni personali',
                'help' => 'Gestisci i tuoi dati personali e anagrafici',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagine di Errore - 429 Rate Limiting
    |--------------------------------------------------------------------------
    */
    'error_429' => [
        'title' => 'Sala d\'Attesa Virtuale - SaluteOra',
        'queue_position' => 'Posizione',
        'waiting_messages' => [
            'doctor_busy' => 'Il dottore è molto richiesto oggi! 👨‍⚕️✨',
            'waiting_room_full' => 'Sala d\'attesa piena: siamo un successo! 🎉',
            'too_much_love' => 'Troppi pazienti contemporaneamente = troppo amore! ❤️',
            'server_coffee_break' => 'Il server ha bisogno di una pausa caffè ☕',
            'computer_tired' => 'Anche i computer si stancano dopo tante visite! 💻😴',
            'quality_over_quantity' => 'Quality over quantity: preferiamo curare bene! 🩺',
            'sterilizing_server' => 'Stiamo sterilizzando il server... 🧼💻',
        ],
        'tips' => [
            'book_appointments' => '💡 Consiglio: Prenota gli appuntamenti per evitare le code',
            'best_hours' => '⏰ Orari meno affollati: mattino presto o tardo pomeriggio',
            'use_app' => '📱 Usa la nostra app per controlli più veloci',
            'plan_ahead' => '🗓️ Pianifica visite di controllo con largo anticipo',
            'newsletter' => '💌 Iscriviti alla newsletter per aggiornamenti prioritari',
        ],
        'trivia' => [
            'question_1' => [
                'question' => 'Quante volte al giorno dovresti lavarti i denti?',
                'options' => ['1 volta', '2 volte', '3 volte', '4 volte'],
                'explanation' => 'Due volte al giorno è l\'ideale per una buona igiene orale!',
            ],
            'question_2' => [
                'question' => 'Durante la gravidanza, le gengive possono essere più:',
                'options' => ['Secche', 'Sensibili', 'Dure', 'Fredde'],
                'explanation' => 'Le gengive in gravidanza diventano più sensibili a causa dei cambiamenti ormonali.',
            ],
            'question_3' => [
                'question' => 'Qual è il minerale più importante per i denti?',
                'options' => ['Ferro', 'Calcio', 'Magnesio', 'Zinco'],
                'explanation' => 'Il calcio è fondamentale per mantenere denti forti e sani!',
            ],
        ],
        'alerts' => [
            'popularity_alert' => '🩺 Alert: Troppa popolarità può causare code virtuali!',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Componenti - Feature Sections
    |--------------------------------------------------------------------------
    */
    'components' => [
        'feature_sections' => [
            'discover_more' => 'Scopri di più',
        ],
        'stats' => [
            'medical_impact' => [
                'patronage' => 'Patrocinio',
                'ministry_of_health' => 'Ministero della Salute',
                'integrated_with' => 'Integrato con',
                'national_health_service' => 'Sistema Sanitario Nazionale',
                'certification' => 'Certificazione',
                'iso_9001_2015' => 'ISO 9001:2015',
            ],
        ],
        'certifications' => [
            'subtitle' => 'La qualità dei nostri servizi è garantita da certificazioni nazionali e internazionali di prestigio',
            'iso_9001' => [
                'description' => 'Sistema di gestione qualità conforme agli standard internazionali più rigorosi',
            ],
            'gdpr_compliance' => [
                'description' => 'Conformità alle normative europee sulla protezione dei dati personali e sanitari',
            ],
            'reliability' => 'Affidabilità',
            'credibility_breakdown' => 'Breakdown Credibilità',
            'certified_quality' => 'Qualità certificata',
        ],
        'privacy_principles' => [
            'subtitle' => 'Ogni processo è progettato per massimizzare la tua privacy e sicurezza',
        ],
        'cta' => [
            'simple' => [
                'text' => 'Scopri di più',
            ],
            'privacy_contact' => [
                'subtitle' => 'Il nostro team è qui per aiutarti con qualsiasi dubbio',
            ],
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Componenti - Calendario
    |--------------------------------------------------------------------------
    */
    'calendar' => [
        'month_names' => [
            'January' => 'Gennaio',
            'February' => 'Febbraio',
            'March' => 'Marzo',
            'April' => 'Aprile',
            'May' => 'Maggio',
            'June' => 'Giugno',
            'July' => 'Luglio',
            'August' => 'Agosto',
            'September' => 'Settembre',
            'October' => 'Ottobre',
            'November' => 'Novembre',
            'December' => 'Dicembre',
        ],
        'day_abbreviations' => [
            'M' => 'Lun',
            'T' => 'Mar',
            'W' => 'Mer',
            'Th' => 'Gio',
            'F' => 'Ven',
            'S' => 'Sab',
            'Su' => 'Dom',
        ],
        'upcoming_events' => 'Prossimi eventi',
        'no_events' => 'Nessun evento in programma',
        'view_house' => 'Visita immobile con agente immobiliare',
        'bank_meeting' => 'Incontro con il direttore di banca',
    ],
];
