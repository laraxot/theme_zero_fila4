<?php

declare(strict_types=1);


return [
    'actions' => [
        'table_layout_toggle' => [
            'label' => 'Cambia Layout',
            'tooltip' => 'Cambia il layout della tabella',
        ],
    ],
    'blocks' => [
        'navigation' => [
            'items' => [
                'label' => 'Voci di navigazione',
                'help' => 'Le voci di navigazione da mostrare',
            ],
            'link_text' => [
                'label' => 'Testo link',
                'help' => 'Il testo del link',
            ],
            'link_url' => [
                'label' => 'URL link',
                'help' => 'L\'URL del link',
            ],
        ],
        'slider' => [
            'layout' => [
                'label' => 'Layout',
                'help' => 'Il layout dello slider',
            ],
        ],
    ],
];
