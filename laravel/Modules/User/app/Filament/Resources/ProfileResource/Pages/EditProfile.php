<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ProfileResource\Pages;

use Modules\User\Filament\Resources\ProfileResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EditProfile extends XotBaseEditRecord
{
    protected static string $resource = ProfileResource::class;
}
