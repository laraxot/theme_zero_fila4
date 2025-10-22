<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources\PageResource\Pages;

use Filament\Tables\Columns\Column;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Cms\Filament\Resources\PageResource;
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListPages extends LangBaseListRecords
{
    protected static string $resource = PageResource::class;

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'title' => TextColumn::make('title')->searchable()->sortable(),
            'lang' => TextColumn::make('lang')->searchable()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->sortable()->dateTime(),
        ];
    }
}
