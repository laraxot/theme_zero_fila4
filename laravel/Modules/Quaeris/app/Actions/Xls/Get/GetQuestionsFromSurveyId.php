<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Xls\Get;

use Illuminate\Support\Collection;
use Modules\Limesurvey\Models\LimeQuestion;
use Spatie\QueueableAction\QueueableAction;

class GetQuestionsFromSurveyId
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

    /**
     * @return Collection<int, LimeQuestion>
     */
    public function execute(int $survey_id)
    {
        return LimeQuestion::with([
            //*
            'props',
            'parent',
            'l10n',
            'props.l10n',
            'parent.props',
            'extra',
            //*/
        ])
            //->without(['extra'])
            ->where('sid', $survey_id)
            ->get();
        /*
        return $questions->map(
            function ($item) {
                Assert::isInstanceOf($item, LimeQuestion::class);
                $item->field_name = app(GetAnswerFieldNameByQuestionIdAction::class)->execute((string) $item->qid);
                return $item;
            }
        );
        */
    }
}
