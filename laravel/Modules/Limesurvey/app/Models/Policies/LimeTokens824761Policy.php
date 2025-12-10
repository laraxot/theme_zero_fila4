<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTokens824761;
use Modules\Xot\Contracts\UserContract;

class LimeTokens824761Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens824761.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTokens824761 $lime_tokens824761): bool
    {
        return $user->hasPermissionTo('lime_tokens824761.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens824761.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTokens824761 $lime_tokens824761): bool
    {
        return $user->hasPermissionTo('lime_tokens824761.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTokens824761 $lime_tokens824761): bool
    {
        return $user->hasPermissionTo('lime_tokens824761.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTokens824761 $lime_tokens824761): bool
    {
        return $user->hasPermissionTo('lime_tokens824761.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTokens824761 $lime_tokens824761): bool
    {
        return $user->hasPermissionTo('lime_tokens824761.forceDelete');
    }
}