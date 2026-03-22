<?php

use App\Core\Validation;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (Validation::isEmpty($email) || Validation::isEmpty($password)) {
        $errors['login'] = "Email and password are required.";
    }

    // log the user
}

require views('login_page.php');