<!-- admin_dashboard-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="/public/assets/css/admin_sidebar.css" />
  <title>Omega Healthcare – Admin Sidebar</title>
</head>
<body>

  <aside class="sidebar">

    <div class="sidebar-logo">
      <div class="logo-placeholder">
        <img src="/public/assets/images/omegalogo.png" alt="">
      </div>
    </div>

    <nav class="sidebar-nav">

      <!-- Dashboard-->
      <a href="#" class="nav-item active">
        Dashboard
        <img src="/public/assets/images/dashboard_icon.png" alt="Dashboard icon">
      </a>

      <!-- Reports -->
      <a href="#" class="nav-item">
        Reports
        <img src="/public/assets/images/reports_icon.png" alt="Reports icon">
      </a>

      <!-- Interns -->
      <a href="#" class="nav-item">
        Interns
        <img src="/public/assets/images/interns_icon.png" alt="Interns icon">
      </a>

    </nav>

    <div class="sidebar-footer">
      <button class="logout-btn">Log Out</button>
    </div>
  </aside>

  <div class="main">
    <header class="topbar">
      <span class="topbar-user">Currently logged as: Admin</span>
      <img src="/public/assets/images/user icon.png" alt="">
    </header>
  </div>

</body>
</html>