<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Quaeris\Services\TrendX;

class RankingChart extends ChartWidget
{
    public $surveyId;
    public $fieldName;
    public $questionId;
    protected ?string $heading = 'Risposte di Classifica (Ranking)';

    protected function getType(): string
    {
        // Il tipo di grafico, in questo caso un grafico a barre orizzontali
        return 'bar';
    }

    protected function getData(): array
    {
        //$this->surveyId = '39275'; //gaia weekly
        //$this->fieldName = '39275X39X465';
        //$this->questionId = '465';
        //$this->fieldName = '39275X40X475SQ001';
        //$this->questionId = '477';

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
        //*
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
        //*/
        //$res = $query->groupBy("{$this->fieldName}")->get();

        /*
        dddx([
        'surveyId' => $this->surveyId,
        'fieldName' => $this->fieldName,
        'responses' => $responses->take(5),
        ]);
        //*/
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
