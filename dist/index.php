<?php
session_start();
include 'includes/general.inc.php';

$test = loginErrors();

if (!isset($_SESSION['logged_user'])) {
    include 'views/login.view.php';
} else {
    include 'views/dashboard.view.php';
}

//use this template to instantiate the user
//$test = new User('aldin', 's', 'moreno', 'usjr', 100, 2, '', '', '', '', 'test@omegahms.com', 'hahapassword', 'admin');
//$test->getUser();
