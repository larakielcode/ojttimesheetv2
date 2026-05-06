<?php

use App\Core\User;
use App\Core\Database;

$config = require basePath('config/config.php');
Database::getConnection($config);

$userData = $_SESSION['logged_on_user'];

$user = new User($userData['users_id'],$userData['email'],$userData['role']);
$userDisplayName = $user->getDisplayName();

views('dashboard.view.php', ['logged_user_name' => $userDisplayName]);