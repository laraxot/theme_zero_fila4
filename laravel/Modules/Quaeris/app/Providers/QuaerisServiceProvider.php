<?php

declare(strict_types=1);

namespace Modules\Quaeris\Providers;

use Filament\Actions\Exports\Models\Export;
use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Providers\XotBaseServiceProvider;

/**
 * Undocumented class.
 */
class QuaerisServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Quaeris';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function register(): void
    {
        parent::register();
        $user_class = XotData::make()->getUserClass();
        $this->app->bind(Authenticatable::class, $user_class);
        Export::polymorphicUserRelationship();
    }
}
