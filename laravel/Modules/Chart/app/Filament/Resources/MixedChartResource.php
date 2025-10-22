<?php

declare(strict_types=1);

namespace Modules\Chart\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Modules\Chart\Models\MixedChart;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
// use Modules\Chart\Filament\Resources\MixedChartResource\RelationManagers;
use Modules\Xot\Filament\Resources\XotBaseResource;
// use Filament\Forms;
use Modules\Chart\Filament\Resources\MixedChartResource\Pages\EditMixedChart;
use Modules\Chart\Filament\Resources\MixedChartResource\Pages\ListMixedCharts;
use Modules\Chart\Filament\Resources\MixedChartResource\Pages\CreateMixedChart;
use Filament\Forms\Components\Select;
use Modules\Chart\Actions\Chart\GetTypeOptions;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

class MixedChartResource extends XotBaseResource
{
    protected static ?string $model = MixedChart::class;

    public static function getFormSchema(): array
    {
        return [
            'type' => Select::make('type')->options(app(GetTypeOptions::class)->execute()),
        ];
    }
}
