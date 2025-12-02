<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\TokensResponse;
use Spatie\QueueableAction\QueueableAction;

class GetParticipantByAskAction
{
    use QueueableAction;

    public function execute(Model $model, string $survey_id): Model
    {
        // $participant_class = TokensResponse::getResponsesForSurvey($survey_id);
        // $token = $model->token;

        // return $participant_class::where('token', $token)->first();

        return $participant_class = TokensResponse::getResponsesForSurvey($survey_id)
            ->where('token', $model->token)->first()
        ;
    }
}
