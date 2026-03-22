<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strlen($password) < 3) {
        $errors['login'] = 'A password must be greater than 3.';
    }
}

require views('login_page.php');