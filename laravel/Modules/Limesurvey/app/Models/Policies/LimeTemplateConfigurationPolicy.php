<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTemplateConfiguration;
use Modules\Xot\Contracts\UserContract;

class LimeTemplateConfigurationPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_template_configuration.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTemplateConfiguration $lime_template_configuration): bool
    {
        return $user->hasPermissionTo('lime_template_configuration.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_template_configuration.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTemplateConfiguration $lime_template_configuration): bool
    {
        return $user->hasPermissionTo('lime_template_configuration.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTemplateConfiguration $lime_template_configuration): bool
    {
        return $user->hasPermissionTo('lime_template_configuration.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTemplateConfiguration $lime_template_configuration): bool
    {
        return $user->hasPermissionTo('lime_template_configuration.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTemplateConfiguration $lime_template_configuration): bool
    {
        return $user->hasPermissionTo('lime_template_configuration.forceDelete');
    }
}