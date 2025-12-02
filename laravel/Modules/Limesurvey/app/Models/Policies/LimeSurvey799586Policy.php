<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey799586;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey799586Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey799586.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey799586 $lime_survey799586): bool
    {
        return $user->hasPermissionTo('lime_survey799586.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey799586.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey799586 $lime_survey799586): bool
    {
        return $user->hasPermissionTo('lime_survey799586.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey799586 $lime_survey799586): bool
    {
        return $user->hasPermissionTo('lime_survey799586.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey799586 $lime_survey799586): bool
    {
        return $user->hasPermissionTo('lime_survey799586.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey799586 $lime_survey799586): bool
    {
        return $user->hasPermissionTo('lime_survey799586.forceDelete');
    }
}