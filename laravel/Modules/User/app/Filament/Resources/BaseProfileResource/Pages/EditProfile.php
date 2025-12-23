<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EditProfile extends XotBaseEditRecord
{
    protected static string $resource = BaseProfileResource::class;
}
