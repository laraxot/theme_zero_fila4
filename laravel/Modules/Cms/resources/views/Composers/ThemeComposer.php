<?php

declare(strict_types=1);

namespace Modules\Cms\View\Composers;

use Modules\UI\View\Components\Render\Blocks;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Modules\Cms\Datas\FooterData;
use Modules\Cms\Datas\HeadernavData;
use Modules\Cms\Models\Menu;
use Modules\Cms\Models\Page;
use Modules\Cms\Models\PageContent;
use Webmozart\Assert\Assert;

class ThemeComposer
{
    /**
     * Undocumented function.
     *
     * @return array|null
     */
    public function getMenu(string $menu_name)
    {
        $menu = Menu::firstOrCreate(['title' => $menu_name]);

        return $menu->items ?? [];
    }

    public function getMenuUrl(array $menu): string
    {
        if ([] === $menu) {
            return '#';
        }
        $lang = app()->getLocale();
        if ('internal' === $menu['type']) {
            return route('page_slug.view', ['lang' => $lang, 'slug' => $menu['url']]);
        }
        if ('external' === $menu['type']) {
            return $menu['url'];
        }
        if ('route_name' === $menu['type']) {
            return route($menu['url'], ['lang' => $lang]);
        }

        return '#';
    }

    public function showPageContent(string $slug): Renderable
    {
        Assert::isInstanceOf(
            $page = Page::firstOrCreate(['slug' => $slug], ['title' => $slug, 'content_blocks' => []]),
            Page::class,
            '[' . __LINE__ . '][' . __FILE__ . ']',
        );
        // $page = Page::firstOrCreate(['slug' => $slug], ['content_blocks' => []]);
        $blocks = $page->content_blocks;
        if (!is_array($blocks)) {
            $blocks = [];
        }
        $page = new Blocks(
            blocks: $blocks,
            model: $page,
        );

        return $page->render();
    }

    public function showPageSidebarContent(string $slug): Renderable
    {
        Assert::isInstanceOf(
            $page = Page::firstOrCreate(['slug' => $slug], ['sidebar_blocks' => []]),
            Page::class,
            '[' . __LINE__ . '][' . __FILE__ . ']',
        );
        // $page = Page::firstOrCreate(['slug' => $slug], ['content_blocks' => []]);

        $page = new Blocks(
            blocks: $page->sidebar_blocks,
            model: $page,
        );

        return $page->render();
    }

    public function showContent(string $slug): Renderable
    {
        Assert::isInstanceOf(
            $page = PageContent::firstOrCreate(['slug' => $slug], ['blocks' => []]),
            PageContent::class,
            '[' . __LINE__ . '][' . __FILE__ . ']',
        );

        if (!is_array($page->blocks)) {
            return view('ui::empty');
        }

        $page = new Blocks(
            blocks: $page->blocks,
            model: $page,
        );

        return $page->render();
    }

    public function getPages(): Collection
    {
        return Page::all();
    }

    public function getPageModel(string $slug): null|Page
    {
        return Page::where('slug', $slug)->first();
    }

    public function getUrlPage(string $slug): string
    {
        $page = $this->getPageModel($slug);
        if ($page instanceof Page) {
            return '/' . app()->getLocale() . '/pages/' . $slug;
        }

        return '#';
    }

    public function headernav(): Renderable
    {
        $headernav = HeadernavData::make();

        return $headernav->view();
    }

    public function footer(): Renderable
    {
        $footer = FooterData::make();

        return $footer->view();
    }
}
