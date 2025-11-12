<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\TokensResponse;
use Modules\Xot\Contracts\UserContract;

class TokensResponsePolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('tokens_response.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, TokensResponse $tokens_response): bool
    {
        return $user->hasPermissionTo('tokens_response.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('tokens_response.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, TokensResponse $tokens_response): bool
    {
        return $user->hasPermissionTo('tokens_response.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, TokensResponse $tokens_response): bool
    {
        return $user->hasPermissionTo('tokens_response.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, TokensResponse $tokens_response): bool
    {
        return $user->hasPermissionTo('tokens_response.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, TokensResponse $tokens_response): bool
    {
        return $user->hasPermissionTo('tokens_response.forceDelete');
    }
}