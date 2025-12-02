<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Limesurvey\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Generate\GenerateModelByModelClass;
use Spatie\QueueableAction\QueueableAction;

class GetParticipantModelBySurveyIdAction
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

    public function execute(string $survey_id): Model
    {
        $participant_class = 'Modules\Limesurvey\Models\LimeTokens'.$survey_id;
        if (! class_exists($participant_class)) {
            app(GenerateModelByModelClass::class)
                ->setCustomReplaces(['DummyTable' => 'lime_tokens_'.$survey_id])
                ->execute($participant_class);
        }

        return app($participant_class);
    }
}
