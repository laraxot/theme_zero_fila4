<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTokens799586;
use Modules\Xot\Contracts\UserContract;

class LimeTokens799586Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens799586.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTokens799586 $lime_tokens799586): bool
    {
        return $user->hasPermissionTo('lime_tokens799586.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens799586.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTokens799586 $lime_tokens799586): bool
    {
        return $user->hasPermissionTo('lime_tokens799586.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTokens799586 $lime_tokens799586): bool
    {
        return $user->hasPermissionTo('lime_tokens799586.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTokens799586 $lime_tokens799586): bool
    {
        return $user->hasPermissionTo('lime_tokens799586.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTokens799586 $lime_tokens799586): bool
    {
        return $user->hasPermissionTo('lime_tokens799586.forceDelete');
    }
}