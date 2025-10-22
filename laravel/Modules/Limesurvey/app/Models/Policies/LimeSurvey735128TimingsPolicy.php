<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey735128Timings;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey735128TimingsPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey735128timings.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey735128Timings $lime_survey735128timings): bool
    {
        return $user->hasPermissionTo('lime_survey735128timings.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey735128timings.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey735128Timings $lime_survey735128timings): bool
    {
        return $user->hasPermissionTo('lime_survey735128timings.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey735128Timings $lime_survey735128timings): bool
    {
        return $user->hasPermissionTo('lime_survey735128timings.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey735128Timings $lime_survey735128timings): bool
    {
        return $user->hasPermissionTo('lime_survey735128timings.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey735128Timings $lime_survey735128timings): bool
    {
        return $user->hasPermissionTo('lime_survey735128timings.forceDelete');
    }
}