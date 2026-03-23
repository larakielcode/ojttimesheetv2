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

        Session::authenticate($this->users_id, $this->email, $this->role);
    }

}
