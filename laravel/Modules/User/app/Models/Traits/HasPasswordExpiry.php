<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Modules\User\Datas\PasswordData;
use Modules\Xot\Actions\Model\HasColumnAction;

trait HasPasswordExpiry
{
    /**
     * Summary of bootHasPasswordExpiry.
     *
     * @return void
     */
    public static function bootHasPasswordExpiry()
    {
        // if (! app(HasColumnAction::class)->execute(auth()->user(), 'password_expires_at')) {
        //    dddx('a');
        // }
        $pwd = PasswordData::make();
        static::creating(function ($model) use ($pwd) {
            if (filled($model->password)) {
                $model->password_expires_at = now()->addDays($pwd->expires_in);
            }
        });

        static::updating(function ($model) use ($pwd) {
            if ($model->isDirty('password') && filled($model->password)) {
                $model->password_expires_at = now()->addDays($pwd->expires_in);
            }
        });
    }
}
