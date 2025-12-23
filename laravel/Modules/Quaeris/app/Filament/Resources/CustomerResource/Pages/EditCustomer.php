<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\CustomerResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Quaeris\Filament\Resources\CustomerResource;

class EditCustomer extends XotBaseEditRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
