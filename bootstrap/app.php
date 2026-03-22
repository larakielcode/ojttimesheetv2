<?php
declare(strict_types=1);

use App\Core\Database;
use App\Core\Router;
use JetBrains\PhpStorm\NoReturn;

// declare the needed constants
const BASE_PATH = __DIR__ . '/../';

// get the necessary values needed for the router
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


// All functions should be down below
function basePath(string $path): string
{
    return BASE_PATH . $path;
}

function views(string $path): string
{
    return basePath("views/{$path}");
}

#[NoReturn]
function dd(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit();
}


// SPL Autoloader here
spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require basePath("{$className}.php");
});