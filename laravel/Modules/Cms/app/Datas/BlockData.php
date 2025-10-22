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
use Webmozart\Assert\Assert;

class BlockData extends Data implements Wireable
{
    use WireableData;

    public string $type;
    public array $data;
    public string $view;

    public function __construct(string $type, array $data)
    {
        $this->type = $type;
        $this->data = $data;
        Assert::string($view = Arr::get($data, 'view', 'ui::empty'),'['.__LINE__.']['.__FILE__.']');
        if (!view()->exists($view)) {
            throw new Exception('view not found: ' . $view);
        }
        $this->view = $view;
    }
}
