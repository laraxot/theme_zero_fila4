<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class UserOverview extends Widget
{
    public null|Model $record = null;

    protected string $view = 'user::filament.resources.user-resource.widgets.user-overview';
}
