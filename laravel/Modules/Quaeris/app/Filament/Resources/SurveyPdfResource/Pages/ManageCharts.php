<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Actions\AssociateAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Pages\ManageRelatedRecords;
use Modules\Chart\Filament\Resources\ChartResource;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource;
use Modules\Chart\Filament\Resources\ChartResource\Pages\ListCharts;

class ManageCharts extends ManageRelatedRecords
{
    protected static string $resource = SurveyPdfResource::class;

    protected static string $relationship = 'chart';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Chart';
    }

    public function getHeaderActions(): array
    {
        return [
            //Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
            //Tables\Actions\CreateAction::make(),
            //Tables\Actions\AssociateAction::make(),
            //ExportXlsAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [

            CreateAction::make(),
            AssociateAction::make(),

        ];
    }

    public function getTableActions(): array
    {
        return [
            ViewAction::make(),
            EditAction::make(),
            DissociateAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    public function form(Schema $schema): Schema
    {
        return ChartResource::form($schema);
    }

    public function table(Table $table): Table
    {
        // return ChartResource::table($table)
        //     ->headerActions($this->getTableHeaderActions())
        //     ->actions($this->getTableActions());

        return app(ListCharts::class)->table($table)
            ->headerActions($this->getTableHeaderActions());

    }
}
