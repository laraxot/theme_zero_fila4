<?php

declare(strict_types=1);

namespace Modules\Chart\Actions\JpGraph;

use Amenadiel\JpGraph\Plot\BarPlot;
use Modules\Chart\Datas\ChartData;
use Spatie\QueueableAction\QueueableAction;

class ApplyPlotStyleAction
{
    use QueueableAction;

    public function execute(BarPlot $barPlot, ChartData $chartData): BarPlot
    {
        // $plot->SetFillColor($colors); // trasparenza, da 0 a 1

        // $plot->SetFillColor($this->data[5]['color'].'@'.$this->vars['transparency']); // trasparenza, da 0 a 1
        $barPlot->SetFillColor($chartData->list_color ?? 'red@'.$chartData->transparency); // trasparenza, da 0 a 1

        // $bplot->SetShadow('darkgreen', 1, 1);
        // dddx([get_defined_vars(), $this->vars]);

        $barPlot->SetColor($chartData->list_color ?? 'red');

        // You can change the width of the bars if you like
        $barPlot->SetWidth($chartData->plot_perc_width / 100);
        // $plot->SetWidth(10);

        // We want to display the value of each bar at the top
        // se tolto non mostra i valori
        // Right side of || is always false.
        // if (null == $data->plot_value_show || 0 == $data->plot_value_show) {
        if ($chartData->plot_value_show) {
            $barPlot->value->Show();
        }

        $barPlot->value->SetFont($chartData->font_family, $chartData->font_style, $chartData->font_size);

        $barPlot->value->SetAlign('left', 'center');
        // colore del font che scrivi
        if ($chartData->plot_value_color !== null) {
            $barPlot->value->SetColor($chartData->plot_value_color);
        } else {
            $barPlot->value->SetColor('black', 'darkred');
        }

        // visualizza il risultato con % oppure no
        // $plot->value->SetFormat('%.2f &#37;');
        // 2f significa 2 cifre decimali, 1f solo una cifra decimale
        switch ($chartData->plot_value_format) {
            case 1:
                $barPlot->value->SetFormat('%.1f &#37;');
                break;
            case 2:
                $barPlot->value->SetFormat('%.1f');
                break;
            case 3:
                $barPlot->value->SetFormat('%.0f');
                break;
            default:
                $barPlot->value->SetFormat('%.1f &#37;');
        }

        // Center the values in the bar
        // if (null == $data->plot_value_pos || 0 == $data->plot_value_pos) {
        if ($chartData->plot_value_pos === 0) {
            $barPlot->SetValuePos('center');
        }

        $barPlot->value->setAngle($chartData->x_label_angle);
        // $plot->value->setAngle(50);

        return $barPlot;
    }
}
