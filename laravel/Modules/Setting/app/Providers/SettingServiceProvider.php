<?php

declare(strict_types=1);

namespace Modules\Setting\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

/**
 * ---.
 */
class SettingServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Setting';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
}
