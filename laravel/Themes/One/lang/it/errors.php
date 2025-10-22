<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Pagine di Errore
    |--------------------------------------------------------------------------
    */
    'http_403' => [
        'title' => [
            'label' => 'Errore 403',
            'tooltip' => 'Errore di accesso negato',
            'helper_text' => 'Codice di stato HTTP 403',
        ],
        'message' => [
            'label' => 'Non hai i permessi per accedere a questa pagina',
            'tooltip' => 'Messaggio di errore per accesso negato',
            'helper_text' => 'L\'utente non ha i privilegi necessari per visualizzare questa risorsa',
        ],
    ],

    'http_404' => [
        'title' => [
            'label' => 'Errore 404',
            'tooltip' => 'Pagina non trovata',
            'helper_text' => 'Codice di stato HTTP 404',
        ],
        'message' => [
            'label' => 'La pagina che stai cercando non esiste',
            'tooltip' => 'Messaggio di errore per pagina non trovata',
            'helper_text' => 'La risorsa richiesta non è stata trovata sul server',
        ],
    ],

    'http_429' => [
        'title' => [
            'label' => 'Errore 429',
            'tooltip' => 'Troppe richieste',
            'helper_text' => 'Codice di stato HTTP 429',
        ],
        'virtual_waiting_room' => [
            'title' => [
                'label' => 'Sala d\'attesa virtuale',
                'tooltip' => 'Sistema di gestione code',
                'helper_text' => 'Sistema per limitare l\'accesso simultaneo',
            ],
            'description' => [
                'label' => 'Stiamo gestendo molte richieste per garantirti il miglior servizio!',
                'tooltip' => 'Spiegazione del sistema di attesa',
                'helper_text' => 'Messaggio informativo per rassicurare l\'utente',
            ],
        ],
        'countdown' => [
            'retry_message' => [
                'label' => 'Puoi riprovare tra',
                'tooltip' => 'Tempo di attesa prima del prossimo tentativo',
                'helper_text' => 'Indica quando l\'utente può effettuare una nuova richiesta',
            ],
            'start_waiting' => [
                'label' => 'Inizio attesa',
                'tooltip' => 'Momento di inizio del periodo di attesa',
                'helper_text' => 'Timestamp di avvio del countdown',
            ],
        ],
        'queue' => [
            'position' => [
                'label' => 'Posizione in coda',
                'tooltip' => 'Numero nella fila virtuale',
                'helper_text' => 'Indica la posizione dell\'utente nella coda di attesa',
            ],
            'people_ahead' => [
                'label' => 'Persone davanti a te nella sala d\'attesa virtuale',
                'tooltip' => 'Numero di utenti che precedono nella coda',
                'helper_text' => 'Stima degli utenti in attesa prima dell\'utente corrente',
            ],
        ],
        'activities' => [
            'breathing' => [
                'title' => [
                    'label' => '🫁 Respira e Rilassati',
                    'tooltip' => 'Esercizio di respirazione',
                    'helper_text' => 'Attività per aiutare l\'utente a rilassarsi durante l\'attesa',
                ],
                'start_exercise' => [
                    'label' => 'Inizia Esercizio',
                    'tooltip' => 'Avvia l\'esercizio di respirazione',
                    'helper_text' => 'Pulsante per iniziare la sessione di respirazione guidata',
                ],
                'breaths_completed' => [
                    'label' => 'Respiri completati',
                    'tooltip' => 'Contatore dei cicli di respirazione',
                    'helper_text' => 'Numero di respiri profondi effettuati',
                ],
            ],
            'quiz' => [
                'title' => [
                    'label' => '🧠 Quiz Medico',
                    'tooltip' => 'Quiz educativo su temi sanitari',
                    'helper_text' => 'Attività educativa per mantenere l\'utente impegnato',
                ],
                'start_quiz' => [
                    'label' => 'Inizia Quiz',
                    'tooltip' => 'Avvia il quiz medico',
                    'helper_text' => 'Pulsante per iniziare il quiz educativo',
                ],
                'new_quiz' => [
                    'label' => 'Nuovo Quiz',
                    'tooltip' => 'Genera una nuova domanda',
                    'helper_text' => 'Pulsante per ottenere una nuova domanda del quiz',
                ],
            ],
            'tips' => [
                'title' => [
                    'label' => '💡 Consigli Smart',
                    'tooltip' => 'Suggerimenti utili',
                    'helper_text' => 'Consigli per migliorare l\'esperienza utente',
                ],
                'avoid_queues' => [
                    'label' => 'Evita le code con i nostri aggiornamenti prioritari!',
                    'tooltip' => 'Suggerimento per evitare i picchi di traffico',
                    'helper_text' => 'Consiglio per utilizzare il servizio in momenti meno affollati',
                ],
            ],
        ],
        'retry' => [
            'retry_in' => [
                'label' => 'Riprova tra',
                'tooltip' => 'Tempo rimanente prima del prossimo tentativo',
                'helper_text' => 'Countdown per il prossimo tentativo disponibile',
            ],
            'retry_now' => [
                'label' => '🔄 Riprova Ora',
                'tooltip' => 'Tenta di accedere nuovamente',
                'helper_text' => 'Pulsante per ritentare l\'accesso immediato',
            ],
        ],
        'emergency' => [
            'no_wait_emergency' => [
                'label' => 'Non aspettare in caso di urgenza',
                'tooltip' => 'Avviso per situazioni di emergenza',
                'helper_text' => 'Promemoria che in caso di emergenza non bisogna attendere',
            ],
        ],
        'footer' => [
            'powered_by' => [
                'label' => 'Powered by',
                'tooltip' => 'Crediti del sistema',
                'helper_text' => 'Attribuzione del sistema di gestione code',
            ],
            'tech_team' => [
                'label' => 'SaluteOra Tech Team',
                'tooltip' => 'Team di sviluppo',
                'helper_text' => 'Nome del team responsabile dello sviluppo',
            ],
        ],
    ],

    'http_500' => [
        'title' => [
            'label' => 'Errore 500',
            'tooltip' => 'Errore interno del server',
            'helper_text' => 'Codice di stato HTTP 500',
        ],
        'message' => [
            'label' => 'Si è verificato un errore interno del server',
            'tooltip' => 'Messaggio di errore per problemi del server',
            'helper_text' => 'Errore generico che indica un problema lato server',
        ],
    ],
]; 