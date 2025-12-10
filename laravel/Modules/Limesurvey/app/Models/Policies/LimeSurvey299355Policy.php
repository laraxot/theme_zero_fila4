<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey299355;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey299355Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey299355.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey299355 $lime_survey299355): bool
    {
        return $user->hasPermissionTo('lime_survey299355.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey299355.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey299355 $lime_survey299355): bool
    {
        return $user->hasPermissionTo('lime_survey299355.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey299355 $lime_survey299355): bool
    {
        return $user->hasPermissionTo('lime_survey299355.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey299355 $lime_survey299355): bool
    {
        return $user->hasPermissionTo('lime_survey299355.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey299355 $lime_survey299355): bool
    {
        return $user->hasPermissionTo('lime_survey299355.forceDelete');
    }
}