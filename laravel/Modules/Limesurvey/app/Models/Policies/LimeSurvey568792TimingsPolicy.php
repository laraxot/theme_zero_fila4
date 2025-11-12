<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey568792Timings;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey568792TimingsPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey568792timings.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey568792Timings $lime_survey568792timings): bool
    {
        return $user->hasPermissionTo('lime_survey568792timings.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey568792timings.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey568792Timings $lime_survey568792timings): bool
    {
        return $user->hasPermissionTo('lime_survey568792timings.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey568792Timings $lime_survey568792timings): bool
    {
        return $user->hasPermissionTo('lime_survey568792timings.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey568792Timings $lime_survey568792timings): bool
    {
        return $user->hasPermissionTo('lime_survey568792timings.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey568792Timings $lime_survey568792timings): bool
    {
        return $user->hasPermissionTo('lime_survey568792timings.forceDelete');
    }
}