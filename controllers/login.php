<?php

declare(strict_types=1);

// check if form was submitted
if (!isset($_POST["submit"])) {
    header("location: /");
    die();
}



// get the post data
/* $email = trim($_POST['email']);
$password = trim($_POST['password']);

$userlogin = new Login($email, $password, $connection);
$userlogin->loginUser(); */