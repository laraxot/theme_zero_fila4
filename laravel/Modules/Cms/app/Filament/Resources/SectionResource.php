<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources;

use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Cms\Filament\Blocks\FooterContactBlock;
use Modules\Cms\Filament\Blocks\FooterInfoBlock;
use Modules\Cms\Filament\Blocks\FooterLinksBlock;
use Modules\Cms\Filament\Blocks\FooterQuickLinksBlock;
use Modules\Cms\Filament\Blocks\FooterSocialBlock;
use Modules\Cms\Filament\Fields\PageContentBuilder;
use Modules\Cms\Filament\Resources\SectionResource\Pages;
use Modules\Cms\Models\Section;
use Modules\Lang\Filament\Resources\LangBaseResource;
use Modules\Xot\Filament\Resources\XotBaseResource;

class SectionResource extends LangBaseResource
{
    protected static null|string $model = Section::class;

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            \Filament\Schemas\Components\Section::make('info')->schema([
                TextInput::make('name')->translateLabel()->required(),
                TextInput::make('slug')->translateLabel()->required(),
            ]),
            \Filament\Schemas\Components\Section::make('blocks')->schema([
                /*
                 * Forms\Components\Builder::make('blocks')
                 * ->blocks([
                 * FooterInfoBlock::make('blocks'),
                 * FooterLinksBlock::make('blocks'),
                 * FooterSocialBlock::make('blocks'),
                 * FooterContactBlock::make('blocks'),
                 * FooterQuickLinksBlock::make('blocks'),
                 * ])
                 * ->collapsible()
                 * ->columnSpanFull(),
                 */
                PageContentBuilder::make('blocks')->columnSpanFull(),
            ]),
        ];
    }
}
