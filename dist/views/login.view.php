<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetracker v2 - Login Page</title>
</head>

<body>
    <center>
        <form action="../includes/login.inc.php" method="post">
            <table>
                <tr>
                    <td><?= $test; ?></td>
                </tr>
                <tr>
                    <td>
                        <h1>Login</h1>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                </tr>
                <tr>
                    <td><input type="email" id="email" name="email" placeholder="Email" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" id="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">Login</button></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>