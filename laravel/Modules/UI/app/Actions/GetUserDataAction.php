<?php

declare(strict_types=1);


namespace Modules\UI\Actions;

use Illuminate\Support\Facades\Auth;
use Modules\UI\Data\UserData;
use Spatie\QueueableAction\QueueableAction;

class GetUserDataAction
{
    use QueueableAction;

    public function execute(): null|UserData
    {
        $user = Auth::user();

        if (!$user) {
            return null;
        }

        return new UserData(
            id: (int) $user->id,
            name: $user->name ?? '',
            email: $user->email ?? '',
            avatar: $user->avatar ?? null,
            role: $user->role ?? null,
            permissions: $user->permissions->toArray() ?? [],
            settings: $user->settings ?? [],
        );
    }
}
