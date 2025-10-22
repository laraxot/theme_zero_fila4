<?php

declare(strict_types=1);

namespace Modules\Chart\Filament\Resources\MixedChartResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Chart\Filament\Resources\MixedChartResource;

class EditMixedChart extends EditRecord
{
    protected static string $resource = MixedChartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
