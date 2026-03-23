<?php
declare(strict_types=1);

final class Redirect
{
    public static function toDashboard(): void
    {
        header("location: /dashboard");
        exit();
    }
}
