<?php
declare(strict_types=1);

namespace App\Core;

use JetBrains\PhpStorm\NoReturn;

class Login
{
    public function __construct(
        private int    $users_id,
        private string $email,
        private \PDO   $connection
    )
    {
        $this->setLogin();
        dd("user is now logged, before redirecting call to update the last login time here");
    }

    public function setLogin(): void
    {
        // check if session has started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_regenerate_id(true);

        $_SESSION['logged_on_user'] = [
            'users_id' => $this->users_id,
            'email' => $this->email,
            'last_login_time' => time()
        ];
        $_SESSION['is_logged'] = true;
    }

}
