<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'includes/functions.php';


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => base_path('controllers/index.controller.php'),
    '/test' => base_path('controllers/test.php'),
    '/migration' => base_path('migrations/migrations.php'),
];

require base_path('classes/Router.class.php');

Router::route($uri, $routes);
