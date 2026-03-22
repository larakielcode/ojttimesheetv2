<?php
Session::start();

if (Session::has('is_logged_user') && Session::has('username')) {
    header("location: /dashboard");
} else {
    header("location: /login");
}
