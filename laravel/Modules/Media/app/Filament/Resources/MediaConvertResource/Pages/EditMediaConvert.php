<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\MediaConvertResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions;
use Modules\Media\Filament\Resources\MediaConvertResource;

class EditMediaConvert extends XotBaseEditRecord
{
    protected static string $resource = MediaConvertResource::class;
}
