<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources;

use Override;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Section;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Support\Str;
use Modules\Cms\Filament\Fields\PageContentBuilder;
use Modules\Cms\Filament\Resources\PageResource\Pages;
use Modules\Cms\Models\Page;
use Modules\Lang\Filament\Resources\LangBaseResource;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * @property Page $record
 */
class PageResource extends LangBaseResource
{
    protected static null|string $model = Page::class;

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            TextInput::make('title')
                ->required()
                ->lazy()
                ->afterStateUpdated(static function (Set $set, Get $get, string $state): void {
                    if ($get('slug')) {
                        return;
                    }
                    $set('slug', Str::slug($state));
                }),
            TextInput::make('slug')
                ->required()
                //->unique(ignoreRecord: true)
                ->afterStateUpdated(static fn(Set $set, string $state) => $set('slug', Str::slug($state))),
            Section::make('Content')->schema([
                PageContentBuilder::make('content_blocks')->columnSpanFull(),
            ]),
            Section::make('Sidebar')->schema([
                PageContentBuilder::make('sidebar_blocks')->columnSpanFull(),
            ]),
            Section::make('Footer')->schema([
                PageContentBuilder::make('footer_blocks')->columnSpanFull(),
            ]),
        ];
    }
}
