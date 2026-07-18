<?php

declare(strict_types=1);

namespace SmartAutomation\Core;

use PDO;

final class Database
{
    private ?PDO $connection = null;

    public function __construct(private readonly Config $config)
    {
    }

    public function connection(): PDO
    {
        if ($this->connection instanceof PDO) {
            return $this->connection;
        }

        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $this->config->get('DB_HOST', 'localhost'),
            $this->config->get('DB_PORT', '3306'),
            $this->config->get('DB_DATABASE'),
            $this->config->get('DB_CHARSET', 'utf8mb4'),
        );

        return $this->connection = new PDO($dsn, (string) $this->config->get('DB_USERNAME'), (string) $this->config->get('DB_PASSWORD'), [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }
}
