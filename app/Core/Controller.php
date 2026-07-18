<?php

declare(strict_types=1);

namespace SmartAutomation\Core;

abstract class Controller
{
    /** @param array<string, mixed> $data */
    protected function view(string $view, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        require dirname(__DIR__) . '/Views/' . $view . '.php';
    }
}
