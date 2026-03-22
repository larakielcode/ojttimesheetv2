<?php
declare(strict_types=1);

class Login
{
    public function __construct(
        private string $email,
        private string $password,
        private PDO    $connection
    )
    {
    }

    
}
