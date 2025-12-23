<?php

declare(strict_types=1);

return [
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge11'),
            'username' => env('DB_USERNAME', 'forge12'),
            'password' => env('DB_PASSWORD', ''),
            //'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],

        'liveuser_general' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            //'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
            'database' => env('DB_DATABASE_LU', 'forge13'),
            'username' => env('DB_USERNAME', 'forge14'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => 'liveuser_',
            'strict' => false,
            'engine' => null,
        ],

        'limesurvey' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            //'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
            'database' => env('DB_DATABASE_LIMESURVEY', 'forge15'),
            'username' => env('DB_USERNAME_LIMESURVEY', 'forge16'),
            'password' => env('DB_PASSWORD_LIMESURVEY', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],
    ], //end connections
];
