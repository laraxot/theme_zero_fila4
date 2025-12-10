<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Modules\Limesurvey\Models\SurveyResponse;

class MultipleChoiceChart extends ChartWidget
{
    public $surveyId;
    public $questionId;
    protected ?string $heading = 'Risposte a Scelta Multipla';

    // Imposta surveyId e questionId durante la creazione del widget
    public function __construct($surveyId, $questionId)
    {
        $this->surveyId = $surveyId;
        $this->questionId = $questionId;
    }

    protected function getType(): string
    {
        // Il tipo di grafico, in questo caso "bar"
        return 'bar';
    }

    // Funzione che recupera i dati per il grafico
    protected function getChartData(): array
    {
        // Recupera le risposte dal sondaggio specifico
        $responses = SurveyResponse::getResponsesForSurvey($this->surveyId)
            ->select(DB::raw('COUNT(*) as count'), DB::raw("answer_{$this->questionId} as answer"))
            ->groupBy("answer_{$this->questionId}")
            ->get();

        return [
            'labels' => $responses->pluck('answer')->toArray(),
            'datasets' => [
                [
                    'label' => 'Numero di risposte',
                    'data' => $responses->pluck('count')->toArray(),
                ],
            ],
        ];
    }
}
