<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeExpressionError;
use Modules\Xot\Contracts\UserContract;

class LimeExpressionErrorPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_expression_error.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeExpressionError $lime_expression_error): bool
    {
        return $user->hasPermissionTo('lime_expression_error.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_expression_error.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeExpressionError $lime_expression_error): bool
    {
        return $user->hasPermissionTo('lime_expression_error.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeExpressionError $lime_expression_error): bool
    {
        return $user->hasPermissionTo('lime_expression_error.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeExpressionError $lime_expression_error): bool
    {
        return $user->hasPermissionTo('lime_expression_error.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeExpressionError $lime_expression_error): bool
    {
        return $user->hasPermissionTo('lime_expression_error.forceDelete');
    }
}