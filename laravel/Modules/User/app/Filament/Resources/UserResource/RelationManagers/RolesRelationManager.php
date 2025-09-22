<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\Component;
use Override;
use Filament\Actions\AttachAction;
use Filament\Actions\EditAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class RolesRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'roles';

    protected static null|string $recordTitleAttribute = 'name';

    // protected static ?string $inverseRelationship = 'section'; // Since the inverse related model is `Category`, this is normally `category`, not `section`.
    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    // }
    /**
     * @return array<string, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            /*
             * 'team_id' => Forms\Components\Select::make('team_id')
             * ->relationship('teams', 'name'),
             */
        ];
    }

    #[Override]
    public function table(Table $table): Table
    {
        $xotData = XotData::make();

        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('team_id'),
            ])
            ->filters([])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
                AttachAction::make()
                    // ->mutateFormDataUsing(function (array $data): array {
                    //     // This is the test.
                    //     $data['team_id'] = 2;
                    //     return $data;
                    // }),
                    ->schema(static fn(AttachAction $action): array => [
                        $action->getRecordSelect(),
                        // Forms\Components\TextInput::make('team_id')->required(),
                        Select::make('team_id')->options($xotData->getTeamClass()::get()->pluck('name', 'id')),
                        // ->options(function($item){
                        //     dddx($this);
                        // })
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                DetachAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
