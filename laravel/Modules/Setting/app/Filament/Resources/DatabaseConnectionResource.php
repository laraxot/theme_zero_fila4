<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\KeyValue;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages\ListDatabaseConnections;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages\CreateDatabaseConnection;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages\ViewDatabaseConnection;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages\EditDatabaseConnection;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Setting\Models\DatabaseConnection;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages;

class DatabaseConnectionResource extends Resource
{
    protected static ?string $model = DatabaseConnection::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-database';

    protected static string | \UnitEnum | null $navigationGroup = 'Configurazione';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('driver')
                    ->required()
                    ->options([
                        'mysql' => 'MySQL',
                        'pgsql' => 'PostgreSQL',
                        'sqlite' => 'SQLite',
                        'sqlsrv' => 'SQL Server',
                    ]),
                TextInput::make('host')
                    ->required()
                    ->maxLength(255),
                TextInput::make('port')
                    ->required()
                    ->numeric(),
                TextInput::make('database')
                    ->required()
                    ->maxLength(255),
                TextInput::make('username')
                    ->required()
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                TextInput::make('charset')
                    ->maxLength(255),
                TextInput::make('collation')
                    ->maxLength(255),
                TextInput::make('prefix')
                    ->maxLength(255),
                Toggle::make('strict')
                    ->required(),
                TextInput::make('engine')
                    ->maxLength(255),
                KeyValue::make('options'),
                Select::make('status')
                    ->required()
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('driver')
                    ->searchable(),
                TextColumn::make('host')
                    ->searchable(),
                TextColumn::make('port')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('database')
                    ->searchable(),
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('charset')
                    ->searchable(),
                TextColumn::make('collation')
                    ->searchable(),
                TextColumn::make('prefix')
                    ->searchable(),
                IconColumn::make('strict')
                    ->boolean(),
                TextColumn::make('engine')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDatabaseConnections::route('/'),
            'create' => CreateDatabaseConnection::route('/create'),
            'view' => ViewDatabaseConnection::route('/{record}'),
            'edit' => EditDatabaseConnection::route('/{record}/edit'),
        ];
    }
}
