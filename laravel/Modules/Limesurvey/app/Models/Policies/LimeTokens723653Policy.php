<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTokens723653;
use Modules\Xot\Contracts\UserContract;

class LimeTokens723653Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens723653.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTokens723653 $lime_tokens723653): bool
    {
        return $user->hasPermissionTo('lime_tokens723653.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens723653.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTokens723653 $lime_tokens723653): bool
    {
        return $user->hasPermissionTo('lime_tokens723653.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTokens723653 $lime_tokens723653): bool
    {
        return $user->hasPermissionTo('lime_tokens723653.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTokens723653 $lime_tokens723653): bool
    {
        return $user->hasPermissionTo('lime_tokens723653.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTokens723653 $lime_tokens723653): bool
    {
        return $user->hasPermissionTo('lime_tokens723653.forceDelete');
    }
}