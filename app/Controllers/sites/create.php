<?php

use App\Core\Database;
use App\Core\Redirect;
use App\Core\Sites;
use App\Core\Validation;

$errors = [];
$config = require basePath('config/config.php');
Database::getConnection($config);

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $sitename = trim($_POST['sitename']);

    if (Validation::isEmpty($sitename)) {
        $errors['site'] = "Site name is required.";
    }

    if (Validation::isEmpty($errors)) {
        $result = Sites::siteAdd($sitename);
        if ($result) {
            header("location: /sites/create");
            $_SESSION['successMsg'] = "Site name added successfully.";
            exit();
        }
    }
}

require views('sites/index.php');
