<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Dashboard;

use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\DB;
use Modules\Quaeris\Models\SurveyPdf;
use Spatie\QueueableAction\QueueableAction;
use Modules\Quaeris\Datas\AnswersFilterData;

// FORSE DA USARE IN AUTOPAGE
class StatsAction2
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(array $filter): array
    {
        $surveyPdf = SurveyPdf::find($filter['survey_pdf_id']);

        if (! $surveyPdf instanceof SurveyPdf) {
            return [];
        }

        $questionChart = $surveyPdf->questionCharts->first();
        Assert::notNull($questionChart, '[' . __FILE__ . '][' . __LINE__ . ']');

        $filter = AnswersFilterData::from([
            'survey_pdf_id' => $filter['survey_pdf_id'],
            'date_from' => $filter['startDate'],
            'date_to' => $filter['endDate'] . ' 23:59:59',
            'question_filter' => $filter['question_filter'],
        ]);

        // Leggi i database dal file .env
        $limeSurveyDatabase = env('DB_DATABASE_LIMESURVEY', 'default_lime_survey_database');
        $contactsDatabase = env('DB_DATABASE', 'default_contacts_database');

        $limeSurveyTable = "{$limeSurveyDatabase}.lime_survey_{$surveyPdf->survey_id}";

        // Esegui la query
        $queryResult = DB::table($limeSurveyTable)
        ->join("{$contactsDatabase}.contacts as B", 'B.token', '=', "{$limeSurveyTable}.token")
        ->selectRaw("
            SUM(CASE WHEN B.sms_count != 0 AND B.sms_count IS NOT NULL THEN 1 ELSE 0 END) AS sms_count_nonzero,
            SUM(CASE WHEN B.sms_count IS NULL THEN 1 ELSE 0 END) AS sms_count_null,
            SUM(CASE WHEN B.mail_count != 0 AND B.mail_count IS NOT NULL THEN 1 ELSE 0 END) AS mail_count_nonzero,
            SUM(CASE WHEN B.mail_count IS NULL THEN 1 ELSE 0 END) AS mail_count_null,
            SUM(CASE WHEN B.sms_count != 0 AND B.sms_count IS NOT NULL THEN 1 ELSE 0 END) +
            SUM(CASE WHEN B.mail_count != 0 AND B.mail_count IS NOT NULL THEN 1 ELSE 0 END) AS total_nonzero_counts,
            CASE
                WHEN SUM(CASE WHEN B.sms_count != 0 AND B.sms_count IS NOT NULL THEN 1 ELSE 0 END) > 0
                THEN ROUND(
                    100.0 * SUM(CASE WHEN B.sms_count IS NULL THEN 1 ELSE 0 END) /
                    SUM(CASE WHEN B.sms_count != 0 AND B.sms_count IS NOT NULL THEN 1 ELSE 0 END), 2
                )
                ELSE 0
            END AS sms_null_percentage_of_nonzero,
            CASE
                WHEN SUM(CASE WHEN B.mail_count != 0 AND B.mail_count IS NOT NULL THEN 1 ELSE 0 END) > 0
                THEN ROUND(
                    100.0 * SUM(CASE WHEN B.mail_count IS NULL THEN 1 ELSE 0 END) /
                    SUM(CASE WHEN B.mail_count != 0 AND B.mail_count IS NOT NULL THEN 1 ELSE 0 END), 2
                )
                ELSE 0
            END AS mail_null_percentage_of_nonzero
        ")
        ->whereNotNull("{$limeSurveyTable}.submitdate")
        ->where("{$limeSurveyTable}.submitdate", '>=', $filter->date_from)
        ->where("{$limeSurveyTable}.submitdate", '<=', $filter->date_to)
        ->get();
    
    
    

        dddx($queryResult);

        $stats = [];
        $stats['email'] = [
            'invited' => array_column(array_column($emails, 'value'), 'invited') ?: [0 => 0],
            'answers' => array_column(array_column($emails, 'value'), 'answers') ?: [0 => 0],
            'perc' => array_column($emails, 'avg') ?: [0 => 0],
            'icon' => 'heroicon-o-envelope',
        ];

        $stats['sms'] = [
            'invited' => array_column(array_column($smss, 'value'), 'invited') ?: [0 => 0],
            'answers' => array_column(array_column($smss, 'value'), 'answers') ?: [0 => 0],
            'perc' => array_column($smss, 'avg') ?: [0 => 0],
            'icon' => 'heroicon-o-device-phone-mobile',
        ];

        $stats['totali'] = [
            'invited' => array_column(array_column($completed, 'value'), 'invited'),
            'answers' => array_column(array_column($completed, 'value'), 'answers'),
            'perc' => array_column($completed, 'avg'),
            'icon' => 'heroicon-o-paper-airplane',
        ];

        return $stats;
    }
}
