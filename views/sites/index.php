<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sites</title>
</head>
<body>

<form action="/sites/create" method="post">
    <table>
        <tr>
            <td><label for="sitename">Site Name</label></td>
            <td><input type="text" name="sitename" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="submit">Add site</button>
            </td>
        </tr>
    </table>
</form>

<br>
<br>
<a href="/dashboard">Go back to dashboard</a>

</body>
</html>