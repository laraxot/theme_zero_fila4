<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Widgets;

use Webmozart\Assert\Assert;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Modules\Quaeris\Services\TrendX;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Limesurvey\Models\LimeQuestionL10n;

class TypeM extends ChartWidget
{
    public $surveyId;
    public $fieldName;
    public $questionId;
    public $title;
    protected ?string $heading = 'Risposte a Risposta Singola';

    protected function getType(): string
    {
        // Il tipo di grafico, in questo caso "pie" (torta)
        return 'pie';
    }

    protected function getData(): array
    {
        static::$heading = strip_tags($this->title);
        // Recupera le risposte dal sondaggio specifico

        $question_sons = LimeQuestion::where('parent_qid', $this->questionId)->with('l10n')->get();
        // dddx([$question_sons, $question_sons->first()->field_name]);
        $select = [];

        foreach ($question_sons as $k => $son) {
            $field_name = $son->field_name;

            // Verifica che $son->l10n sia un'istanza valida
            Assert::isInstanceOf($son->l10n, LimeQuestionL10n::class);

            // Aggiunge il campo al SELECT
            $select[] = "$field_name";

            // Aggiunge l'etichetta della domanda l10n->question come alias
            $select[] = "'{$son->l10n->question}' AS label_$k";

            // Esempio aggiuntivo: puoi mantenere i conteggi condizionali, se necessario
            $select[] = "COUNT(NULLIF($field_name, '')) AS value_$k";
            // $select[] = "COUNT(NULLIF($field_name, '')) * 100 / $tot AS avg_$k";
        }





        // $select[] = DB::raw("{$this->fieldName} as value");
        // $select[] = DB::raw("count({$this->fieldName}) as count");
        // $select[] = DB::raw('answer as value_lang');

        // Supponiamo che le opzioni siano memorizzate con posizioni: answer_<qid>_<rank>
        $query = SurveyResponse::getResponsesForSurvey($this->surveyId)
            // ->withAnswersLabel($this->questionId, $this->fieldName)
            ->select($select)
            // ->whereNotNull($this->fieldName)
            ->whereNotNull('submitdate')

        ;

        dddx([$query->toSql(), $query->get(), $select]);

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
            'labels' => $res->pluck('value')->toArray(),
            'datasets' => [
                [
                    'label' => 'Posizione Media',
                    'data' => $res->pluck('count')->toArray(),
                ],
            ],
        ];
    }
}
