<?php

declare(strict_types=1);

namespace Modules\Setting\Models\Policies;

use Modules\Setting\Models\Setting;
use Modules\Xot\Contracts\UserContract;

class SettingPolicy extends SettingBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('setting.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Setting $setting): bool
    {
        return $user->hasPermissionTo('setting.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('setting.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Setting $setting): bool
    {
        return $user->hasPermissionTo('setting.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Setting $setting): bool
    {
        return $user->hasPermissionTo('setting.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Setting $setting): bool
    {
        return $user->hasPermissionTo('setting.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Setting $setting): bool
    {
        return $user->hasPermissionTo('setting.forceDelete');
    }
}
