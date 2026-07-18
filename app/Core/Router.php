<?php

declare(strict_types=1);

namespace SmartAutomation\Core;

use Closure;

final class Router
{
    /** @var array<string, Closure> */
    private array $routes = [];

    /** @param Closure(Request): void $handler */
    public function get(string $path, Closure $handler): void
    {
        $this->routes['GET:' . $path] = $handler;
    }

    public function dispatch(Request $request): void
    {
        $handler = $this->routes[$request->method . ':' . $request->path] ?? null;

        if (!$handler instanceof Closure) {
            Response::json(['success' => false, 'message' => 'Route not found.'], 404);
        }

        $handler($request);
    }
}
