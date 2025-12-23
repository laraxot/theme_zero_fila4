<?php
declare(strict_types=1);
/**
 * @see https://github.com/awcodes/overlook/blob/2.x/src/Widgets/OverlookWidget.php
 */

namespace Modules\Quaeris\Filament\Widgets;

use Exception;
use Filament\Widgets\Widget;
use Modules\Quaeris\Actions\Dashboard\StatsAction;

class OverlookStatsWidget extends Widget
{
    public array $data = [];

    public array $grid = [];

    public array $icons = [];

    public array $filter;
    protected string $view = 'quaeris::filament.widgets.overlook-stats';

    protected int | string | array $columnSpan = 'full';

    /**
     * @throws Exception
     */
    public function mount(array $filter): void
    {
        $this->filter = $filter;

        $this->data = $this->getData();
        // dddx($this->data);
        if (empty($this->grid)) {
            $this->grid = [
                'default' => 2,
                'sm' => 2,
                'md' => 3,
                'lg' => 3,
                'xl' => 3,
                '2xl' => null,
            ];
        }
    }

    public function convertCount(string $number): string
    {
        return $number;
    }

    // public function formatRawCount(string $number): string
    // {
    //     return number_format($number);
    // }

    /**
     * @throws Exception
     */
    public function getData(): array
    {
        $stats = app(StatsAction::class)->execute($this->filter);
        // dddx($stats);
        $result = [];
        foreach ($stats as $key => $stat) {
            // dddx([$key, $stat]);
            $result[] = [
                'title' => __('quaeris::dashboard.title.'.$key),

                'invited' => $stat['invited'][0],
                'title_invite' => 'Invii',

                'answers' => $stat['answers'][0],
                'title_answers' => 'Invii',

                'perc' => $stat['perc'][0],
                'title_perc' => 'Invii',

                'icon' => 'heroicon-o-paper-airplane',
            ];
        }
        // dddx($result);
        return $result;

        // return [
        //     [
        //         "title" => "Sondaggi inviati",
        //         "count_total" => "9999",
        //         "title_total" => "Totale",
        //         "raw_count" => "666",
        //         "count" => "666",
        //         "icon" => "heroicon-o-paper-airplane",
        //         // "url" => "http://quaerisf3.local/chart/admin/charts",
        //     ],
        //     [
        //         "title" => "Totale risposte",
        //         "count_total" => "9999",
        //         "title_total" => "Totale",
        //         "raw_count" => "666",
        //         "count" => "666",
        //         "icon" => "heroicon-o-pencil-square",
        //         // "url" => "http://quaerisf3.local/chart/admin/mixed-charts",
        //     ],
        //     [
        //         "title" => "Percentuale risposte",
        //         "count_total" => "9999",
        //         "title_total" => "Totale",
        //         "raw_count" => "666",
        //         "count" => "666",
        //         "icon" => "heroicon-o-receipt-percent",
        //         // "url" => "http://quaerisf3.local/chart/admin/mixed-charts",
        //     ]
        // ];
    }

    public static function getSort(): int
    {
        //return OverlookPlugin::get()->getSort();
        return 1;
    }

    public function shouldShowTooltips(string $number): bool
    {
        //$plugin = OverlookPlugin::get();

        //return strlen($number) >= 4 && $plugin->shouldAbbreviateCount() && $plugin->shouldShowTooltips();
        return true;
    }
}
