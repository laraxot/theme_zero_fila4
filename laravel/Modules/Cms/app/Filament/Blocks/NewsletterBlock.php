<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Blocks;

use Override;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Blocks\XotBaseBlock;

final class NewsletterBlock extends XotBaseBlock
{
    #[Override]
    public static function getBlockSchema(): array
    {
        return [
            TextInput::make('title')->required()->label(__('cms::blocks.newsletter.fields.title')),
            Textarea::make('description')->required()->label(__('cms::blocks.newsletter.fields.description')),
            TextInput::make('button_text')->required()->label(__('cms::blocks.newsletter.fields.button_text')),
            TextInput::make('placeholder')->required()->label(__('cms::blocks.newsletter.fields.placeholder')),
            TextInput::make('success_message')->required()->label(__('cms::blocks.newsletter.fields.success_message')),
            TextInput::make('error_message')->required()->label(__('cms::blocks.newsletter.fields.error_message')),
        ];
    }

    public static function getBlockLabel(): string
    {
        return __('cms::blocks.newsletter.label');
    }
}
