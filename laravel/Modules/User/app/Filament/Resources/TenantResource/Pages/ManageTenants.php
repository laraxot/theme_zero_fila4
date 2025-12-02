<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ManageTenants extends ManageRecords
{
    protected static string $resource = TenantResource::class;
}
