<?php

declare(strict_types=1);

namespace Modules\Cms\Datas;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Arr;
use Livewire\Wireable;
use Modules\Tenant\Services\TenantService;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class HeadernavData extends Data implements Wireable
{
    use WireableData;

    public null|string $background_color = null;
    public null|string $background = null;
    public null|string $overlay_color = null;
    public null|int $overlay_opacity = null;
    public null|string $class = null;
    public null|string $style = null;
    /**
     * The view path.
     *
     * @var string
     */
    public $view = 'cms::components.headernav';

    private static null|self $instance = null;

    public static function make(): self
    {
        if (!(self::$instance instanceof HeadernavData)) {
            // if (! self::$instance) {
            $data = TenantService::getConfig('appearance');
            $data = Arr::get($data, 'headernav', []);
            self::$instance = self::from($data);
        }

        return self::$instance;
    }

    public function view(): Renderable
    {
        if (!view()->exists($this->view)) {
            $message = 'The view [' . $this->view . '] does not exist';
            throw new Exception($message);
        }
        /** @var array<string, mixed> $view_params */
        $view_params = $this->toArray();

        return view($this->view, $view_params);
    }

    public static function rules(): array
    {
        return [
            'background_color' => ['nullable', 'string'],
            'background' => ['nullable', 'string'],
            'overlay_color' => ['nullable', 'string'],
            'overlay_opacity' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'class' => ['nullable', 'string'],
            'style' => ['nullable', 'string'],
            'view' => ['nullable', 'string'],
        ];
    }
}
