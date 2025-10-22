<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions;

use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Quaeris\Models\Contact;
use Modules\Quaeris\Models\QuestionChart;
use Modules\Quaeris\Models\SurveyPdf;
use Modules\Quaeris\Services\LimeJsonService;
use Spatie\QueueableAction\QueueableAction;

class UpdateContactTokenAction
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
     * Execute the action.
     */
    public function execute(Contact $contact): string
    {
        $map = [
            'question_chart' => QuestionChart::class,
            'survey_pdf' => SurveyPdf::class,
        ];
        Relation::morphMap($map);
        $limeJson = LimeJsonService::make()->setSurveyId((string) $contact->survey_id);
        sleep(2);
        return $limeJson->updateContactToken($contact);

        // :44    Unreachable statement - code above always terminates.
        //  ✏️  UpdateContactTokenAction.php
        // sleep(2);
    }
}
