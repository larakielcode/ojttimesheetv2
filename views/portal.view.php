<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/portal.css">
  <title>Intern Timetracker Portal</title>
</head>

<body class="initial-body">

  <!-- Start SIDENAV -->
  <div class="nav-side-bar">

    <!-- Start NAV PROFILE -->
    <div class="nav-profile-container">
      <img src="../assets/images/profile.png" alt="" class="profile-pic">
      <p class="nav-profile-title">IT Administrator</p>
      <div>
        <div>
          <a href="#" class="flex items-center gap-1 hover:underline">
            <p class="nav-profile-subtitle pt-0.5">VIEW PROFILE</p>
          </a>
        </div>
      </div>
    </div>
    <!-- End NAV PROFILE -->


    <!-- Start NAV MENU -->
    <div class="nav-menu">
      <ul class="flex flex-col h-full">

        <li class="border-b border-b-stone-400/20"></li>

        <li>
          <a class="nav-link-item-active flex items-center gap-2" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4.5">
              <path fill-rule="evenodd"
                d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z"
                clip-rule="evenodd" />
              <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z" />
            </svg>
            Dashboard</a>
        </li>

        <li>
          <a class="nav-link-item flex items-center gap-2" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4.5">
              <path
                d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
            </svg>
            Interns</a>
        </li>

        <li>
          <a class="nav-link-item flex items-center gap-2" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4.5">
              <path fill-rule="evenodd"
                d="M2.25 2.25a.75.75 0 0 0 0 1.5H3v10.5a3 3 0 0 0 3 3h1.21l-1.172 3.513a.75.75 0 0 0 1.424.474l.329-.987h8.418l.33.987a.75.75 0 0 0 1.422-.474l-1.17-3.513H18a3 3 0 0 0 3-3V3.75h.75a.75.75 0 0 0 0-1.5H2.25Zm6.54 15h6.42l.5 1.5H8.29l.5-1.5Zm8.085-8.995a.75.75 0 1 0-.75-1.299 12.81 12.81 0 0 0-3.558 3.05L11.03 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l2.47-2.47 1.617 1.618a.75.75 0 0 0 1.146-.102 11.312 11.312 0 0 1 3.612-3.321Z"
                clip-rule="evenodd" />
            </svg>
            Timesheet</a>
        </li>

        <li>
          <a class="nav-link-item flex items-center gap-2" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4.5">
              <path
                d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 0 1-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 0 1 6.126 3.537ZM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 0 1 0 .75l-1.732 3c-.229.397-.76.5-1.067.161A5.23 5.23 0 0 1 6.75 12a5.23 5.23 0 0 1 1.37-3.536ZM10.878 17.13c-.447-.098-.623-.608-.394-1.004l1.733-3.002a.75.75 0 0 1 .65-.375h3.465c.457 0 .81.407.672.842a5.252 5.252 0 0 1-6.126 3.539Z" />
              <path fill-rule="evenodd"
                d="M21 12.75a.75.75 0 1 0 0-1.5h-.783a8.22 8.22 0 0 0-.237-1.357l.734-.267a.75.75 0 1 0-.513-1.41l-.735.268a8.24 8.24 0 0 0-.689-1.192l.6-.503a.75.75 0 1 0-.964-1.149l-.6.504a8.3 8.3 0 0 0-1.054-.885l.391-.678a.75.75 0 1 0-1.299-.75l-.39.676a8.188 8.188 0 0 0-1.295-.47l.136-.77a.75.75 0 0 0-1.477-.26l-.136.77a8.36 8.36 0 0 0-1.377 0l-.136-.77a.75.75 0 1 0-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 0 0-1.3.75l.392.678a8.29 8.29 0 0 0-1.054.885l-.6-.504a.75.75 0 1 0-.965 1.149l.6.503a8.243 8.243 0 0 0-.689 1.192L3.8 8.216a.75.75 0 1 0-.513 1.41l.735.267a8.222 8.222 0 0 0-.238 1.356h-.783a.75.75 0 0 0 0 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 0 0 .513 1.41l.735-.268c.197.417.428.816.69 1.191l-.6.504a.75.75 0 0 0 .963 1.15l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 0 0 1.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.77a.75.75 0 0 0 1.477.261l.137-.772a8.332 8.332 0 0 0 1.376 0l.136.772a.75.75 0 1 0 1.477-.26l-.136-.771a8.19 8.19 0 0 0 1.294-.47l.391.677a.75.75 0 0 0 1.3-.75l-.393-.679a8.29 8.29 0 0 0 1.054-.885l.601.504a.75.75 0 0 0 .964-1.15l-.6-.503c.261-.375.492-.774.69-1.191l.735.267a.75.75 0 1 0 .512-1.41l-.734-.267c.115-.439.195-.892.237-1.356h.784Zm-2.657-3.06a6.744 6.744 0 0 0-1.19-2.053 6.784 6.784 0 0 0-1.82-1.51A6.705 6.705 0 0 0 12 5.25a6.8 6.8 0 0 0-1.225.11 6.7 6.7 0 0 0-2.15.793 6.784 6.784 0 0 0-2.952 3.489.76.76 0 0 1-.036.098A6.74 6.74 0 0 0 5.251 12a6.74 6.74 0 0 0 3.366 5.842l.009.005a6.704 6.704 0 0 0 2.18.798l.022.003a6.792 6.792 0 0 0 2.368-.004 6.704 6.704 0 0 0 2.205-.811 6.785 6.785 0 0 0 1.762-1.484l.009-.01.009-.01a6.743 6.743 0 0 0 1.18-2.066c.253-.707.39-1.469.39-2.263a6.74 6.74 0 0 0-.408-2.309Z"
                clip-rule="evenodd" />
            </svg>
            Settings</a>
        </li>

        <li class="border-b border-b-stone-400/20 mt-auto"></li>
        <!-- <li class="mb-10">
          <a class="nav-link-item-logout flex items-center gap-2" href="/logout">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4.5">
              <path fill-rule="evenodd"
                d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z"
                clip-rule="evenodd" />
            </svg>
            Logout</a>
        </li>
 -->
        <li class="mb-10">
          <form action="/logout" method="post">
            <button class="nav-link-item-logout items-center gap-2 flex w-full cursor-pointer" name="submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4.5">
              <path fill-rule="evenodd"
                d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z"
                clip-rule="evenodd" />
            </svg>Logout</button>
          </form>
        </li>
      </ul>
    </div>
    <!-- End NAV MENU -->

  </div>
  <!-- End SIDENAV -->


  <!-- Start MAIN CONTENT -->
  <div class="main-content-container">

    <!-- Start TOP -->
    <div class="top-container">
      <div class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="#2056a1"
          class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
        </svg>
        <h1 class="header-logo">
          <span class="text-primary">Intern</span>
          <span class="text-second">Timetracker</span>
          <span class="text-stone-500">Portal</span>
        </h1>
      </div>
    </div>
    <!-- End TOP -->

    <!-- Start CONTENT -->
    <div class="content-main-container"> <!-- flex flex-col -->

      <!-- Start CONTENT TITLE -->
      <h1 class="content-heading">Dashboard</h1>
      <!-- End CONTENT TITLE -->

      <!-- Start CONTENT -->
      <div class="dashboard-card-container">

        <div
          class="dashboard-card-item  text-green-700 border border-green-500/20 bg-green-100 hover:bg-green-200 transition-all duration-500 ease-out">
          <p class="text-3xl font-bold">200</p>
          <p class="text-xs text-zinc-600 mt-2"># of active Interns</p>
        </div>

        <div
          class="dashboard-card-item  text-amber-700 border border-amber-500/20 bg-amber-100 hover:bg-amber-200 transition-all duration-500 ease-out">
          <p class="text-3xl font-bold">30</p>
          <p class="text-xs text-zinc-600 mt-2"># of time logs pending</p>
        </div>

        <div
          class="dashboard-card-item  text-red-700 border border-red-500/20 bg-red-100 hover:bg-red-200 transition-all duration-500 ease-out">
          <p class="text-3xl font-bold">10</p>
          <p class="text-xs text-zinc-600 mt-2"># of deactivated Interns</p>
        </div>

        <div
          class="dashboard-card-item  text-green-700 border border-green-500/20 bg-green-100 hover:bg-green-200 transition-all duration-500 ease-out">
          <p class="text-3xl font-bold">12</p>
          <p class="text-xs text-zinc-600 mt-2"># of completed Interns</p>
        </div>

      </div>
      <!-- End CONTENT -->

      <div class="content-activity-container">

        <div class="para-list-box">
          <div
            class="flex items-center gap-1 text-primary-light text-shadow-md text-shadow-white border-b border-b-stone-400/20 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4.5">
              <path fill-rule="evenodd"
                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                clip-rule="evenodd" />
            </svg>
            <h2 class="font-bold text-base tracking-tight">Action History</h2>
          </div>
          <div class="mt-2 flex flex-col gap-1">
            <p class="para-list-update">IT Admin last successful login <span class="login">Saturday,
                April
                4, 2026 1:57:12 AM</span></p>
            <p class="para-list-update"">IT Admin recently enrolled <span class=" confirmed">5 new
              Interns</span> this week.
            </p>
            <p class="para-list-update"">IT Admin recently <span class=" pending">approved 18
              time logs</span>.</p>
            <p class="para-list-update"">IT Admin recently <span class=" alertred">deactivated 3
              Interns.</span></p>
          </div>
        </div>

        <div class="para-list-box">
          <div
            class="flex items-center gap-1 text-primary-light text-shadow-md text-shadow-white border-b border-b-stone-400/20 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4.5">
              <path
                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
              <path
                d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
            </svg>
            <h2 class="font-bold text-base tracking-tight">Interns Activity</h2>
          </div>
          <div class="mt-2 flex flex-col gap-1">
            <p class="para-list-update" border border-stone-400/20">Jeralph Alinsonorin <span class="login">logs in
                Saturday, April 4,
                2026 1:57:12 AM</span></p>
            <p class="para-list-update"">Riddick Goco <span class=" login">logs in
              Saturday, April 4,
              2026 1:57:12 AM</span></p>
            <p class="para-list-update"">Jean Claudette Peña <span class=" login">logs in
              Saturday, April 4,
              2026 1:57:12 AM</span></p>
            <p class="para-list-update"">Jean Claudette Peña <span class=" pending">has a
              pending
              time log for approval from admin.</span></p>
            <p class="para-list-update"">Riddick Goco <span class=" pending">has a
              pending
              time log for approval from admin.</span></p>
            <p class="para-list-update"">Jeralph Alinsonorin <span class=" pending">has a
              pending
              time log for approval from admin.</span></p>
          </div>

        </div>

        <div class="para-list-box">
          <!-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.2516392283815!2d123.90163447569977!3d10.321735467414618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99954e5b093c5%3A0x2c631ca9b9824245!2s1Nito%20Tower!5e0!3m2!1sen!2sph!4v1775243282295!5m2!1sen!2sph"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe> --> <!-- 1Nito MAP -->
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.2629980976553!2d121.06063457574105!3d14.584084177479538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c811430510c5%3A0x78b98265590b575c!2sOne%20Corporate%20Centre!5e0!3m2!1sen!2sph!4v1775243933082!5m2!1sen!2sph"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

      </div>

    </div>
    <!-- End CONTENT -->

  </div>
  <!-- End MAIN CONTENT -->

</body>

</html>