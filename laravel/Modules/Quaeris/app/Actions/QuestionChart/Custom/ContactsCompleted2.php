<?php
/**
 * ---.
 */
declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart\Custom;

use Carbon\Carbon;
use Modules\Chart\Datas\AnswerData;
use Modules\Chart\Datas\AnswersChartData;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class ContactsCompleted2
{
    use QueueableAction;

    public function execute(
        QuestionChart $questionChart,
        string $group_by,
        string $sort_by,
        ?AnswersFilterData $answersFilterData,
        AnswersChartData $mailResponseRate,
        AnswersChartData $smsResponseRate,
    ): AnswersChartData {
        // $mailResponseRate = app(MailResponseRate::class)->execute($questionChart, $group_by, $sort_by, $answersFilterData);
        // $smsResponseRate = app(SmsResponseRate::class)->execute($questionChart, $group_by, $sort_by, $answersFilterData);

        $emails = $mailResponseRate->answers->toArray();
        $smss = $smsResponseRate->answers->toArray();

        $tot_invited = $mailResponseRate->tot_invited + $smsResponseRate->tot_invited;
        $tot_risp = $mailResponseRate->tot_answered + $smsResponseRate->tot_answered;

        $risp_perc = $tot_invited !== 0 ? $tot_risp * 100 / $tot_invited : 100;

        $res = [];
        foreach ($emails as $k => $email) {
            $res[$k] = $email;
        }

        foreach ($smss as $k => $sms) {
            Assert::isArray($sms);
            if (isset($res[$k])) {
                // $res[$k]['value'] += $sms['value'];
                foreach ($res[$k]['value'] as $key => $value) {
                    $res[$k]['value'][$key] +=
                        $sms['value'][$key];
                }
            } else {
                $res[$k] = $sms;
            }
        }

        foreach ($res as $k => $row) {
            $res[$k]['avg'] = 0;
            if ($row['value']['invited'] !== 0) {
                $res[$k]['avg'] = number_format($row['value']['answers'] * 100 / $row['value']['invited'], 1) . '%';
            }
        }

        $res = collect($res)->sortBy(function ($obj, $key) {
            return Carbon::create($key);
        })->toArray();

        /**
         * @var DataCollection<AnswerData>
         */
        $answers = AnswerData::collect($res, DataCollection::class);
        $res = AnswersChartData::from(['answers' => $answers, 'chart' => $questionChart->charts]);
        $res->footer = 'Totale Invitati: ' . $tot_invited . ' - Rispondenti: ' . $tot_risp . ' - Percentuale di risposta ' . round($risp_perc, 2) . '%';

        return $res;
    }
}
