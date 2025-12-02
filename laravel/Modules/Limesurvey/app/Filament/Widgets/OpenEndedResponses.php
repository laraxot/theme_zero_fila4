<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Filament\Widgets\Widget;
use Modules\Limesurvey\Models\SurveyResponse;

class OpenEndedResponses extends Widget
{
    public $surveyId;
    public $questionId;
    protected static ?string $heading = 'Risposte Aperte';

    public function __construct($surveyId, $questionId)
    {
        $this->surveyId = $surveyId;
        $this->questionId = $questionId;
    }

    protected function getViewData(): array
    {
        // Recupera le risposte dal sondaggio specifico
        $responses = SurveyResponse::getResponsesForSurvey($this->surveyId)
            ->select("answer_{$this->questionId} as answer")
            ->get();

        return [
            'responses' => $responses->pluck('answer')->toArray(),
        ];
    }

    /*
    public function render()
    {
        return view('limesurvey::filament.widgets.open-ended-responses', $this->getViewData());
    }
        */
}
