<?php

declare(strict_types=1);

namespace Modules\Quaeris\Exports;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Quaeris\Actions\Question\GetValue;
use Modules\Quaeris\Actions\Xls\Get\GetQuestionsFromSurveyId;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use function Safe\ini_set;
use Webmozart\Assert\Assert;

class AlertUser2Export implements FromCollection, WithEvents, WithHeadings
{
    use Exportable;

    public EloquentCollection $data;

    /**
     * @var Collection<int,LimeQuestion>
     */
    public Collection $questions;

    public array $result = [];

    public array $groups = [];

    public array $cells = [];

    public function __construct(public SurveyPdf $surveyPdf, AnswersFilterData $answersFilterData)
    {
        // ini_set('memory_limit', '8095M');
        ini_set('max_execution_time', '-1');
        ini_set('memory_limit', '-1');

        Assert::notNull($surveyPdf->survey_id, '['.__FILE__.']['.__LINE__.']');

        $this->questions = app(GetQuestionsFromSurveyId::class)->execute((int) $surveyPdf->survey_id);

        $this->data = $surveyPdf->answers()
            ->ofFilterData($answersFilterData)
            ->join('lime_tokens_'.$surveyPdf->survey_id, 'lime_survey_'.$surveyPdf->survey_id.'.token', '=', 'lime_tokens_'.$surveyPdf->survey_id.'.token')
            ->get();
        /*
        LimeGroup::where('sid', $surveyPdf->survey_id)
            ->with('labels')
            ->get()
            ->map(function ($group): void {
                Assert::notNull($group->labels, '['.__FILE__.']['.__LINE__.']');
                $this->groups[$group->gid] = $group->labels->group_name;
            });
        */

        $this->prepareData();
    }

    public function prepareData(): void
    {
        $questionsMap = $this->questions->keyBy('field_name');
        // dddx($questionsMap);

        // /** @var callable */
        $callback = fn ($row) => collect($row)->map(
            // function ($value, $key) use ($row): void {
            function ($value, $key) use ($row, $questionsMap): void {
                // Assert::isInstanceOf($row, Contact::class); // Expected an instance of Modules\Quaeris\Models\Contact. Got: Modules\Limesurvey\Models\LimeSurveyXXXXXX
                if (Str::contains($key, (string) $this->surveyPdf->survey_id)) {
                    $value = $this->getValue(value: $value, field_name: $key, row: $row);
                    // Assert::notNull($question = $this->questions->firstWhere('field_name', $key), '['.__FILE__.']['.__LINE__.']');
                    Assert::notNull($question = $questionsMap[$key], '['.__FILE__.']['.__LINE__.']');
                    Assert::isInstanceOf($question, LimeQuestion::class);

                    $full_type = $question->getFullType();

                    if (\in_array($full_type, ['B', 'F', '!', 'FT', 'FF', 'BT'], false) && (is_numeric($value) && $value < 6)) {
                        $feedback = $question->getFeedback($row);

                        $r = $row->getAttributes();
                        // dddx($r);
                        $this->result[] = [
                            'email' => $r['email'],
                            'mobile phone' => $r['attribute_3'],
                            'tramite' => $r['attribute_2'],
                            //'gruppo' => strip_tags((string) $this->groups[$question->gid]),
                            'gruppo' => $question->getGroupName(),
                            'domanda' => strip_tags((string) $question->getFullTitle()),
                            'voto' => $value,
                            'feedback' => $feedback ?? '',
                            'submit at' => $r['submitdate'],
                            'token' => $r['token'],
                        ];
                    }
                }
                // return $this->getValue(value: $value, field_name: $key);
            }
        );

        // $this->data = $this->data->take(10);
        $this->data->map($callback);
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return collect($this->result);
    }

    public function getValue(array|bool|int|string|null $value, string $field_name, LimeSurveyXXXContract $row): array|bool|int|string|null
    {
        return app(GetValue::class)->execute($this->questions, $value, $field_name, $row);
    }

    public function headings(): array
    {
        return array_keys($this->result[0]);
    }

    public function registerEvents(): array
    {
        $index = 2;
        $cells = [];
        $colored_flag = true;
        foreach (collect($this->result)->groupBy('token') as $group_token) {
            $colored_flag = ! $colored_flag;
            $old_index = $index;
            $index += $group_token->count();
            if ($colored_flag) {
                $tmp_index = $index - 1;
                $cells[] = 'A'.$old_index.':ZZ'.$tmp_index;
                // dddx([
                //     '$colored_flag' => $colored_flag,
                //     '$group_token' => $group_token,
                //     'group count' => $group_token->count(),
                //     'old index' => $old_index,
                //     'index' => $index,
                //     'cells' => $cells
                // ]);
            }
        }
        $this->cells = $cells;

        // dddx($this->cells);
        return [
            AfterSheet::class => function (AfterSheet $event): void {
                foreach ($this->cells as $cell) {
                    // dddx($cell);
                    $event->sheet->getDelegate()->getStyle($cell)
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('DFDFDF');

                    // $event->sheet->getDelegate()->getStyle('A5:D6')
                    //     ->getFill()
                    //     ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    //     ->getStartColor()
                    //     ->setARGB('DD4B39');
                }
            },
            // AfterSheet::class => function(AfterSheet $event) {

            //     $event->sheet->getDelegate()->getStyle('A5:D6')
            //             ->getFill()
            //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            //             ->getStartColor()
            //             ->setARGB('DD4B39');

            // },
        ];
    }
}
