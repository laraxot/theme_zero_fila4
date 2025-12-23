<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\PdfStyleResource\Pages;

use Filament\Actions;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Quaeris\Filament\Resources\PdfStyleResource;

class ListPdfStyles extends XotBaseListRecords
{
    protected static string $resource = PdfStyleResource::class;

    public function getTableColumns(): array
    {
        return [
                TextColumn::make('id')->sortable(),

                ColorColumn::make('color')->sortable(),
                ColorColumn::make('bg_color')->sortable(),
                TextColumn::make('font_family')->sortable(),
                TextColumn::make('font_size')->sortable(),
                TextColumn::make('font_style')->sortable(),

                TextColumn::make('backtop')->sortable(),
                TextColumn::make('backbottom')->sortable(),
                TextColumn::make('backleft')->sortable(),
                TextColumn::make('backright')->sortable(),
                TextColumn::make('font_size_question')->sortable(),
        ];
    }




}
