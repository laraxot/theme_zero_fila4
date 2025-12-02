<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTemplate;
use Modules\Xot\Contracts\UserContract;

class LimeTemplatePolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_template.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTemplate $lime_template): bool
    {
        return $user->hasPermissionTo('lime_template.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_template.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTemplate $lime_template): bool
    {
        return $user->hasPermissionTo('lime_template.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTemplate $lime_template): bool
    {
        return $user->hasPermissionTo('lime_template.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTemplate $lime_template): bool
    {
        return $user->hasPermissionTo('lime_template.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTemplate $lime_template): bool
    {
        return $user->hasPermissionTo('lime_template.forceDelete');
    }
}