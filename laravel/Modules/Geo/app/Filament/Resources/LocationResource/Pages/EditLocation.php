<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\LocationResource\Pages;

use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
// use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps; // Pacchetto non installato
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Geo\Filament\Resources\LocationResource;
use Webmozart\Assert\Assert;

class EditLocation extends EditRecord
{
    // use InteractsWithMaps; // Pacchetto non installato

    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        Assert::string($url = $this->getResource()::getUrl('index'));

        return $url;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //            LocationResource\Widgets\LocationMapTableWidget::class,
        ];
    }
}
