<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Quaeris\Filament\Resources\QuestionChartResource;

class EditQuestionChart extends XotBaseEditRecord
{
    // use \SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;
    protected static string $resource = QuestionChartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
