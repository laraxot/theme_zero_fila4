<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurveymenu;
use Modules\Xot\Contracts\UserContract;

class LimeSurveymenuPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_surveymenu.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurveymenu $lime_surveymenu): bool
    {
        return $user->hasPermissionTo('lime_surveymenu.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_surveymenu.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurveymenu $lime_surveymenu): bool
    {
        return $user->hasPermissionTo('lime_surveymenu.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurveymenu $lime_surveymenu): bool
    {
        return $user->hasPermissionTo('lime_surveymenu.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurveymenu $lime_surveymenu): bool
    {
        return $user->hasPermissionTo('lime_surveymenu.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurveymenu $lime_surveymenu): bool
    {
        return $user->hasPermissionTo('lime_surveymenu.forceDelete');
    }
}