<?php

/**
 * The `Blocks` component is responsible for rendering a set of blocks on a view.
 *
 * It takes an optional array of `$blocks` and an optional `$model` parameter. The `$tpl` parameter
 * specifies the template to use for rendering the blocks.
 *
 * The `render()` method retrieves the appropriate view based on the `$tpl` parameter, and then
 * passes the `$view`, `$blocks`, and `$model` parameters to the view for rendering.
 */

declare(strict_types=1);

namespace Modules\UI\View\Components\Render;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;
use Modules\Xot\Actions\GetViewAction;

class Blocks extends Component
{
    public array $blocks = [];

    public function __construct(
        null|array $blocks = [],
        public null|Model $model = null,
        public string $tpl = 'v1',
    ) {
        if (is_array($blocks)) {
            $this->blocks = $blocks;
        }
    }

    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute($this->tpl);
        $view_params = [
            'view' => $view,
            'blocks' => $this->blocks,
            'model' => $this->model,
        ];

        return view($view, $view_params);
    }
}
