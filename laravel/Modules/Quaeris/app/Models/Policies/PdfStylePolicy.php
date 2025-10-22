<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models\Policies;

use Modules\Quaeris\Models\PdfStyle;
use Modules\User\Models\Policies\UserBasePolicy;
use Modules\Xot\Contracts\UserContract;

class PdfStylePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('pdf_style.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, PdfStyle $pdfStyle): bool
    {
        return $user->hasPermissionTo('pdf_style.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('pdf_style.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, PdfStyle $pdfStyle): bool
    {
        return $user->hasPermissionTo('pdf_style.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, PdfStyle $pdfStyle): bool
    {
        return $user->hasPermissionTo('pdf_style.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, PdfStyle $pdfStyle): bool
    {
        return $user->hasPermissionTo('pdf_style.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, PdfStyle $pdfStyle): bool
    {
        return $user->hasPermissionTo('pdf_style.forceDelete');
    }
}
