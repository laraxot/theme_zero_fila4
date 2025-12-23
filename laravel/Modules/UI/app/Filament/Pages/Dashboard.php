<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Pages;

use Modules\UI\Filament\Widgets\TestChartWidget;
use Modules\UI\Filament\Widgets\StatWithIconWidget;
use Modules\UI\Filament\Widgets\TestWidget;
use Filament\Pages\Page;
use Modules\UI\Filament\Widgets;
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';

    protected string $view = 'ui::filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        $widgets = [
            [
                'class' => TestChartWidget::class,
                'properties' => [
                    'qid' => 5,
                    'max_height' => '900px',
                    'type' => 'pie',
                ],
            ],
            [
                'class' => TestChartWidget::class,
                'properties' => [
                    'qid' => 7,
                    'type' => 'bar',
                ],
            ],
            [
                'class' => TestChartWidget::class,
                'properties' => [
                    'qid' => 9,
                    'type' => 'bar',
                ],
            ],
        ];

        return [
            // Widgets\TestChartWidget::make(['qid' => 5]),
            // Widgets\TestChartWidget::make(['qid' => 6]),
            // Widgets\StatsOverviewWidget::class,

            StatWithIconWidget::make(['label' => 'Unique views', 'value' => '192.1k']),
            TestWidget::make(['widgets' => $widgets]),
            TestWidget::make(['widgets' => $widgets]),
            TestWidget::make(['widgets' => $widgets]),
            TestWidget::make(['widgets' => $widgets]),
        ];
    }
}
