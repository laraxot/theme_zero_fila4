<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages;

use Filament\Tables\Table;
use Filament\Actions\CreateAction;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Enums\ActionsPosition;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ListSurveyPdfs extends XotBaseListRecords
{
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $resource = SurveyPdfResource::class;


    public function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('survey_id'),
            TextColumn::make('name')
                ->searchable()
                ->sortable(),
            SpatieMediaLibraryImageColumn::make('logo'), // ->disk('public_html'),//->directory('uploads'),
        ];
    }


}
