<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\LogResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Xot\Filament\Resources\LogResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class CreateLog extends XotBaseCreateRecord
{
    protected static string $resource = LogResource::class;
}
