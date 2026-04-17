<?php
declare(strict_types=1);

namespace App\Core;

use DateTime;
use DateTimeZone;
use Exception;


class Login
{
    public function __construct(
        private int $users_id,
        private string $email,
        private string $role
    ) {
    }

    //Session::authenticate($this->users_id, $this->email, $this->role);
    public static function executeLogin(int $users_id, string $email, string $role): self
    {
        // instantiate
        $login = new self($users_id, $email, $role);

        // update the last login time
        $time = $login->updateLastLogin();

        // perform sessions set
        Session::authenticate($users_id, $email, $role, $time);

        return $login;
    }

    private function updateLastLogin(): int
    {
        $timestamp = time();
        $time = date('Y-m-d H:i:s', $timestamp);

        Database::query(
            "UPDATE users_login SET last_login = :time WHERE users_id = :id",
            ['time' => $time, 'id' => $this->users_id]
        );

        return $timestamp;
    }

}
