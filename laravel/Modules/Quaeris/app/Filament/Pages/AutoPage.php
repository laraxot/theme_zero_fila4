<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Modules\Quaeris\Models\SurveyPdf;
use Modules\Limesurvey\Models\LimeQuestion;
use Filament\Pages\Dashboard as BaseDashboard;
use Modules\Quaeris\Datas\DashboardFilterData;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AutoPage extends BaseDashboard
{
    use HasFiltersForm;

    public string $url = '#';
    public DashboardFilterData $filters_data;

    protected static ?string $title = 'Auto';
    protected static string $routePath = 'auto';

    protected static ?int $navigationSort = 300;

    public static function shouldRegisterNavigation(): bool
    {
        $user = Auth::user();

        // Controlla se l'utente è superadmin
        if (!Gate::allows('superadmin', $user)) {
            return false;
        }

        return true;
    }

    public function mount(): void
    {
        $user = Auth::user();

        // Controlla se l'utente è superadmin
        if (!Gate::allows('superadmin', $user)) {
            throw new HttpException(403, 'Forbidden');
        }

        $this->url = request()->fullUrl();
        $filters = DashboardFilterData::fromArray($this->filters ?? []);

        $this->filters = Arr::except($filters->toArray(), ['survey_pdf_opts']);
        $this->filters_data = $filters;
    }

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components(
                [
                    Section::make()->schema(
                        $this->filters_data->getFiltersFormArray()
                    )->columns(4),
                ]
            );
    }

    public function refreshPage(): void
    {
        if ($this->filters === null) {
            return;
        }

        $params = [
            'filters' => $this->filters,
        ];

        $url = self::getUrl($params);
        $url = urldecode((string) $url);
        $this->reloadPage($url);
    }

    /**
     * Undocumented function
     *
     * @return Redirector|RedirectResponse
     */
    public function reloadPage(string $url)
    {
        return redirect($url);
    }

    public function getWidgets(): array
    {
        $survey_pdf_id = Arr::get($this->filters ?? [], 'survey_pdf_id', null);

        $survey_pdf = SurveyPdf::firstWhere(['id' => $survey_pdf_id]);

        Assert::notNull($survey_pdf);
        Assert::notNull($survey_pdf->survey_id);
        $widgets = [];

        $surveyId = $survey_pdf->survey_id;

        $questions = LimeQuestion::where('sid', $survey_pdf->survey_id)
            ->where('parent_qid', 0)
            // ->where('qid', 48264) // Filtro per qid specifico
            ->whereNotIn('type', ['X', 'T'])
            ->get()
            ->sortBy(function ($item) {
                Assert::notNull($item->group, '[' . __LINE__ . '][' . class_basename(self::class) . ']');
                return $item->group->group_order * 1000 + $item->question_order;
            })
            ->take(1)
            ;

        foreach ($questions as $k => $question) {
            Assert::notNull($question->l10n);
            $data = [
                'title' => '[' . $k . '][' . $question->type . '][' . $question->field_name . ']' . $question->l10n->question,
                'surveyId' => $surveyId,
                'questionId' => $question->qid,
                'fieldName' => $question->field_name,
                'date_from' => $this->filters_data->startDate,
                'date_to' => $this->filters_data->endDate,
            ];

            // if ($question->qid == 48243) {
            //     // Usa la funzione containsSiNo
            //     $result = $this->containsSiNo($question);
            //     dddx($result);
            // }

            $type = $question->type;

            if ($type === '!') {
                $type = 'ExclamationPoint';
            }
            $chart = '\Modules\Limesurvey\Filament\Widgets\Type' . $type;

            // // Verifica se il chart è diverso sia da TypeL che da TypeExclamationPoint
            // if ($chart !== '\Modules\Limesurvey\Filament\Widgets\TypeL' &&
            //     $chart !== '\Modules\Limesurvey\Filament\Widgets\TypeExclamationPoint') {
            //     dddx([
            //         'message' => 'Chart diverso da TypeL e TypeExclamationPoint',
            //         'chart' => $chart,
            //         'type' => $type,
            //         'question' => $question
            //     ]);
            // }

            $widgets[] = $chart::make($data);
        }

        return $widgets;
    }

    /**
     * Analizza una domanda LimeQuestion per verificare se contiene risposte "Si" o "No".
     * La funzione cerca nelle traduzioni italiane delle risposte e conta quante contengono "Si" o "No".
     *
     * @param LimeQuestion $question La domanda da analizzare
     * @return array Ritorna un array contenente:
     *               - execution_time: tempo di esecuzione in secondi
     *               - translated_question: la domanda tradotta in italiano
     *               - total_answers: numero totale di risposte
     *               - contains_si_no: numero di risposte contenenti "Si" o "No"
     */
    public function containsSiNo(LimeQuestion $question): array
    {
        $startTime = microtime(true);

        // Recupera i risultati utilizzando il modello LimeQuestion e le relazioni
        $result = $question
            ->with(['answers.l10n' => function ($query) {
                $query->where('language', 'it') // Filtra per lingua italiana
                      ->where(function ($q) {
                          $q->where('answer', 'LIKE', '%Si%') // Cerca "Si"
                            ->orWhere('answer', 'LIKE', '%No%'); // Cerca "No"
                      });
            }, 'l10n']) // Carica la traduzione della domanda
            ->first();

        // Calcolo del totale delle risposte
        $totalAnswers = $result->answers->count();

        // Controllo se ci sono traduzioni contenenti "Si" o "No"
        $containsSiNo = $result->answers->flatMap(function ($answer) {
            return $answer->l10n ? [$answer->l10n] : [];
        })->filter(function ($translation) {
            return stripos($translation->answer, 'Si') !== false || stripos($translation->answer, 'No') !== false;
        })->count();

        // Ottieni la traduzione della domanda
        $translatedQuestion = strip_tags(optional($result->l10n)->question);

        $endTime = microtime(true);
        $executionTime = round($endTime - $startTime, 4);

        // Ritorna i risultati come array
        return [
            'execution_time' => $executionTime . ' secondi',
            'translated_question' => $translatedQuestion ?: 'Nessuna traduzione',
            'total_answers' => $totalAnswers,
            'contains_si_no' => $containsSiNo,
            'qid' => $question->qid,
        ];
    }
}
