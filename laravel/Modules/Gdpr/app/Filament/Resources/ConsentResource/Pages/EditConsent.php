<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\ConsentResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Gdpr\Filament\Resources\ConsentResource;

class EditConsent extends XotBaseEditRecord
{
    protected static string $resource = ConsentResource::class;
}
