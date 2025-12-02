<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Filament\Resources\Pages\CreateRecord;
use Modules\Media\Filament\Resources\TemporaryUploadResource;

class CreateTemporaryUpload extends XotBaseCreateRecord
{
    protected static string $resource = TemporaryUploadResource::class;
}
