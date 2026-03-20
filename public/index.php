<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'includes/functions.php';
require base_path('includes/autoloader.php');
require base_path('includes/router.php');
Session::start();
routeToController($uri, $routes);
