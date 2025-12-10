<?php

declare(strict_types=1);

return [
    // 'resources' => 'Risorse',
    'navigation' => [
        'name' => 'Database Connection',
        'plural' => 'Database Connections',
        'group' => [
            'name' => 'Settings',
        ],
    ],
    'fields' => [
        'name' => 'Nome',
        'guard_name' => 'Guard',
        'permissions' => 'Permessi',
        'updated_at' => 'Aggiornato il',
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'select_all' => [
            'name' => 'Seleziona Tutti',
            'message' => '',
        ],
    ],
    'actions' => [
        'database-backup' => [
            'label' => '',
            'tooltip' => 'Backup Database',
            'icon' => 'heroicon-o-arrow-down-on-square-stack',
        ],
        'import' => [
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
];
