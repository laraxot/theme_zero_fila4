<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart\Graph;

use Illuminate\Support\Str;
use Modules\Quaeris\Actions\QuestionChart\GetAnswersCount;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetTitleAction
{
    use QueueableAction;

    public function execute(QuestionChart $questionChart, ?AnswersFilterData $answersFilterData = null): string
    {
        $title = '';
        if (Str::startsWith((string) $questionChart->question, 'custom')) {
            $type = $questionChart->question;
            switch ($type) {
                case 'custom:root_grouped_bf':
                case 'custom:avg_group_4':
                case 'custom:avg_group_2':
                    $title = 'Distribuzione delle valutazioni medie';

                    break;
                case 'custom:contacts_completed':
                    $title = 'Tasso di risposta totale sms + email';

                    break;
                case 'custom:mail_response_rate':
                    $title = 'Tasso di riposta totale mail';

                    break;
                case 'custom:sms_response_rate':
                    $title = 'Tasso di risposta totale sms';

                    break;
                default:
                    dddx('inserisci il titolo del grafico per il grafico tipo '.$questionChart->question_type);

                    break;
            }
        } elseif ($answersFilterData !== null) {
            $title = 'Totale Rispondenti '.app(GetAnswersCount::class)->execute($questionChart, $answersFilterData);
        } else {
            $title = 'Totale Rispondenti '.app(GetAnswersCount::class)->execute($questionChart);
        }

        return $title;
    }
}
