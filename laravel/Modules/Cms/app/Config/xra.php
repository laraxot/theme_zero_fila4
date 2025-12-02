<?php

declare(strict_types=1);


return [
    'adm_theme' => 'AdminLTE',
    'enable_ads' => false,
    'model' => [
        'article' => 'Modules\Blog\Models\Article',
        'category' => 'Modules\Blog\Models\Category',
        'profile' => 'Modules\User\Models\Profile',
        'user' => 'Modules\User\Models\User',
    ],
];
