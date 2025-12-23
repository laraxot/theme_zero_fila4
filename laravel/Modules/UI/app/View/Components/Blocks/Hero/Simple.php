<?php

declare(strict_types=1);


namespace Modules\UI\View\Components\Blocks\Hero;

use Illuminate\View\Component;

class Simple extends Component
{
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('ui::components.blocks.hero.simple');
    }
}
