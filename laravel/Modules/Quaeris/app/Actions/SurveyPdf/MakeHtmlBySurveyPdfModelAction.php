<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\SurveyPdf;

use Illuminate\Contracts\View\View;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use Modules\Quaeris\Services\QuaerisService;
use Safe\DateTime;
use Spatie\QueueableAction\QueueableAction;

use function Safe\date;
use function Safe\strtotime;

class MakeHtmlBySurveyPdfModelAction
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

    public function execute(SurveyPdf $surveyPdf, ?AnswersFilterData $answersFilterData = null): View
    {
        $view = 'quaeris::pdf.'.$surveyPdf->pdf_view;
        $rows = $surveyPdf->questionCharts()->where('show_on_pdf', 1)->get();
        //dd($rows);
        $rows = QuaerisService::make()->getGroupsByRows($rows);
        // $survey_date_to = $surveyPdf->date_to;
        // dddx([
        //     $filter,
        //     $surveyPdf->date_to
        // ]);

        if ($answersFilterData !== null) {
            $survey_date_to = $answersFilterData->date_to;
            $date = $answersFilterData->date_to;
            $date_from = $answersFilterData->date_from;
            $date_to = $answersFilterData->date_to;
        } else {
            $survey_date_to = $surveyPdf->date_to;
            $date = $surveyPdf->date_to;
            $date_from = $surveyPdf->date_from;
            $date_to = $surveyPdf->date_to;
        }

        if ($survey_date_to === null || $survey_date_to === '0000-00-00') {
            $survey_date_to = date('W / o');
        } else {
            $survey_date_to = date('W / o', strtotime($survey_date_to));
        }

        if ($date_from === null || $date_from === '0000-00-00') {
            $date_from = null;
        } else {
            $date_from = date('d/n/o', strtotime($date_from));
        }

        if ($date_to === null || $date_to === '0000-00-00') {
            $date_to = date('d/n/o');
        } else {
            $date_to = date('d/n/o', strtotime($date_to));
        }

        // dddx([
        //     $date_from,
        //     $date_to,
        // ]);

        $view_params = [
            'debug' => false,
            'view' => $view,
            'rows' => $rows,
            'parent' => $surveyPdf,
            'survey_title' => $surveyPdf->surveylsTitle(),
            'pdf' => $surveyPdf->pdfStyle,
            'survey_date_to' => $survey_date_to,
            'monday_sunday_days' => $this->getMondaySundayDay((string) $date),
            // 'date_to' => date('d/n/o', strtotime($date_to)),
            // 'date_from' => date('d/n/o', strtotime($date_from)),
            'date_to' => $date_to,
            'date_from' => $date_from,
        ];
        // dddx($view_params);
        return view($view, $view_params);
    }

    public function getMondaySundayDay(string $date): array
    {
        if ($date === '0000-00-00') {
            $date = now()->format('d-m-Y');
        }

        $dateTime = new DateTime($date);
        // $monday = clone $date_time->modify(('Sunday' == $date_time->format('l')) ? 'Monday last week' : 'Monday this week');
        $monday_of_week = clone $dateTime->modify('Monday this week');
        $sunday_of_week = clone $dateTime->modify('Sunday this week');
        // dddx([$date, $monday_of_week->format('d-m-Y'), $sunday_of_week->format('d-m-Y')]);

        $tmp_monday = explode('/', $monday_of_week->format('d/m'));
        $monday_of_week = $tmp_monday[0].'/'.trans('quaeris::date.months.'.$tmp_monday[1]);
        $tmp_sunday = explode('/', $sunday_of_week->format('d/m'));
        $sunday_of_week = $tmp_sunday[0].'/'.trans('quaeris::date.months.'.$tmp_sunday[1]);

        return [
            'monday' => $monday_of_week,
            'sunday' => $sunday_of_week,
        ];
    }
}
