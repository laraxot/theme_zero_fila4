<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Illuminate\Database\Eloquent\Collection;
use Modules\Limesurvey\Models\LimeSurvey;
use Spatie\QueueableAction\QueueableAction;

class GetSurveysAction
{
    use QueueableAction;

    /**
     * @return Collection
     */
    public function execute()
    {
        return LimeSurvey::with(['lang', 'questions'])
            ->where('active', 'Y')
            ->get();
    }
}
