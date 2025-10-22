<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeLabel;
use Modules\Xot\Contracts\UserContract;

class LimeLabelPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_label.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeLabel $lime_label): bool
    {
        return $user->hasPermissionTo('lime_label.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_label.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeLabel $lime_label): bool
    {
        return $user->hasPermissionTo('lime_label.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeLabel $lime_label): bool
    {
        return $user->hasPermissionTo('lime_label.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeLabel $lime_label): bool
    {
        return $user->hasPermissionTo('lime_label.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeLabel $lime_label): bool
    {
        return $user->hasPermissionTo('lime_label.forceDelete');
    }
}