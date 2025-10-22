<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheLockResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Xot\Filament\Resources\CacheLockResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class CreateCacheLock extends XotBaseCreateRecord
{
    protected static string $resource = CacheLockResource::class;
}
