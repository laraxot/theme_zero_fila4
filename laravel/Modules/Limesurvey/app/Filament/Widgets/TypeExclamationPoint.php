<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Modules\Quaeris\Services\TrendX;
use Modules\Limesurvey\Models\SurveyResponse;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class TypeExclamationPoint extends ChartWidget
{
    use InteractsWithPageFilters;

    public $surveyId;
    public $fieldName;
    public $questionId;
    public $title;
    protected ?string $heading = '';
    public string$totalResponses;

    protected function getType(): string
    {
        // Il tipo di grafico, in questo caso "pie" (torta)
        return 'bar';
    }

    protected function getData(): array
    {
        static::$heading = strip_tags($this->title);

        // Recupera le risposte dal sondaggio specifico
        $select = [];
        $select[] = DB::raw("{$this->fieldName} as value");
        $select[] = DB::raw("count({$this->fieldName}) as count");
        $select[] = DB::raw('answer as value_lang');

        // Supponiamo che le opzioni siano memorizzate con posizioni: answer_<qid>_<rank>
        $query = SurveyResponse::getResponsesForSurvey($this->surveyId)
            ->withAnswersLabel($this->questionId, $this->fieldName)
            ->select($select)
            ->whereNotNull($this->fieldName)
            ->whereNotNull('submitdate')
            // ->where('submitdate', '>=', $this->filters['startDate'])
            // ->where('submitdate', '<=', $this->filters['endDate'])
        ;

        if (!empty($this->date_from) && !empty($this->date_to)) {
            // Se entrambe le date sono presenti
            $query->whereBetween('submitdate', [$this->date_from, $this->date_to]);
        } elseif (!empty($this->date_from)) {
            // Se solo la data di inizio è presente
            $query->where('submitdate', '>=', $this->date_from);
        } elseif (!empty($this->date_to)) {
            // Se solo la data di fine è presente
            $query->where('submitdate', '<=', $this->date_to);
        }



        $res = TrendX::query($query)
            ->dateColumn('submitdate')
            ->between(
                start: now()->startOfYear()->subYears(15),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->groupBy($this->fieldName)
            ->orderBy('value')
            //->average($this->fieldName);
            ->count($this->fieldName)
            ->sortByDesc('aggregate'); // Ordinamento sulla collection

        $this->totalResponses = $res->sum('aggregate');

        // Calcola le percentuali
        $percentages = $res->map(function ($item) {
            $item->aggregate = $this->totalResponses > 0
                ? round(($item->aggregate / $this->totalResponses) * 100, 2)
                : 0;
            return $item;
        });

        $labels = $percentages->pluck('answer')->toArray();
        $numElements = count($labels);
        $colors = [];

        for ($i = 0; $i < $numElements; $i++) {
            $colors[] = $i % 2 === 0 ? '#FFBABA' : '#C9FFBA';
        }

        return [
            //'labels' => $res->pluck('date')->toArray(),
            'labels' => $res->pluck('value_lang')->toArray(),
            'datasets' => [
                [
                    // 'label' => 'Posizione Media',
                    // 'data' => $res->pluck('count')->toArray(),
                    'label' => 'Percentuale',
                    'data' => $percentages->pluck('aggregate')->toArray(),
                    'backgroundColor' => $colors,
                    'borderRadius' => 5,
                ],
            ],
        ];
    }

    protected function getOptions(): RawJs
    {
        $js = <<<JS
                'indexAxis' : 'y',
                'plugins' : {
                    'legend' : {
                        'display' : false,
                    },
                    'title': {
                        'display': true,
                        'text': 'Totale Rispondenti {$this->totalResponses}',
                        'font': {
                            'size': 16,
                            'weight': 'bold'
                        },
                        'color': '#333', // Colore del testo
                        'padding': {
                            'top': 10,
                            'bottom': 20
                        }
                    },
                    'datalabels' : {
                        formatter : function(value, context) {
                            return value + ' %';
                        },
                        'display' : true,
                        'backgroundColor' : '#ccc',
                        'borderRadius' : 3,
                        'anchor' : 'start',
                        'align' : 'right',
                        'offset' : -7,
                        'font' : {
                            'size' : 13,
                            'color' : '#666',
                            'weight' : 'bold', // Spessore del carattere (grassetto)
                        },
                    },
                },
            JS;

        return RawJs::make('{
            '.$js.'
            }');
    }

    // protected function getOptions(): array
    // {
    //     return [
    //         'indexAxis' => 'y',
    //         'plugins' => [
    //             'legend' => [
    //                 'display' => false,
    //             ],
    //         ],
    //     ];
    // }
}
