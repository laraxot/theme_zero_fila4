<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */
    'nav' => [
        'menu' => 'Menü',
        'close' => 'Schließen',
        'home' => 'Startseite',
        'about' => 'Über uns',
        'services' => 'Dienstleistungen',
        'contact' => 'Kontakt',
        'login' => 'Anmelden',
        'register' => 'Registrieren',
        'profile' => 'Profil',
        'logout' => 'Abmelden',
        'search' => 'Suchen',
        'toggle_menu' => 'Menü umschalten',
        'toggle_search' => 'Suche umschalten',
        'toggle_theme' => 'Theme wechseln',
        'back_to_top' => 'Nach oben',
    ],

    /*
    |--------------------------------------------------------------------------
    | Form
    |--------------------------------------------------------------------------
    */
    'form' => [
        'required' => 'Pflichtfeld',
        'email' => 'Geben Sie eine gültige E-Mail-Adresse ein',
        'min' => 'Das Feld muss mindestens :min Zeichen enthalten',
        'max' => 'Das Feld darf nicht mehr als :max Zeichen enthalten',
        'submit' => 'Senden',
        'cancel' => 'Abbrechen',
        'save' => 'Speichern',
        'delete' => 'Löschen',
        'edit' => 'Bearbeiten',
        'view' => 'Anzeigen',
        'search' => 'Suchen...',
        'filter' => 'Filtern',
        'reset' => 'Zurücksetzen',
        'select' => 'Auswählen',
        'choose' => 'Wählen...',
    ],

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */
    'messages' => [
        'success' => 'Vorgang erfolgreich abgeschlossen',
        'error' => 'Ein Fehler ist aufgetreten',
        'warning' => 'Warnung',
        'info' => 'Information',
        'loading' => 'Lädt...',
        'no_results' => 'Keine Ergebnisse gefunden',
        'confirm_delete' => 'Sind Sie sicher, dass Sie dieses Element löschen möchten?',
        'yes' => 'Ja',
        'no' => 'Nein',
        'cookie_consent' => 'Diese Website verwendet Cookies, um Ihre Erfahrung zu verbessern',
        'accept' => 'Akzeptieren',
        'decline' => 'Ablehnen',
    ],

    /*
    |--------------------------------------------------------------------------
    | Footer
    |--------------------------------------------------------------------------
    */
    'footer' => [
        'copyright' => 'Alle Rechte vorbehalten',
        'privacy' => 'Datenschutz',
        'terms' => 'Geschäftsbedingungen',
        'cookies' => 'Cookie-Richtlinie',
        'social' => [
            'follow' => 'Folgen Sie uns auf',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Errors
    |--------------------------------------------------------------------------
    */
    'errors' => [
        '404' => [
            'title' => 'Seite nicht gefunden',
            'message' => 'Die gesuchte Seite existiert nicht',
        ],
        '500' => [
            'title' => 'Serverfehler',
            'message' => 'Ein interner Serverfehler ist aufgetreten',
        ],
        '403' => [
            'title' => 'Zugriff verweigert',
            'message' => 'Sie haben keine Berechtigung, auf diese Seite zuzugreifen',
        ],
        'offline' => [
            'title' => 'Offline',
            'message' => 'Sie sind nicht mit dem Internet verbunden',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Hero Components
    |--------------------------------------------------------------------------
    */
    'hero' => [
        'patient_profile' => [
            'my_data' => [
                'label' => 'Meine Daten',
                'tooltip' => 'Ihre persönlichen Informationen anzeigen und bearbeiten',
                'help' => 'Verwalten Sie Ihre persönlichen und demografischen Daten',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Error Pages - 429 Rate Limiting
    |--------------------------------------------------------------------------
    */
    'error_429' => [
        'title' => 'Virtuelles Wartezimmer - SaluteOra',
        'queue_position' => 'Position',
        'waiting_messages' => [
            'doctor_busy' => 'Der Arzt ist heute sehr gefragt! 👨‍⚕️✨',
            'waiting_room_full' => 'Wartezimmer voll: wir sind ein Erfolg! 🎉',
            'too_much_love' => 'Zu viele Patienten gleichzeitig = zu viel Liebe! ❤️',
            'server_coffee_break' => 'Der Server braucht eine Kaffeepause ☕',
            'computer_tired' => 'Auch Computer werden nach so vielen Besuchen müde! 💻😴',
            'quality_over_quantity' => 'Qualität vor Quantität: wir behandeln lieber gut! 🩺',
            'sterilizing_server' => 'Wir sterilisieren den Server... 🧼💻',
        ],
        'tips' => [
            'book_appointments' => '💡 Tipp: Termine buchen, um Warteschlangen zu vermeiden',
            'best_hours' => '⏰ Weniger überfüllte Zeiten: früh morgens oder spätnachmittags',
            'use_app' => '📱 Nutzen Sie unsere App für schnellere Kontrollen',
            'plan_ahead' => '🗓️ Planen Sie Kontrollbesuche rechtzeitig',
            'newsletter' => '💌 Newsletter abonnieren für prioritäre Updates',
        ],
        'trivia' => [
            'question_1' => [
                'question' => 'Wie oft am Tag sollten Sie Ihre Zähne putzen?',
                'options' => ['1 Mal', '2 Mal', '3 Mal', '4 Mal'],
                'explanation' => 'Zweimal am Tag ist ideal für eine gute Mundhygiene!',
            ],
            'question_2' => [
                'question' => 'Während der Schwangerschaft können Zahnfleisch mehr sein:',
                'options' => ['Trocken', 'Empfindlich', 'Hart', 'Kalt'],
                'explanation' => 'Zahnfleisch wird während der Schwangerschaft aufgrund hormoneller Veränderungen empfindlicher.',
            ],
            'question_3' => [
                'question' => 'Was ist das wichtigste Mineral für die Zähne?',
                'options' => ['Eisen', 'Kalzium', 'Magnesium', 'Zink'],
                'explanation' => 'Kalzium ist wesentlich für starke und gesunde Zähne!',
            ],
        ],
        'alerts' => [
            'popularity_alert' => '🩺 Warnung: Zu viel Popularität kann virtuelle Warteschlangen verursachen!',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Components - Feature Sections
    |--------------------------------------------------------------------------
    */
    'components' => [
        'feature_sections' => [
            'discover_more' => 'Mehr erfahren',
        ],
        'stats' => [
            'medical_impact' => [
                'patronage' => 'Schirmherrschaft',
                'ministry_of_health' => 'Gesundheitsministerium',
                'integrated_with' => 'Integriert mit',
                'national_health_service' => 'Staatlicher Gesundheitsdienst',
                'certification' => 'Zertifizierung',
                'iso_9001_2015' => 'ISO 9001:2015',
            ],
        ],
        'certifications' => [
            'subtitle' => 'Die Qualität unserer Dienstleistungen wird durch prestigeträchtige nationale und internationale Zertifizierungen garantiert',
            'iso_9001' => [
                'description' => 'Qualitätsmanagementsystem konform mit den strengsten internationalen Standards',
            ],
            'gdpr_compliance' => [
                'description' => 'Einhaltung der europäischen Vorschriften zum Schutz persönlicher und Gesundheitsdaten',
            ],
            'reliability' => 'Zuverlässigkeit',
            'credibility_breakdown' => 'Glaubwürdigkeits-Aufschlüsselung',
            'certified_quality' => 'Zertifizierte Qualität',
        ],
        'privacy_principles' => [
            'subtitle' => 'Jeder Prozess ist darauf ausgelegt, Ihre Privatsphäre und Sicherheit zu maximieren',
        ],
        'cta' => [
            'simple' => [
                'text' => 'Mehr erfahren',
            ],
            'privacy_contact' => [
                'subtitle' => 'Unser Team ist hier, um Ihnen bei allen Fragen zu helfen',
            ],
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Komponenten - Kalender
    |--------------------------------------------------------------------------
    */
    'calendar' => [
        'month_names' => [
            'January' => 'Januar',
            'February' => 'Februar',
            'March' => 'März',
            'April' => 'April',
            'May' => 'Mai',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'August',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Dezember',
        ],
        'day_abbreviations' => [
            'M' => 'Mo',
            'T' => 'Di',
            'W' => 'Mi',
            'Th' => 'Do',
            'F' => 'Fr',
            'S' => 'Sa',
            'Su' => 'So',
        ],
        'upcoming_events' => 'Bevorstehende Termine',
        'no_events' => 'Keine geplanten Termine',
        'view_house' => 'Hausbesichtigung mit Immobilienmakler',
        'bank_meeting' => 'Termin mit Bankleiter',
    ],
];
