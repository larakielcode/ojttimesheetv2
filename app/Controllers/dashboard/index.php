<?php

use App\Core\Session;

Session::checkIdle(); # this will check if the user is inactive for 30mins


//echo "Hello! Welcome to the dashboard <br><br>{$_SESSION['logged_on_user']['email']}";

require views('portal.view.php');