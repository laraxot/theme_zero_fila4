<?php

/**
 * @see https://laraveldaily.com/post/filament-custom-edit-profile-page-multiple-forms-full-design
 */

declare(strict_types=1);

namespace Modules\Cms\Filament\Front\Pages;

use Illuminate\Database\Eloquent\Relations\Relation;
use Filament\Pages\Page;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

// use InteractsWithTable;
// implements HasTable
// use InteractsWithForms;

class Home extends Page
{
    public string $view_type;

    public array $containers = [];

    public array $items = [];

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    // protected static string $view = 'cms::filament.front.pages.welcome';
    protected string $view = 'pub_theme::home';

    protected static string $layout = 'pub_theme::components.layouts.app';

    public function mount(): void
    {
        [$this->containers, $this->items] = params2ContainerItem();
        $this->initView();
    }

    public function getViewData(): array
    {
        $data = [];
        if ([] !== $this->containers) {
            Assert::string($container_last = last($this->containers),'['.__LINE__.']['.__FILE__.']');
            $item_last = last($this->items);

            $container_last_singular = Str::singular($container_last);
            Assert::notNull(
                $container_last_model =
                    Relation::getMorphedModel($container_last_singular),
                '[' . __LINE__ . '][' . __FILE__ . ']',
            );

            $container_last_key_name = app($container_last_model)->getRouteKeyName();

            $row = $container_last_model::where($container_last_key_name, $item_last)->first();
            $data[$container_last_singular] = $row;
        }

        return $data;
    }

    /*
     * public function mountOLD(?string $lang = null,
     * ?string $container0 = null, ?string $item0 = null,
     * ?string $container1 = null, ?string $item1 = null,
     * ?string $container2 = null, ?string $item2 = null,
     * ?string $container3 = null, ?string $item3 = null
     * ) {
     * $containers = [];
     * $items = [];
     * for ($i = 0; $i < 4; ++$i) {
     * if ($container_curr = ${'container'.$i}) {
     * $containers[$i] = $container_curr;
     * }
     * if ($item_curr = ${'item'.$i}) {
     * $items[$i] = $item_curr;
     * }
     * }
     * }
     */
    public function initView(): void
    {
        $containers = $this->containers;
        $items = $this->items;
        $view = '';
        if (\count($containers) === \count($items)) {
            $view = 'show';
        }
        if (\count($containers) > \count($items)) {
            $view = 'index';
        }
        if ([] === $containers) {
            $view = 'home';
        }

        $this->view_type = $view;

        $views = [];

        if ([] !== $containers) {
            $views[] = 'pub_theme::' . implode('.', $containers) . '.' . $view;

            $model_root = Str::singular($containers[0]);
            Assert::string($res = Relation::getMorphedModel($model_root),'['.__LINE__.']['.__FILE__.']');

            $module_name = Str::between($res, 'Modules\\', '\Models\\');
            $module_name_low = Str::lower($module_name);
            $views[] = $module_name_low . '::' . implode('.', $containers) . '.' . $view;
        } else {
            $views[] = 'pub_theme::' . $view;
        }

        $view_work = Arr::first($views, view()->exists(...));
        Assert::string($view_work, __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));

        $this->view = $view_work;
    }

    public function url(string $name, array $parameters = []): string
    {
        $parameters['lang'] = app()->getLocale();
        $record = $parameters['record'];
        if ('show' === $name) {
            $container0 = class_basename($record);
            $container0 = Str::plural($container0);
            $container0 = Str::snake($container0);
            $parameters['container0'] = $container0;
            $parameters['item0'] = $record->slug;

            return route('test', $parameters);
        }
        if ('index' === $name) {
            $container0 = class_basename($record);
            $container0 = Str::plural($container0);
            $container0 = Str::snake($container0);
            $parameters['container0'] = $container0;

            return route('test', $parameters);
        }
        $parameters['container0'] = 'articles';
        $parameters['item0'] = 'zibibbo';

        return route('test', $parameters);
    }
}
