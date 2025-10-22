<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey196427Timings;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey196427TimingsPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey196427timings.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey196427Timings $lime_survey196427timings): bool
    {
        return $user->hasPermissionTo('lime_survey196427timings.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey196427timings.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey196427Timings $lime_survey196427timings): bool
    {
        return $user->hasPermissionTo('lime_survey196427timings.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey196427Timings $lime_survey196427timings): bool
    {
        return $user->hasPermissionTo('lime_survey196427timings.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey196427Timings $lime_survey196427timings): bool
    {
        return $user->hasPermissionTo('lime_survey196427timings.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey196427Timings $lime_survey196427timings): bool
    {
        return $user->hasPermissionTo('lime_survey196427timings.forceDelete');
    }
}