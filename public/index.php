<?php

use App\Core\Router;

require __DIR__ . '/../bootstrap/app.php';

// declare a router object
$router = new Router();

// require the routes file
require basePath('routes/routes.php');

// get the route
$router->route($method, $uri);

echo "entry index";