<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    protected array $routes = [];

    protected function add(string $method, string $uri, mixed $controller): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get(string $uri, mixed $controller): void
    {
        $this->add('GET', $uri, $controller);
    }

    public function route(string $method, string $uri): mixed
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                return require basePath($route['controller']);
            }
        }
    }
}

//$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//
//$routes = [
//    '/' => controller('index'),
//    '/login' => view('login_page'),
//    '/dashboard' => controller('dashboard'),
//    // no need to change below migration line as this should only be run once during deployment
//    '/migration' => base_path('migrations/migrations'),
//];
//
//function routeToController(string $uri, array $routes): void
//{
//    if (array_key_exists($uri, $routes)) {
//        require $routes[$uri];
//    } else {
//        abort(404);
//    }
//}
//
//function abort(int $code): void
//{
//    http_response_code($code);
//    // should require a 404(code) page but for now lets echo a response
//    echo "Error {$code}: Page not found.";
//    echo "<br><br><a href='/'>Go back homepage.</a>";
//    die();
//}
