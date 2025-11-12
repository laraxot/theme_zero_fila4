<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey285519Timings;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey285519TimingsPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey285519timings.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey285519Timings $lime_survey285519timings): bool
    {
        return $user->hasPermissionTo('lime_survey285519timings.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey285519timings.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey285519Timings $lime_survey285519timings): bool
    {
        return $user->hasPermissionTo('lime_survey285519timings.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey285519Timings $lime_survey285519timings): bool
    {
        return $user->hasPermissionTo('lime_survey285519timings.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey285519Timings $lime_survey285519timings): bool
    {
        return $user->hasPermissionTo('lime_survey285519timings.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey285519Timings $lime_survey285519timings): bool
    {
        return $user->hasPermissionTo('lime_survey285519timings.forceDelete');
    }
}