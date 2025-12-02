<?php

declare(strict_types=1);

namespace Modules\Cms\View\Components;

use Exception;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\Cms\Datas\BlockData;
use Modules\Cms\Models\Section as SectionModel;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

/**
 * Section Component.
 *
 * Renders a reusable section of the site using the Section model.
 *
 * @property string $slug The unique identifier for the section
 * @property string|null $view Custom view path for rendering
 * @property array $data Additional data to pass to the view
 */
class Section extends Component
{
    public string $slug;
    public array $blocks = [];
    public null|string $name = null;
    public null|string $class = null;
    public null|string $id = null;
    public null|string $tpl = null;

    /**
     * Create a new component instance.
     *
     * @param string $slug Unique identifier for the section
     * @param string|null $class Additional CSS classes
     * @param string|null $id Custom ID for the section
     */
    public function __construct(
        string $slug,
        null|string $class = null,
        null|string $id = null,
        null|string $tpl = null,
    ) {
        $this->slug = $slug;
        $this->class = $class;
        $this->id = $id;
        $this->tpl = $tpl;
        $this->blocks = SectionModel::getBlocksBySlug($this->slug);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): ViewContract
    {
        $view = 'pub_theme::components.sections.' . $this->slug;
        if ($this->tpl) {
            $view .= '.' . $this->tpl;
        }
        if (!view()->exists($view)) {
            throw new Exception('View ' . $view . ' not found');
        }
        return view($view);
    }
}
