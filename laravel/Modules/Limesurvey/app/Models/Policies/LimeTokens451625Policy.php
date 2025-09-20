<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTokens451625;
use Modules\Xot\Contracts\UserContract;

class LimeTokens451625Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens451625.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTokens451625 $lime_tokens451625): bool
    {
        return $user->hasPermissionTo('lime_tokens451625.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tokens451625.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTokens451625 $lime_tokens451625): bool
    {
        return $user->hasPermissionTo('lime_tokens451625.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTokens451625 $lime_tokens451625): bool
    {
        return $user->hasPermissionTo('lime_tokens451625.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTokens451625 $lime_tokens451625): bool
    {
        return $user->hasPermissionTo('lime_tokens451625.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTokens451625 $lime_tokens451625): bool
    {
        return $user->hasPermissionTo('lime_tokens451625.forceDelete');
    }
}