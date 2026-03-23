<?php
declare(strict_types=1);

namespace app\Core\Middleware;

class Auth
{
    public function handle()
    {
        if (!$_SESSION ?? false) {
            header("location: /login");
            exit();
        }
    }

}