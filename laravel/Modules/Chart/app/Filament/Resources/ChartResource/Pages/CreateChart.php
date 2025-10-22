<?php

declare(strict_types=1);

namespace Modules\Chart\Filament\Resources\ChartResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Chart\Filament\Resources\ChartResource;

class CreateChart extends CreateRecord
{
    protected static string $resource = ChartResource::class;
}
