<?php

declare(strict_types=1);

namespace Modules\Chart\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
// use Modules\Chart\Filament\Resources\ChartResource\RelationManagers;
// use Filament\Forms;
use Modules\Chart\Actions\Chart\GetTypeOptions;
use Modules\Chart\Models\Chart;
use Modules\Xot\Filament\Resources\XotBaseResource;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChartResource extends XotBaseResource
{
    protected static ?string $model = Chart::class;

    public static function getFormSchema(): array
    {
        return [
            Select::make('type')->options(app(GetTypeOptions::class)->execute()),
            Select::make('group_by')->options([null => '---', 'date:o-W' => 'Settimanale', 'date:Y-M' => 'Mensile', 'date:Y-M-d' => 'Giornaliero', 'field:Q41' => 'field:Q41']),
            Select::make('sort_by')->options([null => '---', 'date:o-W' => 'Settimanale', 'date:Y-m' => 'Mensile', 'date:Y-m-d' => 'Giornaliero', '_value' => '_value', 'field:Q41' => 'field:Q41']),
            TextInput::make('width'),
            TextInput::make('height'),
            Toggle::make('show_box')->inline(false),

            // Forms\Components\TextInput::make('bg_color'),

            Select::make('font_family')->options([
                10 => 'FF_COURIER',
                11 => 'FF_VERDANA',
                12 => 'FF_TIMES',
                14 => 'FF_COMIC',
                15 => 'FF_ARIAL',
                16 => 'FF_GEORGIA',
                17 => 'FF_TREBUCHE',
                // 18 => 'FF_COLIBRI',
            ]),
            Select::make('font_style')->options([
                9001 => 'FS_NORMAL',
                9002 => 'FS_BOLD',
                9003 => 'FS_ITALIC',
                // 9004 => 'FS_BOLDIT',
                9004 => 'FS_BOLDITALIC',
            ]),
            Select::make('font_size')->options([
                '8' => '8',
                '10' => '10',
                '12' => '12',
                '14' => '14',
                '16' => '16',
                '18' => '18',
            ]),
            TextInput::make('list_color'),
            TextInput::make('transparency'),
            // Forms\Components\TextInput::make('backtop'),
            // Forms\Components\TextInput::make('backbottom'),
            // Forms\Components\TextInput::make('backleft'),
            // Forms\Components\TextInput::make('backright'),
            // Forms\Components\TextInput::make('font_size_question'),
        ];
    }
}
