<?php

declare(strict_types=1);

namespace Modules\Quaeris\Exports;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Quaeris\Actions\Question\GetValue;
use Modules\Quaeris\Actions\Xls\Get\GetQuestionsFromSurveyId;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use function Safe\ini_set;
use Webmozart\Assert\Assert;

class AnswersCompleteExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    public SurveyPdf $survey_pdf;

    public EloquentCollection $data;

    /**
     * @var Collection<int,LimeQuestion>
     */
    public Collection $questions;

    public function __construct(SurveyPdf $surveyPdf, AnswersFilterData $answersFilterData)
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', '-1');

        Assert::notNull($surveyPdf->survey_id, '['.__FILE__.']['.__LINE__.']');
        $this->questions = app(GetQuestionsFromSurveyId::class)->execute((int) $surveyPdf->survey_id);

        $this->data = $surveyPdf->answers()
            ->ofFilterData($answersFilterData)
            ->join('lime_tokens_'.$surveyPdf->survey_id, 'lime_survey_'.$surveyPdf->survey_id.'.token', '=', 'lime_tokens_'.$surveyPdf->survey_id.'.token')
            ->select('lime_tokens_'.$surveyPdf->survey_id.'.email', 'lime_tokens_'.$surveyPdf->survey_id.'.attribute_3', 'lime_survey_'.$surveyPdf->survey_id.'.*')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // /** @var callable */
        // $callback = fn ($value, $key): bool|int|string|array|null => $this->getValue(value: $value, field_name: $key, row: $row);

        return $this->data->map(
            fn ($row) => collect($row)
                ->map(fn ($value, $key): bool|int|string|array|null => $this->getValue(value: $value, field_name: $key, row: $row))
        );
    }

    public function getValue(array|bool|int|string|null $value, string $field_name, LimeSurveyXXXContract $row): array|bool|int|string|null
    {
        return app(GetValue::class)->execute($this->questions, $value, $field_name, $row);
    }

    public function headings(): array
    {
        // $data = $this->data->first()->toArray() === null ? [] : $this->data->first()->toArray();
        $data = $this->data->first() === null ? [] : $this->data->first()->toArray();
        Assert::notNull($data, '['.__FILE__.']['.__LINE__.']');
        // Assert::notNull($this->data->first(), '['.__FILE__.']['.__LINE__.']');

        $heads = array_keys((array) $data);

        return collect($heads)->map(
            function ($field_name): int|string {
                /**
                 * @var LimeQuestion|null
                 */
                $question = $this->questions->firstWhere('field_name', $field_name);
                if ($question === null) {
                    return $field_name;
                }

                return strip_tags((string) $question->getFullTitle());
            }
        )->toArray();
    }
}
