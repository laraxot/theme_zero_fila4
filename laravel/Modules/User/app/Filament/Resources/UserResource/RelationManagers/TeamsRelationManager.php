<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class TeamsRelationManager extends RelationManager
{
    protected static string $relationship = 'teams';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                IconColumn::make('personal_team')
                    ->boolean()
                    ->default(fn($record, $livewire) => $livewire->getOwnerRecord()->current_team_id === $record->id),
            ])
            ->filters([
                
            ])
            ->headerActions([
                AttachAction::make()->schema(fn(AttachAction $action): array => [
                    $action->getRecordSelect(),
                    TextInput::make('role')->default('editor')->required(),
                ]),
            ])
            ->recordActions([
                DetachAction::make()->after(function ($record, $livewire): void {
                    $user = $livewire->getOwnerRecord();
                    $team_id = $record->getKey();
                    $user->update([
                        'current_team_id' => null,
                    ]);
                }),
            ])
            ->toolbarActions([
                DetachBulkAction::make(),
            ]);
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('personal_team')->sortable(),
            TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
