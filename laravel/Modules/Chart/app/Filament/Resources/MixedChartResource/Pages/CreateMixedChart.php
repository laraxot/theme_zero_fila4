<?php

declare(strict_types=1);

namespace Modules\Chart\Filament\Resources\MixedChartResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Chart\Filament\Resources\MixedChartResource;

class CreateMixedChart extends CreateRecord
{
    protected static string $resource = MixedChartResource::class;
}
