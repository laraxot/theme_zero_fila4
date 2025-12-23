<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimePlugin;
use Modules\Xot\Contracts\UserContract;

class LimePluginPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_plugin.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimePlugin $lime_plugin): bool
    {
        return $user->hasPermissionTo('lime_plugin.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_plugin.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimePlugin $lime_plugin): bool
    {
        return $user->hasPermissionTo('lime_plugin.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimePlugin $lime_plugin): bool
    {
        return $user->hasPermissionTo('lime_plugin.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimePlugin $lime_plugin): bool
    {
        return $user->hasPermissionTo('lime_plugin.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimePlugin $lime_plugin): bool
    {
        return $user->hasPermissionTo('lime_plugin.forceDelete');
    }
}