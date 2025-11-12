<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\StoredEventResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Activity\Filament\Resources\StoredEventResource;

class CreateStoredEvent extends XotBaseCreateRecord
{
    protected static string $resource = StoredEventResource::class;
}
