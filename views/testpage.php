<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | OMH IT Timetracker</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <header>
            <img src="../assets/images/omegalogo.png" alt="Omega Healthcare" class="logo">
            <p class="subtitle">OMH Intern TimeTracker</p>
        </header>

        <form action="/" method="POST">
            <div class="input-wrapper">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="e.g. j.doe@omega.com" required>
            </div>

            <div class="input-wrapper">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>

        <footer>
            <p>&copy; 2026 Omega Healthcare Cebu</p>
        </footer>
    </div>
</div>

</body>
</html>