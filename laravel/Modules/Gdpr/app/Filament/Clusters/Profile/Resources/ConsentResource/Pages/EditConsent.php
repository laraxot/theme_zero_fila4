<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Clusters\Profile\Resources\ConsentResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Gdpr\Filament\Clusters\Profile\Resources\ConsentResource;

class EditConsent extends XotBaseEditRecord
{
    protected static string $resource = ConsentResource::class;
}
