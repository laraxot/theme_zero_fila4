<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PdfStyleRelationManager extends RelationManager
{
    protected static string $relationship = 'pdfStyle';

    protected static ?string $recordTitleAttribute = 'id';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('color'),
                TextInput::make('bg_color'),

                TextInput::make('font_family'),
                TextInput::make('font_size'),
                TextInput::make('font_style'),

                TextInput::make('backtop'),
                TextInput::make('backbottom'),
                TextInput::make('backleft'),
                TextInput::make('backright'),
                TextInput::make('font_size_question'),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
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
            ])
            ->filters([

            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
