<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Widgets;

use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget;

class Filters extends Widget implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public ?array $data = [];

    protected string $view = 'quaeris::filament.widgets.filters';

    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';

    public function form(Schema $schema): Schema
    {
        // Assert::notNull($user = auth()->user());
        // $currentTeam = $user->currentTeam;
        // Assert::notNull($currentTeam);
        // Assert::isInstanceOf($currentTeam, Customer::class);
        // $surveyPdfOpts = $currentTeam->surveyPdfsActive()->pluck('name', 'id')->toArray();

        return $schema
            ->statePath('data')
            ->components([
                Grid::make()
                    ->schema([
                        Select::make('survey_pdf_id')
                            ->label('Sondaggio')
                            // ->options($surveyPdfOpts)
                            ->options(['a' => 'a', 'b' => 'b'])
                            ->stateBindingModifiers(['defer']),
                        DatePicker::make('from'),
                        DatePicker::make('to'),
                    ]),
            ]);
    }
}
