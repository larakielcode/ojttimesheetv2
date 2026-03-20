<?php

declare(strict_types=1);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => controller('index.php'),
    '/login' => controller('login.php'),
    '/dashboard' => controller('dashboard.php'),
    // no need to change below migration line as this should only be run once during deployment
    '/migration' => base_path('migrations/migrations.php'),
];

function routeToController(string $uri, array $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}

function abort(int $code): void
{
    http_response_code($code);
    // should require a 404(code) page but for now lets echo a response
    echo "Error {$code}: Page not found.";
    echo "<br><br><a href='/'>Go back homepage.</a>";
    die();
}
