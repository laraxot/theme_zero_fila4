<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey417991;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey417991Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey417991.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey417991 $lime_survey417991): bool
    {
        return $user->hasPermissionTo('lime_survey417991.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey417991.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey417991 $lime_survey417991): bool
    {
        return $user->hasPermissionTo('lime_survey417991.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey417991 $lime_survey417991): bool
    {
        return $user->hasPermissionTo('lime_survey417991.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey417991 $lime_survey417991): bool
    {
        return $user->hasPermissionTo('lime_survey417991.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey417991 $lime_survey417991): bool
    {
        return $user->hasPermissionTo('lime_survey417991.forceDelete');
    }
}