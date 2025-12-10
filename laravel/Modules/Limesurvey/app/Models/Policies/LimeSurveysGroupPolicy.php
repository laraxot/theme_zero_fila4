<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurveysGroup;
use Modules\Xot\Contracts\UserContract;

class LimeSurveysGroupPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_surveys_group.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurveysGroup $lime_surveys_group): bool
    {
        return $user->hasPermissionTo('lime_surveys_group.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_surveys_group.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurveysGroup $lime_surveys_group): bool
    {
        return $user->hasPermissionTo('lime_surveys_group.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurveysGroup $lime_surveys_group): bool
    {
        return $user->hasPermissionTo('lime_surveys_group.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurveysGroup $lime_surveys_group): bool
    {
        return $user->hasPermissionTo('lime_surveys_group.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurveysGroup $lime_surveys_group): bool
    {
        return $user->hasPermissionTo('lime_surveys_group.forceDelete');
    }
}