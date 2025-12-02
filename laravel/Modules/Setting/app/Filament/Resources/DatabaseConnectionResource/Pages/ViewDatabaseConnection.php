<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource;

class ViewDatabaseConnection extends ViewRecord
{
    protected static string $resource = DatabaseConnectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
            Action::make('test')
                ->action(fn () => $this->record->testConnection())
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
} 