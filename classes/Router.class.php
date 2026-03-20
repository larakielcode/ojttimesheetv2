<?php

declare(strict_types=1);

class Router
{

    public static function route(string $uri, array $routes): void
    {
        if (array_key_exists($uri, $routes)) {
            require $routes[$uri];
        } else {
            echo "bleh";
        }
    }
}
