<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\ProfileResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Gdpr\Filament\Resources\ProfileResource;

class EditProfile extends XotBaseEditRecord
{
    protected static string $resource = ProfileResource::class;
}
