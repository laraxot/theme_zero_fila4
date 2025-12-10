<?php

declare(strict_types=1);

namespace Modules\Tenant\Filament\Resources\DomainResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Filament\Resources\Pages\CreateRecord;
use Modules\Tenant\Filament\Resources\DomainResource;

class CreateDomain extends XotBaseCreateRecord
{
    protected static string $resource = DomainResource::class;
}
