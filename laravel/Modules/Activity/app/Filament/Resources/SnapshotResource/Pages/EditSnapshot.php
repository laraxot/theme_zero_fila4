<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\SnapshotResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Activity\Filament\Resources\SnapshotResource;

class EditSnapshot extends XotBaseEditRecord
{
    protected static string $resource = SnapshotResource::class;
}
