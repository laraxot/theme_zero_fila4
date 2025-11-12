<?php

declare(strict_types=1);


namespace Modules\Cms\Http\Middleware;

use Illuminate\Contracts\Http\Kernel;
use Closure;
use Illuminate\Http\Request;
use Modules\Cms\Models\Page;
use Symfony\Component\HttpFoundation\Response;

class PageSlugMiddleware
{
    protected Kernel $kernel;

    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('slug');

        // Handle case where slug might be null
        if (!$slug) {
            return $next($request);
        }

        $middlewares = Page::getMiddlewareBySlug($slug);
        // Should return ["auth", "Modules\User\Http\Middleware\EnsureUserHasType:doctor"]

        if (empty($middlewares)) {
            return $next($request);
        }
        $this->kernel = app(Kernel::class);
        // Execute middlewares manually in a chain
        return $this->executeMiddlewareChain($request, $middlewares, $next);
    }

    /**
     * Parse a middleware string to get the name and parameters.
     *
     * @param  string  $middleware
     * @return array
     */
    protected function parseMiddleware($middleware)
    {
        [$name, $parameters] = array_pad(explode(':', $middleware, 2), 2, []);

        if (is_string($parameters)) {
            $parameters = explode(',', $parameters);
        }

        return [$name, $parameters];
    }

    /**
     * Execute middleware chain manually
     */
    protected function executeMiddlewareChain(Request $request, array $middlewares, Closure $finalNext): Response
    {
        if (empty($middlewares)) {
            return $finalNext($request);
        }

        $middleware = array_shift($middlewares);

        [$middlewareClass, $parameters] = $this->parseMiddleware($middleware);

        // Resolve middleware class name if it's an alias
        $middlewareClass = $this->resolveMiddlewareClass($middlewareClass);
        // Create middleware instance
        $middlewareInstance = app($middlewareClass);

        // Create next closure for remaining middlewares
        $next = fn ($request) => $this->executeMiddlewareChain($request, $middlewares, $finalNext);

        // Execute current middleware
        if (empty($parameters)) {
            return $middlewareInstance->handle($request, $next);
        } else {
            return $middlewareInstance->handle($request, $next, ...$parameters);
        }
    }

    /**
     * Resolve middleware class name from alias
     */
    protected function resolveMiddlewareClass(string $middleware): string
    {
        // Get middleware aliases from HTTP kernel
        // $kernel = app(\Illuminate\Contracts\Http\Kernel::class);

        // Try to get from route middleware (custom middleware)

        $routeMiddleware = $this->kernel->getRouteMiddleware();
        if (isset($routeMiddleware[$middleware])) {
            return $routeMiddleware[$middleware];
        }

        // If not an alias, return as-is (assuming it's a full class name)
        return $middleware;
    }
}
