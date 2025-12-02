<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTokens821676;
use Modules\Xot\Contracts\UserContract;

class LimeTokens821676Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens821676.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTokens821676 $lime_tokens821676): bool
    {
        return $user->hasPermissionTo('lime_tokens821676.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens821676.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTokens821676 $lime_tokens821676): bool
    {
        return $user->hasPermissionTo('lime_tokens821676.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTokens821676 $lime_tokens821676): bool
    {
        return $user->hasPermissionTo('lime_tokens821676.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTokens821676 $lime_tokens821676): bool
    {
        return $user->hasPermissionTo('lime_tokens821676.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTokens821676 $lime_tokens821676): bool
    {
        return $user->hasPermissionTo('lime_tokens821676.forceDelete');
    }
}