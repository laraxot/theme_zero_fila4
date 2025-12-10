<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey153495;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey153495Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey153495.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey153495 $lime_survey153495): bool
    {
        return $user->hasPermissionTo('lime_survey153495.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey153495.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey153495 $lime_survey153495): bool
    {
        return $user->hasPermissionTo('lime_survey153495.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey153495 $lime_survey153495): bool
    {
        return $user->hasPermissionTo('lime_survey153495.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey153495 $lime_survey153495): bool
    {
        return $user->hasPermissionTo('lime_survey153495.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey153495 $lime_survey153495): bool
    {
        return $user->hasPermissionTo('lime_survey153495.forceDelete');
    }
}