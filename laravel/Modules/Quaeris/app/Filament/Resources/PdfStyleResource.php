<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources;

use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Modules\Quaeris\Filament\Resources\PdfStyleResource\Pages\ListPdfStyles;
use Modules\Quaeris\Filament\Resources\PdfStyleResource\Pages\CreatePdfStyle;
use Modules\Quaeris\Filament\Resources\PdfStyleResource\Pages\EditPdfStyle;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Modules\Quaeris\Models\PdfStyle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ColorColumn;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Quaeris\Filament\Resources\PdfStyleResource\Pages;

class PdfStyleResource extends XotBaseResource
{
    protected static ?string $model = PdfStyle::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 16;

    protected static bool $shouldRegisterNavigation = false;

    public static function getFormSchema(): array
    {
        return [
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
            ];
    }

    public static function tableOLD(Table $table): Table
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
            ->headerActions([
                CreateAction::make(),
            ])
            ->filters([

            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([

            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPdfStyles::route('/'),
            'create' => CreatePdfStyle::route('/create'),
            'edit' => EditPdfStyle::route('/{record}/edit'),
        ];
    }
}
