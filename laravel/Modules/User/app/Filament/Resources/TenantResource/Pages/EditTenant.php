<?php

/**
 * --.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EditTenant extends XotBaseEditRecord
{
    protected static string $resource = TenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
