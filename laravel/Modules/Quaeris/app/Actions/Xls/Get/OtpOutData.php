<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Xls\Get;

use Carbon\Carbon;
use Modules\Limesurvey\Models\TokensResponse;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use function Safe\ini_set;
use Spatie\QueueableAction\QueueableAction;

class OtpOutData
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    public function execute(SurveyPdf $surveyPdf, AnswersFilterData $answersFilterData): array
    {
        ini_set('memory_limit', '4095M');
        $date_start = $answersFilterData->date_from;
        $date_end = $answersFilterData->date_to;

        $participants = TokensResponse::getResponsesForSurvey($surveyPdf->survey_id)
            ->where('emailstatus', 'OptOut');
        // ->get();

        $participants = $participants->whereRaw('sent >= now()-interval 1 month ');

        // if (is_null($date_start) && is_null($date_end)) {
        //     $participants = $participants->whereRaw('sent >= now()-interval 3 month ');
        // }

        // if (! is_null($date_start)) {
        //     $participants = $participants->where('sent', '>=', $date_start);
        // }

        // if (! is_null($date_end)) {
        //     $participants = $participants->where('sent', '<=', $date_end);
        //     if (is_null($date_start)) {
        //         $participants = $participants->whereRaw('sent >= now()-interval 3 month ');
        //     }
        // }

        $participants = $participants->get();
        $answersFilterData = $participants->map(static fn ($item): array => [
            'email' => $item->email,
            'emailstatus' => 'OptOut',
            'year' => Carbon::parse($item->sent)->format('o'),
            'week' => Carbon::parse($item->sent)->format('W'),
            'attribute_1' => $item->attribute_1 ?? '',
            'attribute_2' => $item->attribute_2 ?? '',
            'attribute_3' => $item->attribute_3 ?? '',
            'attribute_4' => $item->attribute_4 ?? '',
        ])->all();
        return $answersFilterData;

        // return ArrayService::make()
        //         // ->setFilename($parent_row->name.'_OptOut'.'-'.date('d-m-Y'))
        //         ->setFilename($parent_row->name.'_OptOut_Sett_'.date('W'))
        //         ->setArray($data)
        //         ->toXLS();
        //         // ->toHtml();
    }
}
