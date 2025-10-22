<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTokens594635;
use Modules\Xot\Contracts\UserContract;

class LimeTokens594635Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens594635.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTokens594635 $lime_tokens594635): bool
    {
        return $user->hasPermissionTo('lime_tokens594635.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens594635.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTokens594635 $lime_tokens594635): bool
    {
        return $user->hasPermissionTo('lime_tokens594635.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTokens594635 $lime_tokens594635): bool
    {
        return $user->hasPermissionTo('lime_tokens594635.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTokens594635 $lime_tokens594635): bool
    {
        return $user->hasPermissionTo('lime_tokens594635.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTokens594635 $lime_tokens594635): bool
    {
        return $user->hasPermissionTo('lime_tokens594635.forceDelete');
    }
}