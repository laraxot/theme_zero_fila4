<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Exception;
use Modules\Quaeris\Actions\Question\GetQuestionsBySurveyIdAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetQuestionOptionsBySurveyId2
{
    use QueueableAction;

    public function execute(string $survey_id): array
    {
        $options = app(GetQuestionsBySurveyIdAction::class)->execute($survey_id);
        $options = $options->map(
            function ($item): array {
                Assert::string($question = $item->question);

                return [
                    'key' => $item->qid,
                    'label' => $item->qid.']'.$item->title.']'.strip_tags($question),
                    'parent_id' => $item->parent_qid,
                    'pos' => $item->qid,
                ];
            }
        );

        $options = $options->groupBy('parent_id');
        if (! isset($options[0]) || $options[0] === null) {
            throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $data = $options[0]->map(
            function (array $item) use ($options): array {
                $item['sons'] = $options->get($item['key']);
                if ($item['sons'] === null) {
                    $item['sons'] = [];
                }

                return $item;
            }
        );

        $res = [];
        foreach ($data as $v) {
            $res[] = $v;
            foreach ($v['sons'] as $son) {
                $son['label'] = '--- '.$son['label'];
                $res[] = $son;
            }
        }

        // dddx($options);
        return collect($res)
            // ->prepend(['key' => null, 'label' => '---', 'parent_id' => 0])
            ->push(['key' => 'custom:contacts_completed', 'label' => 'Partecipanti invitati che hanno aderito', 'parent_id' => 0])
            ->push(['key' => 'custom:mail_response_rate', 'label' => 'Tasso di riposta mail', 'parent_id' => 0])
            ->push(['key' => 'custom:sms_response_rate', 'label' => 'Tasso di riposta sms', 'parent_id' => 0])
            // ->push(['key' => 'custom:avg_group', 'label' => 'Media dei gruppi', 'parent_id' => 0]) // prove query
            // ->push(['key' => 'custom:avg_group_2', 'label' => 'Valutazione Media 2', 'parent_id' => 0]) // prova grafico Marco
            // ->push(['key' => 'custom:avg_group_3', 'label' => 'Media dei gruppi 3', 'parent_id' => 0])
            ->push(['key' => 'custom:avg_group_4', 'label' => 'Valutazione Media', 'parent_id' => 0]) // grafico 1000 foreach
            // ->push(['key' => 'custom:avg_group_5', 'label' => 'Media dei gruppi 5', 'parent_id' => 0])
            // ->push(['key' => 'custom:avg_group_6', 'label' => 'Media dei gruppi 6', 'parent_id' => 0]) // grafico con pierpaolo
            ->push(['key' => 'custom:root_grouped_bf', 'label' => 'Media raggruppata BF', 'parent_id' => 0]) // definitivo
            ->pluck('label', 'key')
            ->all();
    }
}
