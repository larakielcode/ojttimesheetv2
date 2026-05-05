<?php

use App\Core\User;

views('dashboard.view.php', ['logged_user_name' => $_SESSION['logged_on_user']['email']]);