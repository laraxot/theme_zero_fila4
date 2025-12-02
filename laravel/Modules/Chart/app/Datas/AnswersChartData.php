<?php

declare(strict_types=1);

namespace Modules\Chart\Datas;

use Modules\Xot\Actions\Cast\SafeFloatCastAction;
use Filament\Support\RawJs;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Webmozart\Assert\Assert;

class AnswersChartData extends Data
{
    public int $tot = 0;

    public string $title = 'no_set';

    public string $footer = 'no_set';

    public int $tot_answered = 0;

    public int $tot_invited = 0;

    /**
     * @var DataCollection<AnswerData>
     */
    public DataCollection $answers;

    public ChartData $chart;

    public function getChartJsType(): string
    {
        $type = $this->chart->type;
        switch ($type) {
            case 'pie1':
            case 'pieAvg': // questa è una media ha un solo valore
                $type = 'doughnut';
                break;
            case 'lineSubQuestion':
                $type = 'line';
                break;
            case 'bar2':
            case 'bar1':
            case 'bar3':
            case 'horizbar1':
                $type = 'bar';
                break;

            default:
                // dddx([
                //    'type' => $type,
                //    'chart' => $this->chart,
                // ]);
                break;
        }

        return $type;
    }

    /**
     * @return array<string, mixed>
     */
    public function getChartJsData(): array
    {
        $datasets = [];
        $data = $this->answers->toCollection()->pluck('value')->all();

        // if($this->chart->type != 'pieAvg'){
        // dddx($this->answers->toCollection());
        // }

        if (\in_array($this->chart->type, ['pieAvg', 'pie1'], false)) {
            $data = $this->answers->toCollection()->pluck('avg')->all();

            if (isset($this->chart->max)) {
                Assert::numeric($sum = collect($data)->sum());
                Assert::numeric($this->chart->max);
                $other = $this->chart->max - $sum;
                if ($other > 0.01) {
                    $data[] = $other;
                    $labels = [];
                    $labels[] = $this->chart->answer_value_no_txt ?? 'answer_value_no_txt';
                    /** @phpstan-ignore isset.offset */
                    if (\count($labels) === 2 && isset($labels[0]) && \is_string($labels[0]) && \strlen($labels[0]) < 3) {
                        $labels[0] = $this->chart->answer_value_txt;
                    }
                }
            }
        }

        if (isset($data[0]) && \is_array($data[0])) { // questionario multiplo
            // dddx([$this->chart, $this->answers]);
            $legends = array_keys($data[0]);
            foreach ($legends as $key => $legend) {
                $tmp = [
                    'label' => $legend,
                    'data' => array_column($data, $legend),
                    'borderColor' => $this->chart->getColorsRgba(0.5)[$key] ?? null,
                    'backgroundColor' => $this->chart->getColorsRgba(0.5)[$key] ?? null,
                ];
                $datasets[] = $tmp;
            }
        } else {
            $data = $this->answers->toCollection()->pluck('avg')->all();
            foreach ($data as $key => $item) {
                $data[$key] = number_format(SafeFloatCastAction::cast($item, 0.0), 2, '.', '');
            }

            if (isset($this->chart->max)) {
                Assert::numeric($sum = collect($data)->sum());
                Assert::numeric($this->chart->max);
                $other = $this->chart->max - $sum;
                if ($other > 0.01) {
                    $data[] = $other;
                    $labels = [];
                    $labels[] = $this->chart->answer_value_no_txt ?? 'answer_value_no_txt';
                    Assert::notNull($labels[0], '['.__FILE__.']['.__LINE__.']');
                    /** @phpstan-ignore isset.offset */
                    if (\count($labels) === 2 && isset($labels[0]) && \is_string($labels[0]) && \strlen($labels[0]) < 3) {
                        $labels[0] = $this->chart->answer_value_txt;
                    }
                }
            }
            /** @phpstan-ignore offsetAccess.nonOffsetAccessible */
            if (isset($this->answers->toCollection()->pluck('avg')[0]) && ! \is_string($this->answers->toCollection()->pluck('avg')[0])) {
                $label = 'Media';
            } else {
                $label = 'Percentuale';
            }

            $datasets = [
                [
                    // 'label' => ['Percentuale'],
                    'label' => [$label],
                    'data' => $data,
                    'data2' => $this->answers->toCollection()->pluck('value')->all(),
                    'borderColor' => $this->chart->getColorsRgba(0.5),
                    'backgroundColor' => $this->chart->getColorsRgba(0.5),
                ],
            ];
        }

        // dddx([
        //     'datasets' => $datasets,
        //     'labels' => $this->answers->toCollection()->pluck('label')->all(),
        // ]);

        return [
            'datasets' => $datasets,
            'labels' => $this->answers->toCollection()->pluck('label')->all(),
            // 'labels' => ['tasso'],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function getChartJsOptionsArray(): array
    {
        $title = [];

        if ($this->title !== 'no_set') {
            $title = [
                'display' => true,
                'text' => $this->title,
                'font' => [
                    'size' => 14,
                ],
            ];
        }

        if ($this->footer !== 'no_set') {
            $title = [
                'display' => true,
                'text' => $this->footer,
                'position' => 'bottom',
            ];
        }

        $options = [];
        $options['plugins'] = [
            'title' => $title,
        ];

        if ($this->chart->type === 'horizbar1') {
            $options['indexAxis'] = 'y';
        }

        $chartjs_type = $this->getChartJsType();
        $method = 'getChartJs'.Str::of($chartjs_type)->studly()->toString().'OptionsArray';
        /** @var array<string, mixed> */
        $options = $this->{$method}($options);

        return $options;
    }

    public function getChartJsBarOptionsJs(string $js): string
    {
        $indexAxis = 'x';
        $value = '';

        if ($this->chart->max === 100.0) {
            $value = ' %';
        }
        if ($this->chart->type === 'horizbar1') {
            $indexAxis = 'y';
            $value = ' %';
        }

        $title = '{}';

        $labels = '{}';
        $chartJsData = $this->getChartJsData();
        if (\is_array($chartJsData['datasets']) && \count($chartJsData['datasets']) === 1 && $this->chart->type !== 'horizbar1') {
            $labels = "{
                name: {
                    align: 'center',
                    formatter: function(value, ctx) {
                        return ctx.dataset.data2[ctx.dataIndex];
                    },
                    font: {
                        size: 13,
                    },
                    borderWidth: 2,
                    borderRadius: 4,
                    padding: 4
                },
                value: {
                    align: 'bottom',
                    font: {
                        size: 13
                    },
                    borderWidth: 2,
                    borderRadius: 4,
                    padding: 4
                }
            }";
        }

        $title = '{}';
        // dddx($this);
        if ($this->title !== 'no_set' && $this->chart->type === 'horizbar1') {
            $title = "{
                        display: true,
                        text: '".$this->title."',
                        font: {
                            size: 14
                        },
                    }";
        }

        if ($this->footer !== 'no_set') {
            $title = "{
                        display: true,
                        text: '".$this->footer."',
                        position: 'bottom',
                    }";
        }
        $tooltip = '{}';
        $chartJsData = $this->getChartJsData();
        if ($this->chart->type === 'bar2' && \is_array($chartJsData['datasets']) && \count($chartJsData['datasets']) === 1) {
            $tooltip = "{
                callbacks: {
                    label: function(context) {
                        // console.log(context);
                        let label = (context.dataset.label || '')  + ':' + (context.dataset.data[context.dataIndex]) || '';

                        if(context.dataset.data2[context.dataIndex] != ''){
                            label = label + '/' +' Rispondenti'  + ':' + (context.dataset.data2[context.dataIndex]) || '';
                        }
                        return label;
                    }
                }
            }";
        }

        $js .= <<<JS
            plugins: {
                title: $title
                ,datalabels:{
                    formatter: function(value, context) {
                        return value+'$value';
                    },
                    display: true,
                    backgroundColor: '#ccc',
                    borderRadius:3,
                    anchor: 'start',
                    font: {
                        color: 'red',
                        weight: 'bold',
                    },
                    labels: $labels
                },
                legend:{
                    display: false,
                },
                tooltip: $tooltip
            },

            indexAxis: '$indexAxis'
            JS;

        // if($this->chart->type === 'bar2'){
        // $js=<<<JS
        //     plugins: {
        //         datalabels:{
        //             display: true,
        //             backgroundColor: '#ccc',
        //             borderRadius:3,
        //             anchor: 'start',
        //             font: {
        //                 color: 'red',
        //                 weight: 'bold',
        //             },
        //             labels: {
        //                 name: {
        //                     align: 'center',
        //                     formatter: function(value, ctx) {
        //                         return ctx.dataset.data2[ctx.dataIndex];
        //                     },
        //                     borderColor: 'white',
        //                     borderWidth: 2,
        //                     borderRadius: 4,
        //                     padding: 4
        //                 },
        //                 value: {
        //                     align: 'bottom',
        //                     borderColor: 'white',
        //                     borderWidth: 2,
        //                     borderRadius: 4,
        //                     padding: 4
        //                 }
        //             }
        //         },
        //         legend:{
        //             display: false,
        //         },
        //     },
        //     indexAxis: '$indexAxis'
        //     JS;
        // }

        // $js .= <<<JS
        // tooltip: {
        //     callbacks: {
        //         label: function(context) {
        //             let label = context.dataset.label || '';

        //             return label + '!';
        //         }
        //     }
        // }
        //     JS;

        // $js .= <<<JS
        //     ,scales: {
        //             y: {
        //                 ticks: {
        //                     callback: (value) => '€' + value,
        //                 },
        //             },
        //         },

        //     JS;

        // prova divisione label in più righe

        // $js .= <<<JS
        //     ,scales: {
        //         x: {
        //             ticks: {
        //                 callback: function(value, context) {
        //                     console.log(context.labels);
        //                     var label = this.getLabelForValue(value);
        //                     var maxLength = 10; // Numero massimo di caratteri per riga
        //                     var words = label.split(' ');
        //                     var lines = [];
        //                     var currentLine = '';

        //                     words.forEach(function(word) {
        //                         if (currentLine.length + word.length + 1 <= maxLength) {
        //                             currentLine += (currentLine ? ' ' : '') + word;
        //                         } else {
        //                             lines.push(currentLine);
        //                             currentLine = word;
        //                         }
        //                     });

        //                     lines.push(currentLine); // Aggiungi l'ultima riga
        //                     return lines.join('AAA');
        //                 }
        //             },
        //         },
        //     },
        // JS;

        // dddx($js);
        return $js;
    }

    public function getChartJsDoughnutOptionsJs(string $js): string
    {
        $title = '{}';
        if ($this->title !== 'no_set') {
            $title = "{
                        display: true,
                        text: '".$this->title."',
                        font: {
                            size: 14
                        },
                    }";
        }
        $first_answer = $this->answers->first();
        $label = '--';
        if ($first_answer != null) {
            Assert::isInstanceOf($first_answer, AnswerData::class, '['.__LINE__.']['.__FILE__.']');
            /** @phpstan-ignore property.nonObject */
            $label = round((float) $this->answers->first()->avg, 2);
        }
        $js = <<<JS
            scales: {
                x:{
                    grid:{
                        display:false,
                    },
                    ticks:{
                        display:false,
                    }
                },
                y:{
                    grid:{
                        display:false,
                    },
                    ticks:{
                        display:false,
                    }
                }
            },
            plugins:{
                title: $title
                ,datalabels: false,
                doughnutLabel:{
                    label: '$label',
                }
            }
        JS;

        return $js;
    }

    /**
     * @param  array<string, mixed>  $options
     * @return array<string, mixed>
     */
    public function getChartJsBarOptionsArray(array $options): array
    {
        if (!isset($options['plugins'])) {
            $options['plugins'] = [];
        }
        Assert::isArray($options['plugins']);
        $options['plugins']['datalabels'] = [
            'display' => true,
            'backgroundColor' => '#ccc',
            'borderRadius' => 3,
            'anchor' => 'start',
            'font' => [
                'color' => 'red',
                'weight' => 'bold',
            ],
        ];
        $options['plugins']['legend'] = [
            'display' => false,
        ];

        return $options;
    }

    /**
     * @param  array<string, mixed>  $options
     * @return array<string, mixed>
     */
    public function getChartJsDoughnutOptionsArray(array $options): array
    {
        $options['scales'] = [
            'x' => [
                'grid' => [
                    'display' => false,
                ],
                'ticks' => [
                    'display' => false, // Questa opzione nasconde i numeri sull'asse X
                ],
            ],
            'y' => [
                'grid' => [
                    'display' => false,
                ],
                'ticks' => [
                    'display' => false, // Questa opzione nasconde i numeri sull'asse Y
                ],
            ],
        ];

        if (!isset($options['plugins'])) {
            $options['plugins'] = [];
        }
        Assert::isArray($options['plugins']);
        $options['plugins']['datalabels'] = [
            'display' => false,
        ];
        Assert::isInstanceOf($this->answers->first(), AnswerData::class, '['.__LINE__.']['.__FILE__.']');
        $options['plugins']['doughnutLabel'] = [
            'label' => round((float) $this->answers->first()->avg, 2),
        ];

        return $options;
    }

    public function getChartJsOptionsJs(): RawJs
    {
        $js = '';
        $chartjs_type = $this->getChartJsType();
        $method = 'getChartJs'.Str::of($chartjs_type)->studly()->toString().'OptionsJs';
        $js = $this->{$method}($js);

        // return '{'.$js.'}';

                    return RawJs::make('{
            '.(string)$js.'
            }');
    }

    /**
     * funzione deprecata, utilizzata nella dashboard precedente
     *
     * @return array<string, mixed>
     */
    public function getChartJsOptions(): array
    {
        $title = [];

        if ($this->title !== 'no_set') {
            $title = [
                'display' => true,
                'text' => $this->title,
                'font' => [
                    'size' => 14,
                ],
            ];
        }

        if ($this->footer !== 'no_set') {
            $title = [
                'display' => true,
                'text' => $this->footer,
                'position' => 'bottom',
            ];
        }

        $options = [];
        $options['plugins'] = [
            'title' => $title,
        ];

        if ($this->chart->type === 'horizbar1') {
            $options['indexAxis'] = 'y';
        }

        $chartjs_type = $this->getChartJsType();
        $method = 'getChartJs'.Str::of($chartjs_type)->studly()->toString().'OptionsArray';
        /** @var array<string, mixed> */
        $options = $this->{$method}($options);

        return $options;
    }
}
