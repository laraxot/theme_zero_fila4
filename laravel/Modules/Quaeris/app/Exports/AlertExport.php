<?php
declare(strict_types=1);
namespace Modules\Quaeris\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Quaeris\Actions\Xls\Get\AlertData;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;

class AlertExport implements FromCollection, WithHeadings
{
    use Exportable;

    public SurveyPdf $survey_pdf;
    public array $data = [];

    public function __construct(SurveyPdf $surveyPdf, AnswersFilterData $answersFilterData)
    {
        $this->data = app(AlertData::class)->execute($surveyPdf, $answersFilterData);
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return array_keys($this->data[0] ?? []);
    }
}
