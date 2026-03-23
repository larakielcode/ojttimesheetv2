<?php
use App\Core\Session;
Session::checkIdle(); # this will check if the user is inactive for 30mins


echo "Hello! Welcome to the dashboard";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/logout" method="POST">

        <br>
        <button type="submit" class="logout-btn">
            Logout
        </button>

    </form>
</body>

</html>