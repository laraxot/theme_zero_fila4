<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeDefaultvalue;
use Modules\Xot\Contracts\UserContract;

class LimeDefaultvaluePolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_defaultvalue.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeDefaultvalue $lime_defaultvalue): bool
    {
        return $user->hasPermissionTo('lime_defaultvalue.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_defaultvalue.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeDefaultvalue $lime_defaultvalue): bool
    {
        return $user->hasPermissionTo('lime_defaultvalue.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeDefaultvalue $lime_defaultvalue): bool
    {
        return $user->hasPermissionTo('lime_defaultvalue.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeDefaultvalue $lime_defaultvalue): bool
    {
        return $user->hasPermissionTo('lime_defaultvalue.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeDefaultvalue $lime_defaultvalue): bool
    {
        return $user->hasPermissionTo('lime_defaultvalue.forceDelete');
    }
}