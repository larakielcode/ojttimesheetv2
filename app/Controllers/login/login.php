<?php

use App\Core\Database;
use App\Core\Login;
use App\Core\Redirect;
use App\Core\Validation;

$config = require basePath('config/config.php');

// set the default timezone
date_default_timezone_set($config['app_details']['app_tzone']);

Database::getConnection($config);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (Validation::isEmpty($email) || Validation::isEmpty($password)) {
        $errors['login'] = "Email and password are required.";
    }

    if (empty($errors)) {

        try {

            $user = Database::query("SELECT accounts_id, password, role FROM accounts WHERE email = :email", ['email' => $email])->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $loggedUser = Login::executeLogin($user['accounts_id'], $email, $user['role']);

                Redirect::toDashboard();
            } else {
                $errors['login'] = "Incorrect email or password.";
            }
        } catch (\PDOException $e) {

            $errors['login'] = "A database error occurred.";
        }
    }
}

views('login.view.php',['errors' => $errors]);
