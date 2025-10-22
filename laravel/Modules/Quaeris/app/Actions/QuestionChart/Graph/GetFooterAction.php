<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart\Graph;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetFooterAction
{
    use QueueableAction;

    public function execute(QuestionChart $questionChart, ?AnswersFilterData $answersFilterData = null): string
    {
        // Assert::isArray($questionChart->charts[0]);
        Assert::isInstanceOf($questionChart->charts, Collection::class);
        $group_by = $questionChart->charts[0]['group_by'];
        $sort_by = $questionChart->charts[0]['sort_by'];
        // dddx([$group_by, $sort_by]);
        $title = '';
        Assert::notNull($questionChart->question, '['.__FILE__.']['.__LINE__.']');
        if (Str::startsWith($questionChart->question, 'custom')) {
            $type = $questionChart->question;
            $title = match ($type) {
                'custom:contacts_completed' => $this->getStringCustomFooter($questionChart, 'ContactsCompleted', $group_by, $sort_by, $answersFilterData),
                'custom:mail_response_rate' => $this->getStringCustomFooter($questionChart, 'MailResponseRate', $group_by, $sort_by, $answersFilterData),
                'custom:sms_response_rate' => $this->getStringCustomFooter($questionChart, 'SmsResponseRate', $group_by, $sort_by, $answersFilterData),
                default => '',
            };
        }

        return $title;
    }

    public function getStringCustomFooter(QuestionChart $questionChart, string $class, string $group_by, string $sort_by, ?AnswersFilterData $answersFilterData = null): string
    {
        $action_class = '\Modules\Quaeris\Actions\QuestionChart\Custom\\'.$class;
        $datas = app($action_class)->execute($questionChart, $group_by, $sort_by, $answersFilterData);
        // $invited = 0;
        // $answers = 0;
        // foreach ($datas->answers as $data) {
        //     $invited += $data->value['invited'];
        //     $answers += $data->value['answers'];
        // }
        // $perc = number_format(($answers * 100) / $invited, 2);
        // $title = 'Totale Invitati '.$invited.' - Totale Rispondenti '.$answers.' - Percentuale di risposta '.$perc.'%';
        // dddx($datas->footer);
        return $datas->footer;
    }
}
