<?php

declare(strict_types=1);
/**
 * @see https://www.answeroverflow.com/m/1163576849184591892
 */

namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages;

use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Actions\AssociateAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Quaeris\Filament\Imports\ContactImporter;
use Modules\Quaeris\Filament\Resources\ContactResource;
use Modules\Quaeris\Filament\Resources\ContactResource\Pages\ListContacts;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource;
use Modules\Quaeris\Models\SurveyPdf;
use Webmozart\Assert\Assert;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
/**
 * @property Table $table
 * @property Schema $form
 */
class ManageContacts extends ManageRelatedRecords
{
    protected static string $resource = SurveyPdfResource::class;

    protected static string $relationship = 'contacts';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

    public static function getNavigationLabel(): string
    {
        return 'Contacts';
    }

    public function form(Schema $schema): Schema
    {
        return ContactResource::form($schema);
    }

    public function getTableHeaderActions(): array
    {
        Assert::isInstanceOf($this->record, SurveyPdf::class, '['.__FILE__.']['.__LINE__.']');
        Assert::notNull($this->record, '['.__FILE__.']['.__LINE__.']');

        return [
            CreateAction::make(),
            AssociateAction::make(),
            ImportAction::make()
                ->importer(ContactImporter::class)
                ->options([
                    'survey_pdf_id' => $this->record->getKey(),
                    // 'user_id'=>authId(),
                    // 'user'=>Auth::user(),
                ])
            // ->headerOffset(1)
            ,
        ];
    }

    // public function getTableColumns(): array
    // {
    //     return app(ListContacts::class)->getTableColumns();
    // }

    public function table(Table $table): Table
    {
        $this->table = app(ListContacts::class)->table($table);

        return $this->table
            ->headerActions($this->getTableHeaderActions());

    }
}
