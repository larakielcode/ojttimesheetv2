<?php

declare(strict_types=1);

namespace App\Core;
use App\Core\Database;

$config = require basePath('config/config.php');
Database::getConnection($config);

class User
{
    private ?string $displayName = null;
    public function __construct(
        private int $accounts_id,
        private string $email,
        private string $role
    )
    {}

    public function getDisplayName(): string
    {
        $table_details = $this->role === 'admin' ? 'admin_details' : 'intern_details';
        $column_details = $table_details === 'admin_details' ? 'admin_id' : 'intern_id';
        $name = Database::query
                        ("SELECT first_name,  last_name FROM {$table_details} WHERE {$column_details} = :accounts_id", 
                        ['accounts_id' => $this->accounts_id])->fetch();

        $this->displayName = trim(($name['first_name'] ?? ''). " ". ($name['last_name'] ?? ''));
        
        return $this->displayName;
    }
}

