<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Modules\Quaeris\Datas\AnswersFilterData;

/**
 * @method Builder ofFilterData(AnswersFilterData $answersFilterData)
 */
interface LimeSurveyXXXContract
{
    /**
     * Scope a query to only include popular users.
     */
    public function scopeOfFilterData(Builder $query, AnswersFilterData $answersFilterData): void;

    // public function ofFilterData(AnswersFilterData $answersFilterData): Builder;
}
