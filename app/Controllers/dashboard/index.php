<?php
use App\Core\Session;
Session::checkIdle();

echo "Hello! Welcome to the dashboard";
dd($_SESSION);