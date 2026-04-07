<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/output.css" rel="stylesheet">
</head>

<body class="bg-stone-900/10 flex-center h-screen flex-col font-poppins">

    <img class="block w-100 mb-15" src="../assets/images/omegalogo.png" alt="Company Logo">
    <div class="w-125 border border-stone-200 shadow-sm rounded-md p-5 bg-stone-100/70">
        <h1 class="my-5 text-3xl font-semibold tracking-tight text-second text-center">
            OJT Timetracker Portal
        </h1>
        <form action="/" method="post" class="flex flex-col gap-2 p-2">
            <label class="label-primary" for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="user@domain.com" required autocomplete="email"
                class="textbox-primary">
            <label class="label-primary mt-4" for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required
                class="textbox-primary">
            <button type="submit" name="submit" class="button-primary mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z"
                        clip-rule="evenodd" />
                </svg>
                Login</button>
        </form>
        <div>
            <?php if (isset($errors['login'])): ?>
                <p style="color: red; font-weight: 500; font-size: 14px; text-align: center; margin: 10px 0 5px 0;">

                    <?= $errors['login'] ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>