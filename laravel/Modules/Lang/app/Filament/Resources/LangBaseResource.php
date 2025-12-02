<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources;

// use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable; // Temporaneamente commentato per compatibilità Filament 4.x
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Config;
use Modules\Cms\Filament\Resources\SectionResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Xot\Filament\Resources\XotBaseResource;

abstract class LangBaseResource extends XotBaseResource
{
    // use Translatable; // Temporaneamente commentato per compatibilità Filament 4.x

    // Temporaneamente commentato per compatibilità Filament 4.x
    // public static function getDefaultTranslatableLocale(): string
    // {
    //     return Config::string('app.locale', 'it');
    // }

    // public static function getTranslatableLocales(): array
    // {
    //     return ['it', 'en'];
    // }
}
