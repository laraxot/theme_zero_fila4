<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimePluginSetting;
use Modules\Xot\Contracts\UserContract;

class LimePluginSettingPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_plugin_setting.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimePluginSetting $lime_plugin_setting): bool
    {
        return $user->hasPermissionTo('lime_plugin_setting.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_plugin_setting.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimePluginSetting $lime_plugin_setting): bool
    {
        return $user->hasPermissionTo('lime_plugin_setting.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimePluginSetting $lime_plugin_setting): bool
    {
        return $user->hasPermissionTo('lime_plugin_setting.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimePluginSetting $lime_plugin_setting): bool
    {
        return $user->hasPermissionTo('lime_plugin_setting.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimePluginSetting $lime_plugin_setting): bool
    {
        return $user->hasPermissionTo('lime_plugin_setting.forceDelete');
    }
}