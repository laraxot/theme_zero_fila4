<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Blocks;

use Override;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Blocks\XotBaseBlock;

class SocialLinksBlock extends XotBaseBlock
{
    #[Override]
    public static function getBlockSchema(): array
    {
        return [
            TextInput::make('title'),
            Repeater::make('links')
                ->schema([
                    Select::make('platform')
                        ->options([
                            'facebook' => 'Facebook',
                            'twitter' => 'Twitter',
                            'instagram' => 'Instagram',
                            'linkedin' => 'LinkedIn',
                            'youtube' => 'YouTube',
                            'github' => 'GitHub',
                        ])
                        ->required(),
                    TextInput::make('url')->url()->required(),
                    TextInput::make('icon'),
                ])
                ->collapsible(),
        ];
    }

    public static function getBlockLabel(): string
    {
        return __('cms::filament.blocks.footer.social.label');
    }
}
