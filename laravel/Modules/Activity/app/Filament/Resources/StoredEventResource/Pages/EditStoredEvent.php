<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\StoredEventResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Activity\Filament\Resources\StoredEventResource;

class EditStoredEvent extends XotBaseEditRecord
{
    protected static string $resource = StoredEventResource::class;
}
