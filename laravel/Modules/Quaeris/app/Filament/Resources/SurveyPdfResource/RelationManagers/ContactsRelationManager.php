<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Table;
use Modules\Quaeris\Filament\Resources\ContactResource;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ContactsRelationManager extends RelationManager
{
    protected static string $relationship = 'contacts';

    protected static ?string $recordTitleAttribute = 'id';

    public function form(Schema $schema): Schema
    {
        return ContactResource::form($schema);
    }

    public function table(Table $table): Table
    {
        $table = ContactResource::table($table);
        /**
         * @var array<(Column | Component)>
         */
        $columns = collect($table->getColumns())->except(['post_type', 'post_id'])->toArray();

        $table->columns($columns);

        return $table;
    }

    /**
     * @param  int|string  $value
     *
     * @return float|string|int
     */
    public function fixFormat($value)
    {
        if (! is_numeric($value)) {
            return $value;
        }

        $res = Date::excelToDateTimeObject((int) $value);
        if ($res->format('Y') > 2020) {
            return $res->format('d/m/Y H:i:s');
        }

        return $value;
    }
}
