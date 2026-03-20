<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'includes/functions.php';

spl_autoload_register(function ($class) {
    dd($class);
});

require base_path('includes/router.php');

routeToController($uri, $routes);
