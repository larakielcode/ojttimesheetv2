<?php
declare(strict_types=1);

namespace app\Core\Middleware;

class Guest
{

    public function handle(): void
    {
        if ($_SESSION ?? false) {
            header("location: /dashboard");
            exit();
        }
    }

}