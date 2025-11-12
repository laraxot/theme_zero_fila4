<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Quaeris\Services\TrendX;

class SingleChoiceChart extends ChartWidget
{
    public $surveyId;
    public $fieldName;
    public $questionId;
    protected ?string $heading = 'Risposte a Risposta Singola';

    protected function getType(): string
    {
        // Il tipo di grafico, in questo caso "pie" (torta)
        return 'bar';
    }

    protected function getData(): array
    {
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
        ;
        $res = TrendX::query($query)
            ->dateColumn('submitdate')
            ->between(
                start: now()->startOfYear()->subYears(15),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->groupBy($this->fieldName)
            ->orderBy('value_lang')
            //->average($this->fieldName);
            ->count($this->fieldName);

        return [
            //'labels' => $res->pluck('date')->toArray(),
            'labels' => $res->pluck('value_lang')->toArray(),
            'datasets' => [
                [
                    'label' => 'Posizione Media',
                    'data' => $res->pluck('count')->toArray(),
                ],
            ],
        ];
    }
}
