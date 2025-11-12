<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources;

use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages\ListStoredEvents;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages\CreateStoredEvent;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages\EditStoredEvent;
use Filament\Forms;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages;
use Modules\Activity\Models\StoredEvent;
use Modules\Xot\Filament\Resources\XotBaseResource;

class StoredEventResource extends XotBaseResource
{
    protected static null|string $model = StoredEvent::class;

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'event_class' => TextInput::make('event_class')->required()->maxLength(255),
            'event_properties' => KeyValue::make('event_properties')->columnSpanFull(),
            'aggregate_uuid' => TextInput::make('aggregate_uuid')->maxLength(36),
            'aggregate_version' => TextInput::make('aggregate_version')->numeric(),
            'meta_data' => Textarea::make('meta_data')->columnSpanFull(),
            'created_at' => DateTimePicker::make('created_at')->required(),
        ];
    }

    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListStoredEvents::route('/'),
            'create' => CreateStoredEvent::route('/create'),
            'edit' => EditStoredEvent::route('/{record}/edit'),
        ];
    }
}
