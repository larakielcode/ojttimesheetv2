<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    protected array $routes = [];

    protected function add(string $method, string $uri, mixed $controller): object
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get(string $uri, mixed $controller): object
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, mixed $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    public function route(string $method, string $uri): mixed
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if ($route['middleware'] === 'guest') {
                    if ($_SESSION['logged_on_user'] ?? false) {
                        header("location: /dashboard");
                        exit();
                    }
                }
                if ($route['middleware'] === 'auth') {
                    if (!$_SESSION['logged_on_user'] ?? false) {
                        header("location: /login");
                        exit();
                    }
                }
                return require basePath($route['controller']);
            }
        }
        return false; # get back to this after creating errors page
    }

    public function only($key): object
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

}
