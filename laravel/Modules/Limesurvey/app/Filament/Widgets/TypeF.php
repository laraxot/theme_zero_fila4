<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Cache;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Limesurvey\Filament\Widgets\ChartItemWidget;

class TypeF extends Widget
{
    public $surveyId;
    public $fieldName;
    public $questionId;
    public $title;
    public string $date_from;
    public string $date_to;
    protected static ?string $heading = '';

    protected string $view = 'limesurvey::filament.widgets.type-f';

    /**
     * Base della query con condizioni comuni.
     */
    protected function baseSurveyQuery()
    {
        $query = SurveyResponse::getResponsesForSurvey($this->surveyId)
            ->whereNotNull('submitdate')
            ->whereBetween('submitdate', [$this->date_from, $this->date_to])
            ;
        return $query;
    }

    /**
     * Ottiene il conteggio totale e la media globale (0-10) con una singola query.
     */
    protected function getTotalAndAverage()
    {
        return Cache::remember("survey_stats_{$this->surveyId}_{$this->date_from}_{$this->date_to}", now()->addMinutes(5), function () {
            $result = $this->baseSurveyQuery()
                ->selectRaw('
                    COUNT(' . $this->fieldName . ') AS total, 
                    ROUND(AVG(CASE WHEN ' . $this->fieldName . ' BETWEEN 0 AND 10 THEN ' . $this->fieldName . ' END), 2) AS overall_average
                ')
                ->first();
    
            return [
                'total' => $result->total ?? 0,
                'average' => $result->overall_average ?? 0,
            ];
        });
    }
    

    /**
     * Query aggregata per medie mensili o settimanali.
     */
    protected function getAggregateStats($groupByFormat, $groupByAlias)
    {
        return $this->baseSurveyQuery()
            ->selectRaw("
                DATE_FORMAT(submitdate, '{$groupByFormat}') AS {$groupByAlias},
                COUNT(CASE WHEN {$this->fieldName} BETWEEN 0 AND 10 THEN 1 END) AS response_count,
                ROUND(AVG(CASE WHEN {$this->fieldName} BETWEEN 0 AND 10 THEN {$this->fieldName} END), 2) AS average
            ")
            ->groupBy($groupByAlias)
            ->orderBy($groupByAlias, 'asc')
            ->get();
    }


    /**
     * Medie mensili limitate ai 3 risultati più recenti.
     */
    protected function getMonthlyStats()
    {
        return $this->getAggregateStats("%Y-%m", 'month')
            ->sortByDesc('month')  // Ordina per mese in ordine decrescente
            ->take(3)               // Prendi solo i primi 3 risultati
            ->sortBy('month');      // Riordina in ordine cronologico
    }

    /**
     * Medie settimanali limitate ai 3 risultati più recenti.
     */
    protected function getWeeklyStats()
    {
        return $this->getAggregateStats("%Y-%u", 'week_label')
            ->sortByDesc('week_label')  // Ordina per settimana in ordine decrescente
            ->take(3)                   // Prendi solo i primi 3 risultati
            ->sortBy('week_label');     // Riordina in ordine cronologico
    }

    /**
     * Genera i widget per i grafici.
     */
    public function getChartWidgets(): array
    {
        static::$heading = strip_tags($this->title);

        // Ottieni il conteggio totale e la media globale
        $globalStats = $this->getTotalAndAverage();
        $total = $globalStats['total'] ?? 0;
        $average = $globalStats['average'] ?? 0;

        // Ottieni le medie mensili
        $monthlyStats = $this->getMonthlyStats();
        $monthlyLabels = $monthlyStats->pluck('month')->toArray();
        $monthlyAverages = $monthlyStats->pluck('average')->toArray();
        $monthlyCounts = $monthlyStats->pluck('response_count')->toArray();

        // Ottieni le medie settimanali
        $weeklyStats = $this->getWeeklyStats();
        $weeklyLabels = $weeklyStats->pluck('week_label')->toArray();
        $weeklyAverages = $weeklyStats->pluck('average')->toArray();
        $weeklyCounts = $weeklyStats->pluck('response_count')->toArray();

        // dddx([$total, $average, $monthlyLabels, $monthlyAverages, $monthlyCounts, $weeklyLabels, $weeklyAverages, $weeklyCounts]);
        // dddx([$monthlyCounts, $weeklyCounts]);

        // Configurazione delle opzioni per il grafico a ciambella (doughnut)
        $doughnutOptions = <<<JS
            'plugins': {
                'legend': {
                    'display': true,
                    'position': 'bottom',
                    'labels': {
                        'font': {
                            'size': 13,
                            'color': '#666'
                        },
                        'padding': 10
                    }
                },
                'title': {
                    'display': true,
                    'text': 'Totale Rispondenti: {$total}',
                    'font': {
                        'size': 16,
                        'weight': 'bold',
                        'color': '#333'
                    },
                    'padding': {
                        'top': 10,
                        'bottom': 20
                    }
                },
                'doughnutLabel': { // Etichetta al centro della ciambella
                    'label': '{$average}',
                    'labels': [
                        {
                            'font': {
                                'color': '#333'
                            }
                        }
                    ]
                },
                'datalabels': {
                    formatter: function(value, context) {
                        return value;
                    },
                    'display': false,
                    'backgroundColor': '#ccc',
                    'borderRadius': 3,
                    'anchor': 'start',
                    'align': 'right',
                    'offset': -7,
                    'font': {
                        'size': 13,
                        'color': '#666',
                        'weight': 'bold'
                    }
                }
            },
            'scales': {
                'x': {
                    'display': false,
                },
                'y': {
                    'display': false,
                }
            }
        JS;

        // Configurazione delle opzioni per il grafico a barre
        $barOptions = <<<JS
            'plugins': {
                'legend': {
                    'display': false,
                },
                'datalabels': {
                    'display': true,
                    'backgroundColor': '#ccc',
                    'borderRadius': 3,
                    'anchor': 'start',
                    'align': 'start',
                    'font': {
                        'size': 13,
                        'color': '#666',
                        'weight': 'bold'
                    },
                    'labels': {
                        'name': {
                            'align': 'start',
                            'anchor': 'start',
                            'offset': -13,
                            'formatter': function(value, ctx) {
                                return ctx.dataset.data2[ctx.dataIndex];
                            },
                            'font': {
                                'size': 13,
                            },
                            'borderWidth': 2,
                            'borderRadius': 4,
                            'padding': 4
                        },
                        'value': {
                            'align': 'start',
                            'anchor': 'start',
                            'font': {
                                'size': 13
                            },
                            'borderWidth': 2,
                            'borderRadius': 4,
                            'padding': 4
                        }
                    }
                },
                'tooltip': {
                    'callbacks': {
                        label: function(context) {
                            // console.log(context);
                            let label = (context.dataset.label || '')  + ':' + (context.dataset.data[context.dataIndex]) || '';

                            if(context.dataset.data2[context.dataIndex] != ''){
                                label = label + '/' +' Rispondenti'  + ':' + (context.dataset.data2[context.dataIndex]) || '';
                            }
                            return label;
                        }
                    }
                }
            },
            'scales': {
                'y': {
                    'beginAtZero': true
                }
            }
        JS;

        return [
            // Grafico a ciambella (doughnut)
            [
                'class' => ChartItemWidget::class,
                'properties' => [
                    'type' => 'doughnut',
                    'chartTitle' => '',
                    'chartData' => [
                        'labels' => ["Media"], 
                        'datasets' => [
                            [
                                'data' => [$average, 10 - $average],
                                'backgroundColor' => ["#ccc", "#FFFFFF"],
                            ]
                        ]
                    ],
                    'chartOptions' => $doughnutOptions,
                ]
            ],
            // Primo grafico a barre (mensile)
            [
                'class' => ChartItemWidget::class,
                'properties' => [
                    'type' => 'bar',
                    'chartTitle' => '',
                    'chartData' => [
                        'labels' => $monthlyLabels,
                        'datasets' => [
                            [
                                'label' => "Media Mensile",
                                'data' => $monthlyAverages,
                                'data2' => $monthlyCounts, // Aggiunto il numero di rispondenti
                                'backgroundColor' => ["#36A2EB", "#36A2EB", "#36A2EB"],
                            ]
                        ]
                    ],
                    'chartOptions' => $barOptions,
                ]
            ],
            // Secondo grafico a barre (settimanale)
            [
                'class' => ChartItemWidget::class,
                'properties' => [
                    'type' => 'bar',
                    'chartTitle' => '',
                    'chartData' => [
                        'labels' => $weeklyLabels,
                        'datasets' => [
                            [
                                'label' => "Media Settimanale",
                                'data' => $weeklyAverages,
                                'data2' => $weeklyCounts, // Aggiunto il numero di rispondenti
                                'backgroundColor' => ["#36A2EB", "#36A2EB", "#36A2EB"],
                            ]
                        ]
                    ],
                    'chartOptions' => $barOptions,
                ]
            ]
        ];
    }
}
