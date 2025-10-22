<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Fehlerseiten
    |--------------------------------------------------------------------------
    */
    'http_403' => [
        'title' => [
            'label' => 'Fehler 403',
            'tooltip' => 'Zugriff verweigert',
            'helper_text' => 'HTTP-Statuscode 403',
        ],
        'message' => [
            'label' => 'Sie haben keine Berechtigung, auf diese Seite zuzugreifen',
            'tooltip' => 'Fehlermeldung für verweigerten Zugriff',
            'helper_text' => 'Der Benutzer hat nicht die erforderlichen Privilegien, um diese Ressource anzuzeigen',
        ],
    ],

    'http_404' => [
        'title' => [
            'label' => 'Fehler 404',
            'tooltip' => 'Seite nicht gefunden',
            'helper_text' => 'HTTP-Statuscode 404',
        ],
        'message' => [
            'label' => 'Die gesuchte Seite existiert nicht',
            'tooltip' => 'Fehlermeldung für nicht gefundene Seite',
            'helper_text' => 'Die angeforderte Ressource wurde auf dem Server nicht gefunden',
        ],
    ],

    'http_429' => [
        'title' => [
            'label' => 'Fehler 429',
            'tooltip' => 'Zu viele Anfragen',
            'helper_text' => 'HTTP-Statuscode 429',
        ],
        'virtual_waiting_room' => [
            'title' => [
                'label' => 'Virtueller Warteraum',
                'tooltip' => 'Warteschlangen-Management-System',
                'helper_text' => 'System zur Begrenzung des gleichzeitigen Zugriffs',
            ],
            'description' => [
                'label' => 'Wir bearbeiten viele Anfragen, um Ihnen den besten Service zu garantieren!',
                'tooltip' => 'Erklärung des Wartesystems',
                'helper_text' => 'Informative Nachricht zur Beruhigung des Benutzers',
            ],
        ],
        'countdown' => [
            'retry_message' => [
                'label' => 'Sie können es erneut versuchen in',
                'tooltip' => 'Wartezeit vor dem nächsten Versuch',
                'helper_text' => 'Zeigt an, wann der Benutzer eine neue Anfrage stellen kann',
            ],
            'start_waiting' => [
                'label' => 'Wartebeginn',
                'tooltip' => 'Beginn der Wartezeit',
                'helper_text' => 'Zeitstempel des Countdown-Starts',
            ],
        ],
        'queue' => [
            'position' => [
                'label' => 'Position in der Warteschlange',
                'tooltip' => 'Nummer in der virtuellen Schlange',
                'helper_text' => 'Zeigt die Position des Benutzers in der Warteschlange an',
            ],
            'people_ahead' => [
                'label' => 'Personen vor Ihnen im virtuellen Warteraum',
                'tooltip' => 'Anzahl der Benutzer, die in der Schlange vor Ihnen stehen',
                'helper_text' => 'Schätzung der Benutzer, die vor dem aktuellen Benutzer warten',
            ],
        ],
        'activities' => [
            'breathing' => [
                'title' => [
                    'label' => '🫁 Atmen und Entspannen',
                    'tooltip' => 'Atemübung',
                    'helper_text' => 'Aktivität, um dem Benutzer beim Entspannen während der Wartezeit zu helfen',
                ],
                'start_exercise' => [
                    'label' => 'Übung starten',
                    'tooltip' => 'Atemübung starten',
                    'helper_text' => 'Button zum Beginnen der geführten Atemsitzung',
                ],
                'breaths_completed' => [
                    'label' => 'Abgeschlossene Atemzüge',
                    'tooltip' => 'Zähler der Atemzyklen',
                    'helper_text' => 'Anzahl der tiefen Atemzüge',
                ],
            ],
            'quiz' => [
                'title' => [
                    'label' => '🧠 Medizinisches Quiz',
                    'tooltip' => 'Bildungsquiz zu Gesundheitsthemen',
                    'helper_text' => 'Bildungsaktivität, um den Benutzer zu beschäftigen',
                ],
                'start_quiz' => [
                    'label' => 'Quiz starten',
                    'tooltip' => 'Medizinisches Quiz starten',
                    'helper_text' => 'Button zum Starten des Bildungsquiz',
                ],
                'new_quiz' => [
                    'label' => 'Neues Quiz',
                    'tooltip' => 'Neue Frage generieren',
                    'helper_text' => 'Button für eine neue Quizfrage',
                ],
            ],
            'tips' => [
                'title' => [
                    'label' => '💡 Intelligente Tipps',
                    'tooltip' => 'Nützliche Vorschläge',
                    'helper_text' => 'Tipps zur Verbesserung der Benutzererfahrung',
                ],
                'avoid_queues' => [
                    'label' => 'Vermeiden Sie Warteschlangen mit unseren prioritären Updates!',
                    'tooltip' => 'Vorschlag zur Vermeidung von Verkehrsspitzen',
                    'helper_text' => 'Rat, den Service zu weniger überfüllten Zeiten zu nutzen',
                ],
            ],
        ],
        'retry' => [
            'retry_in' => [
                'label' => 'Erneut versuchen in',
                'tooltip' => 'Verbleibende Zeit vor dem nächsten Versuch',
                'helper_text' => 'Countdown für den nächsten verfügbaren Versuch',
            ],
            'retry_now' => [
                'label' => '🔄 Jetzt erneut versuchen',
                'tooltip' => 'Erneut versuchen zuzugreifen',
                'helper_text' => 'Button für sofortigen Zugriff',
            ],
        ],
        'emergency' => [
            'no_wait_emergency' => [
                'label' => 'Warten Sie nicht im Notfall',
                'tooltip' => 'Warnung für Notfallsituationen',
                'helper_text' => 'Erinnerung, dass man im Notfall nicht warten sollte',
            ],
        ],
        'footer' => [
            'powered_by' => [
                'label' => 'Unterstützt von',
                'tooltip' => 'Systemkredite',
                'helper_text' => 'Zuordnung des Warteschlangen-Management-Systems',
            ],
            'tech_team' => [
                'label' => 'SaluteOra Tech Team',
                'tooltip' => 'Entwicklungsteam',
                'helper_text' => 'Name des für die Entwicklung verantwortlichen Teams',
            ],
        ],
    ],

    'http_500' => [
        'title' => [
            'label' => 'Fehler 500',
            'tooltip' => 'Interner Serverfehler',
            'helper_text' => 'HTTP-Statuscode 500',
        ],
        'message' => [
            'label' => 'Ein interner Serverfehler ist aufgetreten',
            'tooltip' => 'Fehlermeldung für Serverprobleme',
            'helper_text' => 'Allgemeiner Fehler, der ein serverseitiges Problem anzeigt',
        ],
    ],
]; 