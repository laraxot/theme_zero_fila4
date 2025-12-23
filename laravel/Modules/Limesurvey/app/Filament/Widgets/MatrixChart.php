<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Modules\Limesurvey\Models\SurveyResponse;

class MatrixChart extends ChartWidget
{
    public $surveyId;
    public $questionId;
    public $subQuestions; // Lista delle sotto-domande (righe della matrice)
    protected ?string $heading = 'Risposte a Domande a Matrice';

    public function __construct($surveyId, $questionId, $subQuestions)
    {
        $this->surveyId = $surveyId;
        $this->questionId = $questionId;
        $this->subQuestions = $subQuestions;
    }

    protected function getType(): string
    {
        // Il tipo di grafico, in questo caso "bar" (impilate)
        return 'bar';
    }

    protected function getChartData(): array
    {
        // Esempio di risposte per una matrice
        $datasets = [];
        $labels = ['Fortemente in disaccordo', 'In disaccordo', 'Neutrale', 'D’accordo', 'Fortemente d’accordo'];

        foreach ($this->subQuestions as $subQuestion) {
            // Recupera le risposte per ogni sotto-domanda della matrice
            $responses = SurveyResponse::getResponsesForSurvey($this->surveyId)
                ->select(DB::raw('COUNT(*) as count'), DB::raw("answer_{$this->questionId}_{$subQuestion['code']} as answer"))
                ->groupBy("answer_{$this->questionId}_{$subQuestion['code']}")
                ->get();

            $datasets[] = [
                'label' => $subQuestion['text'],
                'data' => $responses->pluck('count')->toArray(),
            ];
        }

        return [
            'labels' => $labels,
            'datasets' => $datasets,
        ];
    }
}
