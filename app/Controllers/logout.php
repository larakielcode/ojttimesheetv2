<?php

use App\Core\Session;

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    Session::destroy();
    header("location: /");
    exit();
} else {
    echo "Page not found.<br>";
    echo "<a href='/'>Go Home</a>";

}
