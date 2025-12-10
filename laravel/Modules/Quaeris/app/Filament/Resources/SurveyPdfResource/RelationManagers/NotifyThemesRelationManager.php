<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Table;
use Modules\Notify\Filament\Resources\NotifyThemeResource;
use Modules\Notify\Models\NotifyTheme;

class NotifyThemesRelationManager extends RelationManager
{
    public static array $route_params = [];

    protected static string $relationship = 'notifyThemes';

    protected static ?string $recordTitleAttribute = 'subject';

    public static function fieldOptions(string $field): array
    {
        return NotifyTheme::select($field)
            ->where($field, '!=', null)
            ->distinct()
            ->pluck($field, $field)
            ->toArray();
    }

    public function form(Schema $schema): Schema
    {
        return NotifyThemeResource::form($schema);
    }

    public function table(Table $table): Table
    {
        $table = NotifyThemeResource::table($table);
        /**
         * @var array<(Column | Component)>
         */
        $columns = collect($table->getColumns())->except(['post_type', 'post_id'])->toArray();

        $table->columns($columns);

        return $table;
    }
}
