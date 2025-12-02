<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources;

use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Modules\Quaeris\Models\Customer;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Collection;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Quaeris\Filament\Resources\CustomerResource\Pages\EditCustomer;
use Modules\Quaeris\Filament\Resources\CustomerResource\Pages\ListCustomers;
use Modules\Quaeris\Filament\Resources\CustomerResource\Pages\CreateCustomer;
use Modules\Quaeris\Filament\Resources\CustomerResource\RelationManagers\SurveyPdfsRelationManager;

class CustomerResource extends XotBaseResource
{
    protected static ?string $model = Customer::class;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $recordTitleAttribute = 'name';
    protected static bool $shouldRegisterNavigation = false;

    public static function getFormSchema(): array
    {
        return [
                TextInput::make('name')
                    ->required(),
            ];
    }

    public static function tableOLD(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                /*
                Tables\Columns\TextColumn::make('survey_pdfs_count')
                    ->counts('surveyPdfs'),
                */
                // ChildResourceLink::make(SurveyPdfResource::class),
            ])
            ->filters([

            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),
                    Action::make('Action row test')
                        ->icon('heroicon-o-list-bullet')
                        ->color('success')
                        ->action(function (Customer $customer): never {
                            dd($customer);
                        }),
                ]),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
                BulkAction::make('Action bulk test')
                    ->icon('heroicon-o-list-bullet')
                    ->color('success')
                    ->action(function (Collection $collection): never {
                        dd($collection);
                    }),
                // Tables\Actions\BulkAction::make('Generate Images')
                //     ->icon('heroicon-o-list-bullet')
                //     ->color('success')
                //     ->action(function (Collection $records): void {

                //     }),
            ]);
        /*
        ->prependActions([
            Tables\Actions\Action::make('View Suvey Pdf')
                ->color('success')
                ->icon('heroicon-o-list-bullet')
                ->url(fn (Customer $record): string => SurveyPdfResource::getUrl('survey_pdfs', ['record' => $record]))
        ])
        */
    }

    public static function getRelations(): array
    {
        return [
            SurveyPdfsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomers::route('/'),
            'create' => CreateCustomer::route('/create'),
            'edit' => EditCustomer::route('/{record}/edit'),
        ];
    }
}
