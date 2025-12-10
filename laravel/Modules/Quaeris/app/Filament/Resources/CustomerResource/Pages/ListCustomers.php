<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\CustomerResource\Pages;

use Filament\Tables\Table;
use Filament\Actions\CreateAction;
use Filament\Tables\Actions\Action;
use Modules\Quaeris\Models\Customer;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Quaeris\Filament\Resources\CustomerResource;

class ListCustomers extends XotBaseListRecords
{
    protected static string $resource = CustomerResource::class;

    public function getTableColumns(): array
    {
        return [
                // Tables\Columns\TextColumn::make('id'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                /*
                Tables\Columns\TextColumn::make('survey_pdfs_count')
                    ->counts('surveyPdfs'),
                */
                // ChildResourceLink::make(SurveyPdfResource::class),
        ];
    }




}
