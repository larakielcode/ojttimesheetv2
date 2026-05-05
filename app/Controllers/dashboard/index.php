<?php

use App\Core\User;

$user = new User($_SESSION['logged_on_user']['users_id']);

views('dashboard.view.php', ['logged_user_name' => $get_user]);