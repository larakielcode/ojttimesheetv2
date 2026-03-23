<?php

// Routes for Login
$router->get('/', 'app/Controllers/login/index.php')->only('guest'); # view the login page
$router->post('/', 'app/Controllers/login/login.php'); # logged the user in
$router->get('/login', 'app/Controllers/login/index.php')->only('guest');
$router->get('/logout', 'app/Controllers/logout.php')->only('auth');


// Routes for Dashboard
$router->get('/dashboard', 'app/Controllers/dashboard/index.php')->only('auth'); # view the dashboard


// this is for migrations
//$router->get('/migrations', 'migrations/migrations.php');