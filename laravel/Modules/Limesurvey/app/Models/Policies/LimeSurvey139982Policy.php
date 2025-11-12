<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey139982;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey139982Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey139982.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey139982 $lime_survey139982): bool
    {
        return $user->hasPermissionTo('lime_survey139982.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey139982.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey139982 $lime_survey139982): bool
    {
        return $user->hasPermissionTo('lime_survey139982.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey139982 $lime_survey139982): bool
    {
        return $user->hasPermissionTo('lime_survey139982.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey139982 $lime_survey139982): bool
    {
        return $user->hasPermissionTo('lime_survey139982.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey139982 $lime_survey139982): bool
    {
        return $user->hasPermissionTo('lime_survey139982.forceDelete');
    }
}