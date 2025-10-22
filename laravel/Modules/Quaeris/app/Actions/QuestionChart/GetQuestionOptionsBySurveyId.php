<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Xot\Actions\Tree\GetTreeOptionsByModelClassAction;
use Spatie\QueueableAction\QueueableAction;

class GetQuestionOptionsBySurveyId
{
    use QueueableAction;

    public function execute(string $survey_id): array
    {
        $where = function ($query) use ($survey_id) {
            $query->where('sid', $survey_id);
        };

        $res = app(GetTreeOptionsByModelClassAction::class)->execute(LimeQuestion::class, $where);

        $custom = [
            'custom:contacts_completed' => 'Partecipanti invitati che hanno aderito',
            'custom:mail_response_rate' => 'Tasso di riposta mail',
            'custom:sms_response_rate' => 'Tasso di riposta sms',
            'custom:avg_group' => 'Media dei gruppi',
            'custom:avg_group_2' => 'Valutazione Media 2',
            'custom:avg_group_3' => 'Media dei gruppi 3',
            'custom:avg_group_4' => 'Valutazione Media',
            'custom:avg_group_5' => 'Media dei gruppi 5',
            'custom:avg_group_6' => 'Media dei gruppi 6',
            'custom:root_grouped_bf' => 'Media raggruppata BF',
        ];
        return array_merge($res, $custom);
    }
}
