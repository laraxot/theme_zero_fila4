<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages;

use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Filament\Resources\Pages\ManageRelatedRecords;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource;
use Modules\Notify\Filament\Resources\NotifyThemeResource;
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\ListNotifyThemes;

class ManageNotifyThemes extends ManageRelatedRecords
{
    protected static string $resource = SurveyPdfResource::class;

    protected static string $relationship = 'notifyThemes';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Notify Themes';
    }

    public function form(Schema $schema): Schema
    {
        return NotifyThemeResource::form($schema);
    }

    public function table(Table $table): Table
    {
        // $table = NotifyThemeResource::table($table);

        // $columns = Arr::except($table->getColumns(), ['post_type', 'post_id']);

        // $table->columns($columns);

        // return $table;

        return app(ListNotifyThemes::class)->table($table)
            ->headerActions($this->getTableHeaderActions());

    }

    public function getTableHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
