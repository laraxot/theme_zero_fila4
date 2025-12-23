<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Blocks;

use Override;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Blocks\XotBaseBlock;

final class QuickLinksBlock extends XotBaseBlock
{
    #[Override]
    public static function getBlockSchema(): array
    {
        return [
            TextInput::make('title')->label(__('cms::blocks.quick_links.fields.title'))->required(),
            Repeater::make('links')
                ->label(__('cms::blocks.quick_links.fields.links'))
                ->schema([
                    TextInput::make('label')->label(__('cms::blocks.quick_links.fields.label'))->required(),
                    TextInput::make('url')->label(__('cms::blocks.quick_links.fields.url'))->required(),
                    TextInput::make('target')
                        ->label(__('cms::blocks.quick_links.fields.target'))
                        ->default('_self')
                        ->helperText('Usa "_blank" per aprire in una nuova finestra, "_self" per la stessa finestra'),
                ])
                ->collapsible()
                ->defaultItems(0)
                ->itemLabel(fn(array $state): null|string => $state['label'] ?? null),
        ];
    }

    public static function getBlockLabel(): string
    {
        return __('cms::blocks.quick_links.label');
    }
}
