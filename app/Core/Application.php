<?php

declare(strict_types=1);

namespace SmartAutomation\Core;

final class Application
{
    public function __construct(
        private readonly Router $router,
    ) {
    }

    public function run(Request $request): void
    {
        $this->router->dispatch($request);
    }
}
