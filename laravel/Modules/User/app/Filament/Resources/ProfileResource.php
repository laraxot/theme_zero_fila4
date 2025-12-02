<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Modules\User\Models\Profile;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ProfileResource extends BaseProfileResource
{
    protected static null|string $model = Profile::class;
}
