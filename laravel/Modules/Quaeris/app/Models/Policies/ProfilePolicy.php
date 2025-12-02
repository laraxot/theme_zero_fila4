<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models\Policies;

use Modules\Quaeris\Models\Profile;
use Modules\User\Models\Policies\UserBasePolicy;
use Modules\Xot\Contracts\UserContract;

class ProfilePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('profile.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Profile $profile): bool
    {
        return $user->hasPermissionTo('profile.view') || $profile->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('profile.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Profile $profile): bool
    {
        return $user->hasPermissionTo('profile.update') || $profile->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Profile $profile): bool
    {
        return $user->hasPermissionTo('profile.delete') || $profile->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Profile $profile): bool
    {
        return $user->hasPermissionTo('profile.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Profile $profile): bool
    {
        return $user->hasPermissionTo('profile.forceDelete');
    }
}
