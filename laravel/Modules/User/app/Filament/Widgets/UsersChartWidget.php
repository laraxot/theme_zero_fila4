<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Actions\Contracts\HasActions;
use Exception;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\ChartWidget;
// use Filament\Widgets\Concerns\InteractsWithPageFilters; // Temporaneamente commentato per evitare conflitti trait in Filament 4.x
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Carbon;
use Modules\User\Models\AuthenticationLog;
use Webmozart\Assert\Assert;

class UsersChartWidget extends ChartWidget implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;
    // use InteractsWithPageFilters; // Temporaneamente commentato per evitare conflitti trait in Filament 4.x

    public string $chart_id = '';

    protected null|string $pollingInterval = null;

    protected static null|int $sort = 2;

    public function getHeading(): Htmlable|string|null
    {
        return 'Authentication Log';
    }

    /**
     * Define the action to be tested.
     */
    public function testAction(): Action
    {
        return Action::make('test')
            ->requiresConfirmation()
            ->action(function (array $arguments) {
                dd('Test action called', $arguments);
            });
    }

    protected function getType(): string
    {
        return 'line';
    }

    /**
     * Retrieve the chart data based on the given filters.
     */
    protected function getData(): array
    {
        // Rimuovere chiamate di test non necessarie per ridurre overhead
        // $this->mountAction('test', ['id' => 5]);
        // $this->testAction();

        try {
            Assert::nullOrString($startDate = $this->pageFilters['startDate'] ?? null);
            Assert::nullOrString($endDate = $this->pageFilters['endDate'] ?? null);
            if ($endDate === null) {
                $endDate = Carbon::now()->format('Y-m-d H:i:s');
            }
            if ($startDate === null) {
                $startDate = Carbon::now()->subMonth()->format('Y-m-d H:i:s');
            }
            Assert::notNull($startDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate));
            Assert::notNull($endDate = Carbon::createFromFormat('Y-m-d H:i:s', $endDate));

            // Limitare il range massimo a 90 giorni per ridurre memory usage
            if ($startDate->diffInDays($endDate, true) > 90) {
                $startDate = $endDate->copy()->subDays(90);
            }
        } catch (Exception $e) {
            return [];
        }

        // Limitare a massimo 1000 record per evitare problemi di memoria
        $data = Trend::model(AuthenticationLog::class)
            ->dateColumn('login_at')
            ->between(
                start: $startDate,
                end: $endDate,
            )
            ->perDay()
            // ->perMonth()
            ->count()
            ->take(1000); // Limite massimo di 1000 record
        /*
         * // Update callbacks to match expected signature
         * $chartData = $data->map(function ($value) {
         * Assert::isInstanceOf($value, TrendValue::class);
         *
         * return $value->aggregate;
         * })->toArray();
         * $chartLabels = $data->map(function ($value) {
         * Assert::isInstanceOf($value, TrendValue::class);
         *
         * return $value->date->format('Y-m-d');
         * })->toArray();
         */

        $chartData = $data->pluck('aggregate')->toArray();
        $chartLabels = $data->pluck('date')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Number of logins executed',
                    'data' => $chartData,
                ],
            ],
            'labels' => $chartLabels,
        ];
    }
}
