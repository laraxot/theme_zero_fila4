<?php

declare(strict_types=1);

namespace Modules\UI\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Modules\Xot\Actions\GetViewAction;

class Sidebar extends Component
{
    public function __construct(
        public Collection $collection,
        // public string $tpl = 'v1'
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();
        // dddx($view);
        $view_params = [];

        return view($view, $view_params);
    }

    // public function render(): Renderable
    // {
    //     $categories = Category::query()
    //         ->join('category_post', 'categories.id', '=', 'category_post.category_id')
    //         ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
    //         ->groupBy([
    //             'categories.title', 'categories.slug',
    //         ])
    //         ->orderByDesc('total')
    //         ->limit(5)
    //         ->get();
    //     return view('components.sidebar', ['categories' => $categories]);
    // }
}
