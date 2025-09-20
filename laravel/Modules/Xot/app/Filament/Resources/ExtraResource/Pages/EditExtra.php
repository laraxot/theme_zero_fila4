<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\ExtraResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions;
use Modules\Xot\Filament\Resources\ExtraResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EditExtra extends XotBaseEditRecord
{
    protected static string $resource = ExtraResource::class;
}
