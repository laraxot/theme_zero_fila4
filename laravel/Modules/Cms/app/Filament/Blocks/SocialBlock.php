<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Blocks;

use Override;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Blocks\XotBaseBlock;

final class SocialBlock extends XotBaseBlock
{
    #[Override]
    public static function getBlockSchema(): array
    {
        return [
            TextInput::make('title')->required()->label(__('cms::blocks.social.fields.title')),
            Repeater::make('social_links')
                ->label(__('cms::blocks.social.fields.social_links'))
                ->schema([
                    Select::make('platform')
                        ->required()
                        ->label(__('cms::blocks.social.fields.platform'))
                        ->options([
                            'facebook' => 'Facebook',
                            'twitter' => 'Twitter',
                            'instagram' => 'Instagram',
                            'linkedin' => 'LinkedIn',
                            'youtube' => 'YouTube',
                        ]),
                    TextInput::make('url')
                        ->required()
                        ->url()
                        ->label(__('cms::blocks.social.fields.url')),
                ])
                ->collapsible()
                ->itemLabel(fn(array $state): null|string => $state['platform'] ?? null)
                ->defaultItems(1),
        ];
    }

    public static function getBlockLabel(): string
    {
        return __('cms::blocks.social.label');
    }
}
