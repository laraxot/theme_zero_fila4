<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey787795;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey787795Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey787795.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey787795 $lime_survey787795): bool
    {
        return $user->hasPermissionTo('lime_survey787795.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey787795.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey787795 $lime_survey787795): bool
    {
        return $user->hasPermissionTo('lime_survey787795.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey787795 $lime_survey787795): bool
    {
        return $user->hasPermissionTo('lime_survey787795.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey787795 $lime_survey787795): bool
    {
        return $user->hasPermissionTo('lime_survey787795.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey787795 $lime_survey787795): bool
    {
        return $user->hasPermissionTo('lime_survey787795.forceDelete');
    }
}