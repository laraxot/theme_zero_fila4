<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTokens583577;
use Modules\Xot\Contracts\UserContract;

class LimeTokens583577Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens583577.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTokens583577 $lime_tokens583577): bool
    {
        return $user->hasPermissionTo('lime_tokens583577.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens583577.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTokens583577 $lime_tokens583577): bool
    {
        return $user->hasPermissionTo('lime_tokens583577.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTokens583577 $lime_tokens583577): bool
    {
        return $user->hasPermissionTo('lime_tokens583577.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTokens583577 $lime_tokens583577): bool
    {
        return $user->hasPermissionTo('lime_tokens583577.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTokens583577 $lime_tokens583577): bool
    {
        return $user->hasPermissionTo('lime_tokens583577.forceDelete');
    }
}