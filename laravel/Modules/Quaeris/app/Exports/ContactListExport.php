<?php
declare(strict_types=1);
namespace Modules\Quaeris\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\Contact;
use Modules\Quaeris\Models\SurveyPdf;

class ContactListExport implements FromCollection, WithHeadings
{
    use Exportable;

    // public SurveyPdf $survey_pdf;
    public array $data = [];

    public function __construct(SurveyPdf $surveyPdf, AnswersFilterData $answersFilterData)
    {
        // $this->data = app(AlertData::class)->execute($surveyPdf, $data);
        // $this->surveyPdf = $surveyPdf;
        // $this->data = $this->getContactsGropedBySurveyPdfId();
        // $this->data = $surveyPdf->contacts->take(5)
        //     ->map(function ($item) {
        //         // dddx($item->toArray()['email']);
        //         return ['email' => $item->toArray()['email']];
        //     })
        //     ->all();

        // dddx($data);

        $date_start = $answersFilterData->date_from;
        $date_end = $answersFilterData->date_to;

        $answersFilterData = DB::table('contacts')
            ->where('survey_pdf_id', $surveyPdf->id);
        // ->get()
        // ->map(function ($item) {
        //     return [
        //         'email' => $item->email,
        //         'mobile_phone' => $item->mobile_phone,
        //         'duplicate_count' => $item->duplicate_count,
        //         'created_at' => $item->created_at
        //     ];
        // })
        // ->all();

        // $answersFilterData = $answersFilterData->whereRaw('created_at >= now()-interval 1 month ');

        // if (! is_null($date_start) && is_null($date_end)) {
        //     $answersFilterData = $answersFilterData->where('created_at', '>=', $date_start);
        // }

        // if (is_null($date_start) && ! is_null($date_end)) {
        //     $answersFilterData = $answersFilterData->where('created_at', '<=', $date_end);
        // }

        if (! is_null($date_start) && ! is_null($date_end)) {
            $answersFilterData = $answersFilterData
                ->where('created_at', '<=', $date_end)
                ->where('created_at', '>=', $date_start);
        }

        $this->data = $answersFilterData->get()
            ->map(function ($i): array {
                /**
                 * @var Contact
                 */
                $item = $i;
                return [
                    'email' => $item->email,
                    'mobile_phone' => $item->mobile_phone,
                    'duplicate_count' => $item->duplicate_count,
                    'created_at' => $item->created_at,
                    'token' => $item->token,
                ];
            })
            ->all();

        // dddx($this->data);
        // dddx(array_keys($this->data[0]));
        // dddx(collect($this->data));
        // dddx($this->data);
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        // dddx(array_keys($this->data[0] ?? []));
        return array_keys($this->data[0] ?? []);
        // return array_keys($this->data[0]);
        // return ['email'];
    }
}
