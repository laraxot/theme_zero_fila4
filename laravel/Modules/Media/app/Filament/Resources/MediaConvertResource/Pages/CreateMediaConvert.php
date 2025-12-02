<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaConvertResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Filament\Resources\Pages\CreateRecord;
use Modules\Media\Filament\Resources\MediaConvertResource;

class CreateMediaConvert extends XotBaseCreateRecord
{
    protected static string $resource = MediaConvertResource::class;
}
