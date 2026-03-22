<?php

use App\Core\Database;
use App\Core\Validation;

$config = require basePath('config/config.php');
$connection = Database::getConnection($config);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (Validation::isEmpty($email) || Validation::isEmpty($password)) {
        $errors['login'] = "Email and password are required.";
    }

    // if all validation pass then call the login class - to be refactor

    $user = Database::query("SELECT password FROM users_login WHERE email = :email", [$email])->fetch();

    if ($user && password_verify($password, $user['password'])) {
        dd("User found log the user in");
    } else {
        $errors['login'] = "Enter a valid username or password.";
    }
}

require views('login_page.php');