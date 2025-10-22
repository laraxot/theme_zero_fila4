<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

// use Modules\Xot\Services\BladeService;

/**
 * Undocumented class.
 */
class LimesurveyServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Limesurvey';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function boot(): void
    {
        parent::boot();
        // BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Limesurvey');
    }

    public function register(): void
    {
        parent::register();
    }
}
