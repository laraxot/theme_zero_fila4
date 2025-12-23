<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Quaeris\Services\TrendX;

class TypeS extends ChartWidget
{
    //protected static ?string $heading = 'Risposte a Risposta Singola';
    public $surveyId;
    public $fieldName;
    public $questionId;
    public $title;

    protected function getType(): string
    {
        static::$heading = strip_tags($this->title);
        // Il tipo di grafico, in questo caso "pie" (torta)
        return 'bar';
    }

    protected function getData(): array
    {
        static::$heading = strip_tags($this->title);
        // Recupera le risposte dal sondaggio specifico
        $select = [];
        $select[] = DB::raw("{$this->fieldName} as value");
        //$select[] = DB::raw("count({$this->fieldName}) as count");
        //$select[] = DB::raw('lang as value_lang');

        // Supponiamo che le opzioni siano memorizzate con posizioni: answer_<qid>_<rank>
        $query = SurveyResponse::getResponsesForSurvey($this->surveyId)
            ->withAnswersLabel($this->questionId, $this->fieldName.'', '', 'subquery')
            ->addSelect($select)
            //->select($select)
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
            ->orderBy('value')
            //->average($this->fieldName);
            ->count($this->fieldName);

        return [
            //'labels' => $res->pluck('date')->toArray(),
            'labels' => $res->pluck('value_lang')->toArray(),
            'datasets' => [
                [
                    'label' => 'Posizione Media',
                    'data' => $res->pluck('aggregate')->toArray(),
                ],
            ],
        ];
    }
}
