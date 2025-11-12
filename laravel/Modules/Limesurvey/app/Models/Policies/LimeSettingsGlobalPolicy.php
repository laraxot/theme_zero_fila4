<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSettingsGlobal;
use Modules\Xot\Contracts\UserContract;

class LimeSettingsGlobalPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_settings_global.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSettingsGlobal $lime_settings_global): bool
    {
        return $user->hasPermissionTo('lime_settings_global.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_settings_global.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSettingsGlobal $lime_settings_global): bool
    {
        return $user->hasPermissionTo('lime_settings_global.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSettingsGlobal $lime_settings_global): bool
    {
        return $user->hasPermissionTo('lime_settings_global.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSettingsGlobal $lime_settings_global): bool
    {
        return $user->hasPermissionTo('lime_settings_global.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSettingsGlobal $lime_settings_global): bool
    {
        return $user->hasPermissionTo('lime_settings_global.forceDelete');
    }
}