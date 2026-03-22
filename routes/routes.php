<?php

$router->get('/', 'app/Controllers/login/index.php');
$router->post('/', 'app/Controllers/login/create.php');


// this is for migrations
$router->get('/migrations', 'migrations/migrations.php');


$router->get('/test', 'app/Controllers/login/test.php');