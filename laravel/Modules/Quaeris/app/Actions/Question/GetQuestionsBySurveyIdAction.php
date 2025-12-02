<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Illuminate\Database\Eloquent\Collection;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Limesurvey\Models\LimeSurvey;
use Spatie\QueueableAction\QueueableAction;

class GetQuestionsBySurveyIdAction
{
    use QueueableAction;

    // le chiavi meglio trattarle come stringhe
    /**
     * @param  int|string  $survey_id
     */
    public function execute($survey_id): Collection
    {
        $surveys = LimeSurvey::with(['lang', 'questions'])
            ->where('active', 'Y')
            ->where('sid', $survey_id)
            ->first();

        if ($surveys === null) {
            return LimeQuestion::where('qid', 0)->get();
        }

        return $surveys->questions;
    }
}
