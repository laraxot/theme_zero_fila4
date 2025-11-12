<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeBox;
use Modules\Xot\Contracts\UserContract;

class LimeBoxPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_box.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeBox $lime_box): bool
    {
        return $user->hasPermissionTo('lime_box.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_box.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeBox $lime_box): bool
    {
        return $user->hasPermissionTo('lime_box.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeBox $lime_box): bool
    {
        return $user->hasPermissionTo('lime_box.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeBox $lime_box): bool
    {
        return $user->hasPermissionTo('lime_box.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeBox $lime_box): bool
    {
        return $user->hasPermissionTo('lime_box.forceDelete');
    }
}