<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources\PageContentResource\Pages;

use LaraZeus\SpatieTranslatable\Resources\Pages\ViewRecord\Concerns\Translatable;
use Filament\Actions\EditAction;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Modules\Cms\Filament\Resources\PageContentResource;

class ViewPageContent extends ViewRecord
{
    // use Translatable; // Temporaneamente commentato per compatibilità Filament 4.x

    protected static string $resource = PageContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            LocaleSwitcher::make(),
        ];
    }
}
