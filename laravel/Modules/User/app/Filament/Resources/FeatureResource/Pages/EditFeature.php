<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\FeatureResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\User\Filament\Resources\FeatureResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EditFeature extends XotBaseEditRecord
{
    protected static string $resource = FeatureResource::class;
}
