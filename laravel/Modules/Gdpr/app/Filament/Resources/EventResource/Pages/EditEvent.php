<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\EventResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Gdpr\Filament\Resources\EventResource;

class EditEvent extends XotBaseEditRecord
{
    protected static string $resource = EventResource::class;
}
