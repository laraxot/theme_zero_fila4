<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart\Graph;

use Illuminate\Support\Str;
use Modules\Limesurvey\Datas\LimeQuestionData;
use Modules\Quaeris\Actions\QuestionChart\GetNotAnswersCount;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetSubtitleAction
{
    use QueueableAction;

    public function execute(QuestionChart $questionChart, ?AnswersFilterData $answersFilterData = null): string
    {
        $title = '';
        Assert::notNull($questionChart->question, '['.__FILE__.']['.__LINE__.']');
        if (! Str::startsWith($questionChart->question, 'custom')) {
            // dddx([
            //     $questionChart,
            //     $questionChart->props,
            //     $questionChart->props->parent
            // ]);
            Assert::notNull($questionChart->props, '['.__FILE__.']['.__LINE__.']');
            // Assert::notNull($questionChart->props->parent);
            // dddx($questionChart->props);
            $lime_question_data = LimeQuestionData::from([
                'mandatory' => $questionChart->props->mandatory,
                'parent' => $questionChart->props->parent,
            ]);
            // dddx($lime_question_data);

            // if ($questionChart->props->mandatory != 'Y'
            //     && $questionChart->props->parent->mandatory != 'Y'
            //     ) {
            if ($lime_question_data->mandatory !== 'Y'
                && $lime_question_data->parent_mandatory !== 'Y'
            ) {
                if ($answersFilterData !== null) {
                    $title = 'Non rispondenti '.app(GetNotAnswersCount::class)->execute($questionChart, $answersFilterData);
                } else {
                    $title = 'Non rispondenti '.app(GetNotAnswersCount::class)->execute($questionChart);
                }
            }
        }

        return $title;
    }
}
