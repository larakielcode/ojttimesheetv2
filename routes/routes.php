<?php

// Routes for Login
$router->get('/', 'app/Controllers/login/index.php'); # view the login page
$router->post('/', 'app/Controllers/login/login.php'); # logged the user in

// Routes for Dashboard
$router->get('/dashboard', 'app/Controllers/dashboard/index.php'); # view the dashboard


// this is for migrations
//$router->get('/migrations', 'migrations/migrations.php');