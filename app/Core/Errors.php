<?php 

declare(strict_types=1); 

namespace App\Core;

final class Errors {
    public static function abort(string $message, int $errorCode = 404): void
    {
        http_response_code($errorCode);
        echo $message;
        exit();
    }
}