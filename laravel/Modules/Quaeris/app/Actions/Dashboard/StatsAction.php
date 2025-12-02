<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Dashboard;

use Modules\Quaeris\Actions\QuestionChart\Custom\ContactsCompleted2;
use Modules\Quaeris\Actions\QuestionChart\Custom\MailResponseRate;
use Modules\Quaeris\Actions\QuestionChart\Custom\SmsResponseRate;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class StatsAction
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
        if ($questionChart === null) {
            return [
                'email' => [
                    'invited' => [0],
                    'answers' => [0],
                    'perc' => [0],
                    'icon' => 'heroicon-o-envelope',
                ],
                'sms' => [
                    'invited' => [0],
                    'answers' => [0],
                    'perc' => [0],
                    'icon' => 'heroicon-o-device-phone-mobile',
                ],
                'totali' => [
                    'invited' => [0],
                    'answers' => [0],
                    'perc' => [0],
                    'icon' => 'heroicon-o-paper-airplane',
                ]
            ];
        }

        $filter = AnswersFilterData::from([
            'survey_pdf_id' => $filter['survey_pdf_id'],
            'date_from' => $filter['startDate'],
            'date_to' => $filter['endDate'].' 23:59:59',
            'question_filter' => $filter['question_filter'],
        ]);

        // $completed = app(ContactsCompleted::class)->execute($questionChart, '', '', $filter)->answers->toArray();
        // $emails = app(MailResponseRate::class)->execute($questionChart, '', '', $filter)->answers->toArray();
        // $smss = app(SmsResponseRate::class)->execute($questionChart, '', '', $filter)->answers->toArray();

        $emails = app(MailResponseRate::class)->execute($questionChart, '', '', $filter);
        $smss = app(SmsResponseRate::class)->execute($questionChart, '', '', $filter);
        $completed = app(ContactsCompleted2::class)->execute($questionChart, '', '', $filter, $emails, $smss);

        $completed = $completed->answers->toArray();
        $emails = $emails->answers->toArray();
        $smss = $smss->answers->toArray();

        // dddx([
        //     $completed,
        //     $emails,
        //     $smss
        // ]);

        $stats = [];
        // $stats['surveysSent'] = [
        //     'tot' => array_column(array_column($completed, 'value'), 'invited'),
        //     'sms' => array_column(array_column($smss, 'value'), 'invited'),
        //     'emails' => array_column(array_column($emails, 'value'), 'invited'),
        // ];

        // $stats['totAnswers'] = [
        //     'tot' => array_column(array_column($completed, 'value'), 'answers'),
        //     'sms' => array_column(array_column($smss, 'value'), 'answers'),
        //     'emails' => array_column(array_column($emails, 'value'), 'answers'),
        // ];

        // $stats['responseRate'] = [
        //     'tot' => array_column($completed, 'avg'),
        //     'sms' => array_column($smss, 'avg'),
        //     'emails' => array_column($emails, 'avg'),
        // ];

        // dddx([
        //     $completed,
        //     $emails,
        //     $smss
        // ]);
        // dddx(array_column(array_column($emails, 'value'), 'invited')?: [0 => 0]);
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
