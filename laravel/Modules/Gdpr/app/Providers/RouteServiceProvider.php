<?php

declare(strict_types=1);

namespace Modules\Gdpr\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    protected string $moduleNamespace = 'Modules\Gdpr\Http\Controllers';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
    public string $name = 'Gdpr';
}
