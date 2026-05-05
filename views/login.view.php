<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | Intern Timetracker Portal</title>
    <link rel="stylesheet" href="../assets/css/app.css">
</head>
<body class="font-poppins h-dvh flex flex-col justify-center items-center bground">

<img class="w-80 mb-8" src="../assets/images/omegalogo.png" alt="">
<div class="flex flex-col items-center justify-center bg-stone-100/60 w-fit h-fit rounded-md border border-stone-200 p-5">
    <h1 class="font-bold text-3xl p-5 text-shadow-sm select-none">
        <span class="text-primary">Intern</span> 
        <span class="text-secondary">Timetracker </span>
        <span class="text-stone-600/80">Portal</span>    
    </h1>
    <form action="/login" method="post" class="w-full p-2">
        <label for="email" class="login-label">Email</label>
        <div class="login-textcontainer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 login-icon">
  <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
  <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
</svg>
        <input class="login-textbox" type="email" name="email" id="email" placeholder="email@domain.com" value="<?= isset($errors['login']) ? htmlspecialchars($_POST['email']) : ''; ?>" required />
        </div>
        <label for="password" class="login-label">Password</label>
        <div class="login-textcontainer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 login-icon">
  <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z" clip-rule="evenodd" />
</svg>
        <input class="login-textbox" type="password" name="password" id="password" placeholder="enter password" required />
        </div>
        <div class="flex text-center" id="error-notif">
            <?php if (isset($errors['login'])): ?>
                <span class="error-notif"><?= htmlspecialchars($errors['login']) ?></span>
            <?php endif; ?>
        </div>
        <div class="mt-5 flex justify-center">
            <button class="button-confirm" type="submit" name="submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
  <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z" clip-rule="evenodd" />
</svg>
            Login</button>
        </div>
    </form>
</div>
<p class="text-xs mt-10 py-1 rounded-sm font-medium tracking-tight absolute bottom-3 text-stone-700">
        <a 
        class="hover:bg-secondary-shade hover:py-1 hover:rounded-sm hover:text-white"
        href="https://github.com/larakielcode/ojttimesheetv2" target="_blank"><span class="bg-primary/20 py-1 px-3 rounded-sm">larakielcode</span></a> All rights reserved &copy;2026
    </p>

<script>
    let x = document.getElementById('error-notif');
    if (x.innerText !== "") {
        setTimeout(() => {
            x.innerText = "";
        }, 5000)
    }
</script>

</body>
</html>
