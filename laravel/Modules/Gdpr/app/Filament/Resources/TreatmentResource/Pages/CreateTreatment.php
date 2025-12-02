<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\TreatmentResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Gdpr\Filament\Resources\TreatmentResource;

class CreateTreatment extends XotBaseCreateRecord
{
    protected static string $resource = TreatmentResource::class;
}
