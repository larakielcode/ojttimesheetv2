<?php
declare(strict_types=1);

namespace app\Core\Middleware;

class Middleware
{
    public const mwMAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key): void
    {
        $middleware = static::mwMAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No middleware found for key: {$key}");
        }

        (new $middleware())->handle();
    }
}