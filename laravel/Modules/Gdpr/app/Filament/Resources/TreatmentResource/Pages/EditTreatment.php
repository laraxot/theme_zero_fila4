<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\TreatmentResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Gdpr\Filament\Resources\TreatmentResource;

class EditTreatment extends XotBaseEditRecord
{
    protected static string $resource = TreatmentResource::class;
}
