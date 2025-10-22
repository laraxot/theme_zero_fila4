<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey422747;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey422747Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey422747.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey422747 $lime_survey422747): bool
    {
        return $user->hasPermissionTo('lime_survey422747.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey422747.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey422747 $lime_survey422747): bool
    {
        return $user->hasPermissionTo('lime_survey422747.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey422747 $lime_survey422747): bool
    {
        return $user->hasPermissionTo('lime_survey422747.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey422747 $lime_survey422747): bool
    {
        return $user->hasPermissionTo('lime_survey422747.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey422747 $lime_survey422747): bool
    {
        return $user->hasPermissionTo('lime_survey422747.forceDelete');
    }
}