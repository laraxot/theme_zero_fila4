<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSavedControl;
use Modules\Xot\Contracts\UserContract;

class LimeSavedControlPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_saved_control.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSavedControl $lime_saved_control): bool
    {
        return $user->hasPermissionTo('lime_saved_control.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_saved_control.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSavedControl $lime_saved_control): bool
    {
        return $user->hasPermissionTo('lime_saved_control.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSavedControl $lime_saved_control): bool
    {
        return $user->hasPermissionTo('lime_saved_control.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSavedControl $lime_saved_control): bool
    {
        return $user->hasPermissionTo('lime_saved_control.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSavedControl $lime_saved_control): bool
    {
        return $user->hasPermissionTo('lime_saved_control.forceDelete');
    }
}