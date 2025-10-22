<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey139982Timing;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey139982TimingPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey139982timing.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey139982Timing $lime_survey139982timing): bool
    {
        return $user->hasPermissionTo('lime_survey139982timing.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey139982timing.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey139982Timing $lime_survey139982timing): bool
    {
        return $user->hasPermissionTo('lime_survey139982timing.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey139982Timing $lime_survey139982timing): bool
    {
        return $user->hasPermissionTo('lime_survey139982timing.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey139982Timing $lime_survey139982timing): bool
    {
        return $user->hasPermissionTo('lime_survey139982timing.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey139982Timing $lime_survey139982timing): bool
    {
        return $user->hasPermissionTo('lime_survey139982timing.forceDelete');
    }
}