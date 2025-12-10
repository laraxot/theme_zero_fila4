<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\ExtraResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Xot\Filament\Resources\ExtraResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class CreateExtra extends XotBaseCreateRecord
{
    protected static string $resource = ExtraResource::class;
}
