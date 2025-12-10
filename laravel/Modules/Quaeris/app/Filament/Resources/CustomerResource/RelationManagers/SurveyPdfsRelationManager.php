<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\CustomerResource\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource;

class SurveyPdfsRelationManager extends RelationManager
{
    protected static string $relationship = 'surveyPdfs';

    protected static ?string $recordTitleAttribute = 'id';

    public function form(Schema $schema): Schema
    {
        return SurveyPdfResource::form($schema);
        /*
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
        */
    }

    public function table(Table $table): Table
    {
        return SurveyPdfResource::table($table);

    }
}
