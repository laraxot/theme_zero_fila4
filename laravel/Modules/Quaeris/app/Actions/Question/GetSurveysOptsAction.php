<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Modules\Limesurvey\Models\LimeSurvey;
use Spatie\QueueableAction\QueueableAction;

class GetSurveysOptsAction
{
    use QueueableAction;

    /**
     * ---
     */
    public function execute(): array
    {
        $surveys = LimeSurvey::with(['lang'])
            ->where('active', 'Y')
            ->get();

        $opts = $surveys
            ->sortBy('lang.surveyls_title')
            ->map(
                static fn ($item): array => [
                    'key' => $item->sid,
                    'label' => $item->sid.'] '.$item->lang?->surveyls_title,
                ]
            )
            ->pluck('label', 'key')
            ->toArray();
        return $opts;
    }
}
