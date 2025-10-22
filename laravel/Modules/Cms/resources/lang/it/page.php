<?php

declare(strict_types=1);
 return [
    'navigation' => [
        'name' => 'Pagina',
        'plural' => 'Pagine',
        'group' => [
            'name' => 'Site',
        ],
    ],
    'fields' => [
        'title' => [
            'label' => 'title',
        ],
        'name' => [
            'label' => 'Nome',
        ],
        'slug' => [
            'label' => 'slug',
        ],
        'guard_name' => 'Guard',
        'permissions' => 'Permessi',
        'roles' => 'Ruoli',
        'updated_at' => 'Aggiornato il',
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'view' => [
            'label' => 'view',
        ],
        'edit' => [
            'label' => 'edit',
        ],
        'delete' => [
            'label' => 'delete',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'create',
        ],
        'activeLocale' => [
            'label' => 'activeLocale',
        ],
    ],
];
