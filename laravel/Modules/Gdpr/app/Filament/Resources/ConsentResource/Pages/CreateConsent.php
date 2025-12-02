<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\ConsentResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Gdpr\Filament\Resources\ConsentResource;

class CreateConsent extends XotBaseCreateRecord
{
    protected static string $resource = ConsentResource::class;
}
