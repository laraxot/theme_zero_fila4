<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey299355Timings;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey299355TimingsPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey299355timings.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey299355Timings $lime_survey299355timings): bool
    {
        return $user->hasPermissionTo('lime_survey299355timings.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey299355timings.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey299355Timings $lime_survey299355timings): bool
    {
        return $user->hasPermissionTo('lime_survey299355timings.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey299355Timings $lime_survey299355timings): bool
    {
        return $user->hasPermissionTo('lime_survey299355timings.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey299355Timings $lime_survey299355timings): bool
    {
        return $user->hasPermissionTo('lime_survey299355timings.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey299355Timings $lime_survey299355timings): bool
    {
        return $user->hasPermissionTo('lime_survey299355timings.forceDelete');
    }
}