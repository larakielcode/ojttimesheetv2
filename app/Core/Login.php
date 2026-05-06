<?php
declare(strict_types=1);

namespace App\Core;

use DateTime;
use DateTimeZone;
use Exception;


class Login
{
    public function __construct(
        private int $accounts_id,
        private string $email,
        private string $role
    ) {}

    public static function executeLogin(int $accounts_id, string $email, string $role): self
    {
        // instantiate
        $login = new self($accounts_id, $email, $role);

        // update the last login time
        $time = $login->updateLastLogin();

        // perform sessions set
        Session::authenticate($accounts_id, $email, $role, $time);

        return $login;
    }

    private function updateLastLogin(): int
    {
        $now = new DateTime('now', new DateTimeZone('Asia/Manila'));
        $timestamp = $now->getTimestamp();

        Database::query(
            "UPDATE accounts SET last_login = :time WHERE accounts_id = :id",
            [
                'time' => $now->format('Y-m-d H:i:s'), 
                'id' => $this->accounts_id
            ]
        );

        return $timestamp;
    }

}
