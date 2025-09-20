<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Blocks;

use Override;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Blocks\XotBaseBlock;

final class ContactBlock extends XotBaseBlock
{
    #[Override]
    public static function getBlockSchema(): array
    {
        return [
            TextInput::make('title')->required()->label(__('cms::blocks.contact.fields.title')),
            Textarea::make('description')->required()->label(__('cms::blocks.contact.fields.description')),
            TextInput::make('email')
                ->required()
                ->email()
                ->label(__('cms::blocks.contact.fields.email')),
            TextInput::make('phone')
                ->required()
                ->tel()
                ->label(__('cms::blocks.contact.fields.phone')),
            Textarea::make('address')->required()->label(__('cms::blocks.contact.fields.address')),
            TextInput::make('map_url')->url()->label(__('cms::blocks.contact.fields.map_url')),
        ];
    }

    public static function getBlockLabel(): string
    {
        return __('cms::blocks.contact.label');
    }
}
