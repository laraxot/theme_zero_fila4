<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTokens863694;
use Modules\Xot\Contracts\UserContract;

class LimeTokens863694Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens863694.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTokens863694 $lime_tokens863694): bool
    {
        return $user->hasPermissionTo('lime_tokens863694.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens863694.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTokens863694 $lime_tokens863694): bool
    {
        return $user->hasPermissionTo('lime_tokens863694.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTokens863694 $lime_tokens863694): bool
    {
        return $user->hasPermissionTo('lime_tokens863694.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTokens863694 $lime_tokens863694): bool
    {
        return $user->hasPermissionTo('lime_tokens863694.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTokens863694 $lime_tokens863694): bool
    {
        return $user->hasPermissionTo('lime_tokens863694.forceDelete');
    }
}