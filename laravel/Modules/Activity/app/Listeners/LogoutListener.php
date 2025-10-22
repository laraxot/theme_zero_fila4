<?php

declare(strict_types=1);

namespace Modules\Activity\Listeners;

use Illuminate\Auth\Events\Logout;

class LogoutListener
{
    /**
     * Handle the event.
     */
    public function handle(Logout $_event): void
    {
        // Implementazione del logout tracking
    }
}
