<?php

declare(strict_types=1);

namespace Modules\Chart\Actions\JpGraph\V1;

use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Plot\BarPlot;
use Amenadiel\JpGraph\Plot\GroupBarPlot;
use Amenadiel\JpGraph\Text\Text;
use Modules\Chart\Actions\JpGraph\ApplyPlotStyleAction;
use Modules\Chart\Actions\JpGraph\GetGraphAction;
use Modules\Chart\Datas\AnswersChartData;
use Spatie\QueueableAction\QueueableAction;

class Bar2Action
{
    use QueueableAction;

    public function execute(AnswersChartData $answersChartData): Graph
    {
        $data = $answersChartData->answers->toCollection()->pluck('avg')->all();
        $data1 = $answersChartData->answers->toCollection()->pluck('value')->all();
        $legends = [0];
        if (isset($data1[0]) && is_array($data1[0])) { // questionario multiplo
            $legends = array_keys($data1[0]);
            $data = $answersChartData->answers->toCollection()->pluck('value')->all();
            $data1 = $answersChartData->answers->toCollection()->pluck('avg')->all();
        }

        $labels = $answersChartData->answers->toCollection()->pluck('label')->all();
        $chart = $answersChartData->chart;
        $graph = app(GetGraphAction::class)->execute($chart);
        $graph->img->SetMargin(50, 50, 50, 100);
        $graph->ygrid->SetFill(false);
        $graph->xaxis->SetTickLabels($labels);
        $graph->xaxis->SetLabelAngle($chart->x_label_angle);

        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false, false);

        $graph->yscale->ticks->SupressZeroLabel(false);

        $graph->xaxis->SetTickLabels($labels);

        /*
        $bplot = new BarPlot($data);
        // $bplot = $this->applyPlotStyle($bplot);
        $bplot = app(ApplyPlotStyleAction::class)->execute($bplot, $chart);

        $colors = [];

        foreach ($labels as $k => $label) {
            if ('NR' == $label) {
                $colors[$k] = $chart->getColors()[1].'@'.$chart->transparency;
            } else {
                $colors[$k] = $chart->getColors()[0].'@'.$chart->transparency;
            }
        }
        $bplot->SetFillColor($colors); // trasparenza, da 0 a 1
        */
        $colors = explode(',', $chart->list_color);
        $bplot = [];

        foreach ($legends as $i => $legend) {
            $tmp_data = $legend === 0 ? $data : array_column($data, $legend);

            // dddx(['data' => $data, 'tmp_data' => $tmp_data]);
            $tmp = new BarPlot($tmp_data);
            // $tmp = $this->applyPlotStyle($tmp);
            $tmp = app(ApplyPlotStyleAction::class)->execute($tmp, $chart);
            $tmp->SetColor($colors[$i]);
            $tmp->SetFillColor($colors[$i].'@'.$chart->transparency); // trasparenza da 0 a 1
            $tmp->value->Show();
            // $tmp->SetFillColor($colors[$k]);
            /*
            if (isset($chart->legend)) {
                $str = $chart->legend[$k] ?? '--no set';
                $tmp->SetLegend($str);
            }
            */
            if ($legend !== 0) {
                $tmp->SetLegend($legend);
            }

            $bplot[] = $tmp;
            $i++;
        }

        // Create the grouped bar plot
        $groupBarPlot = new GroupBarPlot($bplot);
        // ...and add it to the graPH
        $graph->Add($groupBarPlot);

        // $graph->Add($bplot);

        $delta = ($chart->width - 100) / \count($data1);

        foreach ($data1 as $i => $v) {
            $txt = new Text($v.'');

            $x = 50 + ($delta * $i) + ($delta / 3);

            $txt->SetPos($x, 25);

            $graph->AddText($txt);
        }

        return $graph;
    }
}
