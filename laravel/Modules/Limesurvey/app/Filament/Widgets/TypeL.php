<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Modules\Quaeris\Services\TrendX;
use Modules\Limesurvey\Models\SurveyResponse;

class TypeL extends ChartWidget
{
    public string $surveyId;
    public string $fieldName;
    public string $questionId;
    public string $title;
    public string $date_from;
    public string $date_to;
    public int $totalResponses;

    protected function getType(): string
    {
        static::$heading = strip_tags($this->title);
        return 'bar';
    }

    protected function getData(): array
    {
        static::$heading = strip_tags($this->title);
    
        // Recupera i dati
        $select = [];
        $select[] = DB::raw("{$this->fieldName} as value");
    
        $query = SurveyResponse::getResponsesForSurvey($this->surveyId)
            ->withAnswersLabel($this->questionId, $this->fieldName, '', 'join')
            ->addSelect($select)
            ->whereNotNull($this->fieldName)
            ->whereNotNull('submitdate');


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
            ->count($this->fieldName)
            ->sortByDesc('aggregate'); // Ordinamento sulla collection
    
        // Calcola il totale delle risposte
        $totalResponses = $res->sum('aggregate');
        $this->totalResponses = $totalResponses;

        // Calcola le percentuali
        $percentages = $res->map(function ($item) use ($totalResponses) {
            $item->aggregate = $totalResponses > 0
                ? round(($item->aggregate / $totalResponses) * 100, 2)
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
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Percentuale',
                    'data' => $percentages->pluck('aggregate')->toArray(),
                    'backgroundColor' => $colors,
                    'borderRadius' => 5,
                ],
            ],
        ];
    }
    

    // protected function getOptions(): array
    // {
    //     return [
    //         'indexAxis' => 'y',
    //         'plugins' => [
    //             'legend' => [
    //                 'display' => false,
    //             ],
    //             'datalabels' => [
    //                 // 'formatter' => RawJs::make("
    //                 //     function(value, context) {
    //                 //         return value + ' %';
    //                 //     }
    //                 // "),
    //                 'display' => true,
    //                 'backgroundColor' => '#ccc',
    //                 'borderRadius' => 3,
    //                 'anchor' => 'start',
    //                 'align' => 'right',
    //                 'offset' => -5,
    //                 'font' => [
    //                     'size' => 13,
    //                     'color' => '#666',
    //                     'weight' => 'bold', // Spessore del carattere (grassetto)
    //                 ],
    //             ],
    //         ],
    //     ];
    // }

    protected function getOptions(): RawJs
    {
        // $labels = json_encode($this->getData()['labels']);

        $js = <<<JS
                'indexAxis' : 'y',
                'layout' : {
                    'padding' : {
                        'right' : 50,
                        'left' : 0
                    },
                },
                'plugins' : {
                    'legend' : {
                        'display' : false,
                    },
                    'title' : {
                        'display' : true,
                        'text' : 'Totale Rispondenti {$this->totalResponses}',
                        'font': {
                            'size': 16,
                            'weight': 'bold',
                            'color': '#333'
                        },
                        'padding' : {
                            'top' : 10,
                            'bottom' : 20
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
}
