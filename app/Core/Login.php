<?php
declare(strict_types=1);

namespace App\Core;

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
    public static function executeLogin($users_id, $email, $role): self
    {
        // instantiate
        $login = new self($users_id, $email, $role);

        // perform sessions set
        Session::authenticate($users_id, $email, $role);

        // update the last login time
        $login->updateLastLogin();

        return $login;
    }

    private function updateLastLogin(): void
    {
        $timenow = date('Y-m-d H:i:s');

        Database::query(
            "UPDATE users_login SET last_login = :time WHERE users_id = :id",
            ['time' => $timenow, 'id' => $this->users_id]
        );
    }

}
