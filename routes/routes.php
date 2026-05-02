<?php

# Routes for Login
$router->get('/', 'app/Controllers/login/index.php')->only('guest'); # view the login page | login.view.php
$router->post('/login', 'app/Controllers/login/login.php'); # logged the user in

$router->get('/login', 'app/Controllers/login/index.php')->only('guest'); # login link login.view.php

# Routes for Logout
$router->get('/logout', 'app/Controllers/logout.php')->only('auth');
$router->post('/logout', 'app/Controllers/logout.php');


# Routes for Dashboard
$router->get('/dashboard', 'app/Controllers/dashboard/index.php')->only('auth'); # view the dashboard | portal.view.php


# Routes for sites
$router->get('/sites/create', 'app/Controllers/sites/index.php')->only('auth');
$router->post('/sites/create', 'app/Controllers/sites/create.php');

# this is for migrations
$router->get('/migrations', 'migrations/migrations.php');
