<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages;

use Filament\Schemas\Schema;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables\Table;
use Modules\Quaeris\Filament\Resources\PdfStyleResource;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource;

class ManagePdfStyle extends ManageRelatedRecords
{
    protected static string $resource = SurveyPdfResource::class;

    protected static string $relationship = 'pdfStyle';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Pdf Style';
    }

    public function form(Schema $schema): Schema
    {
        return PdfStyleResource::form($schema);
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
        return PdfStyleResource::table($table);

    }
}
