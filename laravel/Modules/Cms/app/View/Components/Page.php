<?php

declare(strict_types=1);

namespace Modules\Cms\View\Components;

use Exception;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\Cms\Datas\BlockData;
use Modules\Cms\Models\Page as PageModel;
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

class Page extends Component
{
    public string $side;
    public string $slug;
    public array $blocks = [];
    public array $data = [];

    public function __construct(string $side, string $slug, null|string $type = null, array $data = [])
    {
        $this->data = $data;
        $this->side = $side;
        if (null !== $type) {
            $slug = $type . '-' . $slug;
        }
        $this->slug = $slug;
        $field = $side . '_blocks';
        // Assert::isInstanceOf($page = PageModel::firstOrCreate(['slug' => $slug], ['title' => $slug, $field => []]), PageModel::class, '['.__LINE__.']['.__FILE__.']');
        $page = PageModel::firstWhere(['slug' => $slug]);
        if (null === $page) {
            abort(404, 'page not found: ' . $slug);
        }
        $metatag = MetatagData::make();
        $metatag->concatTitle($page->title);

        $metatag->concatDescription($page->description);
        $blocks = $page->$field;
        if (!is_array($blocks)) {
            $primary_lang = XotData::make()->primary_lang;
            $blocks = $page->getTranslation($field, $primary_lang);
        }
        if (!is_array($blocks)) {
            $blocks = [];
        }
        $blocks = Arr::map($blocks, function ($block) use ($data) {
            $block['data'] = array_merge($data, $block['data']);
            return $block;
        });

        $this->blocks = BlockData::collect($blocks);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): ViewContract
    {
        $view = 'cms::components.page-content';
        $view_params = [];
        // @phpstan-ignore-next-line
        if (!view()->exists($view)) {
            throw new Exception('view not found: ' . $view);
        }

        return view($view, $view_params);
    }
}
