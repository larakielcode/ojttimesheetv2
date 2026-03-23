<?php

declare(strict_types=1);

namespace App\Core;

use http\Exception\RuntimeException;
use PDO;

// I am marking this class as final so you know you dont want to extend here :P


final class Database
{
    private static ?PDO $instance = null;

    private function __construct()
    {
    }

    public static function getConnection(array $config = []): PDO
    {
        if (self::$instance !== null) return self::$instance;

        if (empty($config)) {
            throw new \PDOException("Database config missing on first initialization");
        }


        try {
            $db = $config['database'];
            $dsn = "mysql:host={$db['db_host']};dbname={$db['db_name']};charset={$db['charset']}";

            self::$instance = new PDO($dsn, $db['db_user'], $db['db_pass'], $config['pdo_options'] ?? []);
        } catch (\PDOException $e) {
            die("Connection to db failed: " . $e->getMessage());
        }

        return self::$instance;
    }

    public static function query(string $query, array $params = []): \PDOStatement
    {
        if (self::$instance === null) {
            throw new RuntimeException('Database must be initialized.');
        }

        $statement = self::$instance->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    // Prevent cloning of instance
    private function __clone()
    {
    }

    // Prevent unserialization backdoor
    public function __wakeup()
    {
    }
}
