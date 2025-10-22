<?php

declare(strict_types=1);

namespace Themes\One\Providers;

use Illuminate\Support\Facades\Blade;
use Modules\Xot\Providers\XotBaseThemeServiceProvider;

class OneServiceProvider extends XotBaseThemeServiceProvider
{
    public string $dir = __DIR__;
    public string $name = 'One';
    public string $ns = 'pub_theme';
    /*
    public $blade_components = [
        'header' => 'Header',
        'navbar' => 'Navbar',
        'gap'=>'Gap',
        'faq'=>'Faq',
        'newsletter'=>'Newsletter',
        'footer'=>'Footer',
        'flash'=>'Flash',
        'layout'=>'Layout',


    ];

    public function bootCallback(): void {
        $blade_component_path = '\Themes\Mediamonitor\View\Components';
        foreach ($this->blade_components as $name => $class) {
            Blade::component($name, $blade_component_path.'\\'.$class);
        }
    }
    */
}
