<?php

declare(strict_types=1);


return [
    'navigation' => [
        'name' => 'Attività',
        'plural' => 'Attività',
        'group' => [
            'name' => 'Monitoraggio',
            'description' => 'Monitoraggio delle attività di sistema',
        ],
        'label' => 'Attività',
        'sort' => 60,
        'icon' => 'heroicon-o-activity',
    ],
    'fields' => [
        'user' => [
            'label' => 'Utente',
            'placeholder' => 'Seleziona un utente',
            'help' => 'L\'utente che ha eseguito l\'azione',
            'name' => [
                'label' => 'Nome',
                'placeholder' => 'Inserisci il nome',
                'help' => 'Nome completo dell\'utente',
                'validation' => 'required|string|max:255',
            ],
            'email' => [
                'label' => 'Email',
                'placeholder' => 'Inserisci l\'email',
                'help' => 'Indirizzo email dell\'utente',
                'validation' => 'required|email|max:255',
            ],
            'role' => [
                'label' => 'Ruolo',
                'placeholder' => 'Seleziona un ruolo',
                'help' => 'Ruolo dell\'utente nel sistema',
                'validation' => 'required|string',
            ],
        ],
        'action' => [
            'label' => 'Azione',
            'placeholder' => 'Seleziona un\'azione',
            'help' => 'Tipo di azione eseguita',
            'validation' => 'required|string',
            'options' => [
                'created' => [
                    'label' => 'Creato',
                    'icon' => 'heroicon-o-plus-circle',
                    'color' => 'success',
                ],
                'updated' => [
                    'label' => 'Modificato',
                    'icon' => 'heroicon-o-pencil',
                    'color' => 'warning',
                ],
                'deleted' => [
                    'label' => 'Eliminato',
                    'icon' => 'heroicon-o-trash',
                    'color' => 'danger',
                ],
                'viewed' => [
                    'label' => 'Visualizzato',
                    'icon' => 'heroicon-o-eye',
                    'color' => 'info',
                ],
                'downloaded' => [
                    'label' => 'Scaricato',
                    'icon' => 'heroicon-o-arrow-down-tray',
                    'color' => 'primary',
                ],
                'uploaded' => [
                    'label' => 'Caricato',
                    'icon' => 'heroicon-o-arrow-up-tray',
                    'color' => 'primary',
                ],
                'logged_in' => [
                    'label' => 'Accesso',
                    'icon' => 'heroicon-o-arrow-right-on-rectangle',
                    'color' => 'success',
                ],
                'logged_out' => [
                    'label' => 'Uscita',
                    'icon' => 'heroicon-o-arrow-left-on-rectangle',
                    'color' => 'gray',
                ],
            ],
        ],
        'subject' => [
            'label' => 'Oggetto',
            'placeholder' => 'Seleziona un oggetto',
            'help' => 'L\'oggetto interessato dall\'azione',
            'type' => [
                'label' => 'Tipo',
                'placeholder' => 'Tipo di oggetto',
                'help' => 'Classe o tipo dell\'oggetto',
                'validation' => 'nullable|string|max:255',
            ],
            'id' => [
                'label' => 'ID',
                'placeholder' => 'ID dell\'oggetto',
                'help' => 'Identificativo unico dell\'oggetto',
                'validation' => 'nullable|integer|min:1',
            ],
            'name' => [
                'label' => 'Nome',
                'placeholder' => 'Nome dell\'oggetto',
                'help' => 'Nome descrittivo dell\'oggetto',
                'validation' => 'nullable|string|max:255',
            ],
        ],
        'description' => [
            'label' => 'Descrizione',
            'placeholder' => 'Inserisci una descrizione',
            'help' => 'Descrizione dettagliata dell\'attività',
            'validation' => 'nullable|string|max:1000',
        ],
        'ip_address' => [
            'label' => 'Indirizzo IP',
            'placeholder' => 'Es. 192.168.1.1',
            'help' => 'Indirizzo IP da cui è stata eseguita l\'azione',
            'validation' => 'nullable|ip',
        ],
        'user_agent' => [
            'label' => 'User Agent',
            'placeholder' => 'Browser e sistema operativo',
            'help' => 'Informazioni sul browser e sistema dell\'utente',
            'validation' => 'nullable|string|max:500',
        ],
        'created_at' => [
            'label' => 'Data',
            'placeholder' => 'Seleziona data e ora',
            'help' => 'Data e ora di creazione dell\'attività',
            'validation' => 'required|date',
            'format' => 'd/m/Y H:i:s',
        ],
        'properties' => [
            'label' => 'Proprietà',
            'placeholder' => 'Proprietà aggiuntive',
            'help' => 'Dati aggiuntivi dell\'attività',
            'old' => [
                'label' => 'Vecchio Valore',
                'placeholder' => 'Valore precedente',
                'help' => 'Valore prima della modifica',
            ],
            'new' => [
                'label' => 'Nuovo Valore',
                'placeholder' => 'Valore attuale',
                'help' => 'Valore dopo la modifica',
            ],
        ],
        'toggleColumns' => [
            'label' => 'Mostra/Nascondi Colonne',
            'help' => 'Configura la visibilità delle colonne',
        ],
        'reorderRecords' => [
            'label' => 'Riordina Record',
            'help' => 'Riordina i record nella tabella',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
    ],
    'filters' => [
        'user' => [
            'label' => 'Utente',
            'placeholder' => 'Filtra per utente',
            'help' => 'Filtra le attività per utente specifico',
            'type' => 'select',
            'searchable' => true,
        ],
        'action' => [
            'label' => 'Azione',
            'placeholder' => 'Filtra per azione',
            'help' => 'Filtra le attività per tipo di azione',
            'type' => 'select',
            'multiple' => true,
        ],
        'subject_type' => [
            'label' => 'Tipo Oggetto',
            'placeholder' => 'Filtra per tipo oggetto',
            'help' => 'Filtra le attività per tipo di oggetto',
            'type' => 'select',
            'searchable' => true,
        ],
        'date_range' => [
            'label' => 'Intervallo Date',
            'placeholder' => 'Seleziona intervallo',
            'help' => 'Filtra le attività per periodo di tempo',
            'type' => 'date_range',
            'presets' => [
                'today' => 'Oggi',
                'yesterday' => 'Ieri',
                'last_7_days' => 'Ultimi 7 giorni',
                'last_30_days' => 'Ultimi 30 giorni',
                'this_month' => 'Questo mese',
                'last_month' => 'Mese scorso',
            ],
        ],
        'ip_address' => [
            'label' => 'Indirizzo IP',
            'placeholder' => 'Filtra per IP',
            'help' => 'Filtra le attività per indirizzo IP',
            'type' => 'text',
        ],
    ],
    'actions' => [
        'view_details' => [
            'label' => 'Visualizza Dettagli',
            'icon' => 'heroicon-o-eye',
            'color' => 'primary',
            'success' => 'Dettagli caricati con successo',
            'error' => 'Errore nel caricamento dei dettagli',
            'confirmation' => 'Vuoi visualizzare i dettagli di questa attività?',
        ],
        'export' => [
            'label' => 'Esporta',
            'icon' => 'heroicon-o-arrow-down-tray',
            'color' => 'success',
            'success' => 'Esportazione completata con successo',
            'error' => 'Errore durante l\'esportazione',
            'confirmation' => 'Vuoi esportare le attività selezionate?',
        ],
        'clear_old' => [
            'label' => 'Pulisci Vecchie',
            'icon' => 'heroicon-o-trash',
            'color' => 'danger',
            'success' => 'Attività vecchie eliminate con successo',
            'error' => 'Errore nella pulizia delle attività',
            'confirmation' => 'Sei sicuro di voler eliminare le attività vecchie? Questa azione non può essere annullata.',
            'days_threshold' => 90,
        ],
        'bulk_delete' => [
            'label' => 'Elimina Selezionate',
            'icon' => 'heroicon-o-trash',
            'color' => 'danger',
            'success' => 'Attività selezionate eliminate con successo',
            'error' => 'Errore nell\'eliminazione delle attività',
            'confirmation' => 'Sei sicuro di voler eliminare le attività selezionate?',
        ],
    ],
    'messages' => [
        'no_activities' => 'Nessuna attività trovata per i filtri selezionati',
        'cleared' => 'Attività vecchie eliminate con successo',
        'exported' => 'Attività esportate con successo',
        'loading' => 'Caricamento attività in corso...',
        'error_loading' => 'Errore nel caricamento delle attività',
        'empty_state' => [
            'title' => 'Nessuna attività registrata',
            'description' => 'Non ci sono ancora attività da visualizzare. Le attività appariranno qui quando gli utenti inizieranno a interagire con il sistema.',
        ],
    ],
    'export' => [
        'formats' => [
            'csv' => [
                'label' => 'CSV',
                'mime_type' => 'text/csv',
                'extension' => 'csv',
                'icon' => 'heroicon-o-document-text',
            ],
            'excel' => [
                'label' => 'Excel',
                'mime_type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'extension' => 'xlsx',
                'icon' => 'heroicon-o-table-cells',
            ],
            'pdf' => [
                'label' => 'PDF',
                'mime_type' => 'application/pdf',
                'extension' => 'pdf',
                'icon' => 'heroicon-o-document',
            ],
        ],
        'columns' => [
            'date' => [
                'label' => 'Data',
                'format' => 'd/m/Y H:i:s',
                'sortable' => true,
            ],
            'user' => [
                'label' => 'Utente',
                'sortable' => true,
            ],
            'action' => [
                'label' => 'Azione',
                'sortable' => true,
            ],
            'subject' => [
                'label' => 'Oggetto',
                'sortable' => false,
            ],
            'ip' => [
                'label' => 'IP',
                'sortable' => true,
            ],
            'description' => [
                'label' => 'Descrizione',
                'sortable' => false,
            ],
        ],
        'filename_pattern' => 'attivita_{date}_{time}',
        'max_records' => 10000,
    ],
    'permissions' => [
        'view' => 'activities.view',
        'create' => 'activities.create',
        'update' => 'activities.update',
        'delete' => 'activities.delete',
        'export' => 'activities.export',
        'clear_old' => 'activities.clear_old',
    ],
    'pagination' => [
        'per_page' => 25,
        'options' => [
            0 => 10,
            1 => 25,
            2 => 50,
            3 => 100,
        ],
    ],
    'cache' => [
        'ttl' => 300,
        'tags' => [
            0 => 'activities',
            1 => 'monitoring',
        ],
    ],
];
