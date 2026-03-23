<?php
declare(strict_types=1);

namespace App\Core;


class Login
{
    public function __construct(
        private int $users_id,
        private string $email,
        private string $role
    ) {
        $this->setLogin();
    }

    public function setLogin(): void
    {

        session_regenerate_id(true);

        $_SESSION['logged_on_user'] = [
            'users_id' => $this->users_id,
            'email' => $this->email,
            'role' => $this->role,
            'last_login_time' => time()
        ];
        $_SESSION['is_logged'] = true;
    }

}
