<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\ProfileResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Gdpr\Filament\Resources\ProfileResource;

class CreateProfile extends XotBaseCreateRecord
{
    protected static string $resource = ProfileResource::class;
}
