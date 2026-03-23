<?php

use App\Core\Session;

Session::destroy();
header("location: /");
exit();
