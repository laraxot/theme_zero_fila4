<?php
declare(strict_types=1);
namespace Database\Seeders\Themes\One;

use Illuminate\Database\Seeder;
use Modules\Cms\Models\Section;

class SectionsTableSeeder extends Seeder
{
    public function run()
    {
        // Header section
        Section::create([
            'name' => [
                'it' => 'Header',
                'en' => 'Header'
            ],
            'slug' => 'header',
            'blocks' => [
                [
                    'type' => 'logo',
                    'data' => [
                        'image' => '/themes/One/images/logo.svg',
                        'alt' => 'Logo',
                        'text' => 'One Theme',
                        'type' => 'both',
                        'url' => '/'
                    ]
                ],
                [
                    'type' => 'navigation',
                    'data' => [
                        'items' => [
                            [
                                'label' => 'Home',
                                'url' => '/',
                                'type' => 'link'
                            ],
                            [
                                'label' => 'Chi Siamo',
                                'url' => '/chi-siamo',
                                'type' => 'link'
                            ],
                            [
                                'label' => 'Servizi',
                                'url' => '/servizi',
                                'type' => 'dropdown',
                                'children' => [
                                    [
                                        'label' => 'Consulenza',
                                        'url' => '/servizi/consulenza',
                                        'type' => 'link'
                                    ],
                                    [
                                        'label' => 'Sviluppo',
                                        'url' => '/servizi/sviluppo',
                                        'type' => 'link'
                                    ]
                                ]
                            ],
                            [
                                'label' => 'Contatti',
                                'url' => '/contatti',
                                'type' => 'button',
                                'style' => 'primary'
                            ]
                        ],
                        'alignment' => 'end',
                        'orientation' => 'horizontal'
                    ]
                ]
            ],
            'attributes' => [
                'class' => 'bg-white shadow',
                'id' => 'main-header'
            ]
        ]);
    }
}
