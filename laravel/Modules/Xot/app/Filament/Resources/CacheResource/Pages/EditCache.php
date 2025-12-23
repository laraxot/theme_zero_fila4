<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions;
use Modules\Xot\Filament\Resources\CacheResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EditCache extends XotBaseEditRecord
{
    protected static string $resource = CacheResource::class;
}
