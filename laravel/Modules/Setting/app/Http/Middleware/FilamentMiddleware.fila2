<?php

declare(strict_types=1);

namespace Modules\Setting\Http\Middleware;

use Modules\Xot\Http\Middleware\XotBaseFilamentMiddleware;

class FilamentMiddleware extends XotBaseFilamentMiddleware
{
    public static string $module = 'Setting';

    public static string $context = 'setting-filament';

    /*
    private function getModule(): Module {
        return app('modules')->findOrFail(static::$module);
    }


    private function getContextName(): string {

        return \Str::of(static::$context)->kebab()->toString();
    }
    protected function authenticate($request, array $guards): void
    {
        $context = $this->getContextName();
        $guardName = config("$context.auth.guard");
        $guard = $this->auth->guard($guardName);

        if (!$guard->check()) {
            $this->unauthenticated($request, $guards);

            return;
        }

        $this->auth->shouldUse($guardName);

        $user = $guard->user();

        if ($user instanceof FilamentUser) {
            abort_if(!$user->canAccessFilament(), 403);

            return;
        }

        abort_if(config('app.env') !== 'local', 403);
    }

    protected function redirectTo($request): string
    {
        $context = $this->getContextName();
        return route("$context.auth.login");
    }
    */
}
