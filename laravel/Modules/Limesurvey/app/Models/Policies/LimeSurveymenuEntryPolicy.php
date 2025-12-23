<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurveymenuEntry;
use Modules\Xot\Contracts\UserContract;

class LimeSurveymenuEntryPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_surveymenu_entry.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurveymenuEntry $lime_surveymenu_entry): bool
    {
        return $user->hasPermissionTo('lime_surveymenu_entry.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_surveymenu_entry.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurveymenuEntry $lime_surveymenu_entry): bool
    {
        return $user->hasPermissionTo('lime_surveymenu_entry.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurveymenuEntry $lime_surveymenu_entry): bool
    {
        return $user->hasPermissionTo('lime_surveymenu_entry.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurveymenuEntry $lime_surveymenu_entry): bool
    {
        return $user->hasPermissionTo('lime_surveymenu_entry.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurveymenuEntry $lime_surveymenu_entry): bool
    {
        return $user->hasPermissionTo('lime_surveymenu_entry.forceDelete');
    }
}