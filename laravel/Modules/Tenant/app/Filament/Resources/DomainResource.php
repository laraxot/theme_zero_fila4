<?php

declare(strict_types=1);

namespace Modules\Tenant\Filament\Resources;

use Override;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\ListDomains;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\CreateDomain;
use Modules\Tenant\Filament\Resources\DomainResource\Pages\EditDomain;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Modules\Tenant\Filament\Resources\DomainResource\Pages;
use Modules\Tenant\Models\Domain;
use Modules\Xot\Filament\Resources\XotBaseResource;

class DomainResource extends XotBaseResource
{
    protected static null|string $model = Domain::class;

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'title' => TextInput::make('title')
                ->required()
                ->string()
                ->maxLength(255),
            'brand' => TextInput::make('brand')
                ->required()
                ->string()
                ->maxLength(255),
            'category' => TextInput::make('category')
                ->required()
                ->string()
                ->maxLength(255),
            'description' => RichEditor::make('description')->required()->string(),
            'price' => TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('$'),
            'rating' => TextInput::make('rating')
                ->required()
                ->numeric()
                ->minValue(0)
                ->maxValue(5),
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
            'index' => ListDomains::route('/'),
            'create' => CreateDomain::route('/create'),
            'edit' => EditDomain::route('/{record}/edit'),
        ];
    }
}
